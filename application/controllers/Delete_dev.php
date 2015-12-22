<?php
class Delete_dev extends CI_Controller {

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
        echo "000";
       # $this->model->delete_dev_sql();
        $sql = "DELETE from tbl_ap_reg_infos
                WHERE ap_mac = '{$this->input->post('apmac_del')}'";
        echo "111";
        $query = $this->db->query($sql);
    
        echo "222";
        if($query)
        {
            redirect('search/index');
            echo "3333";
        }
        else
        {
            echo "删除设备失败!";
        }
    }
    
}