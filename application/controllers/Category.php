<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {


    public  function __construct(){
        parent::__construct();
        $this->load->model('category_model');
    }

    public function get($id=NULL){
        if ($id === NULL) {
            $keyword = $this->input->get('keyword');
            $page = $this->input->get('page');
            $size = $this->input->get('size');
            if(!$size){
                $size=10;
            }
            $categorys=$this->category_model->get_categorys_by_keyword($keyword,"*",$page,$size);
            if ($categorys) {
                $this->response($categorys, MY_Controller::HTTP_OK); // OK (200)
            }
            else {
                $this->response([
                    'status' => FALSE,
                    'message' => '分类列表不存在!'
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
                        'message' => '分类不存在'
                    ], MY_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
                }
            }
        }
    }




    public  function  validation($data=array(),$type="put"){

        if(!$data["name"]){
            $this->response([
                'status' => FALSE,
                'message' => '分类不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$data["status"]){
            $this->response([
                'status' => FALSE,
                'message' => '状态不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }

        if($type=="put"&&!$data["id"]){
            $this->response([
                'status' => FALSE,
                'message' => 'id不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
    }


    public  function put(){
        $put=$this->input->input_stream();

        $this->validation($put,"put");

        if(!$this->category_model->update($put["id"],$put)){
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
        $this->validation($post);
        $put["id"]=$this->category_model->insert($post);
        if(!$put["id"]){
            $this->response([
                'status' => FALSE,
                'message' => '新增失败'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        else{
            $this->response($put, MY_Controller::HTTP_OK); // OK (200)
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
