<?php
class Login_model extends CI_Model {

    public function __construct()
    {
            
    }
    
    public function validate()
    {
       $this->db->where('username', $this->input->post('username'));
       $this->db->where('password', MD5($this->input->post('password')));
       $this->db->where('blocked', "0");

        $query = $this->db->get('admin');

        if($query->num_rows() === 1)
        {
            return true;
        }

    }
}