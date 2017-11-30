<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends MY_Controller {

    public  function __construct(){
        parent::__construct();
        $this->load->model('goods_model');
        $this->load->helper('url');
        $this->load->model('logs_model');
    }




    public function index(){

        $keyword = $this->input->get('keyword');
        $page = $this->input->get('per_page');
        $goods=$this->goods_model->get_goods_by_keyword($keyword,"*",$page);
        $count=$this->goods_model->count($keyword);
        $this->load->library('page');
        $data["page"]=$this->page->getPage($count,10,"/Goods/index");
        $data["goods"]=$goods;
        $this->layout->view('goods/index',$data);

    }


    public  function add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name' ,'', 'required',array('required' => '商品名称不能为空'));
        $this->form_validation->set_rules('discription','', 'required',array('required' => '简介不能为空'));
        $this->form_validation->set_rules('content'   ,'', 'required',array('required' => '内容不能为空'));
        $this->form_validation->set_rules('market_price'   ,'', 'required',array('required' => '市场价不能为空'));
        $this->form_validation->set_rules('sales_price'  ,'', 'required',array('required' => '销售价不能为空'));
        $this->form_validation->set_rules('stock'  ,'', 'required',array('required' => '库存不能为空'));
        $this->form_validation->set_rules('status','', 'required',array('required' => '状态不能为空'));

        if ($this->form_validation->run() == FALSE) {
            if($this->input->method()=="post"){
                if($_FILES["image"]['name']==""){
                    $this->form_validation->set_file_error( "image",'图片不能为空');
                }
            }
            $this->layout->view("goods/add");
        }
        else {
            $image_file_name=$this->do_upload("image");
            if($image_file_name!=false){
                $post=$this->input->post();
                $post["image"]=$image_file_name;
                $result=$this->goods_model->insert($post);

                if($result==false){
                    $this->form_validation->set_file_error( "error_tip",'商品新增失败');
                    $this->layout->view("goods/add");
                }else{
                    $post["id"]=$result;
                    $this->logs_model->insert($post);
                    redirect('/Goods/index');
                }
            }
            else{
                $this->form_validation->set_file_error( "error_tip",'图片保存失败');
                $this->layout->view("goods/add");
            }
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


    public  function edit(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name' ,'', 'required',array('required' => '商品名称不能为空'));
        $this->form_validation->set_rules('discription','', 'required',array('required' => '简介不能为空'));
        $this->form_validation->set_rules('content'   ,'', 'required',array('required' => '内容不能为空'));
        $this->form_validation->set_rules('market_price'   ,'', 'required',array('required' => '市场价不能为空'));
        $this->form_validation->set_rules('sales_price'  ,'', 'required',array('required' => '销售价不能为空'));
        $this->form_validation->set_rules('stock'  ,'', 'required',array('required' => '库存不能为空'));
        $this->form_validation->set_rules('status','', 'required',array('required' => '状态不能为空'));
        $id=$this->input->get("id");
        $goods=$this->goods_model->get_info_by_id($id);
        $data["goods"]=$goods;
        $post=$this->input->post();
        if ($this->form_validation->run() == FALSE) {
            if($this->input->method()=="post"){
                $data["goods"]=$post;
                $data["goods"]["image"]=$goods["image"];
            }
            $this->layout->view("goods/edit",$data);
        }
        else {
            $post=$this->input->post();
            $data["goods"]=$post;
            $edit_status="update_data_sucess";
            if($_FILES["image"]['name']==""){
                $post["image"]=$goods["image"];
                $result=$this->goods_model->update($id,$post);
                if($result==false){
                    $edit_status="update_data_fail";
                }
            }else{
                $image_file_name=$this->do_upload("image");
                if($image_file_name==false){
                    $edit_status="update_image_fail";
                }
                else{
                    $post["image"]=$image_file_name;
                    $result=$this->goods_model->update($id,$post);
                    if($result==false){
                        $edit_status="update_data_fail";
                    }
                }
            }
            if($edit_status=="update_data_fail"||$edit_status=="update_image_fail"){
                if($edit_status=="update_data_fail"){
                    $this->form_validation->set_file_error( "error_tip",'商品修改失败');
                }
                if($edit_status=="update_image_fail"){
                    $this->form_validation->set_file_error( "error_tip",'图片保存失败');
                }
                $this->layout->view("goods/edit",$data);
            }
            else{
                $this->logs_model->insert($post);
                redirect('/Goods/index');
            }
        }
    }

    public  function  delete(){
        $id = $this->input->get('id');
        $this->goods_model->delete($id);
        $this->logs_model->insert(array("id"=>$id));
        redirect("/Goods/index");
    }



}
