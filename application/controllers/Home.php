<?php

class Home extends CI_Controller{

    function __construct(){
    //date_default_timezone_get('Asia/Jakarta');

        parent::__construct();
        
        $this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('session');
        $this->load->model("APICoreLogbook");
        $this->load->model("APICoreRKA");
        $this->url_logbook = $this->config->item('url-corelogbook');
        $this->url_corerka = $this->config->item('url-corerka');
        $this->url_lumen = $this->config->item('url-lumen');
        $this->url_simpok = $this->config->item('url-simpok');
        $this->session_key = $this->config->item('session-key');

        if($this->session->userdata('logcode') !=  $this->session_key){
            $array=array('status' => '0','message' => 'Please login first .. !');
            $this->session->set_flashdata('message', $array);
            redirect('login');
        }
    }

    function index() {
        // $nik = $this->session->userdata('nik');
        // $idu = $this->session->userdata('iduser');
        // $level = $this->session->userdata('level');
        // $level_rka = $this->session->userdata('level_rka');

        //NOTIFICATION
        $pesan = [];
        // if ($level_rka == '1' || $level_rka == '4') {
        //     $api_notif = json_decode($this->APICoreRKA->Apiget($this->url_corerka."/pesan/proses"));
        //     if ($api_notif != null && $api_notif->code == '1') {
        //         $pesan = $api_notif->data;
        //     }
        // } else {
        //     $api_notif = json_decode($this->APICoreRKA->Apiget($this->url_corerka."/pesan/proses/".$idu));
        //     if ($api_notif != null && $api_notif->code == '1') {
        //         $pesan = $api_notif->data;
        //     }
        // }

        // $projects_inlogbook = [];
        // $projects_inrka = [];
        // $year = date('Y');

        // $api_book = json_decode($this->APICoreLogbook->Apiget($this->url_logbook."/project"));
        // $api_rka = json_decode($this->APICoreRKA->Apiget($this->url_corerka."/rka/project/$year"));
    
        // if ($api_book != null && $api_book->code == '1') {
        //     $projects_inlogbook = $api_book->data;
        // }
        // if ($api_rka != null && $api_rka->code == '1') {
        //     $projects_inrka = $api_rka->data;
        // }
       
        $data["notif"] = $pesan;
        // $data["project_logbook"] = $projects_inlogbook;
        // $data["project_rka"] = $projects_inrka;

        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/dashboard',$data);
        $this->load->view('frame/d_footer');     
    }

    function configXXX() {
        echo "ENVIRONMENT : ".LIVE."<br />";
        echo "url-logbook : ".$this->url_logbook."<br />";
        echo "url_corerka : ".$this->url_corerka."<br />";
        echo "url_lumen : ". $this->url_lumen."<br />";
        echo "url_simpok : ".$this->url_simpok."<br />";
        echo "SERVER -> "."<br />";
        echo json_encode($_SERVER);
        echo "<br />";
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        $ip_info = $_SERVER['HTTP_USER_AGENT'];
        echo "IP ADDRESS : ".$ip_address."<br />";
        echo "DEVICE INFO : ".$ip_info."<br />";
    }

}
?>