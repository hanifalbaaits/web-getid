<?php 
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
use setasign\Fpdi\PdfParser\StreamReader;

include APPPATH.'third_party/fpdf182/fpdf.php';
include APPPATH.'third_party/fpdi2/src/autoload.php';
include APPPATH.'third_party/fpdi2/src/Fpdi.php';

class Riwayat extends CI_Controller{
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
        $tgl_mulai = $this->input->get('tgl_mulai');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $flg = $this->input->get('flag');
        $respon = $this->APIGetid->getSaldoByUsername($username,$this->sessionid);
        
        if ($tgl_mulai != null && $tgl_akhir != null) {
            $tgl_mulai = date("Ymd",strtotime($tgl_mulai));
            $tgl_akhir = date("Ymd",strtotime($tgl_akhir));     
            
            if ($flg == 'transaksi') {
                $respon1 = $this->APIGetid->get_transaction_search($username,$tgl_mulai,$tgl_akhir,$this->sessionid);
                $respon2 = $this->APIGetid->get_deposito_last($username,$this->sessionid);
                $msg = "Pencarian transaksi dari tanggal ".date("d M Y",strtotime($tgl_mulai))." sampai ".date("d M Y",strtotime($tgl_akhir));
            } else {
                $respon2 = $this->APIGetid->get_deposito_search($username,$tgl_mulai,$tgl_akhir,$this->sessionid);
                $respon1 = $this->APIGetid->get_transaction_last($username,$this->sessionid);
                $msg = "Pencarian Deposito dari tanggal ".date("d M Y",strtotime($tgl_mulai))." sampai ".date("d M Y",strtotime($tgl_akhir));
            }

        } else {
            $flg = 'transaksi';
            $respon1 = $this->APIGetid->get_transaction_last($username,$this->sessionid);
            $msg = "List Transaksi Terakhir";
            $respon2 = $this->APIGetid->get_deposito_last($username,$this->sessionid);
        }

        if ($respon == null) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
            redirect('home');
        }

        $rsp = (string) $respon[0]->Balance_User_selectResponse->Balance_User_selectResult;
        if (strpos(explode('|',$rsp)[1], 'expired') !== false) {
            $this->session->sess_destroy();
            $array=array('status' => '0','message' => $this->respon_session);
            $this->session->set_flashdata('message', $array);
            redirect('login');
        }

        $last_transaction = json_decode(json_encode($respon1));
        $last_deposito = json_decode(json_encode($respon2));
        $saldo = explode('|',$rsp)[0];

        $data['saldo'] = (int) $saldo;
        $data['transaksi'] = $last_transaction;
        $data['deposito'] = $last_deposito;
        $data['msg'] = $msg;             
        $data['flag'] = $flg;   
        $data['nav_active'] = 'riwayat';
        // $this->load->view('frame/a_header');
        // $this->load->view('frame/b_nav',$data);
        // $this->load->view('page/riwayat/list_transaksi',$data);
        // $this->load->view('frame/d_footer');    
        
        $this->load->view('page_dana/frame/header');
        $this->load->view('page_dana/frame/nav-putih',$data);
        $this->load->view('page_dana/riwayat/transaksi',$data);
        $this->load->view('page_dana/frame/footer');   
    }

    function deposito(){  
        $guid = $this->session->userdata('guid');
        $username = $this->session->userdata('storeid');
        $tgl_mulai = $this->input->get('tgl_mulai');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $respon = $this->APIGetid->getSaldoByUsername($username,$this->sessionid);
        
        $flg = true;
        if ($tgl_mulai != null && $tgl_akhir != null) {
            $flg = false;
            $tgl_mulai = date("Ymd",strtotime($tgl_mulai));
            $tgl_akhir = date("Ymd",strtotime($tgl_akhir));       
            $respon1 = $this->APIGetid->get_deposito_search($username,$tgl_mulai,$tgl_akhir,$this->sessionid);
            $msg = "Pencarian Deposito dari tanggal ".date("d M Y",strtotime($tgl_mulai))." sampai ".date("d M Y",strtotime($tgl_akhir));
            
        } else {
            $respon1 = $this->APIGetid->get_deposito_last($username,$this->sessionid);
            $msg = "List Deposito Terakhir";
        }

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
        
        $last_deposito = json_decode(json_encode($respon1));
        $saldo = explode('|',$rsp)[0];
        $data['flag'] = $
        $data['saldo'] = (int) $saldo;
        $data['deposito'] = $last_deposito;
        $data['msg'] = $msg; 
        $data['flg'] = $flg; 

        // var_dump($last_deposito);
        // exit;
        // $this->load->view('frame/a_header');
        // $this->load->view('frame/b_nav',$data);
        // $this->load->view('page/riwayat/list_deposito',$data);
        // $this->load->view('frame/d_footer');      

        $this->load->view('page_dana/frame/header');
        $this->load->view('page_dana/frame/nav-putih',$data);
        $this->load->view('page_dana/riwayat/deposito',$data);
        $this->load->view('page_dana/frame/footer');   
    }

    function pdf_budy(){
        $path_file = base64_decode($this->input->get('path'));
        $path_support = $this->input->get('support');
        $data["path_file"] = $path_file;
        $data["path_support"] = $path_support;
        $data["notif"] = [];
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/pdf_budy',$data);
        $this->load->view('frame/d_footer');   
    }

    function mail(){
        $this->load->view('page/tesmail');
    }

    function test(){
        $data = array(
            'type' => 'support',
            'blob' => 'file1',
            'blob[]' => 'file2'
        );


        var_dump($data);
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo json_encode($data);
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";

        $dt["type"] = "support";
        for ($i=0; $i < 2; $i++) { 
            $dt["file$i"] = "filex$i";
        }

        var_dump($dt);
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo json_encode($dt);
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";


        $a = "HANIF|ARQOM|ADAM";

        $rt = explode("|",$a);

        var_dump($rt);


        echo "<br />";
        echo "<br />";
        echo "<br />";

        $x = "support/abcdeh.pdf";

        echo explode("/",$x)[1];

        echo "<br />";
        echo "<br />";
        echo "<br />";

        $tot_item = 5;
        $tot = [];
        for ($i=0; $i < $tot_item ; $i++) { 
            $tot[] = $i;
        }

        echo json_encode($tot);
    }
}
?>