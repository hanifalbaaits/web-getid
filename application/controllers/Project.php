<?php 
class Project extends CI_Controller{
  function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('session');
      $this->load->model("APICoreLogbook");
      $this->load->model("APISimpokLumen");
      $this->load->model("APICoreRKA");
      $this->session_key = $this->config->item('session-key');
      $this->url = $this->config->item('url-corelogbook');
      $this->url_corerka = $this->config->item('url-corerka');
      $this->authorization = $this->config->item('core-authorization');

      if($this->session->userdata('logcode') != $this->session_key){
        $array=array('status' => '0','message' => 'Please login first .. !');
        $this->session->set_flashdata('message', $array);
        redirect('login');
      } 
  }

  function index(){ 
    $idu = $this->session->userdata('iduser');
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

    $allproject = false;

    if($level_rka == '1' || $level_rka == '4'){
        $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project"));
        $allproject = true;
    } else {

      $authorization = $this->input->get('auth');
      $hash = hash('sha256',$this->session->userdata('auth'));

      if($authorization==null){
        $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project/nik/".$this->session->userdata('nik')));
      } else {
        
        if($authorization==$hash){ //ini untuk mengambil get all project tapi staff
          $projects = json_decode($this->APICoreLogbook->Apiget($this->url."/project"));
          $allproject = true;
        } else {
          $array=array('status' => '0','message' => 'You not authorized!');
          $this->session->set_flashdata('message', $array);
          redirect('project');
        }
      }
    }
    
    $dummy = json_decode($this->APISimpokLumen->getAllDivisi())->data;
    foreach ($dummy as $key => $divisi) {
      if($divisi->status=='Y' && $divisi->idlevel=='3'){
        $alldivisi [] = $divisi;
      }
      if($divisi->status=='Y' && $divisi->idlevel=='4'){
        $allsubdiv[] = $divisi;
      }
    }
    $data["allproject"] = $allproject;
    $data["projects"] = $projects->data;
    $data["alldivisi"] = $alldivisi;
    $data["notif"] = $pesan;

    $sess_array = array('allsubdiv' => $allsubdiv);
    $this->session->set_userdata($sess_array);
    $this->load->view('frame/a_header');
    $this->load->view('frame/b_nav',$data);
    $this->load->view('page/project',$data);
    $this->load->view('frame/d_footer');
  }

  function getPIC(){
    $id_project = $this->input->post('id_project');
    $pegawais = $this->session->userdata('pegawais');
    $data = null;

    foreach ($pegawais as $key => $pgw) {
      if($pgw->iduser==$id_project){
        $data = $pgw;
        break;
      } 
    }
    if($data==null){
      echo " | | ";
      exit;
    }
    echo $data->nmjbtn . "|" .
              $data->nmdivisi . " - " .
              $data->nmsubdiv . "|" .
              "http://aplikasi2.gratika.id/gtkroom/user-images/user/".$data->images;
  }

  function getSubdiv(){
    $divisi = $this->input->post('divisi');
    $arr = "";
    // if($divisi == null || $divisi == ''){
    //   $arr = "<option value=''>Select Subdivisi..</option>";
    // } else {
      for ($i=0; $i <= count($divisi)-1 ; $i++) { 
        $dummy = json_decode($this->APISimpokLumen->getSubdivisi($divisi[$i]))->data;
        foreach ( $dummy as $in ) {
          $rst[] = array(
              'id_subdiv' => $in->id,
              'nama_subdiv' => $in->nama
          );
        }

        foreach ( $rst as $r) {
          $arr .= "<option value='$r[id_subdiv]'>$r[nama_subdiv]</option>";
        }
      }
    // }
    echo json_encode($arr);
  }

  function add_project(){
      $nama = $this->input->post('add_nm_project');
      $status = $this->input->post('status_project');
      $divisi = implode("|", $this->input->post('add_slc_division'));
      $subdiv = implode("|", $this->input->post('add_slc_subdiv'));

      $body = array("status" =>$status,
      "nama_project" =>$nama,
      "flag_coa" =>'0',
      "id_divisi" =>$divisi,
      "id_subdiv" => $subdiv
      );

      $respon = json_decode($this->APICoreLogbook->Apipost($this->url."/project", $body));
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
      redirect('project');
  }

  function edit_project(){
    $id_project = $this->input->post('edit_id_project');
    $nama = $this->input->post('edit_nm_project');
    $status = $this->input->post('edit_slc_status');
    $divisi = implode("|", $this->input->post('edit_slc_division'));
    $subdiv = implode("|", $this->input->post('edit_slc_subdiv'));
    $flag_coa = $this->input->post('edit_slc_flag');

    $id_procoa = $this->input->post('edit_id_procoa');
    $status_coa = $this->input->post('edit_status_coa');
    $nomer_coa = $this->input->post('edit_nomer_coa');
    
    echo "id_project: ".$id_project."<br />";
    echo "id_procoa: ".$id_procoa."<br />";
    echo "nama: ".$nama."<br />";
    echo "status: ".$status."<br />";
    echo "divisi: ".$divisi."<br />";
    echo "subdiv: ".$subdiv."<br />";
    echo "flag_coa: ".$flag_coa."<br />";
    echo "status_coa: ".$status_coa."<br />";
    echo "nomer_coa: ".$nomer_coa."<br />";
    
    if($id_procoa != null || $flag_coa=='1') {
      if($id_procoa == null || $status_coa ||$nomer_coa){
        $array=array('status' => '0','message' => 'Status COA and Number COA cant empty..');
        $this->session->set_flashdata('message', $array);
      }
    }

    $project = array("status" =>$status,
      "nama_project" =>$nama,
      "flag_coa" =>$flag_coa,
      "id_divisi" =>$divisi,
      "id_subdiv" => $subdiv
      );

    $procoa = array("id_project" =>$id_project,
      "no_coa" =>$nomer_coa,
      "status" =>$status_coa
      );
    
    $respon = json_decode($this->APICoreLogbook->Apiput($this->url."/project/".$id_project, $project));
    if($respon==null){
      $array=array('status' => '0','message' => 'API not response . please contact administrator');
      $this->session->set_flashdata('message', $array);
    } else if($respon->code =='1'){
      $array=array('status' => '1','message' => 'Data has been update.. ');
      $this->session->set_flashdata('message', $array);
    } else {
      $array=array('status' => '0','message' => $respon->data);
      $this->session->set_flashdata('message', $array);
    }

    if($this->session->userdata('level')=='administrator' || 
        $this->session->userdata('level')=='developer'){ //hanya development yg bisa ganti procoa
      if($flag_coa =='1' && $id_procoa==null){ //jika memiliki coa & id coa tidak ada maka API (create)
        $respon = json_decode($this->APICoreLogbook->Apipost($this->url."/procoa", $procoa));
      } else if ($flag_coa == '1' && $id_procoa !=null){ //jika memiliki coa & id coa ada maka API (update)
        $respon = json_decode($this->APICoreLogbook->Apiput($this->url."/procoa/".$id_procoa, $procoa));
      }
    }
    redirect('project');
  }

  function del_project($id){
    $respon = json_decode($this->APICoreLogbook->Apidel($this->url."/project/".$id));
    if($respon->code =='1'){
      $array=array('status' => '1','message' => 'Data has been deleted.. ');
      $this->session->set_flashdata('message', $array);
    } else {
      $array=array('status' => '0','message' => 'API not response . please contact administrator');
      $this->session->set_flashdata('message', $array);
    }
    redirect('project');
  }

  function takepro($id){
    $body = array(
      "choose" => 'take',
      "id_divisi" =>$this->session->userdata('divisi'),
      "id_subdiv" => $this->session->userdata('subdiv')
    );
    $respon = json_decode($this->APICoreLogbook->Apiput($this->url."/project/choose/".$id, $body));

    if($respon==null){
      $array=array('status' => '0','message' => 'API not response . please contact administrator');
      $this->session->set_flashdata('message', $array);
    } else if($respon->code =='1'){
      $array=array('status' => '1','message' => 'Project has been add to your division.. ');
      $this->session->set_flashdata('message', $array);
    } else {
      $array=array('status' => '0','message' => $respon->data);
      $this->session->set_flashdata('message', $array);
    }
    redirect('project');
  }

  function droppro($id){
    $body = array(
      "choose" => 'drop',
      "id_divisi" =>$this->session->userdata('divisi'),
      "id_subdiv" => $this->session->userdata('subdiv')
    );
    $respon = json_decode($this->APICoreLogbook->Apiput($this->url."/project/choose/".$id, $body));

    if($respon==null){
      $array=array('status' => '0','message' => 'API not response . please contact administrator');
      $this->session->set_flashdata('message', $array);
    } else if($respon->code =='1'){
      $array=array('status' => '1','message' => 'Project has been remove from your division..');
      $this->session->set_flashdata('message', $array);
    } else {
      $array=array('status' => '0','message' => $respon->data);
      $this->session->set_flashdata('message', $array);
    }
    redirect('project');
  }
}
?>