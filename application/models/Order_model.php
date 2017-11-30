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
        }
        return $list;
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
        return  $order;
    }

}