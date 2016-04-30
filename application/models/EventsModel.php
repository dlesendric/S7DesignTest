<?php

/*
 *  @author Darko Lesendric <dlesendric at https://github.com/ @Darko_Lesendric at https://twitter.com/>
 */

/**
 * Description of EventsModel
 *
 * @author Darko
 */
class EventsModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function newEvent($data){
        $this->db->insert("events",$data);
    }
    
    public function getAllEvents($IdUser,$past=''){
        $query = "SELECT CASE WHEN sign_ups_events.IdSignUp IS NOT NULL 
                    THEN 'yes'
                    ELSE 'no'
                END AS `signed`, events.IdEvent,users.Username AS Posted,events.Heading,events.Description,events.Event_time,events.Event_place FROM events JOIN users ON users.IdUser = events.IdUser LEFT JOIN sign_ups_events ON events.IdEvent = sign_ups_events.IdEvent WHERE sign_ups_events.IdUser = ? OR 1";
        if(empty($past)){ $query.=" AND events.Event_time > NOW()";}
        $result = $this->db->query($query,array($IdUser));
        return $result->result_array();
    }
    
    public function signup($IdUser,$IdEvent){
        $data = array(
            'IdUser'=>$IdUser,
            'IdEvent'=>$IdEvent
        );
        $this->db->insert("sign_ups_events",$data);
    }
    
    public function unsign($IdUser,$IdEvent){
        $data = array(
            'IdEvent'=>$IdEvent,
            'IdUser'=>$IdUser
        );
        $this->db->where($data);
        $this->db->delete('sign_ups_events');
    }
    
    
}
