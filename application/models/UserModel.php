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
        return $result->row();
    }
    public function checkUsername($username){
        $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
        $result = $this->db->query($query,array($username));
        if(empty($result->result_array())){
            return false;
        }
        else{
            return true;
        }
    }
    
    public function register($Username,$Password,$UserKey,$Params){
        $query = "INSERT INTO users (Username,Password,UserKey,Params) VALUES (?,MD5(?),?,?)";
        $this->db->query($query,array($Username,$Password,$UserKey,$Params));
        return $this->db->insert_id();
    }
}
