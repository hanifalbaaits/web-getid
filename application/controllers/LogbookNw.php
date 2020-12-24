<?php 
class LogbookNw extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model("APICoreLogbook");
        $this->session_key = $this->config->item('session-key');
        $this->url = $this->config->item('url-corelogbook');
        $this->authorization = $this->config->item('core-authorization');
     
        if($this->session->userdata('logcode') != $this->session_key){
          $array=array('status' => '0','message' => 'Please login first .. !');
          $this->session->set_flashdata('message', $array);
          redirect('login');
        } 
        if($this->session->userdata('level') == 'administrator' ||
        $this->session->userdata('level') == 'admin4' ) {
          $array=array('status' => '0','message' => 'You not authorized!');
          $this->session->set_flashdata('message', $array);
          redirect('project');
        }
    }

    function index2(){ 
      $data['tes'] ='tes';
      $data['jumlah'] = 4;
      // $this->session->set_userdata($sess_array);
      $this->load->view('frame/a_header');
      $this->load->view('frame/b_nav');
      $this->load->view('page/logbooknw/logbookCoba',$data);
      $this->load->view('frame/d_footer2',$data);
    }

    function index(){ 
      $nik = $this->session->userdata('nik');
      $level = $this->session->userdata('level');
      $divisi = $this->session->userdata('divisi');
      $subdiv = $this->session->userdata('subdiv');
      $start_date = $this->input->post('start_date');
      $end_date = $this->input->post('end_date');
      $week_date = $this->input->post('week_date');
      $search = true;
      $temp = null;

      $logbooks = [];
      $projects = [];
      
      if($start_date == null && $end_date == null && $week_date == null){
        if($level == 'administrator' || $level == 'developer'){
          $logbooks = json_decode($this->APICoreLogbook->Apiget($this->url."/logbookNw"))->data;
          $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project"))->data;
        } else {
          $logbooks = json_decode($this->APICoreLogbook->Apiget($this->url."/logbookNw/home/".$nik))->data;
          $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project/nik/".$nik))->data;
        }
        $temp = "Pada minggu ini anda memiliki ";
        $search = false;
        $data["projects"] = $projects;
      } else if ($start_date != null && $end_date != null){
        
        $diff  = date_diff( date_create_from_format('d/m/Y',$start_date), date_create_from_format('d/m/Y',$end_date));
        if(date_create_from_format('d/m/Y',$start_date) > date_create_from_format('d/m/Y',$end_date)){
          $array=array('status' => '0','message' => "Start date can't be greater than end date");
          $this->session->set_flashdata('message', $array);
          redirect('logbookNw');
        }
        $selisih = $diff->days;
        if ($selisih > 7 ) {
          $array=array('status' => '0','message' => 'Date range can only be 7 days or 1 week');
          $this->session->set_flashdata('message', $array);
          redirect('logbookNw');
        }
        $body = array("startdate" =>$start_date,
        "enddate" =>$end_date
        );
        $logbooks = json_decode($this->APICoreLogbook->Apipost($this->url."/logbookNw/search/".$nik, $body))->data;
        $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project/nik/".$nik))->data;
        $temp = "Logbook anda dari ".$start_date." ke ".$end_date. ", anda memiliki ";
        $data["projects"] = $projects;
      } else if ($week_date != null){
        $date = date('Y-m-01'); 
        $st_week1 = date("Y-m-d", strtotime('monday this week', strtotime($date)));   
        $end_week1 = date("Y-m-d", strtotime('sunday this week', strtotime($date)));
        $end_week2 = date("Y-m-d", strtotime('+7 day', strtotime($end_week1)));
        $end_week3 = date("Y-m-d", strtotime('+14 day', strtotime($end_week1)));
        $end_week4 = date("Y-m-d", strtotime('+21 day', strtotime($end_week1)));
        $end_week5 = date("Y-m-d", strtotime('+28 day', strtotime($end_week1)));

        switch ($week_date) {
          case '1': //untuk week 1
          $start_date = date("d/m/Y",strtotime($st_week1));
          $end_date = date("d/m/Y",strtotime($end_week1));
          $temp = "Logbook anda pada minggu ke-1, ";
          break;
          case '2': //untuk week 2
          $start_date = date("d/m/Y",strtotime($end_week1));
          $end_date = date("d/m/Y",strtotime($end_week2));
          $temp = "Logbook anda pada minggu ke-2, ";
          break;
          case '3': //untuk week 3
          $start_date = date("d/m/Y",strtotime($end_week2));
          $end_date = date("d/m/Y",strtotime($end_week3));
          $temp = "Logbook anda pada minggu ke-3, ";
          break;
          case '4': //untuk week 4
          $start_date = date("d/m/Y",strtotime($end_week3));
          $end_date = date("d/m/Y",strtotime($end_week4));
          $temp = "Logbook anda pada minggu ke-4, ";
          break;
          case '5': //untuk week 5
          $start_date = date("d/m/Y",strtotime($end_week4));
          $end_date = date("d/m/Y",strtotime($end_week5));
          $temp = "Logbook anda pada minggu ke-5, ";
          break;
          default:
          break;
        }
        $body = array("startdate" =>$start_date,
        "enddate" =>$end_date
        );
        $logbooks = json_decode($this->APICoreLogbook->Apipost($this->url."/logbookNw/search/".$nik, $body))->data;
        $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project/nik/".$nik))->data;
        $data["projects"] = $projects;
        $temp = $temp . "anda memiliki ";
      }

      // $pics = json_decode($this->APICoreLogbook->Apiget($this->url."/pic"))->data;
      // $clients = json_decode($this->APICoreLogbook->Apiget($this->url."/client"))->data;

      $jml_lb = 0;
      for ($i=0; $i < count($logbooks); $i++) { 
        $jml_lb = $jml_lb + (int) $logbooks[$i]->count_issue;
      }
      $temp = $temp.$jml_lb." logbooks";

      //SIMPEN KE SESSION TAPI LOGBOOK SENDIRI AJA.
      $seion_log = array();
      $i = 0;
      foreach ($logbooks as $project) {
        foreach ($project->list_logbook as $dta) {
          if ($level == 5||$level == 6||$level == 7) { //STAFF
            if ($dta->subdiv == $subdiv) {
              // $seion_log[] = $dta;
              array_push($seion_log,$dta);
            }
          } else if ($level == 4) { //MANAGER
            if ($dta->subdiv == $subdiv) {
              // $seion_log[] = $dta;
              array_push($seion_log,$dta);
            }
          } else if ($level == 3) { //VP
            if ($dta->divisi == $subdiv) {
              // $seion_log[] = $dta;
              array_push($seion_log,$dta);
            }
          } else {
            if ($dta->subdiv == $subdiv) {
              // $seion_log[] = $dta;
              array_push($seion_log,$dta);
            }
          }
        }
      }
      
      $sess_array = array(
        'logbooks' => $seion_log,
        'projects' => $projects,
        'logbooks_project' => $logbooks,
        // 'pics' => $pics,
        // 'clients' => $clients
      );

      $data["jumlah"] = $jml_lb;
      $data["search"] = $search;
      $data["logbooks"] = $logbooks;
      // $data["pics"] = $pics;
      // $data["clients"] = $clients;
      $data["info"] = $temp;
      $data["level"] = $level;
      $data["subdiv"] = $subdiv;
      $data["divisi"] = $divisi;
      
      $this->session->set_userdata($sess_array); 
      $this->load->view('frame/a_header');
      $this->load->view('frame/b_nav');
      $this->load->view('page/logbooknw/logbook',$data);
      $this->load->view('frame/d_footer2',$data);
    }

    function create(){ 
      $end_week = date("d/m/Y", strtotime('sunday this week'))." 00:00:00";
      $id_project = "";
      $id_project_id = $this->input->post('add_id_project_id'); //ini untuk mengambil project statis. SUPPORT & MANGEMENT
      //CEK DULU id_project_id, jika ada nilai nya berarti diambil. jika tidak ada ambil dari id_project.
      if($id_project_id == ""){
        $id_project = $this->input->post('add_id_project');
      } else {
        $id_project = $id_project_id;
      }
      $id_client = $this->input->post('add_id_client');
      $id_pic = $this->input->post('add_id_pic');
      $status = $this->input->post('add_status');
      $tittle = null;
      $add_type = $this->input->post('add_type');
      $add_type_issue = $this->input->post('add_type_issue');
      if($add_type !=0){
        $tittle = $this->input->post('add_tittle');
      }
      $issue = "";
      if ($add_type_issue == "1") {
        $issue = $this->input->post('add_issue');
      }
    
      $date_start = $this->input->post('add_date_start');
      $time_start = $this->input->post('add_time_start');
      $start = $date_start." ".$time_start.":00";
      $date_target = $this->input->post('add_date_target');
      $time_target = $this->input->post('add_time_target');
      $target = $date_target." ".$time_target.":00";
      
      $complete =  null;
      $location = $this->input->post('add_location');
      $date_complete = $this->input->post('add_date_complete');
      $time_complete = $this->input->post('add_time_complete');
      if($status=="2"){
        $complete = $date_complete." ".$time_complete.":00";
      }

      $list_activity = array();
      for ($i=0; $i < count($this->input->post("add_act_id")) ; $i++) { 
          $id_act = $this->input->post("add_act_id")[$i];
          $activity_act = $this->input->post("add_act_activity")[$i];
          $note_act = $this->input->post("add_act_note")[$i];
          $status_act = $this->input->post("add_act_status")[$i];
          $start_act = $this->input->post("add_act_date_start")[$i]." ".$this->input->post("add_act_time_start")[$i].":00";
          $complete_act = null;
          if ($status_act == '2') {
            $complete_act = $this->input->post("add_act_date_complete")[$i]." ".$this->input->post("add_act_time_complete")[$i].":00";
          }
         
          array_push($list_activity, array(
              'id_activity'=>$id_act,
              'activity'=>$activity_act,
              'note'=>$note_act,
              'status'=>$status_act, 
              'date_start'=>$start_act, 
              'date_complete'=>$complete_act
          ));
      }

      $list_activity = json_decode(json_encode($list_activity));

      $body = array("flag_lembur" =>"0",
        "id_project" =>$id_project,
        "id_progress" =>$status,
        "id_pegawai" => $this->session->userdata("iduser"),
        "id_client" =>$id_client,
        "id_pic" =>$id_pic,
        "tittle" =>$tittle,
        "issue" => $issue,
        "list_activity" =>$list_activity,
        "location" => $location,
        "date_start" =>$start,
        "date_target" =>$target,
        "date_end_week" => $end_week,
        "date_complete" => $complete
      );

      $respon = json_decode($this->APICoreLogbook->Apipost($this->url."/logbookNw", $body));
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
      redirect('logbookNw');
    }

    function update(){ 
      $end_week = date("d/m/Y", strtotime('sunday this week'))." 00:00:00";
      $id_logbook = $this->input->post('edit_id_logbook');
      $id_prodet = $this->input->post('edit_id_prodet');
      $id_project = $this->input->post('edit_id_project_id');
      $tittle = $this->input->post('edit_tittle');
      $status = $this->input->post('edit_status');
      $complete =  null;
      $issue = $this->input->post('edit_issue');
      $location = $this->input->post('edit_location');
      $date_complete = $this->input->post('edit_date_complete');
      $time_complete = $this->input->post('edit_time_complete');
      if($status=="2"){
        if($date_complete == null){
          $array=array('status' => '0','message' => 'Need date complete!');
          $this->session->set_flashdata('message', $array);
          redirect('logbookNw');
        } else {
          // $complete = date('d/m/Y',strtotime($date_complete))." ".$time_complete.":00";
          $complete = $date_complete." ".$time_complete.":00";
        }
      }
      
      $list_activity = array();
      for ($i=0; $i < count($this->input->post("edit_act_id")) ; $i++) { 
          $id_act = $this->input->post("edit_act_id")[$i];
          $activity_act = $this->input->post("edit_act_activity")[$i];
          $note_act = $this->input->post("edit_act_note")[$i];
          $status_act = $this->input->post("edit_act_status")[$i];
          echo "status: ".$status_act;
          $start_act = $this->input->post("edit_act_date_start")[$i]." ".$this->input->post("edit_act_time_start")[$i].":00";
          $complete_act = null;
          if ($status_act == '2') {
            $complete_act = $this->input->post("edit_act_date_complete")[$i]." ".$this->input->post("edit_act_time_complete")[$i].":00";
          }
         
          array_push($list_activity, array(
              'id_activity'=>$id_act,
              'activity'=>$activity_act,
              'note'=>$note_act,
              'status'=>$status_act, 
              'date_start'=>$start_act, 
              'date_complete'=>$complete_act
          ));
      }

      $list_activity = json_decode(json_encode($list_activity));
      $body = array(
        "id_project" => $id_prodet,
        "id_progress" => $status,
        "tittle" => $tittle,
        "issue" => $issue,
        "list_activity" =>$list_activity,
        "location" => $location,
        "date_end_week" => $end_week,
        "date_complete" => $complete
      );

      $respon = json_decode($this->APICoreLogbook->Apiput($this->url."/logbookNw/".$id_logbook, $body));
      if($respon==null){
        $array=array('status' => '0','message' => 'API not response . please contact administrator');
        $this->session->set_flashdata('message', $array);
      } else if($respon->code =='1'){
        $array=array('status' => '1','message' => 'Data has been update ');
        $this->session->set_flashdata('message', $array);
      } else {
        $array=array('status' => '0','message' => $respon->data);
        $this->session->set_flashdata('message', $array);
      }
      redirect('logbookNw');
    }

    function delete($id){
      $respon = json_decode($this->APICoreLogbook->Apidel($this->url."/logbookNw/".$id));
      if($respon==null){
        $array=array('status' => '0','message' => 'API not response . please contact administrator');
        $this->session->set_flashdata('message', $array);
      } else if($respon->code =='1'){
        $array=array('status' => '1','message' => 'Data has been deleted.. ');
        $this->session->set_flashdata('message', $array);
      } else {
        $array=array('status' => '0','message' => $respon->data);
        $this->session->set_flashdata('message', $array);
      }
      redirect('logbookNw');
    }

    function getPIC(){
      $id_client = $this->input->post('id_client');
      $id_type_project = $this->input->post('id_type_project');
      $clients = $this->session->userdata('clients');
      
      $respon = [];
      if ($id_type_project == "1" || $id_type_project == "2") {
        $respon = $this->session->userdata('pics');
      } else {
        foreach ($clients as $key => $client) {
          if($client->id_client==$id_client){
            $respon = $client->list_pic;
            break;
          } 
        }
      }
      echo json_encode($respon);
    }

    function getClient(){
      $id_project = $this->input->post('id_project');
      $clients = []; $pics = [];
      if ($id_project == "61" || $id_project == "62") {
        $clients = json_decode($this->APICoreLogbook->Apiget($this->url."/client"));
        $pics = json_decode($this->APICoreLogbook->Apiget($this->url."/pic"));
        if ($clients->code ==1) {
          $clients = $clients->data;
        }
        if ($pics->code ==1) {
          $pics = $pics->data;
        }

      } else {
        $clients = json_decode($this->APICoreLogbook->Apiget($this->url."/projectdetail/project/".$id_project));      
        if ($clients->code ==1) {
          $clients = $clients->data;
        }
      }
      
      $sess_array = array(
        'clients' => $clients,
        'pics' => $pics
      );
      $this->session->set_userdata($sess_array); 
      echo json_encode($clients);
    }

    function getLogbook(){
      // $id_logbook = $id;
      $id_logbook = $this->input->post('id_logbook');
      $logbooks = $this->session->userdata('logbooks');
      $data = null;
      foreach ($logbooks as $key => $logbook) {
        if($logbook->id_logbook==$id_logbook){
          $data = $logbook;
          break;
        } 
      }
      echo json_encode($data);
    }
    
    function view(){
      $authorization = $this->input->get('auth');
      $hash = hash('sha256',$this->session->userdata('auth'));
      $id = base64_decode($this->input->get('mask'));
      
      if($authorization != $hash){
          $array=array('status' => '0','message' => 'You not authorized!');
          $this->session->set_flashdata('message', $array);
          redirect('logbookNw');
      }

      $logbook = json_decode($this->APICoreLogbook->Apiget($this->url."/logbookNw/".$id))->data;
      if ($logbook == null) {
          $array=array('status' => '0','message' => 'Cant Request - Contact Administrator');
          $this->session->set_flashdata('message', $array);
          redirect('logbookNw');
      }

      $data["idlogbook"] = $this->getNomor($logbook->id_logbook,$logbook->id_project,$logbook->id_project_detail,$logbook->id_pegawai,$logbook->id_pic);
      $data["logbook"] = $logbook;
      $data["jumlah"] = 0;
      $this->load->view('frame/a_header');
      $this->load->view('frame/b_nav');
      $this->load->view('page/logbooknw/viewLogbook',$data);
      $this->load->view('frame/d_footer2');
    }

    function viewUpd(){
      $authorization = $this->input->get('auth');
      $hash = hash('sha256',$this->session->userdata('auth'));
      $id = base64_decode($this->input->get('mask'));
      
      if($authorization != $hash){
          $array=array('status' => '0','message' => 'You not authorized!');
          $this->session->set_flashdata('message', $array);
          redirect('logbookNw');
      }

      $logbook = json_decode($this->APICoreLogbook->Apiget($this->url."/logbookNw/".$id))->data;
      if ($logbook == null) {
          $array=array('status' => '0','message' => 'Cant Request - Contact Administrator');
          $this->session->set_flashdata('message', $array);
          redirect('logbookNw');
      }

      $data["idlogbook"] = $this->getNomor($logbook->id_logbook,$logbook->id_project,$logbook->id_project_detail,$logbook->id_pegawai,$logbook->id_pic);
      $data["logbook"] = $logbook;
      $data["jumlah"] = 1;
      $this->load->view('frame/a_header');
      $this->load->view('frame/b_nav');
      $this->load->view('page/logbooknw/updateLogbook',$data);
      $this->load->view('frame/d_footer2');
    }

    function viewCrt(){
      $authorization = $this->input->get('auth');
      $hash = hash('sha256',$this->session->userdata('auth'));
      $id = base64_decode($this->input->get('mask'));
      $nik = $this->session->userdata('nik');
      if($authorization != $hash){
          $array=array('status' => '0','message' => 'You not authorized!');
          $this->session->set_flashdata('message', $array);
          redirect('logbookNw');
      }
      $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project/nik/".$nik))->data;
      $data["jumlah"] = 1;
      $data["projects"] = $projects;
      $this->load->view('frame/a_header');
      $this->load->view('frame/b_nav');
      $this->load->view('page/logbooknw/createLogbook',$data);
      $this->load->view('frame/d_footer2');
    }

    function viewPro(){
      $data['tes'] ='tes';
      $data['jumlah'] = 4;
      $this->load->view('frame/a_header');
      $this->load->view('frame/b_nav');
      $this->load->view('page/logbooknw/viewPro',$data);
      $this->load->view('frame/d_footer2');
    }

    function getNomor($id_logbook,$id_project,$id_prodet,$pgw,$pic){
      $pjg_logbook = strlen((string) $id_logbook);
      $pjg_project = strlen((string) $id_project);
      $pjg_prodet = strlen((string) $id_prodet);
      $pjg_pgw = strlen((string) $pgw);
      $pjg_pic = strlen((string) $pic);
      if ($pjg_logbook == 1) {
        $LB = "LB000".$id_logbook;
      } elseif ($pjg_logbook == 2) {
        $LB = "LB00".$id_logbook;
      } elseif ($pjg_logbook == 3) {
        $LB = "LB0".$id_logbook;
      } else {
        $LB = "LB" .$id_logbook;
      }
      if ($pjg_project == 1) {
        $PR = "PR00".$id_project;
      } elseif ($pjg_project == 2) {
        $PR = "PR0".$id_project;
      } else {
        $PR = "PR" .$id_project;
      }
      if ($pjg_prodet == 1) {
        $PD = "PD00".$id_prodet;
      } elseif ($pjg_prodet == 2) {
        $PD = "PD0".$id_prodet;
      } else {
        $PD = "PD" .$id_prodet;
      }
      if ($pjg_pgw == 1) {
        $PG = "PG00".$pgw;
      } elseif ($pjg_pgw == 2) {
        $PG = "PG0".$pgw;
      } else {
        $PG = "PG" .$pgw;
      }
      if ($pjg_pic == 1) {
        $PC = "PC00".$pic;
      } elseif ($pjg_pic == 2) {
        $PC = "PC0".$pic;
      } else {
        $PC = "PC" .$pic;
      }
      return $LB.$PR.$PD.$PG.$PC;
    }

    function add_prodet(){
      //HASH UNTUK REDIRECT ke halaman ini.
      $token = hash('sha256',$this->session->userdata('auth'));
      $mask = base64_encode('05061996');
      $hash = '?auth='.$token.'&mask='.$mask;
      //ID UTAMA UNIQ
      $id_project = $this->input->post("add_rel_id_project");//uniq
      $add_rel_id_pic = $this->input->post("add_rel_id_pic");//uniq
      $add_rel_id_client = $this->input->post("add_rel_id_client");  //uniq

      $add_nm_pic = "";
      $add_slc_pic = null;
      if ($add_rel_id_pic == null) {
          $add_rel_id_pic = "0";
          $status_pic = $this->input->post("status_pic");
          $add_nm_pic = $this->input->post("add_nm_pic");
          $add_note_pic = $this->input->post("add_note_pic");
          $add_slc_pic = $this->input->post("add_slc_pic");  //uniq
      }
      $add_nm_client = "";
      $add_note_client = "";
      if ($add_rel_id_client == null) {
        $add_rel_id_client = "0";
        $add_nm_client = $this->input->post("add_nm_client");
        $add_note_client = $this->input->post("add_note_client");
      }

      $body = array(
        "id_project" => $id_project,
        "id_client" => $add_rel_id_client,
        "id_pic" => $add_rel_id_pic,
        "nama_client" => $add_nm_client,
        "note_client" => $add_note_client,
        "nama_pic" => $add_nm_pic,
        "status_pic" => $status_pic,
        "id_internal_pic" => $add_slc_pic,
        "note_pic" => $add_note_pic
      );

      $respon = json_decode($this->APICoreLogbook->Apipost($this->url."/projectdetail/dinamis", $body));
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
      redirect('logbookNw/viewCrt'.$hash);
    }

    function add_clipic(){
      //HASH UNTUK REDIRECT ke halaman ini.
      $token = hash('sha256',$this->session->userdata('auth'));
      $mask = base64_encode('05061996');
      $hash = '?auth='.$token.'&mask='.$mask;
            
      $flag = $this->input->post('add_radio_clipic');
      //JIKA 0 nambahin client jika 1 nambahin PIC
      if ($flag == 0) {
        $nama_client = $this->input->post('clipic_nm_client');
        $note_client = $this->input->post('clipic_note');

        $body = array("nama_client" =>$nama_client,
          "note" => $note_client
        );
        $respon = json_decode($this->APICoreLogbook->Apipost($this->url."/client", $body));
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
        redirect('logbookNw/viewCrt'.$hash);
      } 
      
      else {

        $nama_pic = $this->input->post('clipic_nm_pic');
        $note_pic = $this->input->post('clipic_note_pic');
        $status_pic = $this->input->post('clipic_status_pic');
        $pic_id = $this->input->post('clipic_slc_pic');
        
        if($status_pic=="0"){ //ini external
          if($nama_pic==null){
            $array=array('status' => '0','message' => 'Please Nama PIC required..');
            $this->session->set_flashdata('message', $array);
            redirect('logbookNw/viewCrt'.$hash);
          }
          $pic_id = null;
        } else { //ini internal
          if($pic_id==null){
            $array=array('status' => '0','message' => 'Please select your PIC..');
            $this->session->set_flashdata('message', $array);
            redirect('logbookNw/viewCrt'.$hash);
          }
        }

        $body = array("status" =>$status_pic,
        "nama_pic" =>$nama_pic,
        "id_internal" =>$pic_id,
        "note" => $note_pic
        );

        $respon = json_decode($this->APICoreLogbook->Apipost($this->url."/pic", $body));
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
        redirect('logbookNw/viewCrt'.$hash);
      }
    }

    public function export(){
      // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
      $logbooks = $this->session->userdata('logbooks_project');
      if($logbooks==null){
        $this->session->set_flashdata('message',"List Logbook empty..");
        redirect("logbook");
      }
      
      // Load plugin PHPExcel nya
      include APPPATH.'third_party/PHPExcel/PHPExcel.php';
      $today = date('d M Y');
      $user = $this->session->userdata('full_name');
      $divisi= $this->session->userdata('nmdivisi');
      $subdiv = $this->session->userdata('nmsubdiv');
      // Panggil class PHPExcel nya
      $excel = new PHPExcel();
      // Settingan awal fil excel
      $excel->getProperties()->setCreator($user)->setLastModifiedBy($today)->setTitle("List Logbook ".$today)->setSubject("List Logbook")->setDescription("List Logbook ")->setKeywords("Logbook");
      // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
      $style_col = array(
        'font' => array('bold' => true), // Set font nya jadi bold
        'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
          'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
          'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
          'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
          'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
        )
      );
      // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
      $style_row = array(
        'alignment' => array(
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        ),
        'borders' => array(
          'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
          'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
          'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
          'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
        )
      );

      foreach ($logbooks as $key => $lb_project) {
        
        $nama_project = $lb_project->nama_project;
        $excel->setActiveSheetIndex($key)->setCellValue('A1', "LIST LOGBOOK : ". $subdiv);
        $excel->getActiveSheet()->mergeCells('A1:E1');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        $excel->setActiveSheetIndex($key)->setCellValue('A2', "PT Graha Informatika Nusantara");
        $excel->getActiveSheet()->mergeCells('A2:E2');
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(FALSE);
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
        $excel->setActiveSheetIndex($key)->setCellValue('A4', "Project\t: ". $nama_project);
        $excel->getActiveSheet()->mergeCells('A4:C4');
        $excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A4')->getFont()->setSize(12);
        $excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        $excel->setActiveSheetIndex($key)->setCellValue('A5', "User\t: ". $user);
        $excel->getActiveSheet()->mergeCells('A5:C5');
        $excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(12);
        $excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        $excel->setActiveSheetIndex($key)->setCellValue('A6', "Divisi\t: ". $divisi);
        $excel->getActiveSheet()->mergeCells('A6:C6');
        $excel->getActiveSheet()->getStyle('A6')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A6')->getFont()->setSize(12);
        $excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        $excel->setActiveSheetIndex($key)->setCellValue('A7', "Sub Divisi\t: ". $subdiv);
        $excel->getActiveSheet()->mergeCells('A7:C7');
        $excel->getActiveSheet()->getStyle('A7')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A7')->getFont()->setSize(12);
        $excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        $excel->setActiveSheetIndex($key)->setCellValue('A8', "Tanggal\t: ". $today);
        $excel->getActiveSheet()->mergeCells('A8:C8');
        $excel->getActiveSheet()->getStyle('A8')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A8')->getFont()->setSize(12); 
        $excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        // Buat header tabel nya pada baris ke 2
        $excel->setActiveSheetIndex($key)->setCellValue('A10', "No");
        $excel->setActiveSheetIndex($key)->setCellValue('B10', "Client Name");
        $excel->setActiveSheetIndex($key)->setCellValue('C10', "Employee Name");
        $excel->setActiveSheetIndex($key)->setCellValue('D10', "PIC Name");
        $excel->setActiveSheetIndex($key)->setCellValue('E10', "Issue");
        $excel->setActiveSheetIndex($key)->setCellValue('F10', "Date Target");
        $excel->setActiveSheetIndex($key)->setCellValue('G10', "Time Target"); 
        $excel->setActiveSheetIndex($key)->setCellValue('H10', "Activity"); 
        $excel->setActiveSheetIndex($key)->setCellValue('I10', "Note");
        $excel->setActiveSheetIndex($key)->setCellValue('J10', "Status");
        $excel->setActiveSheetIndex($key)->setCellValue('K10', "Date Start");
        $excel->setActiveSheetIndex($key)->setCellValue('L10', "Time Start");
        $excel->setActiveSheetIndex($key)->setCellValue('M10', "Actual Complete Date");
        $excel->setActiveSheetIndex($key)->setCellValue('N10', "Time Actual");
        $excel->setActiveSheetIndex($key)->setCellValue('O10', "Location");
        $excel->setActiveSheetIndex($key)->setCellValue('P10', "Tittle");
    
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O10')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('P10')->applyFromArray($style_col);
      
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 11; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($lb_project->list_logbook as $key1 => $data){ // Lakukan looping pada variabel siswa
          $tittle = "";
          if($data->tittle != null){
            $tittle = $data->tittle;
          }
          
          if ($key1 == 0) {
            $excel->setActiveSheetIndex($key)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex($key)->setCellValue('B'.$numrow, $data->nm_client);
            $excel->setActiveSheetIndex($key)->setCellValue('C'.$numrow, $data->nama_pegawai);
            $excel->setActiveSheetIndex($key)->setCellValue('D'.$numrow, $data->lb_pic->nama_pic);
            $excel->setActiveSheetIndex($key)->setCellValue('E'.$numrow, $data->issue);
            $excel->setActiveSheetIndex($key)->setCellValue('F'.$numrow, date("d-m-Y",strtotime($data->date_target)));
            $excel->setActiveSheetIndex($key)->setCellValue('G'.$numrow, date("H:i:s",strtotime($data->date_target)));   
            $excel->setActiveSheetIndex($key)->setCellValue('O'.$numrow, $data->location);  
            $excel->setActiveSheetIndex($key)->setCellValue('P'.$numrow, $tittle);       
          }

          foreach ($data->list_activity as $key2 => $activity) {   
            $excel->setActiveSheetIndex($key)->setCellValue('H'.$numrow, $key2+1 .". ".$activity->activity);
            $excel->setActiveSheetIndex($key)->setCellValue('I'.$numrow, $key2+1 .". ".$activity->note);

            if($data->id_progress == '3'){
              $status_lb = "Hold";
            } else if ($activity->status == '2'){
              $status_lb = "Done";
            } else if ($activity->status == '1') {
              $status_lb = "Progress";
            } else {
              $status_lb = "";
            }
            $excel->setActiveSheetIndex($key)->setCellValue('J'.$numrow, $status_lb);

            $excel->setActiveSheetIndex($key)->setCellValue('K'.$numrow, date("d-m-Y",strtotime($activity->date_start)));
            $excel->setActiveSheetIndex($key)->setCellValue('L'.$numrow, date("H:i:s",strtotime($activity->date_start)));     
            $excel->setActiveSheetIndex($key)->setCellValue('M'.$numrow, date("d-m-Y",strtotime($activity->date_complete)));
            $excel->setActiveSheetIndex($key)->setCellValue('N'.$numrow, date("H:i:s",strtotime($activity->date_complete)));
            
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
            
            $numrow++; // Tambah 1 setiap kali looping
          }
          $no++; // Tambah 1 setiap kali looping
        }
        // Set width kolom

        $excel->setActiveSheetIndex($key)->setCellValue('A10', "No");
        $excel->setActiveSheetIndex($key)->setCellValue('B10', "Client Name");
        $excel->setActiveSheetIndex($key)->setCellValue('C10', "Employee Name");
        $excel->setActiveSheetIndex($key)->setCellValue('D10', "PIC Name");
        $excel->setActiveSheetIndex($key)->setCellValue('E10', "Issue");
        $excel->setActiveSheetIndex($key)->setCellValue('F10', "Date Target");
        $excel->setActiveSheetIndex($key)->setCellValue('G10', "Time Target"); 
        $excel->setActiveSheetIndex($key)->setCellValue('H10', "Activity"); 
        $excel->setActiveSheetIndex($key)->setCellValue('I10', "Note");
        $excel->setActiveSheetIndex($key)->setCellValue('J10', "Status");
        $excel->setActiveSheetIndex($key)->setCellValue('K10', "Date Start");
        $excel->setActiveSheetIndex($key)->setCellValue('L10', "Time Start");
        $excel->setActiveSheetIndex($key)->setCellValue('M10', "Actual Complete Date");
        $excel->setActiveSheetIndex($key)->setCellValue('N10', "Time Actual");
        $excel->setActiveSheetIndex($key)->setCellValue('O10', "Location");
        $excel->setActiveSheetIndex($key)->setCellValue('P10', "Tittle");

        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(10); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(10); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(10); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(10); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); // Set width kolom E
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet($key)->setTitle($nama_project);
        // Proses file excel  
        $excel->createSheet();
        }
        $excel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="List_logbook.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}
?>