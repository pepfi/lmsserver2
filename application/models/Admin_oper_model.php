<?php
    class Admin_oper_model extends CI_Model {
        
        public function __construct(){
            $this->load->database();
	    $this->load->helper('url');
        }
        
        public function add_admin(){
            
            $data = array(
                'mastername' => $this->input->post('username'),
                'masterpass' => $this->input->post('password'),
                'masteremail' => $this->input->post('email')
            );
            
            return $this->db->insert('master', $data);
        }
        
        public function all_manager(){
            
            $query = $this->db->get('master');
            return $query->result_array();
            
        }
        
        public function del_admin(){
            
            $id = $this->uri->segment(2);
            
            $this->db->where('masterID', $id);
            $this->db->delete('master');
            
        }
        
    }
