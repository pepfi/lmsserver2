<?php
    class Logout extends CI_Controller {
    
        function __construct(){
            
            parent::__construct();
            $this->load->helper('cookie');
            $this->load->library('session');
            $this->load->helper('url');
            
        }
        
        public function logout(){
        
            delete_cookie('username');
            
            $this->session->unset_userdata('username');
            
            $this->load->view('login2');
        }
    }