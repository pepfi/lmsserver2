<?php 
    class Home_model extends CI_Model {
       
        public function __construct() 
        {
            parent::__construct();

        }

        public function get_region_status() {
           // $query = $this->db->query("select ap_status,ap_i_p_area from tbl_ap_status_last");
            
           // return $query->result_array();
        }
    }