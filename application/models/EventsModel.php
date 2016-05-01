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
        $query = "SELECT 
CASE WHEN 
(SELECT sign_ups_events.IdSignUp FROM sign_ups_events WHERE sign_ups_events.IdEvent = events.IdEvent AND sign_ups_events.IdUser = ? ) IS NOT NULL
THEN 'yes'
ELSE 'no'

END AS `Signed`
,
events.IdEvent,
users.Username AS `Posted`,
events.Heading,
events.Description,
events.Event_time,
events.Event_place
FROM `sign_ups_events`
RIGHT OUTER JOIN events ON sign_ups_events.IdEvent = events.IdEvent
JOIN users ON users.IdUser = events.IdUser
GROUP BY events.IdEvent";
        if(empty($past)){ $query.=" HAVING events.Event_time > NOW()";}
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
    
    public function getAllEventsForAdmin($past=''){
        $query = "SELECT 
events.IdEvent,
users.Username as `Posted`,
events.Heading,
events.Description,
events.Event_time,
events.Event_place,
(SELECT COUNT(*) FROM sign_ups_events WHERE sign_ups_events.IdEvent = events.IdEvent)          
AS `signed`
FROM events
JOIN users ON events.IdUser = users.IdUser";
        if(empty($past)){
            $query.=" WHERE events.Event_time > NOW()";
        }
        $result = $this->db->query($query);
        return $result->result_array();
    }
    
    public function deleteEvent($IdEvent){
        $this->db->where('IdEvent',$IdEvent);
        $this->db->delete('events');
    }
    
    public function getAllSignedUsersForEvent($IdEvent){
        $query = "SELECT users.IdUser,users.Username,users.FirstName,users.LastName,users.Email FROM users JOIN sign_ups_events ON sign_ups_events.IdUser = users.IdUser WHERE sign_ups_events.IdEvent = ?";
        $result = $this->db->query($query,array($IdEvent));
        return $result->result_array();
    }
    
    public function getEventById($IdEvent){
        $query = "SELECT * FROM events WHERE events.IdEvent = ?";
        $result = $this->db->query($query,array($IdEvent));
        return $result->row();
    }
    
    public function editEvent($IdEvent,$data){
        $this->db->where("IdEvent",$IdEvent);
        $this->db->set($data);
        $this->db->update("events");
    }
    
    
}
