<?php
//application/models/hikes_model.php

/*

    copy & paste your db table fields from adminer into the file you're working in.
    
    You can copy/paste from it to make your work easier!

    HikeID	int(10) unsigned Auto Increment	
    UserID	int(10) unsigned NULL [0]	
    HikeName	varchar(255) NULL []	
    Location	varchar(255) NULL []	
    Gain	smallint(6) NULL [0]	
    HighestPoint	smallint(6) NULL [0]	
    Length	float NULL [0]	
    Rating	tinyint(4) NULL [0]	
    Difficulty	tinyint(4) NULL [0]	
    Description	text NULL	
    Directions	text NULL	
    DateAdded	datetime NULL	
    LastUpdated	timestamp [0000-00-00 00:00:00]
*/


class hikes_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_hikes($id = 0)
    {
        
        //join the two tables
        $this->db->select('*');
        $this->db->from('Hikes');
        $this->db->join('Users', 'Users.UserID = Hikes.UserID');
        
        if ($id==0)
        {//no id, retrieve all - NOW ORDERED BY RATING, DESCENDING
            $this->db->order_by('Rating DESC');
            $query = $this->db->get();
            return $query->result_array();
        }else{//retrieve individual record
            $this->db->where(array('HikeID' => $id));
            $query = $this->db->get();
            return $query->row_array();
        }
    }//end get_hikes()
    
    public function get_user_hikes($id = 0)
    {
        //Hikes from one user only
        $this->db->select('*');
        $this->db->from('Hikes');
        $this->db->join('Users', 'Users.UserID = Hikes.UserID');
        $this->db->where(array('Users.UserID' => $id));
        $this->db->order_by('Rating DESC');
        $query = $this->db->get();
        return $query->result_array();

    }//end get_user_hikes()

    public function create_hike()
    {
        //CHANGE TO MATCH HIKE DATA
        $data = array(
            'UserID' => $this->input->post('UserID'),
            'HikeName' => $this->input->post('HikeName'),
            'Location' => $this->input->post('Location'),
            'Gain' => $this->input->post('Gain'),
            'HighestPoint' => $this->input->post('HighestPoint'),
            'Length' => $this->input->post('Length'),
            'Rating' => $this->input->post('Rating'),
            'Difficulty' => $this->input->post('Difficulty'),
            'Description' => $this->input->post('Description'),
            'Directions' => $this->input->post('Directions'),
            'DateAdded' => date('Y-m-d H:i:s'),
            'LastUpdated' => date('Y-m-d H:i:s')
        );

        if($this->db->insert('Hikes', $data))
        {//return slug - send to view page
            return $this->db->insert_id();
        }else{//return false
            return false;
        }
    }//end create_hike()
    
    /*
        update() removed - to build, base on update_user() from Users model, 
        $data from create_hike() above, minus DateAdded
    */
    
    public function delete_hike($id=0)
    {
        if($this->db->delete('Hikes', array('HikeID' => $id)))
        {//delete successful!
            return true;
        }else{//return false
            return false;
        }
  
    }//end delete_hike()

    
}//end hikes_model