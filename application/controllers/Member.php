<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {

    public  function __construct(){
        parent::__construct();
        $this->load->model('member_model');
        $this->load->helper('url');
        $this->load->model('logs_model');
    }




    public function index()
	{
        $keyword = $this->input->get('keyword');
        $page = $this->input->get('per_page');
        $members=$this->member_model->get_members_by_keyword($keyword,"*",$page);
        $count=$this->member_model->count($keyword);
        $this->load->library('page');
        $data["page"]=$this->page->getPage($count,10,"/Member/index");
        $data["members"]=$members;
        $this->layout->view('member/index',$data);

	}


    public  function add(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username' ,'', 'required',array('required' => '用户名不能为空'));
        $this->form_validation->set_rules('realname' ,'', 'required',array('required' => '真实姓名不能为空'));
        $this->form_validation->set_rules('password' ,'', 'required',array('required' => '密码不能为空'));
        $this->form_validation->set_rules('rpassword','', 'required',array('required' => '确认密码不能为空'));
        $this->form_validation->set_rules('rpassword','', 'matches[password]', array("matches"=>"二次输入的密码不一致"));
        $this->form_validation->set_rules('mobile'   ,'', 'required',array('required' => '手机号不能为空'));
        $this->form_validation->set_rules('status'   ,'', 'required',array('required' => '状态不能为空'));
        $this->form_validation->set_rules('account'  ,'', 'required',array('required' => '账号不能为空'));
        $this->form_validation->set_rules('address'  ,'', 'required',array('required' => '地址不能为空'));
        if ($this->form_validation->run() == FALSE) {
            $this->layout->view("member/add");
        }
        else {
            $post=$this->input->post();
            $post["id"]=$this->member_model->insert($post);
            $this->logs_model->insert($post);
            redirect('/Member/index');
        }
    }


    public  function edit(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username' ,'', 'required',array('required' => '用户名不能为空'));
        $this->form_validation->set_rules('realname' ,'', 'required',array('required' => '真实姓名不能为空'));
        $this->form_validation->set_rules('mobile'   ,'', 'required',array('required' => '手机号不能为空'));
        $this->form_validation->set_rules('status'   ,'', 'required',array('required' => '状态不能为空'));
        $this->form_validation->set_rules('account'  ,'', 'required',array('required' => '账号不能为空'));
        $this->form_validation->set_rules('address'  ,'', 'required',array('required' => '地址不能为空'));
        $id=$this->input->get("id");
        $member=$this->member_model->get_info_by_id($id);
        $data["member"]=$member;
        $post=$this->input->post();
        if ($this->form_validation->run() == FALSE ||$post["password"]!=$post["rpassword"]) {
            if($this->input->method()=="post"){
                $data["member"]=$post;
                if($post["password"]!=$post["rpassword"]){
                    $this->form_validation->set_file_error( "rpassword",'二次输入的密码不一致');
                }
            }
            $this->layout->view("member/edit",$data);
        }
        else {

            $this->member_model->update($id,$post);
            $this->logs_model->insert($post);
            redirect("/Member/index");
        }
    }

    public  function  delete(){
        $id = $this->input->get('id');
        $this->member_model->delete($id);
        $this->logs_model->insert(array("id"=>$id));
        redirect("/Member/index");
    }

}
