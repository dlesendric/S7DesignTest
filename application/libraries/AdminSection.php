<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Backend
 *
 * @author Darko
 */
class AdminSection extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->restrict();
    }
    
    protected function restrict(){
        if(!isset($_SESSION['User'])){
            redirect("Home/login");
        }
        if($_SESSION['User']['Role']!=2){
            redirect("Dashboard");
        }
    }
}
