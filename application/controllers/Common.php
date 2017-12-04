<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends MY_Controller {

    public  function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('session');
    }


    public function index()
	{
		$this->load->view('welcome_message');
	}

    public  function  validation($post=array()){

        if(!$post["username"]){
            $this->response([
                'status' => FALSE,
                'message' => '用户名不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }
        if(!$post["password"]){
            $this->response([
                'status' => FALSE,
                'message' => '密码不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }

    }
    public  function login(){
        $post=$this->input->post();
        $this->validation($post);
        $username=$this->input->post("username");
        $password=$this->input->post("password");
        $admin=$this->admin_model->login($username,$password);
        if($admin){
            $data_session = array('admin'  => $admin);
            $this->session->set_userdata($data_session);
            $this->response($admin, MY_Controller::HTTP_OK); // OK (200)
        }
        else{
            $this->response([
                'status' => FALSE,
                'message' => '登录失败'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
    }


    public  function  loginOut(){
        $this->session->sess_destroy();
        return TRUE;
    }



}
