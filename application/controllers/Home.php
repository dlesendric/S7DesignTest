<?php


/**
 * Description of Home
 * Public Controller , loading defaults on start
 * @author Darko
 */
class Home extends MY_Controller{
    public function __construct() {
        parent::__construct();
    }
    /**
     * default method for loading
     */
    public function index(){
        $this->load_view('home');
    }
    /**
     * loads view so users can login
     */
    public function login(){
        $this->load_view('login');
    }
    
    /**
     * loads view so users can register
     */
    public function register(){
        $this->load_view('register');
    }
    /**
     * NOT DONE
     * loads view so users can recover password
     */
    public function forgotPass(){
        echo "NOT DONE";
    }
}
