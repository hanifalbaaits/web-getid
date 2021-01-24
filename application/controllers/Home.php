<?php

class Home extends CI_Controller{

    function __construct(){
    //date_default_timezone_get('Asia/Jakarta');

        parent::__construct();
        
        $this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('session');
        $this->load->model("APIGetid");
        $this->session_key = $this->config->item('session-key');
        $this->sessionid = $this->session->userdata('sessionid');
        // $this->respon_null = "There was no response from the server. Please Contact Administrator!";
        $this->respon_null = "Tidak ada tanggapan dari server. Silahkan hubungi admin.";
        $this->respon_session = "Session berakhir. Login terlebih dahulu.";

        if($this->session->userdata('logcode') !=  $this->session_key){
            $array=array('status' => '0','message' => $this->respon_session);
            $this->session->set_flashdata('message', $array);
            redirect('login');
        }
    }

    function index() {
        $guid = $this->session->userdata('guid');
        $username = $this->session->userdata('storeid');
        $respon = $this->APIGetid->getSaldoByUsername($username,$this->sessionid);
        $respon1 = $this->APIGetid->get_transaction_last($username,$this->sessionid);

        if ($respon == null) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
        }

        $rsp = (string) $respon[0]->Balance_User_selectResponse->Balance_User_selectResult;
        $last_transaction = json_decode(json_encode($respon1));

        if (strpos(explode('|',$rsp)[1], 'expired') !== false) {
            $this->session->sess_destroy();
            $array=array('status' => '0','message' => $this->respon_session);
            $this->session->set_flashdata('message', $array);
            redirect('login');
        }

        $saldo = explode('|',$rsp)[0];
        $data['saldo'] = (int) $saldo;
        $data['data'] = $last_transaction;
        $data['nav_active'] = 'beranda';
        // $this->load->view('frame/a_header');
        // $this->load->view('frame/b_nav',$data);
        // $this->load->view('page/dashboard',$data);
        // $this->load->view('frame/d_footer');   
        
        $this->load->view('page_dana/frame/header');
        $this->load->view('page_dana/frame/nav',$data);
        $this->load->view('page_dana/home',$data);
        $this->load->view('page_dana/frame/footer');
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

    function test_modal(){
        $array=array('status' => '3','message' => 'Tidak dapat Login. Status Tidak Aktif');
        $this->session->set_flashdata('message', $array);
        redirect('home');
    }

}
?>