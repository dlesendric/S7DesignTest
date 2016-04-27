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
}
