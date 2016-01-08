<?php
    class Logout extends CI_Controller {
    
        function __construct(){
            parent::__construct();
        }
        
        public function logout(){       
            delete_cookie('username');
            $data['error'] = '';
            $this->session->unset_userdata('username');         
            $this->load->view('admin/login_form',$data);
        }
    }