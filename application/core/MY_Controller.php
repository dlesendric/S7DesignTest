<?php



/**
 * Description of MY_Controller
 * This conroller is for all common methods used in child classes
 * @author Darko
 */
class MY_Controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function load_view($view,$data=array()){
        $this->load->view('header',$data);
        $this->load->view($view,$data);
        $this->load->view('footer',$data);
    }
}
