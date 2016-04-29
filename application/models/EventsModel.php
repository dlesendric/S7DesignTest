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
    
    public function getAllEvents(){
        $query = "SELECT users.Username AS Posted,events.Heading,events.Description,events.Event_time,events.Event_place FROM events JOIN users ON users.IdUser = events.IdUser";
        $result = $this->db->query($query);
        return $result->result_array();
    }
}
