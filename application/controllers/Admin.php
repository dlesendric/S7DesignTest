<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author Darko
 */
class Admin extends AdminSection{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $data = array(
            'scripts' => array(
                base_url().'public/js/datatables.min.js'
            ),
            'styles' => array(
                base_url().'public/css/datatables.min.css',
            )
        );
        $this->load_view('admin/admin',$data);
    }
    
    public function newEvent(){
        $data = array(
            'scripts' => array(
                base_url().'public/js/moment.min.js',
                base_url().'public/js/bootstrap-datetimepicker.min.js'
            ),
            'styles' => array(
                base_url().'public/css/bootstrap-datetimepicker.min.css',
            )
        );
        $this->load_view('admin/new',$data);
    }
    
    public function users(){
        $data = array(
            'scripts' => array(
                base_url().'public/js/moment.min.js',
                base_url().'public/js/bootstrap-datetimepicker.min.js',
                base_url().'public/js/datatables.min.js'
            ),
            'styles' => array(
                base_url().'public/css/bootstrap-datetimepicker.min.css',
                base_url().'public/css/datatables.min.css'
            )
        );
        $this->load_view('admin/users',$data);
    }
    
    public function editEvent($IdEvent){
        $data = array(
            'scripts' => array(
                base_url().'public/js/moment.min.js',
                base_url().'public/js/bootstrap-datetimepicker.min.js'
            ),
            'styles' => array(
                base_url().'public/css/bootstrap-datetimepicker.min.css',
            ),
            'IdEvent'=>intval($IdEvent)
        );
        $this->load_view('admin/edit',$data);
    }
    

    
    
}
