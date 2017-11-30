<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_Controller {

    public  function __construct(){
        parent::__construct();
        $this->load->model('config_model');
        $this->load->helper('url');
        $this->load->model('logs_model');
    }

    public function index()
    {

        $this->load->library('form_validation');
        $id=$this->input->get("id");
        $config=$this->config_model->get_all($id);
        $configArray=array();
        foreach($config as $key=>$value){
            $configArray[$value["key"]]=$value["value"];
        }

        if($this->input->method()=="post"){
            $post=$this->input->post();
            if(!$post["domain"]){
                $this->form_validation->set_file_error( "domain",'二次输入的密码不一致');
            }
            else{
                foreach($post as $key=>$value){
                    $this->config_model->update_by_key($key,$value);
                }
                $this->logs_model->insert($post);
            }
            $configArray=$post;
        }
        $data["config"]=$configArray;
        $this->layout->view('Config/index',$data);

    }


}
