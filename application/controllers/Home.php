<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Darko
 */
class Home extends MY_Frontend{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        echo "Hello home!";
    }
}
