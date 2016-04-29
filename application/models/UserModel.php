<?php

/*
 *  @author Darko Lesendric <dlesendric at https://github.com/ @Darko_Lesendric at https://twitter.com/>
 */

/**
 * Description of UserModel
 *
 * @author Darko
 */
class UserModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function getUserByKey($key){
        $query = "SELECT * FROM users WHERE UserKey = ? LIMIT 1";
        $result = $this->db->query($query,array($key));
        return $result->result_array();
    }
    
    public function login($username,$password){
        $query = "SELECT IdUser,Username,Role,UserKey,Params FROM users WHERE Username = ? AND Password = ? LIMIT 1";
        $result = $this->db->query($query,array($username,$password));
        return $result->result_array();
    }
}
