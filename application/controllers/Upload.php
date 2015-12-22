<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        #$this->load->helper(array('form', 'url'));
        #$this->load->library('reader');
        $this->load->database();
    }
  
    public function index()
    {
        $filename = $_FILES['File1']['tmp_name'];
        if(empty($filename))
        {
            echo '请选择要导入的CSV文件!';
            exit;
        }
        $handle = fopen($filename,'r');
        $result = array();
        $n = 0;
        while($data = fgetcsv($handle,10000))
        {
            $num = count($data);
            for($i = 0; $i < $num; $i++)
            {
                $result[$n][$i] = $data[$i];
            }
            $n++;
        }
        
        //print_r($result);
        $len_result = count($result) - 1;
        if($len_result === 0)
        {
            echo '数据为空';
            exit;
        }
        $data_values = '';
        for($i=1;$i < $len_result;$i++)
        {
            $ap_mac = $result[$i][0];
            $ap_sn = $result[$i][1];
            $ap_vendor = $result[$i][2];
            $ap_model = $result[$i][3];
            $ap_ver = $result[$i][4];
            $pcba_model = $result[$i][5];
            $pcba_version = $result[$i][6];
            $hw_mac = $result[$i][7];
            $hw_pn = $result[$i][8];
            $hw_ver = $result[$i][9];
            $memory_size = $result[$i][10];
            $flash_size = $result[$i][11];
            $flash_vendor = $result[$i][12];
            $flash_psn = $result[$i][13];
            $hdd_vendor = $result[$i][14];
            $hdd_model = $result[$i][15];
            $hdd_s_n = $result[$i][16];
            $hdd_disksize = $result[$i][17];
            $hdd_fw_ver = $result[$i][18];
            $sd_model = $result[$i][19];
            $sd_disksize = $result[$i][20];
            $ext_wifi_model = $result[$i][21];
            $ext_wifi_m_a_c = $result[$i][22];
            $ext_wifi_s_n = $result[$i][23];
            $c_wan_count = $result[$i][24];
            $c_wan0_model = $result[$i][25];
            $c_wan0_meid = $result[$i][26];
            $c_wan0_fw_ver = $result[$i][27];
            $c_wan0_iccid = $result[$i][28];
            $c_wan0_carrier = $result[$i][29];
            $c_wan1_model = $result[$i][30];
            $c_wan1_meid = $result[$i][31];
            $c_wan1_fw_ver = $result[$i][32];
            $c_wan1_iccid = $result[$i][33];
            $c_wan1_carrier = $result[$i][34];
            $sw_ver = $result[$i][35];
            $web_frame_ver = $result[$i][36];
            $web_rsrc_ver = $result[$i][37];
            $cfg_ver = $result[$i][38];
            $last_login_time = $result[$i][39];
            $last_login_lat = $result[$i][40];
            $last_login_lng = $result[$i][41];
            $first_login_time = $result[$i][42];
            $first_login_lat = $result[$i][43];
            $first_login_lng = $result[$i][44];
//            $query = this->db->query("UPDATE tbl_ap_reg_infos SET(ap_mac,ap_sn,ap_vendor,ap_model,ap_ver,pcba_model,pcba_version,hw_mac,hw_pn,hw_ver,memory_size,flash_size,flash_vendor,flash_psn,hdd_vendor,hdd_model,hdd_s_n,hdd_disksize,hdd_fw_ver,sd_model,sd_disksize,ext_wifi_model,ext_wifi_m_a_c,ext_wifi_s_n,c_wan_count,c_wan0_model,c_wan0_meid,c_wan0_fw_ver,c_wan0_iccid,c_wan0_carrier,c_wan1_model,c_wan1_meid,c_wan1_fw_ver,c_wan1_iccid,c_wan1_carrier,sw_ver,web_frame_ver,web_rsrc_ver,cfg_ver,last_login_time,last_login_lat,last_login_lng,first_login_time,first_login_lat,first_login_lng) = ('$ap_mac','$ap_sn','$ap_vendor','$ap_model','$ap_ver','$pcba_model','$pcba_version','$hw_mac','$hw_pn','$hw_ver','$memory_size','$flash_size','$flash_vendor','$flash_psn','$hdd_vendor','$hdd_model','$hdd_s_n','$hdd_disksize','$hdd_fw_ver','$sd_model','$sd_disksize','$ext_wifi_model','$ext_wifi_m_a_c','$ext_wifi_s_n','$c_wan_count','$c_wan0_model','$c_wan0_meid','$c_wan0_fw_ver','$c_wan0_iccid','$c_wan0_carrier','$c_wan1_model','$c_wan1_meid','$c_wan1_fw_ver','$c_wan1_iccid','$c_wan1_carrier','$sw_ver','$web_frame_ver','$web_rsrc_ver','$cfg_ver','$last_login_time','$last_login_lat','$last_login_lng','$first_login_time','$first_login_lat','$first_login_lng') WHERE tbl_ap_reg_infos.id = {$i}");
            
            $data_values .= "('$ap_mac','$ap_sn','$ap_vendor','$ap_model','$ap_ver','$pcba_model','$pcba_version','$hw_mac','$hw_pn','$hw_ver','$memory_size','$flash_size','$flash_vendor','$flash_psn','$hdd_vendor','$hdd_model','$hdd_s_n','$hdd_disksize','$hdd_fw_ver','$sd_model','$sd_disksize','$ext_wifi_model','$ext_wifi_m_a_c','$ext_wifi_s_n','$c_wan_count','$c_wan0_model','$c_wan0_meid','$c_wan0_fw_ver','$c_wan0_iccid','$c_wan0_carrier','$c_wan1_model','$c_wan1_meid','$c_wan1_fw_ver','$c_wan1_iccid','$c_wan1_carrier','$sw_ver','$web_frame_ver','$web_rsrc_ver','$cfg_ver','$last_login_time','$last_login_lat','$last_login_lng','$first_login_time','$first_login_lat','$first_login_lng'),";
        }
        $data_values = substr($data_values,0,-1);
        fclose($handle);
        $query_del = $this->db->query("TRUNCATE TABLE tbl_ap_reg_infos");
        if(!$query_del)
        {
            echo "11111";
        }
        $query = $this->db->query("insert into tbl_ap_reg_infos (ap_mac,ap_sn,ap_vendor,ap_model,ap_ver,pcba_model,pcba_version,hw_mac,hw_pn,hw_ver,memory_size,flash_size,flash_vendor,flash_psn,hdd_vendor,hdd_model,hdd_s_n,hdd_disksize,hdd_fw_ver,sd_model,sd_disksize,ext_wifi_model,ext_wifi_m_a_c,ext_wifi_s_n,c_wan_count,c_wan0_model,c_wan0_meid,c_wan0_fw_ver,c_wan0_iccid,c_wan0_carrier,c_wan1_model,c_wan1_meid,c_wan1_fw_ver,c_wan1_iccid,c_wan1_carrier,sw_ver,web_frame_ver,web_rsrc_ver,cfg_ver,last_login_time,last_login_lat,last_login_lng,first_login_time,first_login_lat,first_login_lng) values {$data_values}");
        if($query)
        {
            echo '导入成功';
        }else{
            echo '导入失败';
        }
        
        
//        $tmp = $_FILES['File1']['tmp_name'];
//        $save_path = "xls/";
//        $file_name = $save_path.date('Ymdhis').".xls";
//        if(copy($tmp,$file_name))
//        {
//            $xls = new Spreadsheet_Excel_Reader();
//            $xls->setOutputEncoding('utf-8');
//            $xls->read($file_name);
//            
//            for($i=2;$i<=$xls->sheets[0]['numRows'];$i++)
//            {
//                $ap_mac = $xls->sheets[0]['cells'][$i][0];
//                $ap_sn = $xls->sheets[0]['cells'][$i][1];
//                $ap_vendor = $xls->sheets[0]['cells'][$i][2];
//                $ap_model = $xls->sheets[0]['cells'][$i][3];
//                $ap_ver = $xls->sheets[0]['cells'][$i][4];
//                $pcba_model = $xls->sheets[0]['cells'][$i][5];
//                $pcba_version = $xls->sheets[0]['cells'][$i][6];
//                $hw_mac = $xls->sheets[0]['cells'][$i][7];
//                $hw_pn = $xls->sheets[0]['cells'][$i][8];
//                $hw_ver = $xls->sheets[0]['cells'][$i][9];
//                $memory_size = $xls->sheets[0]['cells'][$i][10];
//                $flash_size = $xls->sheets[0]['cells'][$i][11];
//                $flash_vendor = $xls->sheets[0]['cells'][$i][12];
//                $flash_psn = $xls->sheets[0]['cells'][$i][13];
//                $hdd_vendor = $xls->sheets[0]['cells'][$i][14];
//                $hdd_model = $xls->sheets[0]['cells'][$i][15];
//                $hdd_s_n = $xls->sheets[0]['cells'][$i][16];
//                $hdd_disksize = $xls->sheets[0]['cells'][$i][17];
//                $hdd_fw_ver = $xls->sheets[0]['cells'][$i][18];
//                $sd_model = $xls->sheets[0]['cells'][$i][19];
//                $sd_disksize = $xls->sheets[0]['cells'][$i][20];
//                $ext_wifi_model = $xls->sheets[0]['cells'][$i][21];
//                $ext_wifi_m_a_c = $xls->sheets[0]['cells'][$i][22];
//                $ext_wifi_s_n = $xls->sheets[0]['cells'][$i][23];
//                $c_wan_count = $xls->sheets[0]['cells'][$i][24];
//                $c_wan0_model = $xls->sheets[0]['cells'][$i][25];
//                $c_wan0_meid = $xls->sheets[0]['cells'][$i][26];
//                $c_wan0_fw_ver = $xls->sheets[0]['cells'][$i][27];
//                $c_wan0_iccid = $xls->sheets[0]['cells'][$i][28];
//                $c_wan0_carrier = $xls->sheets[0]['cells'][$i][29];
//                $c_wan1_model = $xls->sheets[0]['cells'][$i][30];
//                $c_wan1_meid = $xls->sheets[0]['cells'][$i][31];
//                $c_wan1_fw_ver = $xls->sheets[0]['cells'][$i][32];
//                $c_wan1_iccid = $xls->sheets[0]['cells'][$i][33];
//                $c_wan1_carrier = $xls->sheets[0]['cells'][$i][34];
//                $sw_ver = $xls->sheets[0]['cells'][$i][35];
//                $web_frame_ver = $xls->sheets[0]['cells'][$i][36];
//                $web_rsrc_ver = $xls->sheets[0]['cells'][$i][37];
//                $cfg_ver = $xls->sheets[0]['cells'][$i][38];
//                $last_login_time = $xls->sheets[0]['cells'][$i][39];
//                $last_login_lat = $xls->sheets[0]['cells'][$i][40];
//                $last_login_lng = $xls->sheets[0]['cells'][$i][41];
//                $first_login_time = $xls->sheets[0]['cells'][$i][42];
//                $first_login_lat = $xls->sheets[0]['cells'][$i][43];
//                $first_login_lng = $xls->sheets[0]['cells'][$i][44];
//                
//                $data_values .= "('$ap_mac','$ap_sn','$ap_vendor','$ap_model','$ap_ver','$pcba_model','$pcba_version','$hw_mac','$hw_pn','$hw_ver','$memory_size','$flash_size','$flash_vendor','$flash_psn','$hdd_vendor','$hdd_model','$hdd_s_n','$hdd_disksize','$hdd_fw_ver','$sd_model','$sd_disksize','$ext_wifi_model','$ext_wifi_m_a_c','$ext_wifi_s_n','$c_wan_count','$c_wan0_model','$c_wan0_meid','$c_wan0_fw_ver','$c_wan0_iccid','$c_wan0_carrier','$c_wan1_model','$c_wan1_meid','$c_wan1_fw_ver','$c_wan1_iccid','$c_wan1_carrier','$sw_ver','$web_frame_ver','$web_rsrc_ver','$cfg_ver','$last_login_time','$last_login_lat','$last_login_lng','$first_login_time','$first_login_lat','$first_login_lng')";
//            }
//            $data_values = substr($data_values,0,-1);
//            $query = $this->db->query("insert into tbl_ap_reg_infos (ap_mac,ap_sn,ap_vendor,ap_model,ap_ver,pcba_model,pcba_version,hw_mac,hw_pn,hw_ver,memory_size,flash_size,flash_vendor,flash_psn,hdd_vendor,hdd_model,hdd_s_n,hdd_disksize,hdd_fw_ver,sd_model,sd_disksize,ext_wifi_model,ext_wifi_m_a_c,ext_wifi_s_n,c_wan_count,c_wan0_model,c_wan0_meid,c_wan0_fw_ver,c_wan0_iccid,c_wan0_carrier,c_wan1_model,c_wan1_meid,c_wan1_fw_ver,c_wan1_iccid,c_wan1_carrier,sw_ver,web_frame_ver,web_rsrc_ver,cfg_ver,last_login_time,last_login_lat,last_login_lng,first_login_time,first_login_lat,first_login_lng) values $data_values");
//            
//            if($query){
//                echo '导入成功！';
//            }else{
//                echo '导入失败！';
//            }
//            
//        }
//        
        
    }

  #  public function index()
   # {
    #    $this->load->view('upload_form', array('error' => ' ' ));
   # }

