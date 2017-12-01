<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {


    public  function __construct(){
        parent::__construct();
        $this->load->model('cart_model');
    }

    public function get($id=NULL){
        if ($id === NULL) {

            $uid=$this->get_uid();
            $categorys=$this->cart_model->get_all_by_uid($uid);
            if ($categorys) {
                $this->response($categorys, MY_Controller::HTTP_OK); // OK (200)
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
                $category=$this->category_model->get_info_by_id($id);
                if (!empty($category)) {
                    $this->response($category, MY_Controller::HTTP_OK); // OK (200)
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
        if(!$post["name"]){
            $this->response([
                'status' => FALSE,
                'message' => '分类不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["status"]){
            $this->response([
                'status' => FALSE,
                'message' => '状态不能为空'
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
        $this->validation($post,"put");
        $post["id"]=$this->category_model->insert($post);
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

        if(!$this->category_model->update($post["id"],$post)){
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
        if(!$this->category_model->delete($id)){
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
