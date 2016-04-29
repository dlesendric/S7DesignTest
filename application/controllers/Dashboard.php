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
        $this->load_view('user/dashboard');
    }
    
    
}
