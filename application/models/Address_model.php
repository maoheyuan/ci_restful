<?php

class Address_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }


    public  function get_all_by_uid($uid,$field="*",$offset=0,$limit=10){
        $this->db->where('uid',$uid);
        $this->db->order_by('id', 'DESC');
        $this->db->select($field);
        $this->db->limit($limit,$offset);
        $query =$this->db->get('address');
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

    public function  count($uid){
        $this->db->where('uid',$uid);
        $this->db->from('address');
        return $this->db->count_all_results();
    }

    public  function  get_info_by_id_and_uid($id,$uid){
        if(!$id||!$uid){
            return false;
        }
        $map=array();
        $map["id"]=$id;
        $map["uid"]=$uid;
        $query=$this->db->where($map)->from('address')->limit(1)->get();
        return  $query->row_array();
    }


    public function insert($post=array()){
        $data=array();
        $data['uid']   = $post['uid'];
        $data['province_id']   = $post['province_id'];
        $data['city_id']  = $post['city_id'];
        $data['area_id']   = $post['area_id'];
        $data['address']  =$post['address'];
        $data['mobile']  = $post['mobile'];
        $data['default']   = $post['default'];
        $data['add_time']  = time();
        $this->db->insert('address', $data);
        return  $this->db->insert_id();
    }


    public function update($post=array()){

        $data['uid']   = $post['uid'];
        $data['province_id']   = $post['province_id'];
        $data['city_id']  = $post['city_id'];
        $data['area_id']   = $post['area_id'];
        $data['address']  =$post['address'];
        $data['mobile']  = $post['mobile'];
        $data['default']   = $post['default'];
        $data['edit_time']  = time();
        $map=array();
        $map["id"]=$post["id"];
        $map["uid"]=$post["uid"];
        return $this->db->where($map)->update('address', $data);
    }

    public  function  delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('address');
    }

}