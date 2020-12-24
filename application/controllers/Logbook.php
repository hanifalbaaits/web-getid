<?php 
class Logbook extends CI_Controller{
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

    function index(){ 
      $nik = $this->session->userdata('nik');
      $level = $this->session->userdata('level');
      $start_date = $this->input->post('start_date');
      $end_date = $this->input->post('end_date');
      $week_date = $this->input->post('week_date');
      $search = true;
      $temp = null;
      
      if($start_date == null && $end_date == null && $week_date == null){
        if($level == 'administrator' || $level == 'developer'){
          $logbooks = json_decode($this->APICoreLogbook->Apiget($this->url."/logbook"))->data;
          $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project"))->data;
        } else {
          $logbooks = json_decode($this->APICoreLogbook->Apiget($this->url."/logbook/home/".$nik))->data;
          $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project/nik/".$nik))->data;
        }
        $temp = "Pada minggu ini anda memiliki ".count($logbooks)." logbook.";
        $search = false;
        $data["projects"] = $projects;
      } else if ($start_date != null && $end_date != null){

        $body = array("startdate" =>$start_date,
        "enddate" =>$end_date
        );
        $logbooks = json_decode($this->APICoreLogbook->Apipost($this->url."/logbook/search/".$nik, $body))->data;
        $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project/nik/".$nik))->data;
        $temp = "Logbook anda dari ".$start_date." ke ".$end_date. ", anda memiliki ".count($logbooks)." logbook.";
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
        $logbooks = json_decode($this->APICoreLogbook->Apipost($this->url."/logbook/search/".$nik, $body))->data;
        $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project/nik/".$nik))->data;
        $data["projects"] = $projects;
        $temp = $temp . "anda memiliki ".count($logbooks)." logbook.";
      }

      $pics = json_decode($this->APICoreLogbook->Apiget($this->url."/pic"))->data;
      $clients = json_decode($this->APICoreLogbook->Apiget($this->url."/client"))->data;
      $data["search"] = $search;
      $data["logbooks"] = $logbooks;
      $data["pics"] = $pics;
      $data["clients"] = $clients;
      $data["info"] = $temp;
      $sess_array = array(
        'logbooks' => $logbooks,
        'projects' => $projects,
        'pics' => $pics,
        'clients' => $clients
      );

      $this->session->set_userdata($sess_array);
      $this->load->view('frame/a_header');
      $this->load->view('frame/b_nav');
      $this->load->view('page/logbook',$data);
      $this->load->view('frame/d_footer');
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
      if($add_type !=0){
        $tittle = $this->input->post('add_tittle');
      }

      $date_start = $this->input->post('add_date_start');
      $time_start = $this->input->post('add_time_start');
      // $start = date('d/m/Y',strtotime($date_start))." ".$time_start.":00";
      $start = $date_start." ".$time_start.":00";
      $date_target = $this->input->post('add_date_target');
      $time_target = $this->input->post('add_time_target');
      // $target = date('d/m/Y',strtotime($date_target))." ".$time_target.":00";
      $target = $date_target." ".$time_target.":00";
      $complete =  null;

      $issue = $this->input->post('add_issue');
      $activity = $this->input->post('add_activity');
      $location = $this->input->post('add_location');
      $note = $this->input->post('add_note');
      $date_complete = $this->input->post('add_date_complete');
      $time_complete = $this->input->post('add_time_complete');
      if($status=="2"){
        // $complete = date('d/m/Y',strtotime($date_complete))." ".$time_complete.":00";
        $complete = $date_complete." ".$time_complete.":00";
      }

      $body = array("flag_lembur" =>"0",
        "id_project" =>$id_project,
        "id_progress" =>$status,
        "id_pegawai" => $this->session->userdata("iduser"),
        "id_client" =>$id_client,
        "id_pic" =>$id_pic,
        "tittle" =>$tittle,
        "issue" => $issue,
        "activity" =>$activity,
        "note" =>$note,
        "location" => $location,
        "date_start" =>$start,
        "date_target" =>$target,
        "date_end_week" => $end_week,
        "date_complete" => $complete
    );
    
      $respon = json_decode($this->APICoreLogbook->Apipost($this->url."/logbook", $body));
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
      redirect('logbook');
    }

