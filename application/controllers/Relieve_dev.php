<?php
class Relieve_dev extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper(array('form','url'));
        $this->load->database();
       # $this->load->model('delete_dev_model');
    
    }
    
    public function index()
    {
        $sql = "UPDATE tbl_ap_reg_infos set tbl_ap_reg_infos.sw_ver = null
                WHERE ap_mac = '{$this->input->post('apmac_relieve')}'";
        echo "11";
        $query = $this->db->query($sql);
        echo "222";
        if($query)
        {
            redirect('search/index');
        }
        else
        {
            echo "解除绑定失败!";
        }
    }
    
}
