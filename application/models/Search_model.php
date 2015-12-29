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
            'res' => $this->db->query("{$sql} order by 'id desc' limit 0,{$config['per_page']}")->result_array(),
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
    public function upload_handle()
    {
        $handle = fopen($filename,'r');
        $result = array();
        $n = 0;
        $data = fgetcsv($handle);
        $num = count($data);
        $read_times = $read_times = ceil($num / 10000) +1;
        $data_values = '';
        for($i = 0; $i < $read_times; $i++)
        {
            for($j = 0;$j < 10000;$j++)
            {
                $result[$i][$j] = $data[$j];
            }
            $len_result = count($result) - 1;
//            for($k = 1;$k <$k < len_result; $k++)
//            {
//                $data_values .= "('$result[$k][0]','$result[$k][1]','$result[$k][2]','$result[$k][3]','$result[$k][4]','$result[$k][5]','$result[$k][6]','$result[$k][7]','$result[$k][8]','$result[$k][9]','$result[$k][10]','$result[$k][11]','$result[$k][12]','$result[$i][13]','$result[$i][14]','$result[$i][15]','$result[$i][16]','$result[$i][17]','$result[$i][18]','$result[$i][19]','$result[$i][20]','$result[$i][21]','$result[$i][22]','$result[$i][23]','$result[$i][24]','$result[$i][25]','$result[$i][26]','$result[$i][27]','$result[$i][28]','$result[$i][29]','$result[$i][30]','$result[$i][31]','$result[$i][32]','$result[$i][33]','$result[$i][34]','$result[$i][35]','$result[$i][36]','$result[$i][37]','$result[$i][38]','$result[$i][39]','$result[$i][40]','$result[$i][41]','$result[$i][42]','$result[$i][43]','$result[$i][44]'),";
//            }
            
        }
//        while($data = fgetcsv($handle))
//        {
//            $num = count($data);
//            for($i = 0; $i < $num; $i++)
//            {
//                $result[$n][$i] = $data[$i];
//            }
//            $n++;
//        }
        
        $len_result = count($result) - 1;
        if($len_result === 0)
        {
            echo '数据为空';
            exit;
        }
        $data_values = '';
            for($i=1;$i < $len_result;$i++)
            {  
                $data_values .= "('$result[$i][0]','$result[$i][1]','$result[$i][2]','$result[$i][3]','$result[$i][4]','$result[$i][5]','$result[$i][6]','$result[$i][7]','$result[$i][8]','$result[$i][9]','$result[$i][10]','$result[$i][11]','$result[$i][12]','$result[$i][13]','$result[$i][14]','$result[$i][15]','$result[$i][16]','$result[$i][17]','$result[$i][18]','$result[$i][19]','$result[$i][20]','$result[$i][21]','$result[$i][22]','$result[$i][23]','$result[$i][24]','$result[$i][25]','$result[$i][26]','$result[$i][27]','$result[$i][28]','$result[$i][29]','$result[$i][30]','$result[$i][31]','$result[$i][32]','$result[$i][33]','$result[$i][34]','$result[$i][35]','$result[$i][36]','$result[$i][37]','$result[$i][38]','$result[$i][39]','$result[$i][40]','$result[$i][41]','$result[$i][42]','$result[$i][43]','$result[$i][44]'),";
            }
            $data_values = substr($data_values,0,-1);
            fclose($handle);
            $query = $this->db->query("insert into tbl_ap_reg_infos (ap_mac,ap_sn,ap_vendor,ap_model,ap_ver,pcba_model,pcba_version,hw_mac,hw_pn,hw_ver,memory_size,flash_size,flash_vendor,flash_psn,hdd_vendor,hdd_model,hdd_s_n,hdd_disksize,hdd_fw_ver,sd_model,sd_disksize,ext_wifi_model,ext_wifi_m_a_c,ext_wifi_s_n,c_wan_count,c_wan0_model,c_wan0_meid,c_wan0_fw_ver,c_wan0_iccid,c_wan0_carrier,c_wan1_model,c_wan1_meid,c_wan1_fw_ver,c_wan1_iccid,c_wan1_carrier,sw_ver,web_frame_ver,web_rsrc_ver,cfg_ver,last_login_time,last_login_lat,last_login_lng,first_login_time,first_login_lat,first_login_lng) values {$data_values}");
            return $query;
    }

    public function download_handle()
    {
        $total_count = $this->db->query("select count(*) from tbl_ap_reg_infos");
        $read_times = ceil($total_count / 10000) +1;
         $str = "ap_mac,ap_sn,ap_vendor,ap_model,ap_ver,pcba_model,pcba_version,hw_mac,hw_pn,hw_ver,memory_size,flash_size,flash_vendor,flash_psn,hdd_vendor,hdd_model,hdd_s_n,hdd_disksize,hdd_fw_ver,sd_model,sd_disksize,ext_wifi_model,ext_wifi_m_a_c,ext_wifi_s_n,c_wan_count,c_wan0_model,c_wan0_meid,c_wan0_fw_ver,c_wan0_iccid,c_wan0_carrier,c_wan1_model,c_wan1_meid,c_wan1_fw_ver,c_wan1_iccid,c_wan1_carrier,sw_ver,web_frame_ver,web_rsrc_ver,cfg_ver,last_login_time,last_login_lat,last_login_lng,first_login_time,first_login_lat,first_login_lng\n";
        for($i = 0; $i < $read_times; $i++)
        {
            $result = $this->db->query("select * from tbl_ap_reg_infos limit {$i},1000")->result_array();
            foreach($result as $row)
            {        $str.=$row['ap_mac'].",".$row['ap_sn'].",".$row['ap_vendor'].",".$row['ap_model'].",".$row['ap_ver'].",".$row['pcba_model'].",".$row['pcba_version'].",".$row['hw_mac'].",".$row['hw_pn'].",".$row['hw_ver'].",".$row['memory_size'].",".$row['flash_size'].",".$row['flash_vendor'].",".$row['flash_psn'].",".$row['hdd_vendor'].",".$row['hdd_model'].",".$row['hdd_s_n'].",".$row['hdd_disksize'].",".$row['hdd_fw_ver'].",".$row['sd_model'].",".$row['sd_disksize'].",".$row['ext_wifi_model'].",".$row['ext_wifi_m_a_c'].",".$row['ext_wifi_s_n'].",".$row['c_wan_count'].",".$row['c_wan0_model'].",".$row['c_wan0_meid'].",".$row['c_wan0_fw_ver'].",".$row['c_wan0_iccid'].",".$row['c_wan0_carrier'].",".$row['c_wan1_model'].",".$row['c_wan1_meid'].",".$row['c_wan1_fw_ver'].",".$row['c_wan1_iccid'].",".$row['c_wan1_carrier'].",".$row['sw_ver'].",".$row['web_frame_ver'].",".$row['web_rsrc_ver'].",".$row['cfg_ver'].",".$row['last_login_time'].",".$row['last_login_lat'].",".$row['last_login_lng'].",".$row['first_login_time'].",".$row['first_login_lat'].",".$row['first_login_lng']."\n";
            }
        }
        return $str;
    } 
}

#INNER JOIN ON ORDER BY tbl_ap_reg_infos.LastLoginTime 
 
