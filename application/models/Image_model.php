<?php

class Image_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_images_by_keyword($keyword="",$field='*',$offset=0,$limit=10){
        if($keyword){
           $this->db->like('id', $keyword, 'both');
        }
        $this->db->select($field);
        $this->db->limit($limit,$offset);
        $this->db->order_by('id', 'DESC');
        $query =$this->db->get('images');
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
        return $data;

    }


    public function  count($keyword=""){
        if($keyword){
            $this->db->like('id', $keyword, 'both');
        }
        $this->db->from('images');
        return $this->db->count_all_results();
    }


    public  function  get_info_by_id($id){
        if(!$id){
            return false;
        }
        $query=$this->db->where('id',$id)->from('images')->limit(1)->get();
        return  $query->row_array();
    }




    public function insert($post=array()){
        $data=array();
        $data['name']   = $post['name'];
        $data['module']   = $post['module'];
        $data['add_time']  = time();
        return $this->db->insert('images', $data);
       /* echo $this->db->last_query();*/
       // return $this->db->insert('goods', $data);
    }

    public function update($id,$post=array()){
        $data=array();
        $data['name']   = $post['name'];
        $data['module']   = $post['module'];
        $data['edit_time']  = time();
        return $this->db->where('id', $id)->update('images', $data);
    }





    public  function  delete($id){
        $this->db->where('id', $id);
        return $this->db->delete('images');
    }


}