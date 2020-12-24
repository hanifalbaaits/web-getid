<?php 

class Page extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    function not_found(){
        $this->load->view('page/404_notfound');
    }

    function under_construction(){
        $this->load->view('page/500_construction');
    }

    function under_maintenance(){
        $this->load->view('page/503_maintenance');
    }
}
?>