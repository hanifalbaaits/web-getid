<?php 

class Help extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    function index(){
        $this->load->view('page/help');    
    }

    function terms_policy(){     
        $this->load->view('page/term_policy');    
    }
}
?>