<?php


/**
 * Description of Api
 * Api class is for all GET or POST-s operations 
 * @author Darko
 */
class Api extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    /**
     * default loading page
     */
    public function index(){
        if(isset($_POST['Request'])){
            $this->login();
        }
        echo "Hello, to continue to use this api you must have access_token!";
        if(isset($_SESSION['access_token'])){
            echo "<br/>You can use this api just sending via POST or GET your access_token but variable must be named as `access_token`!</br>";
            echo "Your access token is:".$_SESSION['access_token'];
            echo "<br/>";
            echo "Documentation how to use api... Not done yet!";
        }
        else{
            echo "<br/>Request one? Just login with your account...</br>";
            echo "<form method='post'><input type='text' name='Username'/><br/>"
            . "<input type='password' name='Password'/><br/>"
                    . "<input type='submit' value='Request' name='Request'/></form>";
            
        }
        

    }
    /**
     * Authroize users 
     * @param type $admin - boolean
     * @return type Object
     */
    public function authorize($admin = false){
        $user = $this->handleAuthorizeRequest();
        if($admin){
            if($user->Role!="Admin"){
                return $this->generate_status(401);
            }
        }
        return $user;
        
    }
    
    /**
     * Renders JSON 
     * @param type $content - should be object or array
     */
    protected function generate_response($content){
        header("content-type:application/json");
        echo json_encode($content);
    }
    /**
     * REST 
     * @param type $code - integer 
     */
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
    /**
     * Check if user have access_token, access_token should be always passed via POST, GET or in this App i used $_SESSION to test 
     * @return type Object - User data
     */
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
    /**
     * logout user
     * @return type HTTP response
     */
    public function logout(){
        unset($_SESSION['access_token']);
        unset($_SESSION['User']);
        return $this->generate_status(200);
    }
    /**
     * method for login in
     * @return type status OK/Unauthorized
     */
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
            $_SESSION['User']['FirstName'] = $user->FirstName;
            $_SESSION['User']['LastName'] = $user->LastName;
            $_SESSION['User']['Email'] = $user->Email;
            return $this->generate_status(200); 
        }
        return $this->generate_status(401);
    }
    /**
     * Check if user with posted username already exists in DB
     * @return type OK/Bad request
     */
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
    /**
     * Method for registration of new users
     * @return type OK/Bad request
     */
    public function register(){
        $Username = $this->input->post("Username");
        $Password = $this->input->post("Password");
        $FirstName = $this->input->post("FirstName");
        $LastName = $this->input->post("LastName");
        $Email = $this->input->post("Email");
        $UserKey = $this->generateRandomString();
        $this->load->Model("UserModel");
        $id = $this->UserModel->register($Username,$Password,$UserKey,$FirstName,$LastName,$Email);
        if(is_int($id)){
            return $this->generate_status(201);
        }
        return $this->generate_status(400);
    }
    /**
     * Method to generate some random string
     * @param type $length - integer (should be up to 32)
     * @return string
     */
    protected function generateRandomString($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    /**
     * method to create new Event, only admins can use this method
     */
    public function newEvent(){
        $this->authorize(true);
        $data = $this->input->post();
        $this->load->model("EventsModel");
        $this->EventsModel->newEvent($data);
        $this->generate_status(201);
    }
    /**
     * Method to get all events for regular users
     * @param type $past - can be anything, but just put past
     * @return type JSON
     */
    public function getAllEvents($past=''){
        $user = $this->authorize();
        $this->load->model("EventsModel");
        $data = $this->EventsModel->getAllEvents($user->IdUser,$past);
        return $this->generate_response($data);
    }
    
    /**
     * Method to signup for some evet
     * Require 'id' => event_id via POST
     * @return type OK/Created
     */
    public function signupEvent(){
        $user = $this->authorize();
        $id_event = $this->input->post('id');
        $this->load->model("EventsModel");
        $this->EventsModel->signup($user->IdUser,$id_event);
        return $this->generate_status(201);
    }
    /**
     * Method to unsign from some event
     * require 'id'=> event id via POST
     * @return type OK
     */
    public function unsignEvent(){
        $user = $this->authorize();
        $id_event = $this->input->post('id');
        $this->load->model("EventsModel");
        $this->EventsModel->unsign($user->IdUser,$id_event);
        return $this->generate_status(200);
    }
    /**
     * Method for getting all events , but for admins.
     * @param type $past - 'pasted events or not' just put past afther / exp Api/getAllEventsForAdmin/past/
     * @return type JSON
     */
    public function getAllEventsForAdmin($past=''){
        $this->authorize(true);
        $this->load->model("EventsModel");
        $data = $this->EventsModel->getAllEventsForAdmin($past);
        return $this->generate_response($data);
    }
    /**
     * Method for admins so they can delete events
     * @param type $IdEvent - int - Id of event
     * @return type OK
     */
    public function deleteEvent($IdEvent){
        $this->authorize(true);
        $this->load->model("EventsModel");
        $this->EventsModel->deleteEvent(intval($IdEvent));
        return $this->generate_status(200);
    }
    /**
     * Method for getting all users signed for some event
     * @param type $IdEvent - int - id event
     * @return type JSON
     */
    public function getAllSignedUsersForEvent($IdEvent){
        $this->authorize(true);
        $this->load->model("EventsModel");
        $data = $this->EventsModel->getAllSignedUsersForEvent(intval($IdEvent));
        return $this->generate_response($data);
    }
    
    /**
     * Get all users - for admins so they can do with them whatever they want
     */
    
    public function getAllUsers(){
        $this->authorize(true);
        $this->load->model("UserModel");
        $users = $this->UserModel->getAllUsers();
        $this->generate_response($users);
    }
    /**
     * Deletes user from database by given id , admin privilege required
     * @param type $IdUser - int
     * @return type OK/Error/
     */
    public function deleteUser($IdUser){
        $user = $this->authorize(true);
        if($user->IdUser==$IdUser){
            $this->generate_response(array("Error"=>"You can't delete yourelf"));
            return $this->generate_status(500);
        }
        $this->load->model("UserModel");
        $this->UserModel->deleteUser(intval($IdUser));
        return $this->generate_status(200);
    }
    /**
     * Method for editing profile, data should be send via POST as a Array
     */
    public function editProfile(){
        $user = $this->authorize();
        unset($_POST['access_token']);
        $data = $this->input->post();
        if(isset($data['Password'])){
            $data['Password'] = md5($data['Password']);
        }
        $_SESSION['User']['Username'] = $data['Username'];
        $_SESSION['User']['FirstName'] = $data['FirstName'];
        $_SESSION['User']['LastName'] = $data['LastName'];
        $_SESSION['User']['Email'] = $data['Email'];
        $this->load->model("UserModel");
        $this->UserModel->editUser($user->IdUser,$data);
        $this->generate_status(200);
    }
    /**
     * Method to edit events
     * @param type $IdEvent - int - id event
     * @return type OK
     */
    public function editEvent($IdEvent){
        $this->authorize(true);
        unset($_POST['access_token']);
        $data = $this->input->post();
        $this->load->model("EventsModel");
        $this->EventsModel->editEvent(intval($IdEvent),$data);
        return $this->generate_status(200);
    }
    /**
     * Method to get some event by given ID - restricted to admins
     * @param type $IdEvent - int
     * @return type JSON
     */
    public function getEvent($IdEvent){
        $this->authorize(true);
        $this->load->model("EventsModel");
        $event = $this->EventsModel->getEventById(intval($IdEvent));
        return $this->generate_response($event);
    }
    /**
     * NOT IN USE
     */
    public function editUser(){
        $this->authorize(true);
        unset($_POST['access_token']);
        $data = $this->input->post();
        $IdUser = $this->input->post("IdUser");
        unset($data['IdUser']);
        $this->UserModel->editUser($IdUser,$data);
        $this->generate_status(200);
    }
    
    
    
    
    
}
