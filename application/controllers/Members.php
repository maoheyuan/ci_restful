<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Members extends MY_Controller {

    public  function __construct(){
        parent::__construct();
        $this->load->model('member_model');
        $this->load->helper('url');
    }


    public function get($id=NULL){
        if ($id === NULL) {
            $page = $this->input->get('per_page');
            $members=$this->member_model->get_members_by_keyword("","*",$page);
            $data["members"]=$members;
            if ($members) {
                $this->response($members, MY_Controller::HTTP_OK); // OK (200)
            }
            else {
                $this->response([
                    'status' => FALSE,
                    'message' => '会员列表不存在!'
                ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
            }
        }
        else{
            $id = (int) $id;
            if ($id <= 0) {
                $this->response(NULL, MY_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400)
            }
            else{
                $member=$this->member_model->get_info_by_id($id);
                if (!empty($member)) {
                    $this->response($member, MY_Controller::HTTP_OK); // OK (200)
                }
                else {
                    $this->response([
                        'status' => FALSE,
                        'message' => '会员不存在'
                    ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
                }
            }
        }
    }

    public  function  validation($post=array(),$type="put"){
        if(!$post["username"]){
            $this->response([
                'status' => FALSE,
                'message' => '用户名不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["realname"]){
            $this->response([
                'status' => FALSE,
                'message' => '真实姓名不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["password"]){
            $this->response([
                'status' => FALSE,
                'message' => '密码不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["rpassword"]){
            $this->response([
                'status' => FALSE,
                'message' => '确认密码不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if($post["password"]!=$post["rpassword"]){
            $this->response([
                'status' => FALSE,
                'message' => '二次输入的密码不一致'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }

        if(!$post["mobile"]){
            $this->response([
                'status' => FALSE,
                'message' => '手机号不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["status"]){
            $this->response([
                'status' => FALSE,
                'message' => '状态不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["account"]){
            $this->response([
                'status' => FALSE,
                'message' => '账号不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["address"]){
            $this->response([
                'status' => FALSE,
                'message' => '地址不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if($type=="post"&&!$post["id"]){
            $this->response([
                'status' => FALSE,
                'message' => 'id不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
    }

    public  function put(){
        $post=$this->input->post();
        $this->validation($post);
        $post["id"]=$this->member_model->insert($post);
        if(!$post["id"]){
            $this->response([
                'status' => FALSE,
                'message' => '新增失败'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        else{

            $this->response($post, MY_Controller::HTTP_OK); // OK (200)
        }
    }

    public  function post(){
        $post=$this->input->post();
        $this->validation($post);

        if(!$this->member_model->update($post["id"],$post)){
            $this->response([
                'status' => FALSE,
                'message' => '修改失败'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        else{
            $this->response($post, MY_Controller::HTTP_OK); // OK (200)
        }
    }


    public  function delete($id=NULL){
        if($id==NULL){
            $this->response(NULL, MY_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400)
        }
        $id = (int) $id;
        if ($id <= 0) {
            $this->response([
                'status' => FALSE,
                'message' => '参数不正确'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (400)
        }
        if(!$this->member_model->delete($id)){
            $this->response([
                'status' => FALSE,
                'message' => '删除失败'
            ],  MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        else{
            $this->response(NULL, MY_Controller::HTTP_NO_CONTENT); // OK (200)
        }
    }

}
