<?php 
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
use setasign\Fpdi\PdfParser\StreamReader;

include APPPATH.'third_party/fpdf182/fpdf.php';
include APPPATH.'third_party/fpdi2/src/autoload.php';
include APPPATH.'third_party/fpdi2/src/Fpdi.php';


class Profile extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model("APIGetid");
        $this->session_key = $this->config->item('session-key');
        $this->sessionid = $this->session->userdata('sessionid');
        // $this->respon_null = "There was no response from the server. Please Contact Administrator!";
        $this->respon_null = "Tidak ada tanggapan dari server. Silahkan hubungi admin.";
        $this->respon_session = "Session berakhir. Login terlebih dahulu.";

        if($this->session->userdata('logcode') !=  $this->session_key){
            $array=array('status' => '0','message' => $this->respon_session);
            $this->session->set_flashdata('message', $array);
            redirect('login');
        }
    }

    function index(){      
        $guid = $this->session->userdata('guid');
        $username = $this->session->userdata('storeid');
        $respon = $this->APIGetid->getSaldoByUsername($username,$this->sessionid);

        if ($respon == null) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
            // $this->session->sess_destroy();
            redirect('home');
        }

        $rsp = (string) $respon[0]->Balance_User_selectResponse->Balance_User_selectResult;
        if (strpos(explode('|',$rsp)[1], 'expired') !== false) {
            $this->session->sess_destroy();
            $array=array('status' => '0','message' => $this->respon_session);
            $this->session->set_flashdata('message', $array);
            redirect('login');
        }

        $saldo = explode('|',$rsp)[0];
        $data['saldo'] =(int) $saldo;

        // $this->load->view('frame/a_header');
        // $this->load->view('frame/b_nav',$data);
        // $this->load->view('page/profile');
        // $this->load->view('frame/d_footer');   
        
        $this->load->view('page_dana/frame/header');
        $this->load->view('page_dana/frame/nav-putih',$data);
        $this->load->view('page_dana/profile');
        $this->load->view('page_dana/frame/footer');   
    }

    function update(){      
        $guid = $this->session->userdata('guid');
        $username = $this->session->userdata('storeid');
        $fullname = $this->input->post('fullname');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $device = $this->session->userdata('deviceid');
        $date = date('Ymd');

        $respon = $this->APIGetid->store_update($guid,$username,$fullname,$address, $phone, $device , $date);
        if ($respon == null) {
            $array=array('status' => '0','message' => 'Ubah Profile Gagal!');
            $this->session->set_flashdata('message', $array);
            redirect('profile');
        } else {
            $dt = $respon[0]->Response;
            $dtx = explode("|",$dt); //0|succed

            if ($dtx[0] == "00") {
                // $respon1 = $this->APIGetid->getInfoByUsername($username);
                // var_dump($respon1);echo "<br />";
                // echo json_encode(json_decode(json_encode($respon1)));
                // exit;
                // $this->setSession($respon1[0]);
                // $this->session->sess_destroy();
                $array=array('status' => '1','message' => 'Ubah Profile berhasil, Silahkan Login kembali!');
                $this->session->set_flashdata('message', $array);
                redirect('home');
                
            } else {
                $array=array('status' => '0','message' => 'Ubah Profile Gagal!');
                $this->session->set_flashdata('message', $array);
                redirect('profile');
            }
        }
    }

    function ganti_password(){
        $username = $this->session->userdata('storeid');
        $pas_lama = $this->input->post('gp_password_lama');
        $pas_baru = $this->input->post('gp_password_baru');
        $pas_konfirm = $this->input->post('gp_konfirmasi');

        if ($pas_baru != $pas_konfirm) {
            $array=array('status' => '0','message' => 'Konfirmasi Kata Sandi Salah!');
            $this->session->set_flashdata('message', $array);
            redirect('home');
        }

        $respon1 = $this->APIGetid->change_password($username,$pas_lama,$pas_baru,$this->sessionid);
        $rspx = $respon1[0]->User_CredentialUpdateResponse->User_CredentialUpdateResult;
        $rspxt = explode("|",$rspx); //0|succed
        // var_dump($rspxt);
        if ($rspxt[0] == "3") {
            $array=array('status' => '0','message' => 'Kata Sandi Lama Salah!');
            $this->session->set_flashdata('message', $array);
            redirect('home');
        } else if ($rspxt[0] == "0") {
            // $this->session->sess_destroy();
            $sess_array = array(
                'logcode' => null
            );
            // $this->session->set_userdata($sess_array);
            $array=array('status' => '1','message' => 'Ubah Kata Sandi berhasil, Silahkan Login kembali!');
            $this->session->set_flashdata('message', $array);
            redirect('home');
        } else {
            $array=array('status' => '0','message' => 'Gagal ganti kata sandi');
            $this->session->set_flashdata('message', $array);
            redirect('home');
        }
    }

    // function setSession($info) {
    //     $xx = $info->iduser.date('d/m/y/h/i').$this->session_key;
    //     $authorization = md5($xx);
    //     $sess_array = array(
    //         'logcode' => $this->session_key,
    //         'guid' => "$info->guid",
    //         'storeid' => "$info->storeid",
    //         'storename' => "$info->storename",
    //         'address' => "$info->address",
    //         'city' => "$info->city",
    //         'province' => "$info->province",
    //         'region' => "$info->region",
    //         'type' => "$info->type",
    //         'telephone' => "$info->telephone",
    //         'email' => "$info->email",
    //         'deviceid' => "$info->deviceid",
    //         'openingdate' => "$info->openingdate",
    //         'status' => "$info->status",
    //         'auth' => "$authorization",
    //     );
    //     $this->session->set_userdata($sess_array);
    // }
}
?>