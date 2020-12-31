<?php 

class Beli extends CI_Controller{
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

    function pulsa(){  
        $guid = $this->session->userdata('guid');
        $username = $this->session->userdata('storeid');
        $respon = $this->APIGetid->getSaldoByUsername($username,$this->sessionid);
        $respon1 = $this->APIGetid->get_product($username,$this->sessionid);

        if ($respon == null) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
            redirect('home');
        }
        $rsp = (string) $respon[0]->Balance_User_selectResponse->Balance_User_selectResult;
        $list_product = json_decode(json_encode($respon1));
        log_message('error', 'produk yg tersedia : '.json_encode($list_product));
        $saldo = explode('|',$rsp)[0];
        $data['saldo'] = (int) $saldo;
        $data['product'] = $list_product;
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/beli/pulsa',$data);
        $this->load->view('frame/d_footer');        
    }

    function paket(){  
        $guid = $this->session->userdata('guid');
        $username = $this->session->userdata('storeid');
        $respon = $this->APIGetid->getSaldoByUsername($username,$this->sessionid);
        $respon1 = $this->APIGetid->get_product($username,$this->sessionid);

        if ($respon == null) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
            redirect('home');
        }
        $rsp = (string) $respon[0]->Balance_User_selectResponse->Balance_User_selectResult;
        $list_product = json_decode(json_encode($respon1));
        log_message('error', 'produk yg tersedia : '.json_encode($list_product));
        $saldo = explode('|',$rsp)[0];
        $data['saldo'] = (int) $saldo;
        $data['product'] = $list_product;
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/beli/paket',$data);
        $this->load->view('frame/d_footer');      
    }

    function topup(){  
        $guid = $this->session->userdata('guid');
        $username = $this->session->userdata('storeid');
        $respon = $this->APIGetid->getSaldoByUsername($username,$this->sessionid);

        if ($respon == null) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
            redirect('home');
        }

        $flag = false;
        $time_topup = $this->session->userdata('time_topup');
        $nominal_topup = $this->session->userdata('nominal_topup');
        if ($time_topup != null) {
            if (date('Y-m-d H:i:s') <= date('Y-m-d H:i:s',strtotime($time_topup))) {
                $flag = true;
            }
        }

        $rsp = (string) $respon[0]->Balance_User_selectResponse->Balance_User_selectResult;
        $saldo = explode('|',$rsp)[0];
        $data['saldo'] = (int) $saldo;
        $data['flag'] = $flag;
        $data['time_topup'] = $time_topup;
        $data['nominal_topup'] = $nominal_topup;
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/beli/topup',$data);
        $this->load->view('frame/d_footer');      
    }

    function trx_pulsa(){
        $storeid = $this->session->userdata('storeid');
        $pass = $this->session->userdata('password');
        $nomor = $this->input->post('nomor');
        $pulsa = $this->input->post('pulsa');
        $sandi = $this->input->post('sandi');
        $time = time();

        if ($pass != $sandi) {
            $array=array('status' => '0','message' => 'Kata Sandi Salah!');
            $this->session->set_flashdata('message', $array);
            redirect('beli/pulsa');
        }
        
        log_message('error', '========================');
        log_message('error', 'storeid : '.$storeid);
        log_message('error', 'pass : '.$pass);
        log_message('error', 'nomor : '.$nomor);
        log_message('error', 'pulsa : '.$pulsa);
        log_message('error', 'sandi : '.$sandi);
        log_message('error', 'time : '.$time);

        $respon = $this->APIGetid->transaksi_execute($storeid,$time,$sandi,$nomor,$pulsa);
        // var_dump($respon);
        // echo "<br /><br />";
        // echo json_encode($respon);
        if ($respon == null) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
            redirect('home');
        }
        log_message('error', 'API Transaksi : '.json_encode($respon));
        log_message('error', '========================');
        // $saldo = (string) $respon[0]->Balance_User_selectResponse->Balance_User_selectResult;
        // var_dump($respon);
        $array=array('status' => '1','message' => 'Transaksi sedang di Proses..');
        $this->session->set_flashdata('message', $array);
        redirect("riwayat/transaksi");
    }

    function trx_paket(){
        $storeid = $this->session->userdata('storeid');
        $pass = $this->session->userdata('password');
        $nomor = $this->input->post('nomor');
        $pulsa = $this->input->post('pulsa');
        $sandi = $this->input->post('sandi');
        $time = time();

        log_message('error', '========================');
        log_message('error', 'storeid : '.$storeid);
        log_message('error', 'pass : '.$pass);
        log_message('error', 'nomor : '.$nomor);
        log_message('error', 'pulsa : '.$pulsa);
        log_message('error', 'sandi : '.$sandi);
        log_message('error', 'time : '.$time);

        if ($pass != $sandi) {
            $array=array('status' => '0','message' => 'Kata Sandi Salah!');
            $this->session->set_flashdata('message', $array);
            redirect('beli/paket');
        }

        $respon = $this->APIGetid->transaksi_execute($storeid,$time,$sandi,$nomor,$pulsa);
        log_message('error', 'API Transaksi : '.json_encode($respon));
        log_message('error', '========================');
        // var_dump($respon);
        if ($respon == null) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
            redirect('home');
        }
        
        // $saldo = (string) $respon[0]->Balance_User_selectResponse->Balance_User_selectResult;
        // var_dump($respon);
        $array=array('status' => '1','message' => 'Transaksi sedang di Proses..');
        $this->session->set_flashdata('message', $array);
        redirect("riwayat/transaksi");
    }

    function trx_topup(){
        $storeid = $this->session->userdata('storeid');
        $nominal = $this->input->post('fw-nominal');
        $time = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime(date('Y-m-d H:i:s'))));

        log_message('error', '========================');
        log_message('error', 'storeid : '.$storeid);
        log_message('error', 'nominal : '.$nominal);
        log_message('error', 'time : '.$time);
        $respon = $this->APIGetid->topup_request($storeid,$nominal,$this->sessionid);
        if ($respon == null) {
            $array=array('status' => '0','message' => $this->respon_null);
            $this->session->set_flashdata('message', $array);
            redirect('beli/topup');
        }
        log_message('error', 'API TopUp : '.json_encode($respon));
        log_message('error', '========================');

        $rpx = explode("|",$respon[0]->Response); //0|succed
        if (count($rpx) > 0 && $rpx[0] == "0") {
            $sess_array = array(
                'time_topup' => $time,
                'nominal_topup' =>$rpx[1],
            );
            $this->session->set_userdata($sess_array);
            $array=array('status' => '1','message' => 'Selesaikan Pembayaran dan lakukan konfirmasi!');
            $this->session->set_flashdata('message', $array);
            redirect('beli/topup');
        } else {
            $array=array('status' => '0','message' => 'Tidak dapat melakukan Top Up!');
            $this->session->set_flashdata('message', $array);
            redirect('beli/topup');
        }
    }
}
?>