<?php
class Search_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function set_pages()
    {
        return array(
                'PerPageNum' => $this->input->post('perPageNum'),
                'JumpPageNum' => $this->input->post('jumpPageNum'));
    }
	public function list_page($offset,$num,$order='id desc')
    {
        $table = "tbl_ap_reg_infos";
        
        $str_sql = "SELECT * from {$table} WHERE 1 order by {$order} limit {$offset},{$num}";
        
        return array(
                'total' => $this->db->count_all('tbl_ap_reg_infos'),
                'res' => $this->db->query($str_sql)->result_array()
        );
    }
	
    #public function get_data()
    #{
        
       # $query = $this->db->query("SELECT
       #        tbl_ap_reg_infos.ap_mac,
       #        tbl_ap_reg_infos.ap_sn,
       #        tbl_ap_reg_infos.sw_ver,
       #        tbl_ap_reg_infos.web_rsrc_ver,
        #       tbl_ap_reg_infos.last_login_time,
        #       tbl_ap_reg_infos.first_login_time
        #       FROM tbl_ap_reg_infos ");
        
        
       # return $query->result_array();
   # }
    
    public function user_form($offset,$num,$order='id desc')
    {
   
        $sql_content = "SELECT
               tbl_ap_reg_infos.ap_mac,
               tbl_ap_reg_infos.ap_sn,
               tbl_ap_reg_infos.sw_ver,
               tbl_ap_reg_infos.web_rsrc_ver,
               tbl_ap_reg_infos.last_login_time,
               tbl_ap_reg_infos.first_login_time
               FROM tbl_ap_reg_infos
               WHERE 1 ";
        $sql_total = "SELECT count(*) FROM tbl_ap_reg_infos WHERE 1 ";
        
        if($this->input->post('mac') != NULL)
        {
            $sql_content.=" AND tbl_ap_reg_infos.ap_mac like '%{$this->input->post('mac')}%'";
            $sql_total.=" AND tbl_ap_reg_infos.ap_mac='{$this->input->post('mac')}'";
        }
        if($this->input->post('apgroup') != NULL)
        {
            $sql_content.=" AND tbl_ap_reg_infos.ap_group like '%{$this->input->post('apgroup')}%'";
            $sql_total.=" AND tbl_ap_reg_infos.ap_group='{$this->input->post('apgroup')}'";
        }
        if($this->input->post('SwVer') != NULL)
        {
            $sql_content.=" AND tbl_ap_reg_infos.sw_ver like '%{$this->input->post('swver')}%'";
            $sql_total.=" AND tbl_ap_reg_infos.sw_ver='{$this->input->post('swver')}'";
        }
        if($this->input->post('apstatus') != NULL)
        {
            $sql_content.=" AND tbl_ap_reg_infos.ap_status like '%{$this->input->post('apstatus')}%'";
            $sql_total.=" AND tbl_ap_reg_infos.ap_status='{$this->input->post('apstatus')}'";
        }
        if($this->input->post('apip') != NULL)
        {
            $sql_content.=" AND tal_ap_status_infos.apip like '%{$this->input->post('apip')}%'";
            $sql_total.=" AND tal_ap_status_infos.apip='{$this->input->post('apip')}'";
        }
        if($this->input->post('FirstLoginTimebegin') != NULL)
        {
            $sql_content.=" AND tbl_ap_reg_infos.first_login_time >='{$this->input->post('FirstLoginTimebegin')}'"; 
            $sql_total.=" AND tbl_ap_reg_infos.first_login_time >='{$this->input->post('FirstLoginTimebegin')}'"; 
        }
        if($this->input->post('FirstLoginTimeend') != NULL)
        {
            $sql_content.=" AND tbl_ap_reg_infos.first_login_time <='{$this->input->post('FirstLoginTimeend')}'";
            $sql_total.=" AND tbl_ap_reg_infos.first_login_time <='{$this->input->post('FirstLoginTimeend')}'";
        }
        if($this->input->post('LastLoginTimebegin') != NULL)
        {
            $sql_content.=" AND tbl_ap_reg_infos.last_login_time >='{$this->input->post('LastLoginTimebegin')}'";
            $sql_total.=" AND tbl_ap_reg_infos.last_login_time >='{$this->input->post('LastLoginTimebegin')}'";
        }
        if($this->input->post('LastLoginTimeend') != NULL)
        {
            $sql_content.=" AND tbl_ap_reg_infos.last_login_time <='{$this->input->post('LastLoginTimeend')}'";
            $sql_total.=" AND tbl_ap_reg_infos.last_login_time <='{$this->input->post('LastLoginTimeend')}'";
        }
        if($this->input->post('apsn') != NULL)
        {
            $sql_content.=" AND tbl_ap_reg_infos.ap_sn like '%{$this->input->post('apsn')}%'";
            $sql_total.=" AND tbl_ap_reg_infos.ap_sn='{$this->input->post('apsn')}'";
        }
        if($this->input->post('webrsrcver') != NULL)
        {
            $sql_content.=" AND tbl_ap_reg_infos.web_rsrc_ver like '%{$this->input->post('webrsrcver')}%'";
            $sql_total.=" AND tbl_ap_reg_infos.web_rsrc_ver='{$this->input->post('webrsrcver')}'";
        }
        if($this->input->post('apiparea') != NULL)
        {
            $sql_content.=" AND tbl_ap_reg_infos.apiparea like '%{$this->input->post('apiparea')}%'";
            $sql_total.=" AND tbl_ap_reg_infos.apiparea='{$this->input->post('apiparea')}'";
        }
        $sql_content.=" order by {$order} limit {$offset},{$num}";
        $sql_total.=" order by {$order} limit {$offset},{$num}";      
        
        return array(
            'res' => $this->db->query($sql_content)->result_array(),
            'total' => $this->db->count_all('tbl_ap_reg_infos')
        );                           
  
    }
}

#INNER JOIN ON ORDER BY tbl_ap_reg_infos.LastLoginTime 
 
