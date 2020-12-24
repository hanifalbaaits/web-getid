<?php 
class Pesan extends CI_Controller{
  function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('session');
      $this->load->model("APICoreLogbook");
      $this->load->model("APICoreRKA");
      $this->load->model("APISimpokLumen");
      $this->session_key = $this->config->item('session-key');
      $this->url_logbook = $this->config->item('url-corelogbook');
      $this->url_corerka = $this->config->item('url-corerka');
      $this->authorization = $this->config->item('core-authorization');

      if($this->session->userdata('logcode') != $this->session_key){
        $array=array('status' => '0','message' => 'Please login first .. !');
        $this->session->set_flashdata('message', $array);
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

    // var_dump($charts);
    $this->load->view('frame/a_header');
    $this->load->view('frame/b_nav',$data);
    $this->load->view('page/pesan_notif',$data);
    $this->load->view('frame/d_footer');    
  }

  function getPesanById(){
    $type = $this->input->post('type');
    $id_type = $this->input->post('id_type');
    $data = [];
    $api_notif = json_decode($this->APICoreRKA->Apiget($this->url_corerka."/pesan/$type/$id_type"));
    if ($api_notif != null && $api_notif->code == '1') {
        $data = $api_notif->data;
    }
    echo json_encode($data);
  }

  
}
?>