<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Api
 *
 * @author Darko
 */
class Api extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        echo "Hello world!";
    }
    
    public function authorize($admin = false){
        $user = $this->handleAuthorizeRequest();
        if($admin){
            if($user['Role']!=2){
                return $this->generate_status(401);
            }
        }
        return $user;
        
    }
    
    
    protected function generate_response($content){
        header("content-type:application/json");
        echo json_encode($content);
    }
    
    protected function generate_status($code){
        $status = array(
            200 => "HTTP/1.0 200 OK",
            201 => "HTTP/1.0 201 Created",
            204 => "HTTP/1.0 204 No Content",
            400 => "HTTP/1.0 400 Bad Request",
            401 => "HTTP/1.0 401 Unauthorized",
            500 => "HTTP/1.0 500 Internal Server Error"
        );
        header($status[$code]);
    }
    
    protected function handleAuthorizeRequest(){
        $token = '';
        if(isset($_SESSION['access_token'])){
            $token = $_SESSION['access_token'];
        }
        if(!empty($this->input->post('access_token'))){
            $token = $this->input->post('access_token');
        }
        if(!empty($this->input->get('access_token'))){
            $token = $this->input->get('access_token');
        }
        $this->load->model("UserModel");
        $user  = $this->UserModel->getUserByKey($token);
        if(empty($user)){
            return $this->generate_status(401);
        }
        return $user;
        
    }
    
    public function logout(){
        unset($_SESSION['access_token']);
        unset($_SESSION['User']);
        return $this->generate_status(200);
    }
    
    public function login(){
        $username = trim($this->input->post('Username'));
        $password = md5(trim($this->input->post('Password')));
        $this->load->model("UserModel");
        $user = $this->UserModel->login($username,$password);
        if(!empty($user)){
            $_SESSION['access_token'] = $user["UserKey"];
            $_SESSION['User']['IdUser'] = $user['IdUser'];
            $_SESSION['User']['Username'] = $user['Username'];
            $_SESSION['User']['Role'] = $user['Role'];
            $_SESSION['User']['Params'] = explode(',',$user['Params']);
            return $this->generate_status(200); 
        }
        return $this->generate_status(401);
    }
    
    
    
    
    
    
    
}
