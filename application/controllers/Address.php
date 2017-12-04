<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends MY_Controller {


    public  function __construct(){
        parent::__construct();
        $this->load->model('address_model');
    }

    public function get($id=NULL){
        if ($id === NULL) {
            $uid=$this->get_uid();
            $page = $this->input->get('page');
            $size = $this->input->get('size');
            $addresss=$this->address_model->get_all_by_uid($uid,"*",$page,$size);
            if ($addresss) {
                $this->response($addresss, MY_Controller::HTTP_OK); // OK (200)
            }
            else {
                $this->response([
                    'status' => FALSE,
                    'message' => '地址列表不存在!'
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
                $address=$this->address_model->get_info_by_id_and_uid($id,$uid);
                if (!empty($address)) {
                    $this->response($address, MY_Controller::HTTP_OK); // OK (200)
                }
                else {
                    $this->response([
                        'status' => FALSE,
                        'message' => '地址不存在'
                    ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
                }
            }
        }
    }




    public  function  validation($post=array(),$type="put"){
        if(!$post["uid"]){
            $this->response([
                'status' => FALSE,
                'message' => '用户Id不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }
        if(!$post["province_id"]){
            $this->response([
                'status' => FALSE,
                'message' => '省不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }

        if(!$post["city_id"]){
            $this->response([
                'status' => FALSE,
                'message' => '市不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }

        if(!$post["area_id"]){
            $this->response([
                'status' => FALSE,
                'message' => '区/县不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }


        if(!$post["address"]){
            $this->response([
                'status' => FALSE,
                'message' => '详细地址不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }



        if(!$post["mobile"]){
            $this->response([
                'status' => FALSE,
                'message' => '收货人手机不能为空'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }


        if(!$post["default"]){
            $this->response([
                'status' => FALSE,
                'message' => '默认地址不能为空'
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
        $adress=$this->address_model->get_info_by_id_and_uid($put["id"],$put["uid"]);
        if(!$adress){
            $this->response([
                'status' => FALSE,
                'message' => '地址不存在'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }

        if(!$this->address_model->update($put)){
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
        $post["id"]=$this->address_model->insert($post);
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
        $cart_goods=$this->address_model->get_info_by_id_and_uid($id,$uid);
        if(!$cart_goods){
            $this->response([
                'status' => FALSE,
                'message' => '地址不存在'
            ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }
        if(!$this->address_model->delete($id)){
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
