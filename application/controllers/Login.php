<?php

class Login extends CI_Controller {  
    function __construct(){
        parent::__construct();

        $this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('session');
        $this->load->model("APISimpokLumen");
        $this->load->model("APIGetIt");
        $this->load->model("User_model");
        $this->session_key = $this->config->item('session-key');
    }

    function index(){
        if($this->session->userdata("logcode") != $this->session_key){
            $this->load->view('page/login');
        } else {
            redirect("home");
        }
    }
    
    function user_login() {
        // $username = $this->input->post('username');
        // $password = $this->input->post('password');
        $username = "tsp15";
        $password = "11111";

        $respon = $this->APIGetIt->getLogin($username,$password);

        if ($respon == null) {
            $array=array('status' => '0','message' => 'Gagal Login');
            $this->session->set_flashdata('message', $array);
        } else if (count($respon) == 0) {
            $array=array('status' => '0','message' => 'Gagal Login');
            $this->session->set_flashdata('message', $array);
        } else {

            $rsp = $respon[0]->User_LoginResponse->User_LoginResult;
            $rspx = explode("|",$rsp); //0|succed

            if ($rspx == null || count($rspx) == 0) {
                $array=array('status' => '0','message' => 'Gagal Login');
                $this->session->set_flashdata('message', $array);
            } elseif ($rspx[0] == "1") {
                $array=array('status' => '0','message' => 'Gagal Login');
                $this->session->set_flashdata('message', $array);
            } else {

                $respon1 = $this->APIGetIt->getInfoByUsername($username);
                if ($respon1 == null || count($respon1) == 0) {
                    $array=array('status' => '0','message' => 'Gagal Login');
                    $this->session->set_flashdata('message', $array);
                } else {

                    if ($respon1[0]->status == "INACTIVE-bypass") { //INACTIVE
                        $array=array('status' => '0','message' => 'Gagal Login. Status Inactive');
                        $this->session->set_flashdata('message', $array);
                    } else {

                        $respon2 = $this->APIGetIt->getSaldoByUsername($username);
                        if ($respon2 == null || count($respon2) == 0) {
                            $array=array('status' => '0','message' => 'Gagal Login');
                            $this->session->set_flashdata('message', $array);
                        } else {

                            $this->setSession($respon1[0],$respon2[0]);
                            // $array=array('status' => '1','message' => 'Berhasil');
                            // $this->session->set_flashdata('message', $array);
                        }
                    }
                }
            }
        }
        redirect('login');
    }

    function setSession($info,$api_saldo) {
        $saldo = $api_saldo->Balance_User_selectResponse->Balance_User_selectResult;
        $xx = $info->iduser.date('d/m/y/h/i').$this->session_key;
        $authorization = md5($xx);
        $sess_array = array(
            'logcode' => $this->session_key,
            'guid' => "$info->guid",
            'storeid' => "$info->storeid",
            'storename' => "$info->storename",
            'address' => "$info->address",
            'city' => "$info->city",
            'province' => "$info->province",
            'region' => "$info->region",
            'type' => "$info->type",
            'telephone' => "$info->telephone",
            'email' => "$info->email",
            'deviceid' => "$info->deviceid",
            'openingdate' => "$info->openingdate",
            'status' => "$info->status",
            'saldo' => "$saldo",
            'auth' => "$authorization",
        );
        $this->session->set_userdata($sess_array);
    }

    function user_logout() {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

    function test_config(){
    // $config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    // $config['base_url'] .= "://".$_SERVER['HTTP_HOST'];
    // $config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    var_dump($_SERVER);
    echo "<br /><br /><br />";
    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $HOST = (
    ((isset($_SERVER['HTTP_X_FORWARDED_HOST']) && $_SERVER['HTTP_X_FORWARDED_HOST'] == "aplikasi2.gratika.id") ?
    "://aplikasi2.gratika.id" :
    ((isset($_SERVER['HTTP_X_FORWARDED_HOST']) && $_SERVER['HTTP_X_FORWARDED_HOST'] == "www.gratika.co.id") ?
    "://www.gratika.co.id" :
    "://10.0.1.90"))
    );
    $base_url .= $HOST."/logbook/";
    echo "<b>$base_url</b>";
    }
}
?>