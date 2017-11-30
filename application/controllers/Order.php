<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

    public  function __construct(){
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('ordergoods_model');
        $this->load->helper('url');

    }

    public function index(){

        $keyword = $this->input->get('keyword');
        $page = $this->input->get('per_page');
        $orders=$this->order_model->get_orders_by_keyword($keyword,"*",$page);
        $count=$this->order_model->count($keyword);
        $this->load->library('page');
        $data["page"]=$this->page->getPage($count,10,"/Order/index");
        $data["orders"]=$orders;
        $this->layout->view('order/index',$data);

    }

    public  function  info(){
        $id = $this->input->get('id');
        $data=array();
        if($id){
            $order=$this->order_model->get_info_by_id($id);
            //var_dump($order);
            if($order["ordersn"]){
                $order_goods=$this->ordergoods_model->get_list_by_ordersn($order["ordersn"]);
            }
            $data["order"]=$order;
            $data["order_goods"]=$order_goods;
        }
        $this->layout->view('order/info',$data);
    }

}
