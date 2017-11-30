<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Layout {
    public $layout;
    public  $data;
    //$this -> load -> library('**','**')的第二个参数必须得是数组才能给构造函数传参
    function __construct($params = array('main')) {
        $this->layout = 'Layouts' . DIRECTORY_SEPARATOR . $params[0];
    }
    function view($view, $data = null, $flag = false) {
        $ci =& get_instance();
        $data['controller'] =  $ci->router->fetch_class();
        $data['action']     = $ci->router->fetch_method();
        //这里的第三个参数true代表不输出，如果是false就会输出，默认是false
        $data['content'] = $ci->load->view($view, $data, true);
        if ($flag) {
            $view = $ci->load->view($this->layout, $data, true);
            return $view;
        } else {
            $ci->load->view($this->layout, $data, false);
        }
    }
}
?>