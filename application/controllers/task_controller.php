<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_Controller extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Employee_Model');
    }
    
    public function index(){
        $userInfo = $this->Employee_Model->listAllUsers();
        $m['data'] = $userInfo;
        $this->load->view('header');
        $this->load->view('tasks_view', $m);
        $this->load->view('footer');
    }
    
    public function logout(){
        if($this->session->has_userdata('emp_id')){
            $this->session->set_flashdata(
                'login_msg', 
                '<div class="alert alert-success text-center">Successfully logged out</div>'
            );
            $this->session->sess_destroy();
        }
        $this->load->view('header');
        $this->load->view('login_view');
        $this->load->view('footer');
    }
}