<?php
class Download extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
        $this->load->helper('string');
        $this->load->database();
    }
    
    public function do_download()
    {
	echo "1111";
        $query = $this->db->query("select * from tbl_ap_reg_infos");
	echo "55555";
        $result = $query->result_array();
	echo "66666";
        $str = "ap_mac,ap_sn,ap_vendor,ap_model,ap_ver,pcba_model,pcba_version,hw_mac,hw_pn,hw_ver,memory_size,flash_size,flash_vendor,flash_psn,hdd_vendor,hdd_model,hdd_s_n,hdd_disksize,hdd_fw_ver,sd_model,sd_disksize,ext_wifi_model,ext_wifi_m_a_c,ext_wifi_s_n,c_wan_count,c_wan0_model,c_wan0_meid,c_wan0_fw_ver,c_wan0_iccid,c_wan0_carrier,c_wan1_model,c_wan1_meid,c_wan1_fw_ver,c_wan1_iccid,c_wan1_carrier,sw_ver,web_frame_ver,web_rsrc_ver,cfg_ver,last_login_time,last_login_lat,last_login_lng,first_login_time,first_login_lat,first_login_lng\n";
	echo "777";
        $content = array();
	echo "8888";
        foreach($result as $row){
            $str.=$row['ap_mac'].",".$row['ap_sn'].",".$row['ap_vendor'].",".$row['ap_model'].",".$row['ap_ver'].",".$row['pcba_model'].",".$row['pcba_version'].",".$row['hw_mac'].",".$row['hw_pn'].",".$row['hw_ver'].",".$row['memory_size'].",".$row['flash_size'].",".$row['flash_vendor'].",".$row['flash_psn'].",".$row['hdd_vendor'].",".$row['hdd_model'].",".$row['hdd_s_n'].",".$row['hdd_disksize'].",".$row['hdd_fw_ver'].",".$row['sd_model'].",".$row['sd_disksize'].",".$row['ext_wifi_model'].",".$row['ext_wifi_m_a_c'].",".$row['ext_wifi_s_n'].",".$row['c_wan_count'].",".$row['c_wan0_model'].",".$row['c_wan0_meid'].",".$row['c_wan0_fw_ver'].",".$row['c_wan0_iccid'].",".$row['c_wan0_carrier'].",".$row['c_wan1_model'].",".$row['c_wan1_meid'].",".$row['c_wan1_fw_ver'].",".$row['c_wan1_iccid'].",".$row['c_wan1_carrier'].",".$row['sw_ver'].",".$row['web_frame_ver'].",".$row['web_rsrc_ver'].",".$row['cfg_ver'].",".$row['last_login_time'].",".$row['last_login_lat'].",".$row['last_login_lng'].",".$row['first_login_time'].",".$row['first_login_lat'].",".$row['first_login_lng']."\n";
        }
	echo "222222";
        $filename = date('Ymd').'.csv';
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
        header("Content-Type: application/vnd.ms-execl");
	echo "33333"; 
        force_download($filename,$str);
	echo "444444";
//        //输出Excel文件名
//        $filename = '设备管理.csv';
//        
//        $newarray = array();
//        if($this->input->get() !== false){
//            $conn = $this->getformdata();
//        }
//        
//        //excel列明
//        $head = array(
//            'ap_mac','ap_sn','ap_vendor',
//            'ap_model','ap_ver','pcba_model','pcba_version',
//            'hw_mac','hw_pn','hw_ver','memory_size',
//            'flash_size','flash_vendor','flash_psn',
//            'hdd_vendor','hdd_model','hdd_s_n','hdd_disksize',
//            'hdd_fw_ver','sd_model','sd_disksize','ext_wifi_model',
//            'ext_wifi_m_a_c','ext_wifi_s_n','c_wan_count','c_wan0_model',
//            'c_wan0_meid','c_wan0_fw_ver','c_wan0_iccid','c_wan0_carrier',
//            'c_wan1_model','c_wan1_meid','c_wan1_fw_ver','c_wan1_iccid',
//            'c_wan1_carrier','sw_ver','web_frame_ver','web_rsrc_ver',
//            'cfg_ver','last_login_time','last_login_lat','last_login_lng',
//            'first_login_time','first_login_lat','first_login_lng'
//        );
//        
//        foreach($head as $i =>$v){
////            //转码
//            $head[$i] = iconv('utf-8', 'gbk', $v);
//        }
//        $fp = fopen('localhost/test.txt','a');
//        //$newarray[]=implode(',',$head);//数组转换字符串
//        fputcsv($fp,$head);
//        $sql = "SELECT * FROM tbl_ap_reg_infos";
//        $query = $this->db->query($sql);
//        
//        $cnt = 0;
//        $limit = 8000;
//        $content = array();
//        foreach($query->result_array() as $row){
//            $cnt ++;
//            if($limit == $cnt){
//                ob_flush();
//                flush();
//                $cnt = 0;
//            }
//            
//            
//            $content[]=$row['ap_mac'];
//            $content[]=$row['ap_sn'];
//            $content[]=$row['ap_vendor'];
//            $content[]=$row['ap_model'];
//            $content[]=$row['ap_ver'];
//            $content[]=$row['pcba_model'];
//            $content[]=$row['pcba_version'];
//            $content[]=$row['hw_mac'];
//            $content[]=$row['hw_pn'];
//            $content[]=$row['hw_ver'];
//            $content[]=$row['memory_size'];
//            $content[]=$row['flash_size'];
//            $content[]=$row['flash_vendor'];
//            $content[]=$row['flash_psn'];
//            $content[]=$row['hdd_vendor'];
//            $content[]=$row['hdd_model'];
//            $content[]=$row['hdd_s_n'];
//            $content[]=$row['hdd_disksize'];
//            $content[]=$row['hdd_fw_ver'];
//            $content[]=$row['sd_model'];
//            $content[]=$row['sd_disksize'];
//            $content[]=$row['ext_wifi_model'];
//            $content[]=$row['ext_wifi_m_a_c'];
//            $content[]=$row['ext_wifi_s_n'];
//            $content[]=$row['c_wan_count'];
//            $content[]=$row['c_wan0_model'];
//            $content[]=$row['c_wan0_meid'];
//            $content[]=$row['c_wan0_fw_ver'];
//            $content[]=$row['c_wan0_iccid'];
//            $content[]=$row['c_wan0_carrier'];
//            $content[]=$row['c_wan1_model'];
//            $content[]=$row['c_wan1_meid'];
//            $content[]=$row['c_wan1_fw_ver'];
//            $content[]=$row['c_wan1_iccid'];
//            $content[]=$row['c_wan1_carrier'];
//            $content[]=$row['sw_ver'];
//            $content[]=$row['web_frame_ver'];
//            $content[]=$row['web_rsrc_ver'];
//            $content[]=$row['cfg_ver'];
//            $content[]=$row['last_login_time'];
//            $content[]=$row['last_login_lat'];
//            $content[]=$row['last_login_lng'];
//            $content[]=$row['first_login_time'];
//            $content[]=$row['first_login_lat'];
//            $content[]=$row['first_login_lng'];
//            
//            $newarray =implode(',',$content);
//        }
//        //$newarray =implode('\n',$content);
//        force_download($filename,$newarray);      
    }
}
