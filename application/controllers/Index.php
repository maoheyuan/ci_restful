<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends REST_Controller {

    public  function __construct(){
        parent::__construct();
         $this->load->database();
    }


    public function index_get(){

        //var_dump($this->get());
        $data = array('returned: '. $this->get("fdff"));
         $this->response($data);

	}
}
