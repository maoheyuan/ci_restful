<?php

class Ordergoods_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();

    }

    public function get_order_goods_by_keyword($keyword="",$field='*',$offset=0,$limit=10){
        if($keyword){
           $this->db->like('name', $keyword, 'both');
           $this->db->or_like('discription',$keyword,'both');
           $this->db->or_like('content',$keyword,'both');
        }
        $this->db->select($field);
        $this->db->limit($limit,$offset);
        $this->db->order_by('id', 'DESC');
        $query =$this->db->get('orders_goods');
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
        }

        return $data;

    }

    public function  count($keyword=""){
        if($keyword){
            $this->db->like('name', $keyword, 'both');
            $this->db->or_like('discription',$keyword,'both');
            $this->db->or_like('content',$keyword,'both');
        }
        $this->db->from('orders_goods');
        return $this->db->count_all_results();
    }
    public  function  get_info_by_id($id){
        if(!$id){
            return false;
        }
        $query=$this->db->where('id',$id)->from('orders_goods')->limit(1)->get();
        $data=$query->row_array();

        $data=$this->format_data($data);
        return  $data;
    }
    public  function  get_list_by_ordersn($ordersn){
        if(!$ordersn){
            return false;
        }
        $query=$this->db->where('order_sn',$ordersn)->from('orders_goods')->get();
        $data=$query->result_array();
        foreach($data as $key=>$value){
            $data[$key]=$this->format_data($value);
        }
        return  $data;
    }

}