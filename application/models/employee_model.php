<?php

class Employee_Model extends CI_Model{

    function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    //list all employee information
    public function listAllUsers(){
        $query = $this->db->get_where(
          'employee'
        );
        return $query->result();
    }
    //insert employee details to employee table
    public function insertEmployee($data){
        return $this->db->insert('employee',$data);
    }
    //
    public function loginUser($username, $password){
        $query = $this->db->get_where(
            'employee', 
            array(
                'username' => $username, 
                'password' => $password, 
                'status'=> 0
            )
        );
        if($query->num_rows() >= 1){
            $userArr = array();
            foreach($query->result() as $row){
                $userArr[0] = $row->emp_id;
                $userArr[1] = $row->emp_name;
            }
            $userData = array(
                'emp_id' => $userArr[0],
                'emp_name' => $userArr[1],
                'logged_in'=> TRUE
            );
            //set user information into session 
            $this->session->set_userdata($userData);
            return true;
        }else{
            return false;
        }
    }
    
    //send confirm mail
    public function sendEmail($receiver){
        return true;
    }
    
    //activate account
    function verifyEmail($key){
        $data = array('status' => 1);
        $this->db->where('md5(email)',$key);
        //update status as 1 to make active user
        return $this->db->update('employee', $data);    
    }
}
?>