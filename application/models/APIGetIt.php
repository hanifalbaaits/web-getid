<?php
class APIGetIt extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->url = $this->config->item('url-getit');
        $this->session_key = $this->config->item('session-key');
    }

    function getLogin($username,$password){
        $url = $this->url;
        $xml = 
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"
            xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
            <soap:Body>
                <User_Login xmlns="http://tempuri.org/">
                    <storeid>'.$username.'</storeid>
                    <pass>'.$password.'</pass>
                </User_Login>
            </soap:Body>
        </soap:Envelope>';

        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function getInfoByUsername($username){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"
            xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
            <soap:Body>
                <Store_Info_byStoreid xmlns="http://tempuri.org/">
                    <storeid>'.$username.'</storeid>
                </Store_Info_byStoreid>
            </soap:Body>
        </soap:Envelope>';

        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//Table');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function getSaldoByUsername($username){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
        <soap:Body>
            <Balance_User_select xmlns="http://tempuri.org/">
            <storeid>'.$username.'</storeid>
            </Balance_User_select>
        </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function register($username,$password){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <Store_Register xmlns="http://tempuri.org/">
              <storeid>'.$username.'</storeid>
              <storename></storename>
              <pass>'.$password.'</pass>
            </Store_Register>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function store_update($guid,$username,$fullname,$address, $telephone, $device , $date){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <Store_UpdateInfo xmlns="http://tempuri.org/">
              <guid>'.$guid.'</guid>
              <storename>'.$fullname.'</storename>
              <address>'.$address.'</address>
              <city></city>
              <province></province>
              <region>test</region>
              <type>mobile apps</type>
              <telephone>'.$telephone.'</telephone>
              <email>'.$username.'</email>
              <deviceid>'.$device.'</deviceid>
              <openingdate>'.$date.'</openingdate>
              <closingdate>'.$date.'</closingdate>
            </Store_UpdateInfo>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function activation($username){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <User_Activation xmlns="http://tempuri.org/">
              <storeid>'.$username.'</storeid>
              <oActivationCode>95d4deb6-6f89-4335-bdd0-c134fca8d060</oActivationCode>
            </User_Activation>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function grup_select($username){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <Store_Group_select xmlns="http://tempuri.org/">
              <storeid>'.$username.'</storeid>
            </Store_Group_select>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function change_password($username, $old, $new){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <User_CredentialUpdate xmlns="http://tempuri.org/">
              <storeid>'.$username.'</storeid>
              <oOldPass>'.$old.'</oOldPass>
              <oNewPass>'.$new.'</oNewPass>
            </User_CredentialUpdate>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function get_banner($username){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <Promotion_Banner_select xmlns="http://tempuri.org/">
              <storeid>'.$username.'</storeid>
            </Promotion_Banner_select>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function get_product($username){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <Product_InfoAll_byStorePrice xmlns="http://tempuri.org/">
              <storeid>'.$username.'</storeid>
            </Product_InfoAll_byStorePrice>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function topup_request($username){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <Topup_Balance_Request xmlns="http://tempuri.org/">
              <storeid>hanifalbaaits20@gmail.com</storeid>
              <idtransfer>01014</idtransfer>
              <nominaltransfer>100000</nominaltransfer>
              <type>bc369c4e-68ba-43c1-9eda-a2708e63ff86</type>
            </Topup_Balance_Request>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function topup_account(){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <Topup_Balance_Account xmlns="http://tempuri.org/" />
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function topup_type(){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <Topup_Balance_Type xmlns="http://tempuri.org/" />
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function get_transaction_last($username){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <ReportLast_DailyTopup xmlns="http://tempuri.org/">
              <storeid>'.$username.'</storeid>
            </ReportLast_DailyTopup>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function get_transaction_search($username, $date1, $date2){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <Report_DailyTopup xmlns="http://tempuri.org/">
              <BeginDate>'.$date1.'</BeginDate>
              <EndDate>'.$date2.'</EndDate>
              <storeid>'.$username.'</storeid>
            </Report_DailyTopup>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function get_deposito_last(){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <ReportLast_StockDepositHistory_byStoreDate xmlns="http://tempuri.org/">
              <storeid>tsp15</storeid>
            </ReportLast_StockDepositHistory_byStoreDate>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

    function get_deposito_search(){
        $url = $this->url;
        $xml =
        '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <Report_StockDepositHistory_byStoreDate xmlns="http://tempuri.org/">
              <storeid>tsp15</storeid>
              <begindate>20201201</begindate>
              <enddate>20201201</enddate>
            </Report_StockDepositHistory_byStoreDate>
          </soap:Body>
        </soap:Envelope>';
        
        $headers = array(
        "Content-type: text/xml",
        "Content-length: " . strlen($xml),
        "Connection: close",
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
        curl_close($ch);
        try {
            $res = new SimpleXMLElement($data);
            return $res->xpath('//soap:Body');
        } catch (\Throwable $th) {
            return null;
        }
    }

}