<?php

class Category_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();

    }

    public function get_categorys_by_keyword($keyword="",$field='*',$offset=0,$limit=10){
        if($keyword){
           $this->db->like('name', $keyword, 'both');
        }
        $this->db->select($field);
        $this->db->limit($limit,$offset);
        $this->db->order_by('id', 'DESC');
        $query =$this->db->get('category');
        //echo $this->db->last_query();
        $list=$query->result_array();
        foreach($list as $key=>$value){
            $list[$key]=$this->format_data($value);

        }
        return $list;
    }


    protected  function format_data($data){

        if($data["addtime"]){
            $data["addtime"]=date("Y-m-d H:i:s",$data["addtime"]);
        }
        else{
            $data["addtime"]="/";
        }
        if($data["edittime"]){
            $data["edittime"]=date("Y-m-d H:i:s",$data["edittime"]);
        }
        else{
            $data["edittime"]="/";
        }

        if($data["status"]==1){
            $data["status"]="启用";
        }
        if($data["status"]==2){
            $data["status"]="禁用";
        }

        return $data;

    }

    public function  count($keyword=""){
        if($keyword){
            $this->db->like('name', $keyword, 'both');
        }
        $this->db->from('category');
        return $this->db->count_all_results();
    }

    public  function  get_info_by_id($id){

        if(!$id){
            return false;
        }
        $query=$this->db->where('id',$id)->from('category')->limit(1)->get();
        return  $query->row_array();
    }

    public function insert($post=array()){
        $data=array();
        $data['name']   = $post['name'];
        $data["status"]=$post["status"];
        $data['addtime']  = time();
        $this->db->insert('category', $data);
        return  $this->db->insert_id();
    }

    public function update($id,$post=array()){
        $data=array();
        $data['name']   = $post['name'];
        $data["status"]=$post["status"];
        $data['edittime']  = time();
        return $this->db->where('id', $id)->update('category', $data);
    }

    public  function  delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('category');
    }

}