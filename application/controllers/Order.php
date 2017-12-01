<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

    public  function __construct(){
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('ordergoods_model');
        $this->load->helper('url');

    }


    public function get($id=NULL){
        if ($id === NULL) {
            $keyword = $this->input->get('keyword');
            $page = $this->input->get('page');
            if(!$page){
                $page=1;
            }
            $size = $this->input->get('size');
            if(!$size){
                $size=10;
            }
            $orders=$this->order_model->get_orders_by_keyword($keyword,"*",$page,$size);
            if ($orders) {

                foreach($orders as $key=>$value){
                    $order_goods=$this->ordergoods_model->get_list_by_ordersn($value["ordersn"]);
                    if($order_goods){
                        $orders[$key]["order_goods"]=$order_goods;
                    }
                }
                $this->response($orders, MY_Controller::HTTP_OK); // OK (200)
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
                $order=$this->order_model->get_info_by_id($id);
                if (!empty($order)) {
                    $orders["order_goods"]=$this->ordergoods_model->get_list_by_ordersn($order["ordersn"]);
                    $this->response($order, MY_Controller::HTTP_OK); // OK (200)
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


    public  function  validation_order($post=array(),$type="put"){
        if(!$post["name"]){
            $this->response([
                'status' => FALSE,
                'message' => '收货人不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["mobile"]){
            $this->response([
                'status' => FALSE,
                'message' => '收货人手机不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["address"]){
            $this->response([
                'status' => FALSE,
                'message' => '收货人地址不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["sales_price"]){
            $this->response([
                'status' => FALSE,
                'message' => '销售总金额不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }

        if(!$post["pay_type"]){
            $this->response([
                'status' => FALSE,
                'message' => '支付类型不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["status"]){
            $this->response([
                'status' => FALSE,
                'message' => '订单状态不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }

        if($type=="post"&&!$post["id"]){
            $this->response([
                'status' => FALSE,
                'message' => 'id不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
    }

    public  function  validation_order_goods($post=array(),$type="put"){
        if(!$post["order_sn"]){
            $this->response([
                'status' => FALSE,
                'message' => '订单编号不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["goods_name"]){
            $this->response([
                'status' => FALSE,
                'message' => '商品名称不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["goods_sn"]){
            $this->response([
                'status' => FALSE,
                'message' => '商品编号不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["goods_num"]){
            $this->response([
                'status' => FALSE,
                'message' => '商品数量不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }


        if(!$post["sales_price"]){
            $this->response([
                'status' => FALSE,
                'message' => '销售价不能为空'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        if(!$post["market_price"]){
            $this->response([
                'status' => FALSE,
                'message' => '市场价不能为空'
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

        $put=$this->input->input_stream();
        $this->validation_order($put);
        $order_put_status=$this->member_model->update($put["id"],$put);
        if(!$order_put_status){
            $this->response([
                'status' => FALSE,
                'message' => '修改订单失败'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        else{
            $put_order_goods_status=TRUE;
            foreach($put["order_goods"] as $key=>$value){
                $this->validation_order_goods($value,"put");
                $post["id"]=$this->ordergoods_model->update($value["id"],$value);
                if(!$post["id"]){
                    $put_order_goods_status=FALSE;
                }
            }
            if(!$put_order_goods_status){
                $this->response([
                    'status' => FALSE,
                    'message' => '修改订单商品失败'
                ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
            }
            else{
                $this->response($post, MY_Controller::HTTP_OK); // OK (200)
            }
        }
    }



    public  function post(){

        $post=$this->input->post();
        $this->validation_order($post,"put");
        $post["order_sn"]=$this->member_model->insert($post);
        if(!$post["id"]){
            $this->response([
                'status' => FALSE,
                'message' => '新增订单失败'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        else{
            $post_order_goods_status=TRUE;
            foreach($post["order_goods"] as $key=>$value){
                $value["order_sn"]=$post["order_sn"];
                $this->validation_order_goods($value,"put");
                $put["id"]=$this->ordergoods_model->insert($post);
                if(!$put["id"]){
                    $post_order_goods_status=FALSE;
                }
            }
            if(!$post_order_goods_status){
                $this->response([
                    'status' => FALSE,
                    'message' => '新增订单商品失败'
                ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
            }
            else{
                $this->response($put, MY_Controller::HTTP_OK); // OK (200)
            }
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

        $order=$this->order_model->get_info_by_id($id);

        if(!$order){
            $this->response([
                'status' => FALSE,
                'message' => '订单不存在'
            ], MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (400)
        }


        if(!$this->member_model->delete($id)){
            $this->response([
                'status' => FALSE,
                'message' => '订单删除失败'
            ],  MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
        }
        else{

            $delete_order_goods_status=$this->ordergoods_model->delete_by_order_sn($order["order_sn"]);
            if(!$delete_order_goods_status){
                $this->response([
                    'status' => FALSE,
                    'message' => '订单删除失败'
                ],  MY_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404)
            }
            else{
                $this->response(NULL, MY_Controller::HTTP_NO_CONTENT); // OK (200)
            }
        }
    }
}
