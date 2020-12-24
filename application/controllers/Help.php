<?php 

class Help extends CI_Controller{
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

    function index(){     
        $nik = $this->session->userdata('nik');
        $idu = $this->session->userdata('iduser');
        $level = $this->session->userdata('level');
        $level_rka = $this->session->userdata('level_rka');
        //NOTIFICATION
        $pesan = [];
        if ($level_rka == '1' || $level_rka == '4') {
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
        $this->load->view('page/faq');
        $this->load->view('frame/d_footer');      
    }
}
?>