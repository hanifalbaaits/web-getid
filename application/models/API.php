<?php  
class Api extends CI_Model{
    function Apiget($url){
        $header = array (
            "Authorization: Basic YWRtaW46YWRtaW4=",
            "Postman-Token: a3385283-2d5b-4a37-be72-73acdaa62d25",
            "cache-control: no-cache"
        );
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
    }
    function Apipost($url, $array) {
        $arr=json_encode($array);
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization:Basic YWRtaW46YWRtaW4=",
            "Postman-Token:2b91df4a-8763-401b-aa97-dd480423567e",
            "cache-control:no-cache",
            "content-type:multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
        ));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $arr);
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
    }
    function Apidel($url) {
        $curl=curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'appsession:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzdmMtand0ZW5jb2RlZCIsImlkIjoxLCJ1c3IiOiJzdmN3ZWIiLCJ1c3JuIjoiV2ViIFNWQyBCaWxsaW5nIiwicHdkIjoiYmEzMjUzODc2YWVkNmJjMjJkNGE2ZmY1M2Q4NDA2YzZhZDg2NDE5NWVkMTQ0YWI1Yzg3NjIxYjZjMjMzYjU0OGJhZWFlNjk1NmRmMzQ2ZWM4YzE3ZjVlYTEwZjM1ZWUzY2JjNTE0Nzk3ZWQ3ZGRkMzE0NTQ2NGUyYTBiYWI0MTMiLCJpYXQiOjE1NjEwODcxNjUsImV4cCI6MTU5MjYyMzE2NX0.BQ2weMDLVnHjYcy6YDftYbGXkAeYH6yehsHhWwKNxyo',
            "Content-type: application/json"
        ));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        $json_response=curl_exec($curl);
        curl_close($curl);
        return $json_response;
    }
    function Apiput($url, $array) { 
        $arr = json_encode($array); 
        $curl = curl_init($url); 
        curl_setopt($curl, CURLOPT_HEADER, false); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT"); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, 
        array('appsession:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzdmMtand0ZW5jb2RlZCIsImlkIjoxLCJ1c3IiOiJzdmN3ZWIiLCJ1c3JuIjoiV2ViIFNWQyBCaWxsaW5nIiwicHdkIjoiYmEzMjUzODc2YWVkNmJjMjJkNGE2ZmY1M2Q4NDA2YzZhZDg2NDE5NWVkMTQ0YWI1Yzg3NjIxYjZjMjMzYjU0OGJhZWFlNjk1NmRmMzQ2ZWM4YzE3ZjVlYTEwZjM1ZWUzY2JjNTE0Nzk3ZWQ3ZGRkMzE0NTQ2NGUyYTBiYWI0MTMiLCJpYXQiOjE1NjEwODcxNjUsImV4cCI6MTU5MjYyMzE2NX0.BQ2weMDLVnHjYcy6YDftYbGXkAeYH6yehsHhWwKNxyo',"Content-type: application/json")); 
        curl_setopt($curl, CURLOPT_POST, true); 
        curl_setopt($curl, CURLOPT_POSTFIELDS, $arr); 
        $json_response = curl_exec($curl); 
        curl_close($curl); 
        return $json_response; 
    }
}; 

?>