    function update(){ 
      $end_week = date("d/m/Y", strtotime('sunday this week'))." 00:00:00";
      $id_logbook = $this->input->post('edit_id_logbook');
      $id_prodet = $this->input->post('edit_id_prodet');
      $id_project = $this->input->post('edit_id_project_id');
      // $id_client = $this->input->post('edit_id_client');
      // $id_pic = $this->input->post('edit_id_pic');
      $tittle = $this->input->post('edit_tittle');
      $status = $this->input->post('edit_status');

      // $date_start = $this->input->post('edit_date_start');
      // $time_start = $this->input->post('edit_time_start');
      // $start = date('d/m/Y',strtotime($date_start))." ".$time_start.":00";
      // $date_target = $this->input->post('edit_date_target');
      // $time_target = $this->input->post('edit_time_target');
      // $target = date('d/m/Y',strtotime($date_target))." ".$time_target.":00";
      $complete =  null;

      $issue = $this->input->post('edit_issue');
      $activity = $this->input->post('edit_activity');
      $location = $this->input->post('edit_location');
      $note = $this->input->post('edit_note');
      $date_complete = $this->input->post('edit_date_complete');
      $time_complete = $this->input->post('edit_time_complete');
      if($status=="2"){
        if($date_complete == null){
          $array=array('status' => '0','message' => 'Need date complete!');
          $this->session->set_flashdata('message', $array);
          redirect('logbook');
        } else {
          // $complete = date('d/m/Y',strtotime($date_complete))." ".$time_complete.":00";
          $complete = $date_complete." ".$time_complete.":00";
        }
      }

      $body = array(
        "id_project" => $id_prodet,
        "id_progress" => $status,
        "tittle" => $tittle,
        "issue" => $issue,
        "activity" =>$activity,
        "note" =>$note,
        "location" => $location,
        "date_end_week" => $end_week,
        "date_complete" => $complete
      );
      
      $respon = json_decode($this->APICoreLogbook->Apiput($this->url."/logbook/".$id_logbook, $body));
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
      redirect('logbook');
    }

    function delete($id){
      $respon = json_decode($this->APICoreLogbook->Apidel($this->url."/logbook/".$id));
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
      redirect('logbook');
    }

    function getPIC(){
      $id_pic = $this->input->post('id_pic');
      $pics = $this->session->userdata('pics');
      $data = null;
      foreach ($pics as $key => $pic) {
        if($pic->id_pic==$id_pic){
          $data = $pic;
          break;
        } 
      }
      echo $data->nama_pic;
    }

    function getProject(){
      $id_project = $this->input->post('id_project');
      $projects = $this->session->userdata('projects');
      $data = null;
      $nama_project = "";
      if ($id_project == 61) {
        $nama_project = "SUPPORT";
      } else if ($id_project == 62) {
        $nama_project = "MANAGEMENT";
      } else {
        foreach ($projects as $key => $project) {
          if($project->id_project==$id_project){
            $data = $project;
            $nama_project = $project->nama_project;
            break;
          } 
        }
      }
      echo $nama_project;
    }

    function getClient(){
      $id_client = $this->input->post('id_client');
      $clients = $this->session->userdata('clients');
      $data = null;
      foreach ($clients as $key => $client) {
        if($client->id_client==$id_client){
          $data = $client;
          break;
        } 
      }
      echo $data->nama_client;
    }

