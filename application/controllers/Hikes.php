<?php
//application/controllers/Hikes.php

class Hikes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->config->set_item('active','Hikes');//sets CSS class as active for Hikes
        $this->load->model('hikes_model');
        $this->load->helper('url_helper');
    }

    public function index($id=0)
    {
        $this->config->set_item('title','All Hikes');
        $data['Hikes'] = $this->hikes_model->get_hikes($id);
        $data['title'] = 'All Hikes';
        $this->load->view('hikes/index', $data);
    }

    public function view($id = 0)
    {
        if($id==0){show_404();}
        $this->config->set_item('title','hike Page');
        $data['hike'] = $this->hikes_model->get_hikes($id);
        if(empty($data['hike'])){show_404();}
        
        $data['title'] = $data['hike']['HikeName'] . $data['hike']['HikeName'] . ' hike page';     
        $this->load->view('hikes/view', $data);
    }
    
    //HIKES FOR INDIVIDUAL USER - BASED ON index() & view()
    public function user($id = 0)
    {
        if($id==0){show_404();}
        
        $data['hikes'] = $this->hikes_model->get_user_hikes($id);

        //if no hikes, redirect back to individual user page
        if(empty($data['hikes'])){
            feedback('This user currently has no hikes!','warning');
             redirect('users/view/' . $id);
        }
        
        //now that we know we have hikes, derive User's name from first record, [0] in array
        $title = $data['hikes'][0]['FirstName'] .  " " . $data['hikes'][0]['LastName'] . "'s Hikes";
        
        //title tag
        $this->config->set_item('title',$title);
       
        //h1 on page
        $data['title'] = $title;     
        $this->load->view('hikes/user', $data);
    }
   
    public function create($id=0)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Add a Hike';
        $data['UserID'] = $id;

        //CHANGE RULES TO MATCH HIKES
        $this->form_validation->set_rules('HikeName', 'Hike Name', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('hikes/create', $data);
        }
        else
        {
            $id = $this->hikes_model->create_hike();
            if($id !== false){//id of data returned
                feedback('Data entered successfully!','info');
                redirect('hikes/view/' . $id);
            }else{//error
                feedback('Data NOT entered!','error');
                redirect('hikes/create');
            }
        }
    }//end create()
    
    /*
        update() removed - to build, base on update() from Users model
    */
    
    public function delete($id=0){
        $myReturn = $this->hikes_model->delete_hike($id);
        if($myReturn !== false){//delete successful
            feedback('Data deleted successfully!','info');
            redirect('hikes/');
        }else{//error
            feedback('Data NOT deleted!','error');
            redirect('hikes/');
        }
    }//end delete()

}