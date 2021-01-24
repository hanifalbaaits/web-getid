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
        redirect("Help/terms_condition");    
    }

    function terms_condition(){     
        $this->load->view('page/term_condition');    
    }

    function privacy_policy(){     
        $this->load->view('page/privacy_policy');    
    }
}
?>