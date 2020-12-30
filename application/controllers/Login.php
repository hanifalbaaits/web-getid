<?php

class Login extends CI_Controller {  
    function __construct(){
        parent::__construct();

        $this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('session');
        $this->load->model("APIGetid");
        $this->session_key = $this->config->item('session-key');
        // $this->respon_null = "There was no response from the server. Please Contact Administrator!";
        $this->respon_null = "Tidak ada tanggapan dari server. Silahkan hubungi admin.";
        $this->respon_session = "Session berakhir. Login terlebih dahulu.";
    }

    function index(){
        if($this->session->userdata("logcode") != $this->session_key){
            $this->load->view('page/login');
        } else {
            redirect("home");
        }
    }

    function register(){
        if($this->session->userdata("logcode") != $this->session_key){
            $this->load->view('page/register');
        } else {
            redirect("home");
        }
    }
    
    function user_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // $username = "tsp15";
        // $password = "11111";

        $respon = $this->APIGetid->getLogin($username,$password);
        // var_dump($respon);
        if ($respon == null) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
            // echo "kesini1";
        } else if (count($respon) == 0) {
            $array=array('status' => '0','message' => 'Tidak dapat Login.');
            $this->session->set_flashdata('message', $array);
            // echo "kesini2";
        } else {

            $rsp = $respon[0]->User_LoginResponse->User_LoginResult;
            $rspx = explode("|",$rsp); //0|succed
            // var_dump($rsp);

            if ($rspx == null || count($rspx) == 0) {
                $array=array('status' => '0','message' => 'Tidak dapat Login.');
                $this->session->set_flashdata('message', $array);
                // echo "kesini3";
            } elseif ($rspx[0] == "1") {
                $array=array('status' => '0','message' => 'Tidak dapat Login, Email atau Password salah');
                $this->session->set_flashdata('message', $array);
                // echo "kesini4";
            } elseif ($rspx[0] == "2") {
                $array=array('status' => '0','message' => 'Tidak dapat Login, Akun terkunci');
                $this->session->set_flashdata('message', $array);
                // echo "kesini4";
            } else {

                $respon1 = $this->APIGetid->getInfoByUsername($username);
                // var_dump($respon1);
                if ($respon1 == null || count($respon1) == 0) {
                    // $array=array('status' => '0','message' => 'Tidak dapat Login.');
                    $array=array('status' => '0','message' => $this->respon_null);
                    $this->session->set_flashdata('message', $array);
                    // echo "kesini5";
                } else {

                    if ($respon1[0]->status == "INACTIVE") { //INACTIVE
                        $array=array('status' => '0','message' => 'Tidak dapat Login. Status Tidak Aktif');
                        $this->session->set_flashdata('message', $array);
                        // echo "kesini6";
                    } else {
                        $this->setSession($respon1[0],$password);
                    }
                }
            }
        }
        redirect('login');
    }

    function setSession($info,$password) {
        // echo "kesini7";
        $xx = $info->iduser.date('d/m/y/h/i').$this->session_key;
        $authorization = md5($xx);
        $sess_array = array(
            'logcode' => $this->session_key,
            'password' => $password,
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
            'auth' => "$authorization",
        );
        $this->session->set_userdata($sess_array);
    }

    function setSession_topup(){
        $storeid = $this->session->userdata('storeid');
        $user_topup = $this->input->post('user_topup');
        $nominal_topup = $this->input->post('nominal_topup');
        $time_topup = $this->input->post('time_topup');
        if ($storeid == $user_topup ) {
            if (date('Y-m-d H:i:s') <= date('Y-m-d H:i:s',strtotime($time_topup))) {
                $sess_array = array(
                    'nominal_topup' => $nominal_topup,
                    'time_topup' => $time_topup,
                );
                $this->session->set_userdata($sess_array);
            }
        }
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

    function user_register() {
        $fullname = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        var_dump($fullname);var_dump($email);var_dump($password);


        $respon = $this->APIGetid->register($email,$password);
        var_dump($respon);
        if ($respon == null) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
            redirect('Login/register');
        }

        $rsp = $respon[0]->Store_RegisterResponse->Store_RegisterResult;
        $rspx = explode("|",$rsp); 
        var_dump($rspx);
        if ($rspx == null || count($rspx) == 0) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
            redirect('Login/register');
        } else {
            if ($rspx[0] == '00') {

                $guid = $rspx[1];
                $date = date('Ymd');

                $respon1 = $this->APIGetid->store_update($guid,$email,$fullname,"Jakarta", "0","0", $date);
                // var_dump($respon1);
                if ($respon1 == null) {
                    $array=array('status' => '0','message' => 'Register Gagal.');
                    $this->session->set_flashdata('message', $array);
                    // redirect('Login/register');
                } else {
                    $dt = $respon1[0]->Response;
                    $dtx = explode("|",$dt); //0|succed
                    // var_dump($dtx);
                    if ($dtx[0] == "00") {
                        $respon2 = $this->APIGetid->activation($email);
                        // var_dump($respon2);

                        $rdt = $respon2[0]->User_ActivationResponse->User_ActivationResult;
                        $rdtx = explode("|",$rdt);
                        // var_dump($rdtx);
                        if ($rdtx == null && count($rdtx) == 0) {
                            $array=array('status' => '0','message' => 'Register Gagal.');
                            $this->session->set_flashdata('message', $array);
                            redirect('Login/register');
                        } else if ($rdtx[0] == '0') {
                            $array=array('status' => '1','message' => 'Berhasil Register, Silahkan Login!');
                            $this->session->set_flashdata('message', $array);
                            redirect('Login');
                        } else {

                            $array=array('status' => '0','message' => 'Register Gagal.');
                            $this->session->set_flashdata('message', $array);
                            redirect('Login/register');
                        }
                        // $array=array('status' => '1','message' => 'Berhasil Register, Silahkan Login!');
                        // $this->session->set_flashdata('message', $array);
                        // redirect('Login');
                        
                    } else {
                        $array=array('status' => '0','message' => 'Register Gagal.');
                        $this->session->set_flashdata('message', $array);
                        // redirect('Login/register');
                    }
                }

            } else {
                $array=array('status' => '0','message' => 'Email Sudah digunakan');
                $this->session->set_flashdata('message', $array);
                // redirect('Login/register');
            }
        } 
    }
}
?>