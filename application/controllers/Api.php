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
            if($user->Role!=2){
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
            $_SESSION['access_token'] = $user->UserKey;
            $_SESSION['User']['IdUser'] = $user->IdUser;
            $_SESSION['User']['Username'] = $user->Username;
            $_SESSION['User']['Role'] = $user->Role;
            $_SESSION['User']['Params'] = json_decode(',',$user->Params);
            return $this->generate_status(200); 
        }
        return $this->generate_status(401);
    }
    
    public function checkUsername(){
        $username = trim($this->input->post('Username'));
        $this->load->model("UserModel");
        $exist = $this->UserModel->checkUsername($username);
        if($exist){
            return $this->generate_status(400);
        }
        else{
            return $this->generate_status(200);
        }
    }
    
    public function register(){
        $Username = $this->input->post("Username");
        $Password = $this->input->post("Password");
        $other['FirstName'] = $this->input->post("FirstName");
        $other['LastName'] = $this->input->post("LastName");
        $other['Email'] = $this->input->post("Email");
        $UserKey = $this->generateRandomString();
        $Params = json_encode($other);
        $this->load->Model("UserModel");
        $id = $this->UserModel->register($Username,$Password,$UserKey,$Params);
        if(is_int($id)){
            return $this->generate_status(201);
        }
        return $this->generate_status(400);
    }
    
    protected function generateRandomString($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    public function newEvent(){
        $this->authorize(true);
        $data = $this->input->post();
        $this->load->model("EventsModel");
        $this->EventsModel->newEvent($data);
        $this->generate_status(201);
    }
    
    public function getAllEvents($past=''){
        $user = $this->authorize();
        $this->load->model("EventsModel");
        $data = $this->EventsModel->getAllEvents($user->IdUser,$past);
        return $this->generate_response($data);
    }
    
    
    public function signupEvent(){
        $user = $this->authorize();
        $id_event = $this->input->post('id');
        $this->load->model("EventsModel");
        $this->EventsModel->signup($user->IdUser,$id_event);
        return $this->generate_status(201);
    }
    
    public function unsignEvent(){
        $user = $this->authorize();
        $id_event = $this->input->post('id');
        $this->load->model("EventsModel");
        $this->EventsModel->unsign($user->IdUser,$id_event);
        return $this->generate_status(200);
    }
    
    
    
    
    
    
    
    
}
