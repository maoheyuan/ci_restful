<?php

class Config_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_all(){
        $this->db->select("*");
        $this->db->order_by('id', 'DESC');
        $query =$this->db->get('configs');
        //echo $this->db->last_query();
        $list=$query->result_array();
        return $list;
    }


    public function update_by_key($key,$value){
        $data=array();
        $data['value']   = $value;
        return $this->db->where('key', $key)->update('configs', $data);
    }

}