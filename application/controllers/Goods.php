<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends MY_Controller {

    public  function __construct(){
        parent::__construct();
        $this->load->model('goods_model');
        $this->load->helper('url');

    }


    public function get($id=NULL){
        if ($id === NULL) {
            $keyword = $this->input->get('keyword');
            $page = $this->input->get('page');
            $size = $this->input->get('size');
            if(!$size){
                $size=10;
            }
            $categorys=$this->goods_model->get_categorys_by_keyword($keyword,"*",$page,$size);
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
                $category=$this->goods_model->get_info_by_id($id);
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
                'message' => '商品名称不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["discription"]){
            $this->response([
                'status' => FALSE,
                'message' => '简介不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["content"]){
            $this->response([
                'status' => FALSE,
                'message' => '内容不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["market_price"]){
            $this->response([
                'status' => FALSE,
                'message' => '市场价不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["sales_price"]){
            $this->response([
                'status' => FALSE,
                'message' => '销售价不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["sales_price"]){
            $this->response([
                'status' => FALSE,
                'message' => '销售价不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }

        if(!$post["stock"]){
            $this->response([
                'status' => FALSE,
                'message' => '库存不能为空'
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

        if($type=="post"&&!$post["image"]){
            $this->response([
                'status' => FALSE,
                'message' => '图片不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
    }


    public  function put(){

        $post=$this->input->post();
        $this->validation($post,"put");
        $post["id"]=$this->goods_model->insert($post);
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

        if(!$this->goods_model->update($post["id"],$post)){
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
        if(!$this->goods_model->delete($id)){
            $this->response([
                'status' => FALSE,
                'message' => '删除失败'
            ],  MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        else{
            $this->response(NULL, MY_Controller::HTTP_NO_CONTENT); // OK (200)
        }
    }

    protected  function do_upload($input_name){
        $config['upload_path']      = './upload/image/goods';
        $config['allowed_types']    = 'gif|jpg|png';
        $file_name=time();
        $config["file_name"]=$file_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($input_name)) {
           return false;
        }
        else {
            $data = $this->upload->data();

            return $data["file_name"];
        }
    }

}
