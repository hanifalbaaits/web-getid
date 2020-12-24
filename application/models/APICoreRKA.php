<?php
class APICoreRKA extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->url = $this->config->item('url-corerka');
        $this->authorization = $this->config->item('rka-authorization');
        $this->session_key = $this->config->item('session-key');

        if($this->session->userdata('logcode') != $this->session_key){
            $array=array('status' => '0','message' => 'Your session Expired. Login Again .. !');
            $this->session->set_flashdata('message', $array);
            redirect('login');
        }
    }

    function Apiget($url){
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

    function getStatus(){ //ambil data logbook untuk home dashboard by nik
        $url = $this->url."/status";
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

    function getLogbookHome($nik){ //ambil data logbook untuk home dashboard by nik
        $url = $this->url."/logbook/home/".$nik;
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

    function getChart($nik) {
        $url = $this->url."/dashboard/".$nik;
        $header = array (
            "Authorization: $this->authorization"
        );
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
      }

    function Apipost($url, $body) {
        $header = array (
            "Authorization: $this->authorization",
            "content-type:application/json"
        );
        $arr=json_encode($body);
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $arr);
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
    }
    
    function Apidel($url) {
        $header = array (
            "Authorization: $this->authorization",
            "content-type:application/json"
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
    }
    function Apiput($url, $body) {
        $header = array (
            "Authorization: $this->authorization",
            "content-type:application/json"
        ); 
        $arr = json_encode($body); 
        $curl = curl_init($url); 
        curl_setopt($curl, CURLOPT_HEADER, false); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT"); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
        curl_setopt($curl, CURLOPT_POST, true); 
        curl_setopt($curl, CURLOPT_POSTFIELDS, $arr); 
        $json_response = curl_exec($curl); 
        curl_close($curl); 
        return $json_response; 
    }

    function Apipost_upload($url, $body) {
        $header = array (
            "Authorization: $this->authorization",
            "Content-Type:multipart/form-data"
        );
      
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => $header,
        ));

        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
    }
}