//    public function do_upload()
//    {
//        $config['upload_path']      = getcwd().'./uploads/';
//        $config['allowed_types']    = 'gif|jpg|png|txt|php|csv';
//        $config['overwrite']=true;
//        //$config['max_size']     = 100;
//        $config['max_width']        = 1024;
//        $config['max_height']       = 768;
//
//        $this->load->library('upload', $config);
//
//        if ( ! $this->upload->do_upload('userfile'))
//        {
//            $error = array('error' => $this->upload->display_errors());
//
//            $this->load->view('upload_form', $error);
//        }
//        else
//        {
//            $data = array('upload_data' => $this->upload->data());
//
//            $this->load->view('upload_success', $data);
//        }
//    }
 //   public function do_upload()
  //  {
//        $reader = new Reader();
//        $reader->setOutputEncoding("utf-8");
//        $reader->read("{$_FILES['File1']['tmp_name']}");
//        $ver_data = $reader->sheets[0]['cells'];
//        var_dump($ver_data);
//        $filename = $_FILES['File1']['tmp_name'];
//        $file = fopen($filename,"r");
//        $count = 1;
//        while(!feof($file) && $data = fgetcsv($file))
//        {
//            $result = array();
//            if($count>1 && !empty($data))
//            {
//                for($i=0;$i<3;$i++)
//                {
//                    array_push($result,$data[$i]);
//                }
//                $sql = "insert into tbl_ap_reg_infos(ap_mac,ap_sn,ap_vendor,
//                                            ap_model,ap_ver,pcba_model,pcba_version,
//                                            hw_mac,hw_pn,hw_ver,memory_size,
//                                            flash_size,flash_vendor,flash_psn,
//                                            hdd_vendor,hdd_model,hdd_s_n,hdd_disksize,
//                                            hdd_fw_ver,sd_model,sd_disksize,ext_wifi_model,
//                                            ext_wifi_m_a_c,ext_wifi_s_n,c_wan_count,c_wan0_model,
//                                            c_wan0_meid,c_wan0_fw_ver,c_wan0_iccid,c_wan0_carrier,
//                                            c_wan1_model,c_wan1_meid,c_wan1_fw_ver,c_wan1_iccid,
//                                            c_wan1_carrier,sw_ver,web_frame_ver,web_rsrc_ver,
//                                            cfg_ver,last_login_time,last_login_lat,last_login_lng,
//                                            first_login_time,first_login_lat,first_login_lng) values
//                                            ('{.$result[0].}','{.$result[1].}','{.$result[2].}',
//                                            '{.$result[3].}','{.$result[4].}','{.$result[5].}',
//                                            '{.$result[6].}','{.$result[7].}','{.$result[8].}',
//                                            '{.$result[9].}','{.$result[10].}','{.$result[11].}',
//                                            '{.$result[12].}','{.$result[13].}','{.$result[14].}',
//                                            '{.$result[15].}','{.$result[16].}','{.$result[17].}',
//                                            '{.$result[18].}','{.$result[19].}','{.$result[20].}',
//                                            '{.$result[21].}','{.$result[22].}','{.$result[23].}',
//                                            '{.$result[24].}','{.$result[25].}','{.$result[26].}',
//                                            '{.$result[27].}','{.$result[28].}','{.$result[29].}',
//                                            '{.$result[30].}','{.$result[31].}','{.$result[32].}',
//                                            '{.$result[33].}','{.$result[34].}','{.$result[35].}',
//                                            '{.$result[36].}','{.$result[37].}','{.$result[38].}',
//                                            '{.$result[39].}','{.$result[40].}','{.$result[41].}',
//                                            '{.$result[42].}','{.$result[43].}','{.$result[44].}')";
//                mysql_query($sql);
//            }
//            $count++;
//        }
//        fclose($file);
//        echo "111111";
////        if(emptyempty())
////        {
////            echo '请选择要导入的csv文件！';
////            exit;
////        }
////        $handle = fopen($filename,'r');
////        $result = input_csv($handle);
////        $len_result = count($result);
////        if($len_result==0)
////        {
////            echo '没有任何数据';
////            exit;
////        }
////        for($i = 1; $i <$len_result;$i++)
////        {
////            $name = iconv('gb2312','utf-8',$result[$i][0]);
////            
////        }
//    }
}
?>