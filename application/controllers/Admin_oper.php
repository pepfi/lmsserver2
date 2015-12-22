<?php
    class Admin_oper extends CI_Controller {
        
        public function __construct(){
            
            parent::__construct();
            $this->load->model('Admin_oper_model');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->helper('cookie');
            $this->load->library('session');
            $this->load->helper('url');
        }
                
        public function addadmin(){
            if ($this->session->userdata('username') != ''){
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                
                if ($this->form_validation->run() === FALSE)
                {
                    $this->load->view('admin/add_admin');
                }
                else
                {
                    $this->Admin_oper_model->add_admin();
                    $this->load->view('admin/add_ok');
                }
            }
            
        }
        
        public function allmanager(){
            if ($this->session->userdata('username') != ''){
                $data['manager'] = $this->Admin_oper_model->all_manager();
                $data['username'] = $this->session->userdata('username');
                
    
                $this->load->view('admin/Man_manager',$data);
            }
        }
        
        public function deladmin() {
            if ($this->session->userdata('username') != ''){
                $this->Admin_oper_model->del_admin();
                $this->load->view('admin/del_ok');
            }
        }
        
        
    }
