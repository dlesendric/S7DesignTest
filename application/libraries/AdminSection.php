<?php


/**
 * Description of AdminSection
 * this is parent class for all admin views and controllers
 * main funciton for this class is to restrict access to child controllers
 * @author Darko
 */
class AdminSection extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->restrict();
    }
    /**
     * restriction by session
     */
    protected function restrict(){
        if(!isset($_SESSION['User'])){
            redirect("Home/login");
        }
        if($_SESSION['User']['Role']!="Admin"){
            redirect("Dashboard");
        }
    }
}
