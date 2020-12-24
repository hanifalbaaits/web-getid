<?php
class APISimpok extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->url = $this->config->item('url-simpok');
        $this->session_key = $this->config->item('session-key');
        $this->authorization = $this->config->item('core-authorization');

      //   if($this->session->userdata('logcode') != $this->session_key){
      //     $array=array('status' => '0','message' => 'Your session Expired. Login Again .. !');
      //     $this->session->set_flashdata('message', $array);
      //     redirect('login');
      // }
    }

    function getLogin($username,$password){
      $url = $this->url."/1/$username/$password/0/350ea7e2af60c9d3824791dd122272d8";
	    $curl=curl_init($url);
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $json_response=curl_exec($curl);
      curl_close($curl);
      return $json_response;
    }

    function getAllPegawai($nik){
        if($this->session->userdata('logcode') != $this->session_key){
            $array=array('status' => '0','message' => 'Your session Expired. Login Again .. !');
            $this->session->set_flashdata('message', $array);
            redirect('login');
        }

        $url = $this->url."/pegawai/0/0/0/0";
        $data = array(
          'apiKey' => '350ea7e2af60c9d3824791dd122272d8',
          'access' => $nik,
          'apicode' => '2',
          'nik' => ''
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
      }
  
      function getAllPegawaiId($id){
        if($this->session->userdata('logcode') != $this->session_key){
          $array=array('status' => '0','message' => 'Your session Expired. Login Again .. !');
          $this->session->set_flashdata('message', $array);
          redirect('login');
        }

        $url = $this->url."/pegawai/id";
        $data = array(
          'apiKey' => '350ea7e2af60c9d3824791dd122272d8',
          'access' => 'G16001K',
          'apicode' => '2',
          'id' => $id
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
      }
  
      function getAllPegawaiNik(){
        if($this->session->userdata('logcode') != $this->session_key){
          $array=array('status' => '0','message' => 'Your session Expired. Login Again .. !');
          $this->session->set_flashdata('message', $array);
          redirect('login');
        }

        $url = $this->url."/pegawai/nik";
        $data = array(
          'apiKey' => '350ea7e2af60c9d3824791dd122272d8',
          'access' => 'G16001K',
          'apicode' => '2',
          'nik' => 'G16001K'
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
      }

      function getAllDivisi(){
        if($this->session->userdata('logcode') != $this->session_key){
          $array=array('status' => '0','message' => 'Your session Expired. Login Again .. !');
          $this->session->set_flashdata('message', $array);
          redirect('login');
        }

        $url = $this->url."/divisi/0/0/0/0";
        $data = array(
          'apiKey' => '350ea7e2af60c9d3824791dd122272d8',
          'access' => 'G16001K',
          'apicode' => '2',
          'id' => ''
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
      }

      function getSubdivisi($id){
        if($this->session->userdata('logcode') != $this->session_key){
          $array=array('status' => '0','message' => 'Your session Expired. Login Again .. !');
          $this->session->set_flashdata('message', $array);
          redirect('login');
        }

        $url = $this->url."/divisi/subdivisi/0/0/0";
        $data = array(
          'apiKey' => '350ea7e2af60c9d3824791dd122272d8',
          'access' => 'G16001K',
          'apicode' => '2',
          'id' => $id
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
      }
}