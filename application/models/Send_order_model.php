<?php
class Send_order_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function send_order()
    {
	$sql = "SELECT * from tbl_ap_slow_cmds
		WHERE ap_mac = '{$this->input->post('apmacContent')}'";
	$query = $this->db->query($sql);
	//$result = $query->result_array();
       // echo $result[0];
	$row = mysql_fetch_array($query,MYSQL_ASSOC);
	if(!$mysql_num_rows($query))
	{ 
            return array(
                'ApMac' => $this->input->post('apmacContent'),
                'SlowCmd' => $this->input->post('aporderContent'));
	}else{
	    return 0;
	}
    }
    
    
}
