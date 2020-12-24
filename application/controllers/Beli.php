<?php 
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
use setasign\Fpdi\PdfParser\StreamReader;

include APPPATH.'third_party/fpdf182/fpdf.php';
include APPPATH.'third_party/fpdi2/src/autoload.php';
include APPPATH.'third_party/fpdi2/src/Fpdi.php';

class Beli extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->session_key = $this->config->item('session-key');
        $this->load->model("APICoreRKA");
        $this->url_corerka = $this->config->item('url-corerka');
        $this->url = $this->config->item('url-corerka');

        if($this->session->userdata('logcode') != $this->session_key){
            $this->session->set_flashdata('message', " Login Terlebih dahulu! ");
            redirect('login');
        }
    }

    function pulsa(){  
        $pesan = []; $nmrole = "";
        $data["notif"] = $pesan;
        $data["nmrole"] = $nmrole;
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/beli/pulsa',$data);
        $this->load->view('frame/d_footer');        
    }

    function paket(){  
        $pesan = []; $nmrole = "";
        $data["notif"] = $pesan;
        $data["nmrole"] = $nmrole;
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/beli/paket',$data);
        $this->load->view('frame/d_footer');      
    }

    function topup(){  
        $pesan = []; $nmrole = "";
        $data["notif"] = $pesan;
        $data["nmrole"] = $nmrole;
        $this->load->view('frame/a_header');
        $this->load->view('frame/b_nav',$data);
        $this->load->view('page/beli/topup',$data);
        $this->load->view('frame/d_footer');      
    }

    function trx_pulsa(){
        $array=array('status' => '1','message' => 'Transaksi sedang di Proses..');
        $this->session->set_flashdata('message', $array);
        redirect("riwayat/transaksi");
    }

    function trx_paket(){
        $array=array('status' => '1','message' => 'Transaksi sedang di Proses..');
        $this->session->set_flashdata('message', $array);
        redirect("riwayat/transaksi");
    }

    function trx_topup(){
        $array=array('status' => '1','message' => 'Transaksi sedang di Proses..');
        $this->session->set_flashdata('message', $array);
        redirect("riwayat/deposito");
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