<?php
class APISimpokLumen extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->url = $this->config->item('url-lumen');
        $this->session_key = $this->config->item('session-key');
        $this->authorization = $this->config->item('lumen-authorization');
    }

    function getLogin($username,$password){
      $url = $this->url."/auth/login";
      $data = array(
        'nik' => $username,
        'password' => $password
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

    function getAllPegawai(){
        if($this->session->userdata('logcode') != $this->session_key){
            $array=array('status' => '0','message' => 'Your session Expired. Login Again .. !');
            $this->session->set_flashdata('message', $array);
            redirect('login');
        }

        $url = $this->url."/user";
        $header = array (
            "Authorization: $this->authorization"
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
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

        $url = $this->url."/user/".$id;
        $header = array (
            "Authorization: $this->authorization"
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
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

        $url = $this->url."/user/bynik/".$id;
        $header = array (
            "Authorization: $this->authorization"
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
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

        $url = $this->url."/divisi/bylevel/all";
        $header = array (
            "Authorization: $this->authorization"
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
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
       
        $url = $this->url."/unit/bydivisi/".$id;
        $header = array (
            "Authorization: $this->authorization"
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
      }
}