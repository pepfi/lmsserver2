<?php
class Search_model extends CI_Model {

    public function __construct()
    {
       
    }
    public function index_pagination_handle($sql)
    {
        $config = array();
        if($_SESSION['perPageNum'] != 20)
        {
            $config['per_page'] = $_SESSION['perPageNum'];
            $_SESSION['perPageNum'] = 20;
        }
        else
        {
            $config['per_page'] = 20;
        } 
        $current_page = intval($this->input->get_post('per_page',true));
        if($current_page == 0)
        {
            $current_page = 1;
        }
        if($_SESSION['jumpPageNum'] > 1)
        {
            $current_page = $_SESSION['jumpPageNum'];
            $_SESSION['jumpPageNum'] = 1;
        }
        $offset = ($current_page - 1) * $config['per_page'] ;
        $config['base_url'] = 'http://localhost/index.php/search';
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $config['total_rows'] = $this->db->count_all('tbl_ap_reg_infos');//数据总条数
            
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
	    $total_page = ceil($config['total_rows'] / $_SESSION['perPageNum']);
        $this->pagination->initialize($config);
        return array(
            'res' => $this->db->query("{$sql} WHERE 1 order by 'id desc' limit {$offset},{$config['per_page']}")->result_array(),
            'total' => $config['total_rows'],
            'current_page' => $_SESSION['perPageNum'],
            'page' => $this->pagination->create_links(),
            'page_num' => $total_page,
            'aaa' => $offset,
            'username' => $this->session->userdata('username'),
            'error' => '');
    }
    public function index_sql()
    {
        $sql = "SELECT
            tbl_ap_reg_infos.ap_mac,
            tbl_ap_reg_infos.ap_sn,
            tbl_ap_reg_infos.sw_ver,
            tbl_ap_reg_infos.web_rsrc_ver,
            tbl_ap_reg_infos.last_login_time,
            tbl_ap_reg_infos.first_login_time
            FROM tbl_ap_reg_infos";
        return $sql;
    }
    public function search_pagination_handle($sql)
    {
        $config = array();
        if($_SESSION['perPageNum'] != 20)
        {
            $config['per_page'] = $_SESSION['perPageNum'];
            $_SESSION['perPageNum'] = 20;
        }
        else
        {
            $config['per_page'] = 20;
        }
        $current_page = intval($this->input->get_post('per_page',true));
        if($current_page == 0)
        {
            $current_page = 1;
        }
        if($_SESSION['jumpPageNum'] > 1)
        {
            $current_page = $_SESSION['jumpPageNum'];
            $_SESSION['jumpPageNum'] = 1;
        }
        $offset = ($current_page - 1) * $config['per_page'];
        $config['base_url'] = 'http://localhost/index.php/search/search';
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $config['total_rows'] = $this->db->query("$sql")->num_rows();//数据总条数    
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
	    $total_page = ceil($config['total_rows'] / $config['per_page']);
        $this->pagination->initialize($config);
        return array(
            'res' => $this->db->query("{$sql} order by 'id desc' limit {$offset},{$config['per_page']}")->result_array(),
            'total' => $config['total_rows'],
            'current_page' => $config['per_page'],
            'page' => $this->pagination->create_links(),
            'page_num' => $total_page,
            'username' => $this->session->userdata('username'),
            'error' => '');
    }
    public function search_sql()
    {
         $sql = "SELECT 
            tbl_ap_reg_infos.ap_mac,
            tbl_ap_reg_infos.ap_sn,
            tbl_ap_reg_infos.sw_ver,
            tbl_ap_reg_infos.web_rsrc_ver,
            tbl_ap_reg_infos.last_login_time,
            tbl_ap_reg_infos.first_login_time
            FROM tbl_ap_reg_infos
            WHERE 1 ";

        if($this->input->post('mac') != NULL)
        {
            $sql.=" AND ap_mac like '%{$this->input->post('mac')}%'";
        }
        if($this->input->post('apgroup') != NULL)
        {  
            $sql.=" AND ap_group like '%{$this->input->post('apgroup')}%'";
        }
        if($this->input->post('SwVer') != NULL)
        {
            $sql.=" AND sw_ver like '%{$this->input->post('swver')}%'";
        }
        if($this->input->post('apstatus') != NULL)
        {
            $sql.=" AND ap_status like '%{$this->input->post('apstatus')}%'";
        }
        if($this->input->post('apip') != NULL)
        {
            $sql.=" AND apip like '%{$this->input->post('apip')}%'";
        }
        if($this->input->post('FirstLoginTimebegin') != NULL)
        {
            $sql.=" AND first_login_time >='{$this->input->post('FirstLoginTimebegin')}'"; 
        }
        if($this->input->post('FirstLoginTimeend') != NULL)
        {
            $sql.=" AND first_login_time <='{$this->input->post('FirstLoginTimeend')}'";
        }
        if($this->input->post('LastLoginTimebegin') != NULL)
        {
            $sql.=" AND last_login_time >='{$this->input->post('LastLoginTimebegin')}'";
        }
        if($this->input->post('LastLoginTimeend') != NULL)
        {
            $sql.=" AND last_login_time <='{$this->input->post('LastLoginTimeend')}'";
        }
        if($this->input->post('apsn') != NULL)
        {
            $sql.=" AND ap_sn like '%{$this->input->post('apsn')}%'";
        }
        if($this->input->post('webrsrcver') != NULL)
        {
            $sql.=" AND web_rsrc_ver like '%{$this->input->post('webrsrcver')}%'";
        }
        if($this->input->post('apiparea') != NULL)
        {
            $sql.=" AND apiparea like '%{$this->input->post('apiparea')}%'";
        }
        
        return $sql;
    }
    