    function getLogbook(){
      $id_logbook = $this->input->post('id_logbook');
      $logbooks = $this->session->userdata('logbooks');
      $data = null;
      $date_complete = "";
      $time_complete = "";
      $date_mod = "";
      $time_mod = "";
      foreach ($logbooks as $key => $logbook) {
        if($logbook->id_logbook==$id_logbook){
          $data = $logbook;
          break;
        } 
      }
      if($data->id_progress=='1'){$status = "Progress";}else if($data->id_progress=='2'){$status="Done";
        $date_complete = date('d M Y',strtotime($data->date_complete));
        $time_complete = date('H:i:s',strtotime($data->date_complete));  
      }else{$status="Hold";}
      $date_start = date('d M Y',strtotime($data->date_start));
      $time_start = date('H:i:s',strtotime($data->date_start));
      $date_target = date('d M Y',strtotime($data->date_target));
      $time_target = date('H:i:s',strtotime($data->date_target));
      if ($data->date_modified != "") {
        $date_mod = date('d M Y',strtotime($data->date_modified));
        $time_mod = date('H:i:s',strtotime($data->date_modified));   
      }
      echo $data->nama_project."|".
      $data->nm_client."|".
      $data->lb_pic->nama_pic."|".
      $data->location."|".
      $status."|".
      $data->issue."|".
      $data->activity."|".
      $data->note."|".
      $date_start."|".
      $time_start."|".
      $date_target."|".
      $time_target."|".
      $date_complete."|".
      $time_complete."|".
      $data->tittle."|".
      $date_mod."|".
      $time_mod;
    }

   
  public function export(){
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $logbooks = $this->session->userdata('logbooks');
    if($logbooks==null){
      $this->session->set_flashdata('message',"List Logbook empty..");
      redirect("logbook");
    }
    
    
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    $today = date('d/m/y');
    $user = $this->session->userdata('full_name');
    $divisi= $this->session->userdata('nmdivisi');
    $subdiv = $this->session->userdata('nmsubdiv');
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator($user)
                 ->setLastModifiedBy($today)
                 ->setTitle("List Logbook ".$today)
                 ->setSubject("List Logbook")
                 ->setDescription("List Logbook ")
                 ->setKeywords("Logbook");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "LIST LOGBOOK : ". $subdiv); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    
    
    $excel->setActiveSheetIndex(0)->setCellValue('A2', "PT Graha Informatika Nusantara"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A2:E2'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(FALSE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    
    $excel->setActiveSheetIndex(0)->setCellValue('A4', "User\t: ". $user); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A4:C4'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A4')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1

    $excel->setActiveSheetIndex(0)->setCellValue('A5', "Divisi\t: ". $divisi); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A5:C5'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1

    $excel->setActiveSheetIndex(0)->setCellValue('A6', "Sub Divisi\t: ". $subdiv); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A6:C6'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A6')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A6')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1

    $excel->setActiveSheetIndex(0)->setCellValue('A7', "Tanggal\t: ". $today); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A7:C7'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A7')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A7')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT); // Set text center untuk kolom A1

    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A10', "No"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B10', "Project Name"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C10', "Client Name"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D10', "Employee Name"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('E10', "PIC Name"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('F10', "Issue"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('G10', "Date Start"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H10', "Time Start"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('I10', "Date Target"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('J10', "Time Target"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('K10', "Activity"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('L10', "Location"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('M10', "Actual Complete Date"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('N10', "Time Actual"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('O10', "Status"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('P10', "Note"); // Set kolom E3 dengan tulisan "ALAMAT"
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
    foreach($logbooks as $data){ // Lakukan looping pada variabel siswa
      $tittle = "";
      if($data->tittle != null){
        $tittle = " | ".$data->tittle;
      }
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_project.$tittle);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nm_client);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_pegawai);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->lb_pic->nama_pic);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->issue);


      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, date("d-m-Y",strtotime($data->date_start)));
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, date("H:i:s",strtotime($data->date_start)));
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, date("d-m-Y",strtotime($data->date_target)));
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, date("H:i:s",strtotime($data->date_target)));
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->activity);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->location);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, date("d-m-Y",strtotime($data->date_complete)));
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, date("H:i:s",strtotime($data->date_complete)));
      
      if($data->id_progress == '1'){
        $status_lb = "Progress";
      } else if ($data->id_progress = '2'){
        $status_lb = "Done";
      } else {
        $status_lb = "Hold";
      }
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $status_lb);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->note);
      
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
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(10); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(10); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(20); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); // Set width kolom E
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan data logbook");
    $excel->setActiveSheetIndex(0);
    // Proses file excel

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="List_logbook.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
    }
}
?>