<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page {

    public function getPage($total_rows,$per_page,$base_url)
    {
        $ci =& get_instance();
        $ci->load->library('pagination');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['reuse_query_string'] = true;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</li></a>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_link'] = '末页';
        $config['first_link'] = '首页';
        $config['page_query_string']=true;
        $ci->pagination->initialize($config);
        $page= $ci->pagination->create_links();
        return $page;
    }
}