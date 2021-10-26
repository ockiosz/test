<?php

class NG{
    protected $username;
    protected $password;
    protected $host;

    public function __construct($username = NULL, $password = NULL, $host = NULL){
        $this->username = isset($username) ? $username : NULL;
        $this->password = isset($password) ? $password : NULL;
        $this->host = isset($host)&&(!is_null($host)) ? $host : 'https://pibble.co/';
    }

    public function getToken(){
        curl_init();

        $url = $this->host . 'wp-json/jwt-auth/v1/token';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS , array(
            'username' => $this->username,
            'password' => $this->password
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        
        if(!$result){
            return false;
        }else{
            return json_decode($result);
        }

    }

    public function getPosts(){
        $token = $this->getToken();
        if(!$token){
            return false;
        }

        $token = json_decode($token);
        // echo 'result:' . $token;
        // $token = $token->data->token;

        // curl_init();

        // $url = $this->host . 'wp-json/wp/v2/posts';
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Authorization: Bearer ' . $token
        // ));
        // $result = curl_exec($ch);
        // curl_close($ch);
        
        // if(!$result){
        //     return false;
        // }else{
        //     return $result;
        // }
    }
}