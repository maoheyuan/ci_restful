<?php

class Cart_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }


    public  function get_all_by_uid($uid){
        $this->db->where('uid',$uid);
        $this->db->order_by('id', 'DESC');
        $query =$this->db->get('cart');
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
        }
        $this->db->from('cart');
        return $this->db->count_all_results();
    }

    public  function  get_info_by_id_and_uid($id,$uid){
        if(!$id||!$uid){
            return false;
        }
        $map=array();
        $map["id"]=$id;
        $map["uid"]=$uid;
        $query=$this->db->where($map)->from('cart')->limit(1)->get();
        return  $query->row_array();
    }


    public function insert($post=array()){
        $data=array();
        $data['uid']   = $post['uid'];
        $data['gid']   = $post['gid'];
        $data['name']  = $post['name'];
        $data['number']   = $post['number'];
        $data['addtime']  = time();
        $this->db->insert('members', $data);
        return  $this->db->insert_id();
    }


    public function update($id,$post=array()){
        $data=array();
        $data['gid']   = $post['gid'];
        $data['name']  = $post['name'];
        $data['number']   = $post['number'];
        $map=array();
        $map["id"]=$post["id"];
        $map["uid"]=$post["uid"];
        return $this->db->where($map)->update('cart', $data);
    }

    public  function  delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('cart');
    }

}