<?php 
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
use setasign\Fpdi\PdfParser\StreamReader;

include APPPATH.'third_party/fpdf182/fpdf.php';
include APPPATH.'third_party/fpdi2/src/autoload.php';
include APPPATH.'third_party/fpdi2/src/Fpdi.php';

class Justification extends CI_Controller{
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

    function history(){      
        $history = [];
        $role =  $this->convertRole($this->session->userdata('level_rka'));
        $level_rka =  $this->session->userdata('level_rka');
        $idu =  $this->session->userdata('iduser');
        
        $std = ""; $etd=""; $msg_date="";
        if ($this->input->get('std') !=null) {
        $std = $this->input->get('std');
        }
        if ($this->input->get('etd') !=null) {
        $etd = $this->input->get('etd');
        $msg_date = " dari tanggal ".$std." s/d ".$etd;
        }

        //NOTIFICATION
        $pesan = [];
        if ($level_rka == '1' || $level_rka == '4') {
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

        $history = [];
        if ($std != "" && $etd != "") {
            $body = array(
                'id_pegawai'=> $this->session->userdata('iduser'),
                "role"=>"$role",
                'start_date'=> "$std",
                "end_date"=>"$etd"
            );
            $url = $this->url."/justifikasi/search";
            $respon = json_decode($this->APICoreRKA->Apipost($url,$body));
            if ($respon != null && $respon->code == "1") {
                $history = $respon->data;
            }

        } else {
            $body = array(
                'id_pegawai'=> $this->session->userdata('iduser'),
                "role"=>"$role"
            );
            $url = $this->url."/justifikasi/home";
            $respon = json_decode($this->APICoreRKA->Apipost($url,$body));
            if ($respon != null && $respon->code == "1") {
                $history = $respon->data;
            }
        }
        
        $proses = 0;
        $vp = 0;
        $bod = 0;
        $finance = 0;
        foreach ($history as $key => $dt) {
            if ($dt->status == '40' || $dt->status == '41' || $dt->status == '44' || $dt->status == '46' || $dt->status == '47') {
                $proses += 1;
            } 
            if ($dt->status == '41') {
                $vp += 1;
            } 
            if ($dt->status == '44') {
                $bod += 1;
            } 
            if ($dt->status == '47') {
                $finance += 1;
            }
        }

        $data["justifikasi_history"] = $history;
        $data["notif"] = $pesan;
        $data["role"] = $level_rka;
        $data["idu"] = $idu;
        $data["proses"] = $proses;
        $data["vp"] = $vp;
        $data["bod"] = $bod;
        $data["finance"] = $finance;
        $data["msg"] = $msg_date;
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/justifikasi/jus_history',$data);
        $this->load->view('frame/d_footer');      
    }

    function create(){
        $role =  $this->session->userdata('level_rka');
        $idu = $this->session->userdata('iduser');

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
        $irb = base64_decode($this->input->get('irb'));
        if ($ipr != null || $ipr != "") {
            $ipr = explode("&",$ipr)[0];
        }
        
        $rab = null;
        $projects = [];
        $pegawais = [];
        $coas = [];
        $coa_types = [];

        if ($irb != null || $irb != "") {
            $rab = json_decode($this->APICoreRKA->Apiget($this->url."/rab/".$irb));
            if ($rab != null || $rab->code == '1') {
                $rab = $rab->data;
                $ipr = $rab->project->id_project;
                $pegawais[] = $rab->diminta_pegawai;
            } 
        }
        
        if($this->session->userdata('level')=='administrator' || 
            $this->session->userdata('level')=='developer'){
            $dt = json_decode($this->APICoreRKA->Apiget($this->url."/rka/project/".date('Y')));
        } else {
            $dt = json_decode($this->APICoreRKA->Apiget($this->url."/rka/project/".date('Y')));
        }

        if ($dt != null && $dt->code != "0") {
           $projects = $dt->data;
        }

        $api_type = json_decode($this->APICoreRKA->Apiget($this->url."/rka_type"));
        if ($api_type != null && $api_type->code == "1") {
            $coa_types = $api_type->data;
        }

        if ($rab != null) {
            $year = date('Y');
            $api = json_decode($this->APICoreRKA->Apiget($this->url."/coa/project/".$ipr."/".$year));
            if ($api != null && $api->code == "1") {
                $coas = $api->data;
            }
        } else {
            $dummy = json_decode($this->APISimpokLumen->getAllPegawai());
            if ($dummy != null && $dummy->status != "0") {
                foreach ($dummy->data as $key => $pegawai) {
                    if($pegawai->aktif=="Y"){ //yang masih aktif
                        $pegawais[] = $pegawai;
                    }
                }  
            }
        }

        $arr_item = [];
        $arr_payment = [];
        if ($rab != null) {
            //MENAMBAHKAN SALDO PAYMENT KE COAS.
            foreach ($rab->payments as $key1 => $payment) {
                foreach ($coas as $key2 => $coa) {
                    if ($payment->no_coa == $coa->no_coa && $payment->bulan_coa == $coa->bulan_ke) {
                        $coas[$key2]->saldo_coa = $coas[$key2]->saldo_coa + $rab->payments[$key1]->jumlah;
                        break;
                    }
                }
            }
            
            //ITEM LOCAL STORAGE ITEM DAN COA
            $tot_item = count($rab->items);
            $arr_item = [];
            $tot_payment = count($rab->payments);
            $arr_payment = [];
            for ($i=0; $i < $tot_item ; $i++) { 
                $arr_item[] = $i;
            }
            for ($i=0; $i < $tot_payment ; $i++) { 
                $arr_payment[] = $i;
            }
        }

        if (count($arr_item) == 0) {
            $arr_item[] = 0;
            $arr_payment[] = 0;
        }
        
        $data["ipr"] = $ipr;
        $data["rab"] = $rab;
        $data["notif"] = $pesan;
        $data["role"] = $role;
        $data["idu"] = $idu;
        $data["coas"] = $coas;
        $data["coa_types"] = $coa_types;
        $data["arr_item"] = $arr_item;
        $data["arr_payment"] = $arr_payment;
        $data["pegawais"] = $pegawais;
        $data["projects"] = $projects;

        $sess_array = array(
            'pegawais' => $pegawais,
            'coas' => $coas,
            'coa_types' => $coa_types,
            'projects' => $projects,
        );

        $this->session->set_userdata($sess_array);
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/justifikasi/jus_create',$data);
        $this->load->view('frame/d_footer');   
    }

    function convertRole($role_id){
        $level = $this->session->userdata('level');

        if ($role_id == "1" || $role_id == "4") { //develop //
            return "admin";
        } elseif ($role_id == "2") {
            return "BOD";
        } elseif ($role_id == "3") {
            return "VP";
        }  elseif ($role_id == "5") {
            return "finance";
        } else {
            if ($level == "4") {
                return "manager";
            }
            return "guest";
        }
    }

    function save(){
        $id_project = $this->input->post('add_id_project');
        $manager_req = $this->input->post('add_id_pic');
        $id_rab = $this->input->post('add_id_rab');

        if ($id_rab == null) {
            $id_rab = "0";
        }

        $latar_belakang = $this->input->post('add_latar_belakang');
        $aspek_strategis = $this->input->post('add_aspek_strategis');
        $aspek_bisnis = $this->input->post('add_aspek_bisnis');
        $spesifikasi = $this->input->post('add_spesifikasi');
        $aspek_lain = $this->input->post('add_aspek_lain');
        
        $catatan = $this->input->post('add_catatan');   
        $ket_rra = $this->input->post('add_rra_ket');
        
        $interex = $this->input->post('justifikasi_status');
        $kas_kecil = $this->input->post('justifikasi_kas');
        
        $file_many["type"] = "support";
        $path = "";
        
        $count_file = count($_FILES['add_file']['tmp_name']);
        
        if ($_FILES['add_file']['tmp_name'][0] != "") {
            for ($i=0; $i < $count_file ; $i++) { 
           
                $tmp_name = $_FILES['add_file']['tmp_name'][$i];
                $type = $_FILES['add_file']['type'][$i];
                $name = $_FILES['add_file']['name'][$i];
    
                if($type != "application/pdf"){
                      $array=array('status' => '0','message' => "Type file must be application/pdf");
                      $this->session->set_flashdata('message', $array);
                      redirect('justification/create');
                }
            }
    
            for ($i=0; $i < $count_file ; $i++) { 
                $tmp_name = $_FILES['add_file']['tmp_name'][$i];
                $type = $_FILES['add_file']['type'][$i];
                $name = $_FILES['add_file']['name'][$i];
    
                $file_many["file"] = new CURLFile($tmp_name,$type,$name);
                $respon = json_decode($this->APICoreRKA->Apipost_upload($this->url."/upload_file", $file_many));
                
                // var_dump($respon);
                // echo "<br />";
                if ($respon == null) {
                    $array=array('status' => '0','message' => "Server Problem when upload file");
                    $this->session->set_flashdata('message', $array);
                    redirect('justification/create');
                } elseif ($respon->code == '1') {
                    if ($i != count($_FILES['add_file']['tmp_name'])-1) {
                        $path = $path.$respon->data->path_name."|";
                    } else {
                        $path = $path.$respon->data->path_name;
                    }
                }
            }
        }

        $items = array();
        $payments = array();
        //UNTUK ITEMS.
        for ($i=0; $i < count($this->input->post("add_item_id")) ; $i++) { 
            $id = $this->input->post("add_item_id")[$i];
            $kegiatan = $this->input->post("add_kegiatan")[$i];
            $jumlah = $this->input->post("add_jumlah")[$i];
            $harga = $this->input->post("add_harga")[$i];
            $keterangan = $this->input->post("add_keterangan")[$i];
            array_push($items, array(
                'kegiatan'=>$kegiatan,
                'quantity'=>$jumlah,
                'harga'=>$harga,
                'keterangan'=>$keterangan
            ));
        }
        //UNTUK PAYMENTS .
        for ($i=0; $i < count($this->input->post("add_coa_id")) ; $i++) { 
            $id = $this->input->post("add_coa_id")[$i];
            $nomor_coa = $this->input->post("add_coa_nmr")[$i];
            $bulan_coa = $this->input->post("add_coa_bln")[$i];
            $harga_coa = $this->input->post("add_saldo")[$i];
            if ($harga_coa == 0 || $harga_coa == "0") {
                continue;
            }
            array_push($payments, array(
                'no_coa'=>$nomor_coa,
                'bulan_coa'=>$bulan_coa,
                'jumlah'=>$harga_coa
            ));
        }
        $items = json_decode(json_encode($items));
        $payments = json_decode(json_encode($payments));
        $body = array("id_pegawai_buat" =>$this->session->userdata("iduser"),
        "id_pegawai_minta" =>$manager_req,
        "id_project" =>$id_project,
        "id_rab" =>$id_rab,
        "interex" =>$interex,
        "payment_method" =>$kas_kecil,
        "latar_belakang" =>$latar_belakang,
        "aspek_strategis" =>$aspek_strategis,
        "aspek_bisnis" =>$aspek_bisnis,
        "spesifikasi_teknis" => $spesifikasi,
        "aspek_lain" => $aspek_lain,
        "catatan" =>$catatan,
        "path_upload" =>$path,
        "items" =>$items,
        "payments" => $payments,
        "ket_rra" => $ket_rra
        );

        echo json_encode($body);
        
        $respon = json_decode($this->APICoreRKA->Apipost($this->url."/justifikasi", $body));
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
        redirect('justification/history');
    }

    function save_update(){
        $id_rab = $this->input->post('id_rab');
        $sasaran = $this->input->post('add_sasaran');
        $fasilitas = $this->input->post('add_fasilitas');
        $catatan = $this->input->post('add_catatan');   
        $ket_rra = $this->input->post('add_rra_ket');   

        $file_many["type"] = "support";
        $path = $this->input->post('add_path_file');
        
        $count_file = count($_FILES['add_file']['tmp_name']);
        
        if ($_FILES['add_file']['tmp_name'][0] != "") {
            for ($i=0; $i < $count_file ; $i++) { 
           
                $tmp_name = $_FILES['add_file']['tmp_name'][$i];
                $type = $_FILES['add_file']['type'][$i];
                $name = $_FILES['add_file']['name'][$i];
    
                if($type != "application/pdf"){
                      $array=array('status' => '0','message' => "Type file must be application/pdf");
                      $this->session->set_flashdata('message', $array);
                      redirect('rab/create');
                }
            }
    
            for ($i=0; $i < $count_file ; $i++) { 
                $tmp_name = $_FILES['add_file']['tmp_name'][$i];
                $type = $_FILES['add_file']['type'][$i];
                $name = $_FILES['add_file']['name'][$i];
    
                $file_many["file"] = new CURLFile($tmp_name,$type,$name);
                $respon = json_decode($this->APICoreRKA->Apipost_upload($this->url."/upload_file", $file_many));
                
                // var_dump($respon);
                
                // echo "<br />";
                if ($respon == null) {
                    $array=array('status' => '0','message' => "Server Problem when upload file");
                    $this->session->set_flashdata('message', $array);
                    redirect('rab/create');
                } elseif ($respon->code == '1') {
                    if ($i != count($_FILES['add_file']['tmp_name'])-1) {
                        $path = $path.$respon->data->path_name."|";
                    } else {
                        $path = $path.$respon->data->path_name;
                    }
                }
            }
        }

        $items = array();
        $payments = array();
        //UNTUK ITEMS.
        for ($i=0; $i < count($this->input->post("add_item_id")) ; $i++) { 
            $id = $this->input->post("add_item_id")[$i];
            $kegiatan = $this->input->post("add_kegiatan")[$i];
            $jumlah = $this->input->post("add_jumlah")[$i];
            $harga = $this->input->post("add_harga")[$i];
            $keterangan = $this->input->post("add_keterangan")[$i];
            array_push($items, array(
                'kegiatan'=>$kegiatan,
                'quantity'=>$jumlah,
                'harga'=>$harga,
                'keterangan'=>$keterangan
            ));
        }
        //UNTUK PAYMENTS .
        for ($i=0; $i < count($this->input->post("add_coa_id")) ; $i++) { 
            $id = $this->input->post("add_coa_id")[$i];
            $nomor_coa = $this->input->post("add_coa_nmr")[$i];
            $bulan_coa = $this->input->post("add_coa_bln")[$i];
            $harga_coa = $this->input->post("add_saldo")[$i];
            if ($harga_coa == 0 || $harga_coa == "0") {
                continue;
            }
            array_push($payments, array(
                'no_coa'=>$nomor_coa,
                'bulan_coa'=>$bulan_coa,
                'jumlah'=>$harga_coa
            ));
        }
        $items = json_decode(json_encode($items));
        $payments = json_decode(json_encode($payments));
        $body = array(
            "sasaran" =>$sasaran,
            "fasilitas" => $fasilitas,
            "catatan" =>$catatan,
            "path_upload" =>$path,
            "items" =>$items,
            "payments" => $payments,
            "ket_rra" => $ket_rra
        );
        
        // echo json_encode($body);
        // exit();
        $respon = json_decode($this->APICoreRKA->Apiput($this->url."/rab/".$id_rab, $body));
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
        redirect('rab/history');
    }

    function view(){
        $role =  $this->session->userdata('level_rka');
        $idu = $this->session->userdata('iduser');

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

        $irb = base64_decode($this->input->get('irb'));
        $justifikasi = json_decode($this->APICoreRKA->Apiget($this->url."/justifikasi/".$irb));
        if ($justifikasi == null || $justifikasi->code == '0') {
            $array=array('status' => '0','message' => 'Tidak ada Justifikasi');
            $this->session->set_flashdata('message', $array);
            redirect('justification/history');
        }
        $justifikasi = $justifikasi->data;
        $data["justifikasi"] = $justifikasi;
        $data["notif"] = $pesan;
        $data["role"] = $role;
        $data["idu"] = $idu;
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/justifikasi/jus_view',$data);
        $this->load->view('frame/d_footer');    
    }

    function update(){
        $role =  $this->session->userdata('level_rka');
        $idu = $this->session->userdata('iduser');

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

        $irb = base64_decode($this->input->get('irb'));
        $rab = json_decode($this->APICoreRKA->Apiget($this->url."/rab/".$irb));
        if ($rab == null || $rab->code == '0') {
            $array=array('status' => '0','message' => 'Tidak ada RAB');
            $this->session->set_flashdata('message', $array);
            redirect('rab/history');
        }
        $rab = $rab->data;

        $coa_types = [];
        $coas = [];

        $api_type = json_decode($this->APICoreRKA->Apiget($this->url."/rka_type"));
        if ($api_type != null && $api_type->code == "1") {
            $coa_types = $api_type->data;
        }

        $api = json_decode($this->APICoreRKA->Apiget($this->url."/coa/project/".$rab->id_project."/".$rab->tahun));
        if ($api != null && $api->code == "1") {
            $coas = $api->data;
        }

        //MENAMBAHKAN SALDO PAYMENT KE COAS.
        foreach ($rab->payments as $key1 => $payment) {
            foreach ($coas as $key2 => $coa) {
                if ($payment->no_coa == $coa->no_coa && $payment->bulan_coa == $coa->bulan_ke) {
                    $coas[$key2]->saldo_coa = $coas[$key2]->saldo_coa + $rab->payments[$key1]->jumlah;
                    break;
                }
            }
        }
        
        //ITEM LOCAL STORAGE ITEM DAN COA
        $tot_item = count($rab->items);
        $arr_item = [];
        $tot_payment = count($rab->payments);
        $arr_payment = [];
        for ($i=0; $i < $tot_item ; $i++) { 
            $arr_item[] = $i;
        }
        for ($i=0; $i < $tot_payment ; $i++) { 
            $arr_payment[] = $i;
        }

        $data["rab"] = $rab;
        $data["notif"] = $pesan;
        $data["role"] = $role;
        $data["idu"] = $idu;
        $data["coas"] = $coas;
        $data["coa_types"] = $coa_types;
        $data["arr_item"] = $arr_item;
        $data["arr_payment"] = $arr_payment;

        $sess_array = array(
            'coas' => $coas,
            'coa_types' => $coa_types
        );
        $this->session->set_userdata($sess_array);
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/rab/rab_update',$data);
        $this->load->view('frame/d_footer');    
    }

    // EXECUTE CONTROLLER RAB
    function execute(){
        $execute = $this->input->post('execute');
        $id_rab = $this->input->post('id_rab');
        $keterangan = $this->input->post('keterangan');
        $type = $this->input->post('type');
        
        $body = array(
            "id_pegawai"=> $this->session->userdata('iduser'),
            "nik"=> $this->session->userdata('nik'),
            "execute"=>"$execute",
            "keterangan"=>"$keterangan"
        );
        if ($type == 'rab') {       
            $url = $this->url."/rab/execute-rab/$id_rab";
        } else {
            $url = $this->url."/rab/execute-rra/$id_rab";
        }

        $respon = json_decode($this->APICoreRKA->Apiput($url,$body));
        
        if($respon==null){
        $array=array('status' => '0','message' => 'API not response . please contact administrator');
        $this->session->set_flashdata('message', $array);
        } else if($respon->code =='1'){
        $array=array('status' => '1','message' => $respon->data);
        $this->session->set_flashdata('message', $array);
        } else {
        $array=array('status' => '0','message' => $respon->data);
        $this->session->set_flashdata('message', $array);
        }
        redirect('rab/history');
    }

    function rab_pdf(){
        $role =  $this->session->userdata('level_rka');
        $idu = $this->session->userdata('iduser');

        $irb = base64_decode($this->input->get('irb'));
        $rab = json_decode($this->APICoreRKA->Apiget($this->url."/rab/".$irb));
        if ($rab == null || $rab->code == '0') {
            $array=array('status' => '0','message' => 'Tidak Ada RAB');
            $this->session->set_flashdata('message', $array);
            redirect('rab/history');
        }
        $rab = $rab->data;
        
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/fpdf182/fpdf.php';
        $pdf = new FPDF('P','mm',array(210,297));
        $pdf->AddPage();

        //$path = "./assets/produk/img/";
        
        $pdf->setFillColor('255', '255', '255');
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->setTextColor('0', '0', '0');
        $logo = './images/gratika_favicon.png';
        
        $pdf->Image($logo, 10, 6, 15);
        $pdf->SetFont('Arial','B', 18);
        $pdf->Cell(60,9,"GRATIKA", '', '1', 'C', '');
        $pdf->SetFont('Arial','B', 14);
        $pdf->Ln(4);
        $pdf->Cell(185,6,"Form Pengajuan Rencana Anggaran Biaya",'', '1', 'C', '1');
        $pdf->Ln(0); 
        $pdf->Cell(185,6,"",'B', '1', 'C', '1');
        $pdf->Ln(6); 
        $pdf->setFillColor('255', '255', '255');
        $pdf->setTextColor('0', '0', '0');
        $pdf->SetFont('Arial','', 9);
        $tab_a = "\t\t\t\t\t\t\t\t:  ";
        
        $pdf->Cell(30,6,"Nomer RAB", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rab->nomor_pengajuan, '', '0', 'L','1');
        $pdf->Cell(30,6,"Dibuat Oleh", '', '0', 'L','1');
        $pdf->Cell(10,6,": ".$rab->dibuat_nama, '', '0', 'L','1');
        $pdf->Ln(5);
        $pdf->Cell(30,6,"Nama Project", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rab->project->nama_project, '', '0', 'L','1');
        $pdf->Cell(30,6,"Diminta Manager", '', '0', 'L','1');
        $pdf->Cell(10,6,": ".$rab->diminta_pegawai->full_name, '', '0', 'L','1');
        $pdf->Ln(5);
        $pdf->Cell(30,5,"Divisi Project", '', '0', 'L','1');
        $pdf->MultiCell(70,5,": ".$rab->project->nama_divisi, '', '0', 'L','1');
        $pdf->Cell(30,6,"Divisi - Subdiv", '', '0', 'L','1');
        $pdf->Cell(10,6,": ".$rab->diminta_pegawai->nmdivisi." - ".$rab->diminta_pegawai->nmsubdiv, '', '0', 'L','1');
        $pdf->Ln(1);
        $pdf->Cell(30,5,"Subdiv Project", '', '0', 'L','1');
        $pdf->MultiCell(70,5,": ".$rab->project->nama_subdiv, '', '0', 'L','1');
        $pdf->Ln(1);
        $pdf->Cell(30,6,"Menggunakan RRA", '', '0', 'L','1');
        if ($rab->status_rra == '11' || $rab->status_rra == '12') {
            $pdf->Cell(70,6,": Ya", '', '0', 'L','1');
        } else {
            $pdf->Cell(70,6,": Tidak", '', '0', 'L','1');
        }    
        $pdf->Ln(7);
        
        //SASARAN
        $pdf->Cell(30,6,"Sasaran", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rab->sasaran, '', '0', 'L','1');
        $pdf->Ln(5);
        $pdf->Cell(30,6,"Fasilitas", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rab->fasilitas, '', '0', 'L','1');
        $pdf->Ln(5);
        $pdf->Cell(30,6,"Catatan", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rab->catatan, '', '0', 'L','1');
        $pdf->Ln(8);

        $pdf->Cell(185,6,"Item yang dibutuhkan :",'', '1', 'C', '1');
        $pdf->SetFont('Arial','', 9);
        $pdf->SetDrawColor(0, 0, 0);

        $pdf->Cell(50,6,'Kegiatan', 'LTB','0', 'C','0');
        $pdf->Cell(50,6,'Keterangan', 'LTB','0', 'C','0');
        $pdf->Cell(15,6,'Jumlah', 'LTB','0', 'C','0');
        $pdf->Cell(35,6,'Harga', 'LTB','0', 'C','0');
        $pdf->Cell(35,6,'Total', 'TLRB','1', 'C','0');

        $tb_left = "\t\t";
        foreach($rab->items as $key => $it) :
            $flg_bwh = "";
            if ($key == count($rab->items) - 1) {
                $flg_bwh = "B";
            } 
            $pdf->Cell(50,6,$tb_left.$it->kegiatan, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(50,6,$tb_left.$it->keterangan, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(15,6,$tb_left.$it->quantity, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(35,6,number_format($it->harga, "2", ",", "."), 'L'.$flg_bwh,'0', 'R','0');
            $pdf->Cell(35,6,number_format($it->jumlah, "2", ",", "."), 'LR'.$flg_bwh,'1', 'R', '0');
        endforeach;

        // $nom_discount = 300000 / 100 * 2100000;
        $pdf->ln(5);
        $pdf->Cell(185,6,"COA yang digunakan :",'', '1', 'C', '1');
        $pdf->Cell(65,6,'Nomor COA', 'LTB','0', 'C','0');
        $pdf->Cell(50,6,'Tipe COA', 'LTB','0', 'C','0');
        $pdf->Cell(35,6,'Bulan Ke-', 'LTB','0', 'C','0');
        $pdf->Cell(35,6,'Total', 'TLRB','1', 'C','0');
        foreach($rab->payments as $key => $pay) :
            $flg_bwh = "";
            if ($key == count($rab->payments) - 1) {
                $flg_bwh = "B";
            } 
            $pdf->Cell(65,6,$tb_left.$pay->no_coa, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(50,6,$tb_left.$pay->nama_tipe, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(35,6,$tb_left.$pay->bulan_coa, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(35,6,number_format($pay->jumlah, "2", ",", "."), 'LR'.$flg_bwh,'1', 'R', '0');
        endforeach;

        $pdf->SetFont('Arial','', 12);
        $pdf->Cell(115,6,'  ', 'L','0', 'L','0');
        $pdf->Cell(70,6,'  ', 'LR','1', 'R', '0');
        $pdf->Cell(115,6,'  Total harga item yang dibutuhkan', 'L','0', 'L','0');
        $pdf->Cell(70,6,number_format($rab->total_item, "2", ",", "."), 'LR','1', 'R', '0');
        $pdf->Cell(115,6,'  ', 'LB','0', 'L','0');
        $pdf->Cell(70,6,'  ', 'LRB','1', 'R', '0');

        $pdf->Cell(115,6,'  ', 'L','0', 'L','0');
        $pdf->Cell(70,6,'  ', 'LR','1', 'R', '0');
        $pdf->Cell(115,6,'  Total saldo COA yang digunakan', 'L','0', 'L','0');
        $pdf->Cell(70,6,number_format($rab->total_payment, "2", ",", "."), 'LR','1', 'R', '0');
        $pdf->Cell(115,6,'  ', 'LB','0', 'L','0');
        $pdf->Cell(70,6,'  ', 'LRB','1', 'R', '0');
        $pdf->Ln(5);

        $pdf->SetFont('Arial','', 9);
        $pdf->setFillColor('255', '255', '255');
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->setTextColor('0', '0', '0');

        $pdf->Cell(30,6,"", '', '0', 'L','1');
        $pdf->Cell(30,6,"", '', '0', 'L','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(30,6,"Diajukan Tanggal", '', '0', 'L','1');
        $pdf->Cell(30,6,": ".date("d M Y",strtotime($rab->dibuat_tgl)), '', '0', 'L','1');
        $pdf->Ln(30);
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(60,6,"(".$rab->diminta_pegawai->full_name.")", '', '0', 'C','1');
        $pdf->Ln(13);


        if ($rab->disetujui1_tgl != null) {
            $tgl_setujui1 = date("d M Y",strtotime($rab->disetujui1_tgl));
            $nm_setujui1 = $rab->disetujui1_nama;
        } else {
            $tgl_setujui1 = "";
            $nm_setujui1 = "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }

        if ($rab->disetujui2_tgl != null) {
            $tgl_setujui2 = date("d M Y",strtotime($rab->disetujui2_tgl));
            $nm_setujui2 = $rab->disetujui2_nama;
        } else {
            $tgl_setujui2 = "";
            $nm_setujui2 = "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
    
        $pdf->Cell(30,6,"Disetujui Tanggal", '', '0', 'L','1');
        $pdf->Cell(30,6,": ".$tgl_setujui1, '', '0', 'L','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(30,6,"Disetujui Tanggal", '', '0', 'L','1');
        $pdf->Cell(30,6,": ".$tgl_setujui2, '', '0', 'L','1');
        $pdf->Ln(30);
        $pdf->Cell(60,6,"(".$nm_setujui1.")", '', '0', 'C','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(60,6,"(".$nm_setujui2.")", '', '0', 'C','1');
        $pdf->Ln(13);

        // $pdf->Cell(30,6,"", '', '0', 'L','1');
        // $pdf->Cell(30,6,"", '', '0', 'L','1');
        // $pdf->Cell(60,6,"", '', '0', 'C','1');
        // $pdf->Cell(30,6,"Diverifikasi Tanggal", '', '0', 'L','1');
        // $pdf->Cell(30,6,": 30 Agustus 2020", '', '0', 'L','1');
        // $pdf->Ln(30);
        // $pdf->Cell(60,6,"", '', '0', 'C','1');
        // $pdf->Cell(60,6,"", '', '0', 'C','1');
        // $pdf->Cell(60,6,"(Dian Utami N)", '', '0', 'C','1');
        // $pdf->Ln(13);
        $pdf->Output("I", $rab->nomor_pengajuan. ".pdf");
    }

    function rra_pdf(){
        $role =  $this->session->userdata('level_rka');
        $idu = $this->session->userdata('iduser');

        $irb = base64_decode($this->input->get('irb'));
        $rab = json_decode($this->APICoreRKA->Apiget($this->url."/rab/".$irb));
        if ($rab == null || $rab->code == '0') {
            $array=array('status' => '0','message' => "Tidak ada RAB");
            $this->session->set_flashdata('message', $array);
            redirect('rab/history');
        }
        $rab = $rab->data;
       
        if ($rab->rra_join == null) {
            $array=array('status' => '0','message' => "RAB tersebut tidak memiliki RRA");
            $this->session->set_flashdata('message', $array);
            redirect('rab/history');
        }

        $rra = $rab->rra_join;
        
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/fpdf182/fpdf.php';
        $pdf = new FPDF('P','mm',array(210,297));
        $pdf->AddPage();

        //$path = "./assets/produk/img/";
        
        $pdf->setFillColor('255', '255', '255');
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->setTextColor('0', '0', '0');
        $logo = './images/gratika_favicon.png';
        
        $pdf->Image($logo, 10, 6, 15);
        $pdf->SetFont('Arial','B', 18);
        $pdf->Cell(60,9,"GRATIKA", '', '1', 'C', '');
        $pdf->SetFont('Arial','B', 14);
        $pdf->Ln(4);
        $pdf->Cell(185,6,"Form Pengajuan RRA",'', '1', 'C', '1');
        $pdf->Ln(0); 
        $pdf->Cell(185,6,"",'B', '1', 'C', '1');
        $pdf->Ln(6); 
        $pdf->setFillColor('255', '255', '255');
        $pdf->setTextColor('0', '0', '0');
        $pdf->SetFont('Arial','', 9);
        $tab_a = "\t\t\t\t\t\t\t\t:  ";
        
        $pdf->Cell(30,6,"Nomer RRA", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rra->no_rra, '', '0', 'L','1');
        $pdf->Cell(30,6,"Dibuat Oleh", '', '0', 'L','1');
        $pdf->Cell(10,6,": ".$rab->dibuat_nama, '', '0', 'L','1');
        $pdf->Ln(5);
        $pdf->Cell(30,6,"Periode", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rra->periode, '', '0', 'L','1');
        $pdf->Cell(30,6,"Diminta Manager", '', '0', 'L','1');
        $pdf->Cell(10,6,": ".$rab->diminta_pegawai->full_name, '', '0', 'L','1');
        $pdf->Ln(5);
        $pdf->Cell(30,6,"Tanggal", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".date("d M Y",strtotime($rab->dibuat_tgl)), '', '0', 'L','1');
        $pdf->Cell(30,6,"Divisi - Subdiv", '', '0', 'L','1');
        $pdf->Cell(10,6,": ".$rab->diminta_pegawai->nmdivisi." - ".$rab->diminta_pegawai->nmsubdiv, '', '0', 'L','1');
        $pdf->Ln(5);
        $pdf->Cell(30,6,"Keterangan", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rra->keterangan, '', '0', 'L','1');
        $pdf->Ln(10);
    
        $pdf->Cell(185,6,"COA yang dibutuhkan :",'', '1', 'C', '1');
        $pdf->SetFont('Arial','', 9);
        $pdf->SetDrawColor(0, 0, 0);

        $pdf->Cell(45,6,'Kode Akun', 'LTB','0', 'C','0');
        $pdf->Cell(35,6,'Nama Akun', 'LTB','0', 'C','0');
        $pdf->Cell(25,6,'Periode', 'LTB','0', 'C','0');
        $pdf->Cell(40,6,'Penerima', 'LTB','0', 'C','0');
        $pdf->Cell(40,6,'Pemberi', 'TLRB','1', 'C','0');

        $tb_left = "\t\t";
        foreach($rra->rra_coa as $key => $it) :
            $flg_bwh = "";
            if ($key == count($rra->rra_coa) - 1) {
                $flg_bwh = "B";
            } 
            $pdf->Cell(45,6,$tb_left.$it->no_coa, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(35,6,$tb_left.$it->nama_type, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(25,6,$tb_left.$it->periode, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(40,6,number_format($it->penerima, "2", ",", "."), 'L'.$flg_bwh,'0', 'R','0');
            $pdf->Cell(40,6,number_format($it->pemberi, "2", ",", "."), 'LR'.$flg_bwh,'1', 'R', '0');
        endforeach;

        $pdf->ln(5);

        $pdf->SetFont('Arial','', 9);
        $pdf->setFillColor('255', '255', '255');
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->setTextColor('0', '0', '0');

        $pdf->Cell(30,6,"", '', '0', 'L','1');
        $pdf->Cell(30,6,"", '', '0', 'L','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(30,6,"Diajukan Tanggal", '', '0', 'L','1');
        $pdf->Cell(30,6,": ".date("d M Y",strtotime($rab->dibuat_tgl)), '', '0', 'L','1');
        $pdf->Ln(30);
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(60,6,"(".$rab->diminta_pegawai->full_name.")", '', '0', 'C','1');
        $pdf->Ln(13);


        if ($rab->disetujui1_tgl != null) {
            $tgl_setujui1 = date("d M Y",strtotime($rab->disetujui1_tgl));
            $nm_setujui1 = $rab->disetujui1_nama;
        } else {
            $tgl_setujui1 = "";
            $nm_setujui1 = "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }

        if ($rab->disetujui2_tgl != null) {
            $tgl_setujui2 = date("d M Y",strtotime($rab->disetujui2_tgl));
            $nm_setujui2 = $rab->disetujui2_nama;
        } else {
            $tgl_setujui2 = "";
            $nm_setujui2 = "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
    
        $pdf->Cell(30,6,"Disetujui Tanggal", '', '0', 'L','1');
        $pdf->Cell(30,6,": ".$tgl_setujui1, '', '0', 'L','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(30,6,"Disetujui Tanggal", '', '0', 'L','1');
        $pdf->Cell(30,6,": ".$tgl_setujui2, '', '0', 'L','1');
        $pdf->Ln(30);
        $pdf->Cell(60,6,"(".$nm_setujui1.")", '', '0', 'C','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(60,6,"(".$nm_setujui2.")", '', '0', 'C','1');
        $pdf->Ln(13);

        // $pdf->Cell(30,6,"", '', '0', 'L','1');
        // $pdf->Cell(30,6,"", '', '0', 'L','1');
        // $pdf->Cell(60,6,"", '', '0', 'C','1');
        // $pdf->Cell(30,6,"Diverifikasi Tanggal", '', '0', 'L','1');
        // $pdf->Cell(30,6,": 30 Agustus 2020", '', '0', 'L','1');
        // $pdf->Ln(30);
        // $pdf->Cell(60,6,"", '', '0', 'C','1');
        // $pdf->Cell(60,6,"", '', '0', 'C','1');
        // $pdf->Cell(60,6,"(Dian Utami N)", '', '0', 'C','1');
        // $pdf->Ln(13);
        $pdf->Output("I", $rab->nomor_pengajuan. ".pdf");
    }

    function document_rab(){
        $role =  $this->session->userdata('level_rka');
        $idu = $this->session->userdata('iduser');

        $irb = base64_decode($this->input->get('irb'));
        $rab = json_decode($this->APICoreRKA->Apiget($this->url."/rab/".$irb));
        if ($rab == null || $rab->code == '0') {
            $array=array('status' => '0','message' => 'Tidak Ada RAB');
            $this->session->set_flashdata('message', $array);
            redirect('rab/history');
        }
        $rab = $rab->data;
        
        $pdf = new Fpdi('P','mm',array(210,297)); // Fpdf instance
        $pdf->AddPage();
        //$path = "./assets/produk/img/";
        
        $pdf->setFillColor('255', '255', '255');
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->setTextColor('0', '0', '0');
        $logo = './images/gratika_favicon.png';
        
        $pdf->Image($logo, 10, 6, 15);
        $pdf->SetFont('Arial','B', 18);
        $pdf->Cell(60,9,"GRATIKA", '', '1', 'C', '');
        $pdf->SetFont('Arial','B', 14);
        $pdf->Ln(4);
        $pdf->Cell(185,6,"Form Pengajuan Rencana Anggaran Biaya",'', '1', 'C', '1');
        $pdf->Ln(0); 
        $pdf->Cell(185,6,"",'B', '1', 'C', '1');
        $pdf->Ln(6); 
        $pdf->setFillColor('255', '255', '255');
        $pdf->setTextColor('0', '0', '0');
        $pdf->SetFont('Arial','', 9);
        $tab_a = "\t\t\t\t\t\t\t\t:  ";
        
        $pdf->Cell(30,6,"Nomer RAB", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rab->nomor_pengajuan, '', '0', 'L','1');
        $pdf->Cell(30,6,"Dibuat Oleh", '', '0', 'L','1');
        $pdf->Cell(10,6,": ".$rab->dibuat_nama, '', '0', 'L','1');
        $pdf->Ln(5);
        $pdf->Cell(30,6,"Nama Project", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rab->project->nama_project, '', '0', 'L','1');
        $pdf->Cell(30,6,"Diminta Manager", '', '0', 'L','1');
        $pdf->Cell(10,6,": ".$rab->diminta_pegawai->full_name, '', '0', 'L','1');
        $pdf->Ln(5);
        $pdf->Cell(30,5,"Divisi Project", '', '0', 'L','1');
        $pdf->MultiCell(70,5,": ".$rab->project->nama_divisi, '', '0', 'L','1');
        $pdf->Cell(30,6,"Divisi - Subdiv", '', '0', 'L','1');
        $pdf->Cell(10,6,": ".$rab->diminta_pegawai->nmdivisi." - ".$rab->diminta_pegawai->nmsubdiv, '', '0', 'L','1');
        $pdf->Ln(1);
        $pdf->Cell(30,5,"Subdiv Project", '', '0', 'L','1');
        $pdf->MultiCell(70,5,": ".$rab->project->nama_subdiv, '', '0', 'L','1');
        $pdf->Ln(1);
        $pdf->Cell(30,6,"Menggunakan RRA", '', '0', 'L','1');
        if ($rab->status_rra == '11' || $rab->status_rra == '12') {
            $pdf->Cell(70,6,": Ya", '', '0', 'L','1');
        } else {
            $pdf->Cell(70,6,": Tidak", '', '0', 'L','1');
        }    
        $pdf->Ln(7);
        
        //SASARAN
        $pdf->Cell(30,6,"Sasaran", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rab->sasaran, '', '0', 'L','1');
        $pdf->Ln(5);
        $pdf->Cell(30,6,"Fasilitas", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rab->fasilitas, '', '0', 'L','1');
        $pdf->Ln(5);
        $pdf->Cell(30,6,"Catatan", '', '0', 'L','1');
        $pdf->Cell(70,6,": ".$rab->catatan, '', '0', 'L','1');
        $pdf->Ln(8);

        $pdf->Cell(185,6,"Item yang dibutuhkan :",'', '1', 'C', '1');
        $pdf->SetFont('Arial','', 9);
        $pdf->SetDrawColor(0, 0, 0);

        $pdf->Cell(50,6,'Kegiatan', 'LTB','0', 'C','0');
        $pdf->Cell(50,6,'Keterangan', 'LTB','0', 'C','0');
        $pdf->Cell(15,6,'Jumlah', 'LTB','0', 'C','0');
        $pdf->Cell(35,6,'Harga', 'LTB','0', 'C','0');
        $pdf->Cell(35,6,'Total', 'TLRB','1', 'C','0');

        $tb_left = "\t\t";
        foreach($rab->items as $key => $it) :
            $flg_bwh = "";
            if ($key == count($rab->items) - 1) {
                $flg_bwh = "B";
            } 
            $pdf->Cell(50,6,$tb_left.$it->kegiatan, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(50,6,$tb_left.$it->keterangan, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(15,6,$tb_left.$it->quantity, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(35,6,number_format($it->harga, "2", ",", "."), 'L'.$flg_bwh,'0', 'R','0');
            $pdf->Cell(35,6,number_format($it->jumlah, "2", ",", "."), 'LR'.$flg_bwh,'1', 'R', '0');
        endforeach;

        // $nom_discount = 300000 / 100 * 2100000;
        $pdf->ln(5);
        $pdf->Cell(185,6,"COA yang digunakan :",'', '1', 'C', '1');
        $pdf->Cell(65,6,'Nomor COA', 'LTB','0', 'C','0');
        $pdf->Cell(50,6,'Tipe COA', 'LTB','0', 'C','0');
        $pdf->Cell(35,6,'Bulan Ke-', 'LTB','0', 'C','0');
        $pdf->Cell(35,6,'Total', 'TLRB','1', 'C','0');
        foreach($rab->payments as $key => $pay) :
            $flg_bwh = "";
            if ($key == count($rab->payments) - 1) {
                $flg_bwh = "B";
            } 
            $pdf->Cell(65,6,$tb_left.$pay->no_coa, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(50,6,$tb_left.$pay->nama_tipe, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(35,6,$tb_left.$pay->bulan_coa, 'L'.$flg_bwh,'0', 'L','0');
            $pdf->Cell(35,6,number_format($pay->jumlah, "2", ",", "."), 'LR'.$flg_bwh,'1', 'R', '0');
        endforeach;

        $pdf->SetFont('Arial','', 12);
        $pdf->Cell(115,6,'  ', 'L','0', 'L','0');
        $pdf->Cell(70,6,'  ', 'LR','1', 'R', '0');
        $pdf->Cell(115,6,'  Total harga item yang dibutuhkan', 'L','0', 'L','0');
        $pdf->Cell(70,6,number_format($rab->total_item, "2", ",", "."), 'LR','1', 'R', '0');
        $pdf->Cell(115,6,'  ', 'LB','0', 'L','0');
        $pdf->Cell(70,6,'  ', 'LRB','1', 'R', '0');

        $pdf->Cell(115,6,'  ', 'L','0', 'L','0');
        $pdf->Cell(70,6,'  ', 'LR','1', 'R', '0');
        $pdf->Cell(115,6,'  Total saldo COA yang digunakan', 'L','0', 'L','0');
        $pdf->Cell(70,6,number_format($rab->total_payment, "2", ",", "."), 'LR','1', 'R', '0');
        $pdf->Cell(115,6,'  ', 'LB','0', 'L','0');
        $pdf->Cell(70,6,'  ', 'LRB','1', 'R', '0');
        $pdf->Ln(5);

        $pdf->SetFont('Arial','', 9);
        $pdf->setFillColor('255', '255', '255');
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->setTextColor('0', '0', '0');

        $pdf->Cell(30,6,"", '', '0', 'L','1');
        $pdf->Cell(30,6,"", '', '0', 'L','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(30,6,"Diajukan Tanggal", '', '0', 'L','1');
        $pdf->Cell(30,6,": ".date("d M Y",strtotime($rab->dibuat_tgl)), '', '0', 'L','1');
        $pdf->Ln(30);
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(60,6,"(".$rab->diminta_pegawai->full_name.")", '', '0', 'C','1');
        $pdf->Ln(13);
        if ($rab->disetujui1_tgl != null) {
            $tgl_setujui1 = date("d M Y",strtotime($rab->disetujui1_tgl));
            $nm_setujui1 = $rab->disetujui1_nama;
        } else {
            $tgl_setujui1 = "";
            $nm_setujui1 = "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }

        if ($rab->disetujui2_tgl != null) {
            $tgl_setujui2 = date("d M Y",strtotime($rab->disetujui2_tgl));
            $nm_setujui2 = $rab->disetujui2_nama;
        } else {
            $tgl_setujui2 = "";
            $nm_setujui2 = "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
    
        $pdf->Cell(30,6,"Disetujui Tanggal", '', '0', 'L','1');
        $pdf->Cell(30,6,": ".$tgl_setujui1, '', '0', 'L','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(30,6,"Disetujui Tanggal", '', '0', 'L','1');
        $pdf->Cell(30,6,": ".$tgl_setujui2, '', '0', 'L','1');
        $pdf->Ln(30);
        $pdf->Cell(60,6,"(".$nm_setujui1.")", '', '0', 'C','1');
        $pdf->Cell(60,6,"", '', '0', 'C','1');
        $pdf->Cell(60,6,"(".$nm_setujui2.")", '', '0', 'C','1');
        $pdf->Ln(13);

        //CREATE PAGE RRA
        if ($rab->rra_join != null) {
           
            $rra = $rab->rra_join;
            $pdf->AddPage();
            $pdf->setFillColor('255', '255', '255');
            $pdf->SetDrawColor(0, 0, 0);
            $pdf->setTextColor('0', '0', '0');
            $logo = './images/gratika_favicon.png';
            
            $pdf->Image($logo, 10, 6, 15);
            $pdf->SetFont('Arial','B', 18);
            $pdf->Cell(60,9,"GRATIKA", '', '1', 'C', '');
            $pdf->SetFont('Arial','B', 14);
            $pdf->Ln(4);
            $pdf->Cell(185,6,"Form Pengajuan RRA",'', '1', 'C', '1');
            $pdf->Ln(0); 
            $pdf->Cell(185,6,"",'B', '1', 'C', '1');
            $pdf->Ln(6); 
            $pdf->setFillColor('255', '255', '255');
            $pdf->setTextColor('0', '0', '0');
            $pdf->SetFont('Arial','', 9);
            $tab_a = "\t\t\t\t\t\t\t\t:  ";
            
            $pdf->Cell(30,6,"Nomer RRA", '', '0', 'L','1');
            $pdf->Cell(70,6,": ".$rra->no_rra, '', '0', 'L','1');
            $pdf->Cell(30,6,"Dibuat Oleh", '', '0', 'L','1');
            $pdf->Cell(10,6,": ".$rab->dibuat_nama, '', '0', 'L','1');
            $pdf->Ln(5);
            $pdf->Cell(30,6,"Periode", '', '0', 'L','1');
            $pdf->Cell(70,6,": ".$rra->periode, '', '0', 'L','1');
            $pdf->Cell(30,6,"Diminta Manager", '', '0', 'L','1');
            $pdf->Cell(10,6,": ".$rab->diminta_pegawai->full_name, '', '0', 'L','1');
            $pdf->Ln(5);
            $pdf->Cell(30,6,"Tanggal", '', '0', 'L','1');
            $pdf->Cell(70,6,": ".date("d M Y",strtotime($rab->dibuat_tgl)), '', '0', 'L','1');
            $pdf->Cell(30,6,"Divisi - Subdiv", '', '0', 'L','1');
            $pdf->Cell(10,6,": ".$rab->diminta_pegawai->nmdivisi." - ".$rab->diminta_pegawai->nmsubdiv, '', '0', 'L','1');
            $pdf->Ln(5);
            $pdf->Cell(30,6,"Keterangan", '', '0', 'L','1');
            $pdf->Cell(70,6,": ".$rra->keterangan, '', '0', 'L','1');
            $pdf->Ln(10);
        
            $pdf->Cell(185,6,"COA yang dibutuhkan :",'', '1', 'C', '1');
            $pdf->SetFont('Arial','', 9);
            $pdf->SetDrawColor(0, 0, 0);

            $pdf->Cell(45,6,'Kode Akun', 'LTB','0', 'C','0');
            $pdf->Cell(35,6,'Nama Akun', 'LTB','0', 'C','0');
            $pdf->Cell(25,6,'Periode', 'LTB','0', 'C','0');
            $pdf->Cell(40,6,'Penerima', 'LTB','0', 'C','0');
            $pdf->Cell(40,6,'Pemberi', 'TLRB','1', 'C','0');

            $tb_left = "\t\t";
            foreach($rra->rra_coa as $key => $it) :
                $flg_bwh = "";
                if ($key == count($rra->rra_coa) - 1) {
                    $flg_bwh = "B";
                } 
                $pdf->Cell(45,6,$tb_left.$it->no_coa, 'L'.$flg_bwh,'0', 'L','0');
                $pdf->Cell(35,6,$tb_left.$it->nama_type, 'L'.$flg_bwh,'0', 'L','0');
                $pdf->Cell(25,6,$tb_left.$it->periode, 'L'.$flg_bwh,'0', 'L','0');
                $pdf->Cell(40,6,number_format($it->penerima, "2", ",", "."), 'L'.$flg_bwh,'0', 'R','0');
                $pdf->Cell(40,6,number_format($it->pemberi, "2", ",", "."), 'LR'.$flg_bwh,'1', 'R', '0');
            endforeach;

            $pdf->ln(5);

            $pdf->SetFont('Arial','', 9);
            $pdf->setFillColor('255', '255', '255');
            $pdf->SetDrawColor(0, 0, 0);
            $pdf->setTextColor('0', '0', '0');

            $pdf->Cell(30,6,"", '', '0', 'L','1');
            $pdf->Cell(30,6,"", '', '0', 'L','1');
            $pdf->Cell(60,6,"", '', '0', 'C','1');
            $pdf->Cell(30,6,"Diajukan Tanggal", '', '0', 'L','1');
            $pdf->Cell(30,6,": ".date("d M Y",strtotime($rab->dibuat_tgl)), '', '0', 'L','1');
            $pdf->Ln(30);
            $pdf->Cell(60,6,"", '', '0', 'C','1');
            $pdf->Cell(60,6,"", '', '0', 'C','1');
            $pdf->Cell(60,6,"(".$rab->diminta_pegawai->full_name.")", '', '0', 'C','1');
            $pdf->Ln(13);


            if ($rab->disetujui1_tgl != null) {
                $tgl_setujui1 = date("d M Y",strtotime($rab->disetujui1_tgl));
                $nm_setujui1 = $rab->disetujui1_nama;
            } else {
                $tgl_setujui1 = "";
                $nm_setujui1 = "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }

            if ($rab->disetujui2_tgl != null) {
                $tgl_setujui2 = date("d M Y",strtotime($rab->disetujui2_tgl));
                $nm_setujui2 = $rab->disetujui2_nama;
            } else {
                $tgl_setujui2 = "";
                $nm_setujui2 = "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
        
            $pdf->Cell(30,6,"Disetujui Tanggal", '', '0', 'L','1');
            $pdf->Cell(30,6,": ".$tgl_setujui1, '', '0', 'L','1');
            $pdf->Cell(60,6,"", '', '0', 'C','1');
            $pdf->Cell(30,6,"Disetujui Tanggal", '', '0', 'L','1');
            $pdf->Cell(30,6,": ".$tgl_setujui2, '', '0', 'L','1');
            $pdf->Ln(30);
            $pdf->Cell(60,6,"(".$nm_setujui1.")", '', '0', 'C','1');
            $pdf->Cell(60,6,"", '', '0', 'C','1');
            $pdf->Cell(60,6,"(".$nm_setujui2.")", '', '0', 'C','1');
            $pdf->Ln(13);
        }


        if ($rab->file_upload != "" ) {
            $filex = explode("|",$rab->file_upload);
            for ($i=0; $i < count($filex); $i++) { 
                $path_f = "http://aplikasi2.gratika.id/corerka/core-rka/view_file/".$filex[$i];
                $file = file_get_contents($path_f);
                $pagecount = $pdf->setSourceFile(StreamReader::createByString($file));
                for ($pageNo = 1; $pageNo <= $pagecount; $pageNo++) {
                    // import a page
                    $templateId = $pdf->importPage($pageNo);
                    // get the size of the imported page
                    $size = $pdf->getTemplateSize($templateId);
                    /// add a page with the same orientation and size
                    $pdf->addPage();
                    $pdf->useTemplate($templateId, 1, 1, 210, 297, TRUE);
                }
            }   
        }
        
        $pdf->Output('I', $rab->nomor_pengajuan.".pdf");
    }
}
?>