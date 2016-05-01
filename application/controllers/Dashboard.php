<?php

/*
 *  @author Darko Lesendric <dlesendric at https://github.com/ @Darko_Lesendric at https://twitter.com/>
 */

/**
 * Description of Dashboard
 * Dashboard class if Controller for basic users.
 * @author Darko
 */
class Dashboard extends UserSection{
    public function __construct() {
        parent::__construct();
    }
    /**
     * default loading method
     */
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
    /**
     * loads view so user can edit their profile
     */
    public function editProfile(){
        $this->load_view('user/editprofile');
    }
    
    
}
