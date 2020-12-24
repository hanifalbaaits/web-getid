<?php 
class Rka extends CI_Controller{
  function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('session');
      $this->load->model("APICoreRKA");
      $this->load->model("APISimpokLumen");
      $this->session_key = $this->config->item('session-key');
      $this->url = $this->config->item('url-corerka');
      $this->authorization = $this->config->item('rka-authorization');

      $this->load->model("APICoreLogbook");
      $this->urlbook = $this->config->item('url-corelogbook');

      if($this->session->userdata('logcode') != $this->session_key){
        $array=array('status' => '0','message' => 'Please login first .. !');
        $this->session->set_flashdata('message', $array);
        redirect('login');
      } 
  }

  function index(){
    $idu =  $this->session->userdata('iduser');
    $role =  $this->session->userdata('level_rka');
    //NOTIFICATION
    $pesan = [];
    if ($role == '1' || $role == '4') {
        $api_notif = json_decode($this->APICoreRKA->Apiget($this->url."/pesan/proses"));
        if ($api_notif != null && $api_notif->code == '1') {
            $pesan = $api_notif->data;
        }
    } else {
        $api_notif = json_decode($this->APICoreRKA->Apiget($this->url."/pesan/proses/".$idu));
        if ($api_notif != null && $api_notif->code == '1') {
            $pesan = $api_notif->data;
        }
    }     
        
    $ipr = base64_decode($this->input->get('ipr'));
    $year = $this->input->get('yr');
    $ipr_split = explode("&npr=", $ipr);
    $idproject = "";
    $nama_pro = "";
    if (count($ipr_split)>1) {
      $idproject = $ipr_split[0];
      $nama_pro = $ipr_split[1];
    }
    $rkas = [];
    $projects = [];
    $pro_book = [];
    if ($idproject != null && $year != null) {
        $api = json_decode($this->APICoreRKA->Apiget($this->url."/rka/project/".$idproject."/".$year));
        if ($api != null && $api->code == "1") {
          $rkas = $api->data;
        }
    }
    $api_pro = json_decode($this->APICoreRKA->Apiget($this->url."/rka/project/".date('Y')));
    if ($api_pro != null && $api_pro->code != "0") {
      $projects = $api_pro->data;
    }

    //AMBIL PROJECT DARI LOGBOOK
    $api_book = json_decode($this->APICoreLogbook->Apiget($this->urlbook."/project"));
    if ($api_book != null && $api_book->code != "0") {
      $pro_book = $api_book->data;
    }

    $data["rkas"] = $rkas;
    $data["id_project"] = $idproject;
    $data["projects"] = $projects;
    $data["pro_book"] = $pro_book;
    $data["nama_project"] = $nama_pro;
    $data["tahun_project"] = $year;
    $data["notif"] = $pesan;
    $sess_array = array('rkas' => $rkas);
    $this->session->set_userdata($sess_array);
    $this->load->view('frame/a_header');
    $this->load->view('frame/b_nav',$data);
    $this->load->view('page/rka',$data);
    $this->load->view('frame/d_footer');
  }

  function uploadrka(){
    $id_project = $this->input->post('id_project');
    $tahun_rka  = $this->input->post('tahun');
    $iscapex    = $this->input->post('iscapex');
    $tmpFile = $_FILES['file']['tmp_name'];
    $typeFile = $_FILES['file']['type'];
    $nameFile = $_FILES['file']['name'];
    if($typeFile != "text/csv"){
      $array=array('status' => '0','message' => "Type file must be csv");
      $this->session->set_flashdata('message', $array);
      redirect('rka');
    }
    $body = array(
        'id_project'=>"$id_project",
        "tahun_rka"=>"$tahun_rka",
        "iscapex"=>"$iscapex",
        "file"=> new CURLFile($tmpFile,$typeFile,$nameFile)
    );
    $url = $this->url."/rka_upload";
    $respon = json_decode($this->APICoreRKA->Apipost_upload($url,$body));
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
    redirect('rka');
  }

  function getrkabyid(){
    $idrka = $this->input->post('idrka');
    $rkas = $this->session->userdata('rkas');
    $data = null;
    foreach ($rkas as $rka) {
      if($rka->id_rka==$idrka){
        $data = $rka;
        break;
      } 
    }
    echo json_encode($data);
  }

  function coa(){
    $idu =  $this->session->userdata('iduser');
    $role =  $this->session->userdata('level_rka');
    //NOTIFICATION
    $pesan = [];
    if ($role == '1' || $role == '4') {
        $api_notif = json_decode($this->APICoreRKA->Apiget($this->url."/pesan/proses"));
        if ($api_notif != null && $api_notif->code == '1') {
            $pesan = $api_notif->data;
        }
    } else {
        $api_notif = json_decode($this->APICoreRKA->Apiget($this->url."/pesan/proses/".$idu));
        if ($api_notif != null && $api_notif->code == '1') {
            $pesan = $api_notif->data;
        }
    } 

    $ipr = base64_decode($this->input->get('ipr'));
    $year = $this->input->get('yr');
    $ipr_split = explode("&npr=", $ipr);
    $idproject = "";
    $nama_pro = "";
    if (count($ipr_split)>1) {
      $idproject = $ipr_split[0];
      $nama_pro = $ipr_split[1];
    }
    $coas = [];
    $projects = [];
    $coa_types = [];
    $home_type = [];
    $home_t = 0;
    $home_tmonth = 0;
    $home_nexmonth = 0;
    $list_home = []; //ini yang ditampilkan di depan

    if ($idproject != null && $year != null) {
        $api = json_decode($this->APICoreRKA->Apiget($this->url."/coa/project/".$idproject."/".$year));

        $api_type = json_decode($this->APICoreRKA->Apiget($this->url."/rka_type"));
        if ($api_type != null && $api_type->code == "1") {
          $coa_types = $api_type->data;
        }

        if ($api != null && $api->code == "1") {
          $coas = $api->data;

          $dmy_coa_utkTotal = "";
          $dmy_coa_utkType = "";
          $i = 1 ;
          $bln_today = (int) date('m');
          foreach ($coas as $coa) {
            //UNTUK SALDO TOTAL COA
            $home_t += $coa->saldo_coa;

            //UNTUK JUMLAH TOTAL COA
            if ($dmy_coa_utkTotal != $coa->no_coa) {
              $home_type [] = 0;
              $home_type[0] += 1; 
              $dmy_coa_utkTotal = $coa->no_coa;
              $list_home[] = $coa;
            }

            //UNTUK SALDO BULAN BERSANGKUTAN (TODAY)
            if ($coa->bulan_ke == $bln_today) {
              $home_tmonth += $coa->saldo_coa;
            }

            //UNTUK SALDO BULAN BESOK (NEXT MONTH)
             if ($coa->bulan_ke == ($bln_today + 1)) {
              $home_nexmonth += $coa->saldo_coa;
            }

            //UNTUK JUMLAH COA PER TYPE
            foreach ($coa_types as $key => $dt) {
              if ($dmy_coa_utkType != $coa->no_coa && $coa->id_type == $dt->id_rka_type) {
                $home_type [] = 0;
                $home_type[$key+1] += 1; 
                $dmy_coa_utkType = $coa->no_coa;
              }
            }

          }
        }
    }
    $api_pro = json_decode($this->APICoreRKA->Apiget($this->url."/rka/project/".date('Y')));
    if ($api_pro != null && $api_pro->code != "0") {
      $projects = $api_pro->data;
    }
    $data["coas"] = $coas;
    $data["coas_filter"] = $list_home;
    $data["coa_types"] = $coa_types;
    $data["projects"] = $projects;
    $data["nama_project"] = $nama_pro;
    $data["tahun_project"] = $year;

    $data["home_type"] = $home_type;
    $data["home_t"] = $home_t;
    $data["home_tmonth"] = $home_tmonth;
    $data["home_nexmonth"] =$home_nexmonth;

    $data["notif"] = $pesan;

    $sess_array = array(
      'coas' => $coas,
      'coa_types' => $coa_types,
      'projects' => $projects,
      'home_type' => $home_type,
      'home_t' => $home_t,
      'home_tmonth' => $home_tmonth
    );
    $this->session->set_userdata($sess_array);
    $this->load->view('frame/a_header');
    $this->load->view('frame/b_nav',$data);
    $this->load->view('page/rka_coa',$data);
    $this->load->view('frame/d_footer');
  }

  function coa_filter(){
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

    $nomor = "0";
    $bulan = "0";

    if ($this->input->get('fcoa') != null) {
      $nomor = base64_decode($this->input->get('fcoa'));
    }
    if ($this->input->get('fbln') != null) {
      $bulan = base64_decode($this->input->get('fbln'));
    }

    $coas = $this->session->userdata('coas');
    $projects = $this->session->userdata('projects');
    $coa_types = $this->session->userdata('coa_types');
    $home_type =  $this->session->userdata('home_type');;
    $home_t =  $this->session->userdata('home_t');;
    $home_tmonth =  $this->session->userdata('home_tmonth');; 
    
    $coas_filter = [];
    
    foreach ($coas as $coa) {
     
      if ($coa->no_coa == $nomor && $coa->bulan_ke == $bulan) { //FILTER NO COA & BULAN
        $coas_filter[] = $coa;
        break;
      
      } elseif ($coa->no_coa == $nomor && $bulan == "0"){ //FILTER NO COA
        $coas_filter[] = $coa;
      
      } elseif ($nomor == "0" && $coa->bulan_ke == $bulan) {//FILTER BULAN
        $coas_filter[] = $coa;

      } elseif ($nomor == "0" && $bulan == "0") {
        $coas_filter[] = $coa; //GET ALL
      }
    }
  
    $data["coas"] = $coas;
    $data["coas_filter"] = $coas_filter;
    $data["coa_types"] = $coa_types;
    $data["projects"] = $projects;
    $data["nama_project"] = $coas[0]->project->nama_project;
    $data["tahun_project"] = $coas[0]->tahun_rka;

    $data["home_type"] = $home_type;
    $data["home_t"] = $home_t;
    $data["home_tmonth"] = $home_tmonth;

    $data["notif"] = $pesan;

    $this->load->view('frame/a_header');
    $this->load->view('frame/b_nav',$data);
    $this->load->view('page/rka_coa',$data);
    $this->load->view('frame/d_footer');
  }

  function getcoabyid(){
    $idcoa = $this->input->post('idcoa');
    $coas = $this->session->userdata('coas');
    $data = null;
    foreach ($coas as $coa) {
      if($coa->id_coa==$idcoa){
        $data = $coa;
        break;
      } 
    }
    echo json_encode($data);
  }

  function getcoabynomor(){
    $idcoa = $this->input->post('idcoa');
    $coas = $this->session->userdata('coas');
    $data = null;
    foreach ($coas as $coa) {
      if($coa->no_coa ==$idcoa){
        $data[] = $coa;
      } 
    }
    echo json_encode($data);
  }

  function getlastCOAbyNoBulan(){
    $nomor = $this->input->post('nomor');
    $bulan = $this->input->post('bulan');
    $audits = [] ;
    $api_audit = json_decode($this->APICoreRKA->Apiget($this->url."/audit/coa/".$nomor."/".$bulan));
    if ($api_audit != null && $api_audit->code != "0") {
      $audits = $api_audit->data;
    }
    echo json_encode($audits);
  }

  function coa_audit(){
    $idu =  $this->session->userdata('iduser');
    $role =  $this->session->userdata('level_rka');
    //NOTIFICATION
    $pesan = [];
    if ($role == '1' || $role == '4') {
        $api_notif = json_decode($this->APICoreRKA->Apiget($this->url."/pesan/proses"));
        if ($api_notif != null && $api_notif->code == '1') {
            $pesan = $api_notif->data;
        }
    } else {
        $api_notif = json_decode($this->APICoreRKA->Apiget($this->url."/pesan/proses/".$idu));
        if ($api_notif != null && $api_notif->code == '1') {
            $pesan = $api_notif->data;
        }
    } 

    $ncoa="";$bcoa="";$std="";$etd="";$msg_bln="";$msg_date="";
    if ($this->input->get('ncoa') !=null) {
      // $ncoa = base64_decode($this->input->get('ncoa'));
      $ncoa = $this->input->get('ncoa');
    }
    if ($this->input->get('bcoa') !=null) {
      $bcoa = base64_decode($this->input->get('bcoa'));
      $msg_bln = " Bulan ke- $bcoa ";
    }
    if ($this->input->get('std') !=null) {
      // $std = base64_decode($this->input->get('std'));
      $std = $this->input->get('std');
    }
    if ($this->input->get('etd') !=null) {
      // $etd = base64_decode($this->input->get('etd'));
      $etd = $this->input->get('etd');
      $msg_date = " dari tanggal ".$std." s/d ".$etd;
    }
    
    $coas = [];
    $audits = [];
    $msg = "Tidak ditemukan data COA";
    if ($ncoa != "") {
      $api = json_decode($this->APICoreRKA->Apiget($this->url."/coa/nomor/".$ncoa));
      if ($api != null && $api->code == "1") {
        $coas = $api->data;
      }

      //API UNTUK AMBIL GET LAST
      if ($bcoa == "" && $std == "" && $etd == "") {
        $api_audit = json_decode($this->APICoreRKA->Apiget($this->url."/audit/coa/".$ncoa));
        $msg = "Data terakhir riwayat COA ".$ncoa;
        if ($api_audit != null && $api_audit->code != "0") {
          $audits = $api_audit->data;
        }
      } else {

      $body = array(
          "nomor_coa"=>"$ncoa",
          "bulan"=>"$bcoa",
          "start_date"=>"$std",
          "end_date"=> "$etd"
      );
  
      $api_audit_s = json_decode($this->APICoreRKA->Apipost($this->url."/audit/search",$body));
      $msg = "Pencarian riwayat COA ".$ncoa.$msg_bln.$msg_date;
        if ($api_audit_s != null && $api_audit_s->code != "0") {
          $audits = $api_audit_s->data;
        }
      }
    }

    $data["coas"] = $coas;
    $data["audits"] = $audits;
    $data["ncoa"] = $ncoa;
    $data["bcoa"] = $bcoa;
    $data["std"] = $std;
    $data["etd"] = $etd;
    $data["msg"] = $msg;

    $data["notif"] = $pesan;
    $this->load->view('frame/a_header');
    $this->load->view('frame/b_nav',$data);
    $this->load->view('page/rka_coa_audit',$data);
    $this->load->view('frame/d_footer');
  }

}
?>