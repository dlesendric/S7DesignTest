<?php

/*
 *  @author Darko Lesendric <dlesendric at https://github.com/ @Darko_Lesendric at https://twitter.com/>
 */

/**
 * Description of Dashboard
 *
 * @author Darko
 */
class Dashboard extends UserSection{
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
       
        $this->load_view('user/dashboard',$data);
    }
    
    public function editProfile(){
        $this->load_view('user/editprofile');
    }
    
    
}
