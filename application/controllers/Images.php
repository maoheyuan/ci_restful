<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends MY_Controller {

    public  function __construct(){
        parent::__construct();
        $this->load->model('image_model');
        // $this->load->database();
        $this->load->model('logs_model');
    }



    public function index()
    {
        $keyword = $this->input->get('keyword');
        $page = $this->input->get('per_page');
        $images=$this->image_model->get_images_by_keyword($keyword,"*",$page);
        $count=$this->image_model->count($keyword);
        $this->load->library('page');
        $data["page"]=$this->page->getPage($count,10,"/Image/index");
        $data["images"]=$images;
        $this->layout->view('Images/index',$data);
    }



    protected  function do_upload($input_name){
        $config['upload_path']      = './upload/image';
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


    public  function  add(){

        $this->load->library('form_validation');
        if ($this->input->method()=="get") {


            $this->layout->view("Images/add");
        }
        else{

            if($_FILES["image"]['name']==""){
                $this->form_validation->set_file_error( "image",'图片不能为空');
                $this->layout->view("Images/add");
            }
            else{
                $image_file_name=$this->do_upload("image");
                if($image_file_name){
                    $post=$this->input->post();
                    $post["name"]=$image_file_name;

                    $controller =  $this->router->fetch_class();
                    $action     =  $this->router->fetch_method();
                    $post["module"]=$controller."/".$action;
                    $result=$this->image_model->insert($post);
                    if($result==false){
                        $this->form_validation->set_file_error( "error_tip",'图片保存失败1');
                        $this->layout->view("Images/add");
                    }else{

                        $post["id"]=$result;
                        $this->logs_model->insert($post);
                        redirect('/Images/index');
                    }
                }
                else{
                    $this->form_validation->set_file_error( "error_tip",'图片保存失败2');
                    $this->layout->view("Images/add");
                }

            }
        }
    }
    public  function  edit(){
        $this->load->library('form_validation');
        $id=$this->input->get("id");
        $image=$this->image_model->get_info_by_id($id);
        if ($this->input->method()=="get") {

            $data["image"]=$image;
            $this->layout->view("Images/edit",$data);
        }
        else{

            $post=$this->input->post();
            $edit_status="update_data_sucess";
            if($_FILES["image"]['name']==""){
                $post["name"]=$image["name"];
                $result=$this->image_model->update($id,$post);
                if($result==false){
                    $edit_status="update_data_fail";
                }
            }else{
                $image_file_name=$this->do_upload("image");
                if($image_file_name==false){
                    $edit_status="update_image_fail";
                }
                else{
                    $post["name"]=$image_file_name;
                    $result=$this->image_model->update($id,$post);
                    if($result==false){
                        $edit_status="update_data_fail";
                    }
                }
            }
            if($edit_status=="update_data_fail"||$edit_status=="update_image_fail"){
                if($edit_status=="update_data_fail"){
                    $this->form_validation->set_file_error( "error_tip",'图片保存失败');
                }
                if($edit_status=="update_image_fail"){
                    $this->form_validation->set_file_error( "error_tip",'图片保存失败');
                }
                $this->layout->view("Images/edit",$post);
            }
            else{
                $this->logs_model->insert($post);
                redirect('/Images/index');
            }
        }

    }
}
