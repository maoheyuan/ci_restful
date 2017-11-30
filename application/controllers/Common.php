<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

    public  function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('session');
        $this->load->helper('url');
        // $this->load->database();
    }


    public function index()
	{
		$this->load->view('welcome_message');
	}

    public  function login(){


        $this->load->library('form_validation');
        $this->form_validation->set_rules('username' ,'', 'required',array('required' => '账号不能为空'));
        $this->form_validation->set_rules('password'   ,'', 'required',array('required' => '密码不能为空'));
        if ($this->form_validation->run() == FALSE) {
            if($this->input->method()=="post"){
                $data["admin"]=$this->input->post();
            }
            $this->load->view('common/login',$data);
        }
        else {
            $username=$this->input->post("username");
            $password=$this->input->post("password");
            $admin=$this->admin_model->login($username,$password);
            if($admin){
                $data_session = array('admin'  => $admin);
                $this->session->set_userdata($data_session);
                redirect("/Index/index");
            }
            else{
                $this->form_validation->set_file_error( "error_tip",'用户名或密码错误!');
                $data["admin"]=$this->input->post();
                $this->load->view('common/login',$data);
            }
        }
    }

    public  function  loginOut(){
        $this->session->sess_destroy();
        redirect("/Common/login");
    }



}
