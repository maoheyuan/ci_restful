<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {


    public  function __construct(){
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->model('goods_model');
    }

    public function get($id=NULL){
        if ($id === NULL) {
            $uid=$this->get_uid();
            $carts=$this->cart_model->get_all_by_uid($uid);
            if ($carts) {
                $this->response($carts, MY_Controller::HTTP_OK); // OK (200)
            }
            else {
                $this->response([
                    'status' => FALSE,
                    'message' => '商品车列表不存在!'
                ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
            }
        }
        else{
            $id = (int) $id;
            if ($id <= 0) {
                $this->response(NULL, MY_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400)
            }
            else{
                $uid=$this->get_uid();
                $cart=$this->cart_model->get_info_by_id($id);
                if (!empty($cart)) {
                    $this->response($cart, MY_Controller::HTTP_OK); // OK (200)
                }
                else {
                    $this->response([
                        'status' => FALSE,
                        'message' => '商品不存在'
                    ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
                }
            }
        }
    }




    public  function  validation($post=array(),$type="put"){
        if(!$post["uid"]){
            $this->response([
                'status' => FALSE,
                'message' => '会员Id不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }
        if(!$post["gid"]){
            $this->response([
                'status' => FALSE,
                'message' => '商品id不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }

        if(!$post["name"]){
            $this->response([
                'status' => FALSE,
                'message' => '商品名称不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }

        if(!$post["number"]){
            $this->response([
                'status' => FALSE,
                'message' => '商品数量不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }


        if($type=="post"&&!$post["id"]){
            $this->response([
                'status' => FALSE,
                'message' => 'id不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }
    }


    public  function put(){

        $put=$this->input->post();
        $put["uid"]=$this->get_uid();
        $this->validation($put,"put");
        $cart_goods=$this->cart_model->get_info_by_id_and_uid($put["id"],$put["uid"]);
        if(!$cart_goods){
            $this->response([
                'status' => FALSE,
                'message' => '商品不存在'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }

        if(!$this->cart_model->update($put)){
            $this->response([
                'status' => FALSE,
                'message' => '修改失败'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        else{
            $this->response($put, MY_Controller::HTTP_OK); // OK (200)
        }
    }

    public  function post(){
        $post=$this->input->post();
        $post["uid"]=$this->get_uid();
        $this->validation($post);
        $post["id"]=$this->cart_model->insert($post);
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

        $uid=$this->get_uid();
        if ((int)$uid <= 0) {
            $this->response([
                'status' => FALSE,
                'message' => '用户不存在'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (400)
        }
        $cart_goods=$this->cart_model->get_info_by_id_and_uid($id,$uid);
        if(!$cart_goods){
            $this->response([
                'status' => FALSE,
                'message' => '商品不存在'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }
        if(!$this->cart_model->delete($id)){
            $this->response([
                'status' => FALSE,
                'message' => '删除失败'
            ],  MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        else{
            $this->response(NULL, MY_Controller::HTTP_OK); // OK (200)
        }
    }

}
