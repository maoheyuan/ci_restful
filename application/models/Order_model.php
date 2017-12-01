<?php

class Order_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_orders_by_keyword($keyword="",$field='*',$offset=0,$limit=10){
        if($keyword){
           $this->db->like('ordersn', $keyword, 'both');
           $this->db->or_like('name',$keyword,'both');
           $this->db->or_like('mobile',$keyword,'both');
            $this->db->or_like('address',$keyword,'both');
        }
        $this->db->select($field);
        $this->db->limit($limit,$offset);
        $this->db->order_by('id', 'DESC');
        $query =$this->db->get('orders');
        //echo $this->db->last_query();
        $list=$query->result_array();
        foreach($list as $key=>$value){
            $list[$key]=$this->format_data($value);
            $list[$key]["order_goods"]=$this->get_order_goods_by_order_sn($value["ordersn"]);
        }
        return $list;
    }

    public  function  get_order_goods_by_order_sn($order_sn){
        $order_goods_map=array();
        $order_goods_map["order_sn"]=$order_sn;
        $query=$this->db->where($order_goods_map)->from('orders_goods')->get();
        $order_goods=$query->result_array();
        return $order_goods;
    }

    protected  function format_data($data){

        if($data["add_time"]){
            $data["add_time"]=date("Y-m-d H:i:s",$data["add_time"]);
        }else{
            $data["add_time"]="/";
        }
        if($data["edit_time"]){
            $data["edit_time"]=date("Y-m-d H:i:s",$data["edit_time"]);
        }else{
            $data["edit_time"]="/";
        }

        if($data["status"]==1){
            $data["status"]="未支付";
        }
        if($data["status"]==2){
            $data["status"]="已支付";
        }
        if($data["status"]==3){
            $data["status"]="取消";
        }

        if($data["pay_type"]=1){
            $data["pay_type"]="微信";
        }
        if($data["pay_type"]=2){
            $data["pay_type"]="支付宝";
        }
        if($data["pay_time"]){
            $data["pay_time"]=date("Y-m-d H:i:s",$data["pay_time"]);
        }else{
            $data["pay_time"]="/";
        }
        return $data;

    }


    public function  count($keyword=""){
        if($keyword){
            $this->db->like('ordersn', $keyword, 'both');
            $this->db->or_like('name',$keyword,'both');
            $this->db->or_like('mobile',$keyword,'both');
            $this->db->or_like('address',$keyword,'both');
        }
        $this->db->from('orders');
        return $this->db->count_all_results();
    }


    public  function  get_info_by_id($id){
        if(!$id){
            return false;
        }
        $query=$this->db->where('id',$id)->from('orders')->limit(1)->get();
        $order=$query->row_array();
        $format_order=$this->format_data($order);
        $order["add_time"]=$format_order["add_time"];
        $order["pay_time"]=$format_order["pay_time"];
        $order["status"]=$format_order["status"];
        $order["order_goods"]=$this->get_order_goods_by_order_sn($order["ordersn"]);
        return  $order;
    }


    public  function insert($data=array()){
        $this->db->trans_begin();
        $order_data=array();
        $order_data['name']   = $data['name'];
        $order_data["mobile"]=$data["mobile"];
        $order_data['address']   = $data['address'];
        $order_data["sales_price"]=$data["sales_price"];
        $order_data['pay_type']   = $data['pay_type'];
        $order_data["status"]=$data["status"];
        $order_data['status']   = $data['status'];
        $order_data["ordersn"]=time();
        $order_data['add_time']  = time();
        $this->db->insert('orders', $order_data);
        $order_id=$this->db->insert_id();
        foreach($data["order_goods"] as $key=>$value){
            $order_goods_data=array();
            $order_goods_data['order_sn']   = $order_data['ordersn'];
            $order_goods_data["goods_name"]=$value["goods_name"];
            $order_goods_data['goods_sn']   = $value['goods_sn'];
            $order_goods_data["goods_num"]=$value["goods_num"];
            $order_goods_data['sales_price']   = $value['sales_price'];
            $order_goods_data["market_price"]=$value["market_price"];
            $order_goods_data['add_time']  = time();
            $this->db->insert('orders_goods', $order_goods_data);
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        else {
            $this->db->trans_commit();
            return  $order_id;
        }
    }


    public function update($id,$data=array()){
        $this->db->trans_begin();

        $order_data=array();
        $order_data['name']   = $data['name'];
        $order_data['name']   = $data['name'];
        $order_data["mobile"]=$data["mobile"];
        $order_data['address']   = $data['address'];
        $order_data["sales_price"]=$data["sales_price"];
        $order_data['pay_type']   = $data['pay_type'];
        $order_data["status"]=$data["status"];
        $order_data['status']   = $data['status'];
        $order_data['edit_time']  = time();
        $this->db->where('id', $id)->update('orders', $order_data);
        foreach($data["order_goods"] as $key=>$value){
            $order_goods_data=array();
            $order_goods_data["goods_name"]=$value["goods_name"];
            $order_goods_data['goods_sn']   = $value['goods_sn'];
            $order_goods_data["goods_num"]=$value["goods_num"];
            $order_goods_data['sales_price']   = $value['sales_price'];
            $order_goods_data["market_price"]=$value["market_price"];
            $this->db->where('id', $value["id"])->update('orders_goods', $order_goods_data);
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        else {
            $this->db->trans_commit();
            return  TRUE;
        }
    }


    public  function  delete($id){

        $order=$this->get_info_by_id($id);
        if(!$order){
            return FALSE;
        }
        $this->db->trans_begin();
        $this->db->where('id', $id);
        $this->db->delete('orders');
        $this->db->where("order_sn",$order["ordersn"]);
        $this->db->delete('orders_goods');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        else {
            $this->db->trans_commit();
            return  TRUE;
        }
    }
}