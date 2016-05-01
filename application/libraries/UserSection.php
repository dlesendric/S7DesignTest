<?php


/**
 * Description of UserSection
 * This class is for restriction 
 * It will prevent unloged users 
 * @author Darko
 */
class UserSection extends MY_Controller{
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
    }
}
