<?php 

class Report extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->session_key = $this->config->item('session-key');
        $this->load->model("APICoreRKA");
        $this->url_corerka = $this->config->item('url-corerka');

        if($this->session->userdata('logcode') != $this->session_key){
            $this->session->set_flashdata('message', " Login Terlebih dahulu! ");
            redirect('login');
        }
    }

    function statistic(){
        $role =  $this->session->userdata('level_rka');
        $idu =  $this->session->userdata('iduser');
        //NOTIFICATION
        $pesan = [];
        if ($role == '1' || $role == '4') {
            $api_notif = json_decode($this->APICoreRKA->Apiget($this->url_corerka."/pesan/proses"));
            if ($api_notif != null && $api_notif->code == '1') {
                $pesan = $api_notif->data;
            }
        } else {
            $api_notif = json_decode($this->APICoreRKA->Apiget($this->url_corerka."/pesan/proses/".$idu));
            if ($api_notif != null && $api_notif->code == '1') {
                $pesan = $api_notif->data;
            }
        }      
        $data["notif"] = $pesan;
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/statistic');
        $this->load->view('frame/d_footer');      
    }

    function analytic(){  
        $role =  $this->session->userdata('level_rka');
        $idu =  $this->session->userdata('iduser');
        //NOTIFICATION
        $pesan = [];
        if ($role == '1' || $role == '4') {
            $api_notif = json_decode($this->APICoreRKA->Apiget($this->url_corerka."/pesan/proses"));
            if ($api_notif != null && $api_notif->code == '1') {
                $pesan = $api_notif->data;
            }
        } else {
            $api_notif = json_decode($this->APICoreRKA->Apiget($this->url_corerka."/pesan/proses/".$idu));
            if ($api_notif != null && $api_notif->code == '1') {
                $pesan = $api_notif->data;
            }
        }  
        $data["notif"] = $pesan; 
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/analytic');
        $this->load->view('frame/d_footer');      
    }
}
?>