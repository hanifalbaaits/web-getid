<?php 
class Setting extends CI_Controller{
  function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('session');
      $this->load->model("User_model");
      $this->load->model("APISimpokLumen");
      $this->load->model("APICoreRKA");
      $this->session_key = $this->config->item('session-key');
      $this->url_corerka = $this->config->item('url-corerka');

      // if($this->session->userdata('logcode') != $this->session_key){
      //   $array=array('status' => '0','message' => 'Please login first .. !');
      //   $this->session->set_flashdata('message', $array);
      //   redirect('login');
      // }
      // if($this->session->userdata('level') != 'developer') {
      //   $array=array('status' => '0','message' => 'You not authorized!');
      //   $this->session->set_flashdata('message', $array);
      //   redirect('logbook');
      // }
  }

  function user(){ 
    $idu =  $this->session->userdata('iduser');
    $role =  $this->session->userdata('level_rka');
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

    $dummy = json_decode($this->APISimpokLumen->getAllPegawai())->data;
    $pegawais = [];
    foreach ($dummy as $key => $pegawai) {
      if($pegawai->aktif=="Y"){ //yang masih aktif
          $pegawais[] = $pegawai;
      }
    }

    $users = $this->User_model->getAll();
    $sess_array = array(
      'pegawais' => $pegawais
    );

    $data["users"] = $users;
    $data["pegawais"] = $pegawais;

    $data["notif"] = $pesan;

    $this->session->set_userdata($sess_array); 
    $this->load->view('frame/a_header');
    $this->load->view('frame/b_nav',$data);
    $this->load->view('page/user',$data);
    $this->load->view('frame/d_footer');
  }

  function add_user(){
    $iduser = $this->input->post('add_iduser');
    $level = $this->input->post('add_level');
    $status = $this->input->post('add_status');

    $pegs = $this->session->userdata('pegawais');
    $data = null;
    foreach ($pegs as $peg ) {
      if($peg->iduser==$iduser){
        $data = $peg;
        break;
      } 
    }

    $desc = "";
    
    if ($level == '1') { $desc = "Developer ";} 
    else if ($level == '2') { $desc = "Board Of Director"; } 
    else if ($level == '3') { $desc = "Vice President"; } 
    else if ($level == '4') { $desc = "Administrator"; }
    else {$desc = "Finannce"; } 

    $this->User_model->save($iduser,$data->nik,$level,$desc,$data->full_name,$status);
    $array=array('status' => '1','message' => "User $username has succesfully created");
    $this->session->set_flashdata('message', $array);
    redirect("setting/user");   
  }

  function edit_user(){
    $iduser = $this->input->post('edit_iduser');
    $level = $this->input->post('edit_level');
    $status = $this->input->post('edit_status');

    $desc = "";
    
    if ($level == '1') { $desc = "Developer ";} 
    else if ($level == '2') { $desc = "Board Of Director"; } 
    else if ($level == '3') { $desc = "Vice President"; } 
    else if ($level == '4') { $desc = "Administrator"; }
    else {$desc = "Finannce"; } 
    
    $this->User_model->update($iduser,$level,$desc,$status);
    $array=array('status' => '1','message' => "User $username has been updated");
    $this->session->set_flashdata('message', $array);
    redirect("setting/user"); 

  }

  function status_user(){
    $username = $this->uri->segment('3');
    $status = $this->uri->segment('4');
    $this->User_model->status($username,$status);
    if($status == 0){
      $array=array('status' => '1','message' => 'Data has been banned.. ');
      $this->session->set_flashdata('message', $array);
    } else {
      $array=array('status' => '1','message' => 'Data has been Active.. ');
      $this->session->set_flashdata('message', $array);
    }
    redirect("setting/user");
  }

  function rkatype(){ 
    $idu =  $this->session->userdata('iduser');
    $role =  $this->session->userdata('level_rka');
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

    $api = json_decode($this->APICoreRKA->Apiget($this->url_corerka."/rka_type"));
    
    $rkatype = [];
    if($api !=null && $api->code == '1' ){
      $rkatype = $api->data;
    }

    $data["rkatypes"] = $rkatype;
    
    $data["notif"] = $pesan;
    $sess_array = array('rkatypes' => $rkatype);
    $this->session->set_userdata($sess_array);
    $this->load->view('frame/a_header');
    $this->load->view('frame/b_nav',$data);
    $this->load->view('page/rkatype',$data);
    $this->load->view('frame/d_footer');
  }

  function add_rkatype(){
    $nama = $this->input->post('add_nm_type');
    $type = $this->input->post('add_type');

    $body = array("name" =>$nama,
      "type" => $type
    );
    $respon = json_decode($this->APICoreRKA->Apipost($this->url_corerka."/rka_type", $body));
    if($respon==null){
      $array=array('status' => '0','message' => 'API not response . please contact administrator');
      $this->session->set_flashdata('message', $array);
    } else if($respon->code =='1'){
      $array=array('status' => '1','message' => 'Data has been add.. ');
      $this->session->set_flashdata('message', $array);
    } else {
      $array=array('status' => '0','message' => $respon->data);
      $this->session->set_flashdata('message', $array);
    }
    redirect('setting/rkatype');
  }

  function edit_rkatype(){
    $id = $this->input->post('edit_idtype');
    $nama = $this->input->post('edit_nm_type');
    $type = $this->input->post('edit_type');

    $body = array("name" =>$nama,
      "type" => $type
    );

    $respon = json_decode($this->APICoreRKA->Apiput($this->url_corerka."/rka_type/".$id, $body));
    if($respon==null){
      $array=array('status' => '0','message' => 'API not response . please contact administrator');
      $this->session->set_flashdata('message', $array);
    } else if($respon->code =='1'){
      $array=array('status' => '1','message' => 'Data has been edit.. ');
      $this->session->set_flashdata('message', $array);
    } else {
      $array=array('status' => '0','message' => $respon->data);
      $this->session->set_flashdata('message', $array);
    }
    redirect('setting/rkatype');
  }


  function statuscore(){ 
    $idu =  $this->session->userdata('iduser');
    $role =  $this->session->userdata('level_rka');
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

    $api = json_decode($this->APICoreRKA->Apiget($this->url_corerka."/status"));
    
    $stat = [];
    if($api !=null && $api->code == '1' ){
      $stat = $api->data;
    }

    $data["status_core"] = $stat;
    $data["notif"] = $pesan;
    $sess_array = array('status_core' => $stat);
    $this->session->set_userdata($sess_array);
    $this->load->view('frame/a_header');
    $this->load->view('frame/b_nav',$data);
    $this->load->view('page/statuscore',$data);
    $this->load->view('frame/d_footer');
  }

}
?>