    public function upload_handle($filename)
    {
        $handle = fopen($filename,'r');
        $result = array();
        $n = 0;
        $uploadFlag = 0;
        while($data = fgetcsv($handle))
        {
            if($data[0] == 'ap_mac')
            {
                continue;
            }
            if($this->db->query("SELECT * from tbl_ap_reg_infos WHERE ap_mac = '{$data[0]}'"))
            {
                $this->db->query("UPDATA tbl_ap_reg_infos SET ap_sn='{$data[1]}',ap_vendor='{$data[2]}',ap_model='{$data[3]}',ap_ver='{$data[4]}',pcba_model='{$data[5]}',pcba_version='{$data[6]}',hw_mac='{$data[7]}',hw_pn='{$data[8]}',hw_ver='{$data[9]}',memory_size='{$data[10]}',flash_size='{$data[11]}',flash_vendor='{$data[12]}',flash_psn='{$data[13]}',hdd_vendor='{$data[14]}',hdd_model='{$data[15]}',hdd_s_n='{$data[16]}',hdd_disksize='{$data[17]}',hdd_fw_ver='{$data[18]}',sd_model='{$data[19]}',sd_disksize='{$data[20]}',ext_wifi_model='{$data[21]}',ext_wifi_m_a_c='{$data[22]}',ext_wifi_s_n='{$data[23]}',c_wan_count='{$data[24]}',c_wan0_model='{$data[25]}',c_wan0_meid='{$data[26]}',c_wan0_fw_ver='{$data[27]}',c_wan0_iccid='{$data[28]}',c_wan0_carrier='{$data[29]}',c_wan1_model='{$data[30]}',c_wan1_meid='{$data[31]}',c_wan1_fw_ver='{$data[32]}',c_wan1_iccid='{$data[33]}',c_wan1_carrier='{$data[34]}',sw_ver='{$data[35]}',web_frame_ver='{$data[36]}',web_rsrc_ver='{$data[37]}',cfg_ver='{$data[38]}',last_login_time='{$data[39]}',last_login_lat='{$data[40]}',last_login_lng='{$data[41]}',first_login_time='{$data[42]}',first_login_lat='{$data[43]}',first_login_lng='{$data[44]}' WHERE ap_mac='{$data[0]}'");
            }
            else
            {
                $this->db->query("insert into tbl_ap_reg_infos (ap_mac,ap_sn,ap_vendor,ap_model,ap_ver,pcba_model,pcba_version,hw_mac,hw_pn,hw_ver,memory_size,flash_size,flash_vendor,flash_psn,hdd_vendor,hdd_model,hdd_s_n,hdd_disksize,hdd_fw_ver,sd_model,sd_disksize,ext_wifi_model,ext_wifi_m_a_c,ext_wifi_s_n,c_wan_count,c_wan0_model,c_wan0_meid,c_wan0_fw_ver,c_wan0_iccid,c_wan0_carrier,c_wan1_model,c_wan1_meid,c_wan1_fw_ver,c_wan1_iccid,c_wan1_carrier,sw_ver,web_frame_ver,web_rsrc_ver,cfg_ver,last_login_time,last_login_lat,last_login_lng,first_login_time,first_login_lat,first_login_lng) values ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]','$data[20]','$data[21]','$data[22]','$data[23]','$data[24]','$data[25]','$data[26]','$data[27]','$data[28]','$data[29]','$data[30]','$data[31]','$data[32]','$data[33]','$data[34]','$data[35]','$data[36]','$data[37]','$data[38]','$data[39]','$data[40]','$data[41]','$data[42]','$data[43]','$data[44]')");
            }
        }
    }
//        $handle = fopen($filename,'r');
//        $result = array();
//        $n = 0;
//        $uploadFlag = 0;
//        $query_del = $this->db->query("TRUNCATE TABLE tbl_ap_reg_infos");
//        if($query_del)
//        {
//            while($data = fgetcsv($handle))
//            {
//                if($data[0] == 'ap_mac')
//                {
//                    continue;
//                }
//                $values = "('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]','$data[20]','$data[21]','$data[22]','$data[23]','$data[24]','$data[25]','$data[26]','$data[27]','$data[28]','$data[29]','$data[30]','$data[31]','$data[32]','$data[33]','$data[34]','$data[35]','$data[36]','$data[37]','$data[38]','$data[39]','$data[40]','$data[41]','$data[42]','$data[43]','$data[44]')";
//                $sql = "insert into tbl_ap_reg_infos (ap_mac,ap_sn,ap_vendor,ap_model,ap_ver,pcba_model,pcba_version,hw_mac,hw_pn,hw_ver,memory_size='{$data[10]}',,flash_size,flash_vendor,flash_psn,hdd_vendor,hdd_model,hdd_s_n,hdd_disksize,hdd_fw_ver,sd_model,sd_disksize,ext_wifi_model,ext_wifi_m_a_c,ext_wifi_s_n,c_wan_count,c_wan0_model,c_wan0_meid,c_wan0_fw_ver,c_wan0_iccid,c_wan0_carrier,c_wan1_model,c_wan1_meid,c_wan1_fw_ver,c_wan1_iccid,c_wan1_carrier,sw_ver,web_frame_ver,web_rsrc_ver,cfg_ver,last_login_time,last_login_lat,last_login_lng,first_login_time,first_login_lat,first_login_lng) values {$values}";
//                $query = $this->db->query($sql);
//                if(!$query)
//                {
//                    $uploadFlag = 1;
//                    return $uploadFlag;
//                }
//            }
//            fclose($handle);
//            return $uploadFlag;
//        }
//    }
    public function download_handle()
    {
        $total_count = $this->db->query("select * from tbl_ap_reg_infos")->num_rows();
        $read_times = ceil($total_count / 10000);
        $str = "ap_mac,ap_sn,ap_vendor,ap_model,ap_ver,pcba_model,pcba_version,hw_mac,hw_pn,hw_ver,memory_size,flash_size,flash_vendor,flash_psn,hdd_vendor,hdd_model,hdd_s_n,hdd_disksize,hdd_fw_ver,sd_model,sd_disksize,ext_wifi_model,ext_wifi_m_a_c,ext_wifi_s_n,c_wan_count,c_wan0_model,c_wan0_meid,c_wan0_fw_ver,c_wan0_iccid,c_wan0_carrier,c_wan1_model,c_wan1_meid,c_wan1_fw_ver,c_wan1_iccid,c_wan1_carrier,sw_ver,web_frame_ver,web_rsrc_ver,cfg_ver,last_login_time,last_login_lat,last_login_lng,first_login_time,first_login_lat,first_login_lng\n";
        for($i = 0; $i < $read_times; $i++)
        {
            $result = $this->db->query("select * from tbl_ap_reg_infos limit {$i},10000")->result_array();
            foreach($result as $row)
            {        $str.=$row['ap_mac'].",".$row['ap_sn'].",".$row['ap_vendor'].",".$row['ap_model'].",".$row['ap_ver'].",".$row['pcba_model'].",".$row['pcba_version'].",".$row['hw_mac'].",".$row['hw_pn'].",".$row['hw_ver'].",".$row['memory_size'].",".$row['flash_size'].",".$row['flash_vendor'].",".$row['flash_psn'].",".$row['hdd_vendor'].",".$row['hdd_model'].",".$row['hdd_s_n'].",".$row['hdd_disksize'].",".$row['hdd_fw_ver'].",".$row['sd_model'].",".$row['sd_disksize'].",".$row['ext_wifi_model'].",".$row['ext_wifi_m_a_c'].",".$row['ext_wifi_s_n'].",".$row['c_wan_count'].",".$row['c_wan0_model'].",".$row['c_wan0_meid'].",".$row['c_wan0_fw_ver'].",".$row['c_wan0_iccid'].",".$row['c_wan0_carrier'].",".$row['c_wan1_model'].",".$row['c_wan1_meid'].",".$row['c_wan1_fw_ver'].",".$row['c_wan1_iccid'].",".$row['c_wan1_carrier'].",".$row['sw_ver'].",".$row['web_frame_ver'].",".$row['web_rsrc_ver'].",".$row['cfg_ver'].",".$row['last_login_time'].",".$row['last_login_lat'].",".$row['last_login_lng'].",".$row['first_login_time'].",".$row['first_login_lat'].",".$row['first_login_lng']."\n";
            }
        }
        return $str;
    } 
    
    public function sendOrderHandle()
    {
        $Macs_order_string = $this->uri->segment(3);
        $Macs_array = array();
        $Macs_array = explode("_",$Macs_order_string);
        return $Macs_array;
//        return array(
//            'Mac_name_array' => explode("_",$this->input->post('Mac_name_string')),
//            'apOrderContent' => $this->input->post('aporderContent'));
    }
}

#INNER JOIN ON ORDER BY tbl_ap_reg_infos.LastLoginTime 
 
