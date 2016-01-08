<?php
class Search extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('search_model');    
    }
    /*下载文件*/
    public function download()
    {  
        $filename = date('Ymd').'.csv';
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
        header("Content-Type: application/vnd.ms-execl");
        $data = $this->search_model->download_handle();
        force_download($filename,$data);
        
    }
    
    /*上传文件*/
    public function upload()
    {
        echo "000";
//        $i = 0;
//        while(!(is_uploaded_file($_FILES['File1']['tmp_name'])))
//        {
//            $i++;
//            echo $i;
//        }
        $filename = $_FILES['File1']['tmp_name'];
        echo "222";
        $uploadFlag = $this->search_model->upload_handle($filename);
        echo "333";
        redirect('search');
        echo "444";
        
    }
    public function pagination()
    {    
        if($this->input->post('perPageNum') != null)
        {
            $_SESSION['perPageNum'] = $this->input->post('perPageNum');
            echo $_SESSION['perPageNum'];
        }
        if($this->input->post('jumpPageNum') == null)
        {
            $_SESSION['jumpPageNum'] = 1;
        }else
        {
            $_SESSION['jumpPageNum'] = $this->input->post('jumpPageNum');
        }
        if($_SESSION['FLAG'] == 'index')
        {
            redirect('search');
        }
        elseif($_SESSION['FLAG'] == 'search')
        {
            redirect('search/search');
        }
    }
    public function index()
    {   
        $_SESSION['FLAG'] = 'index'; 
        $sql = $this->search_model->index_sql();
        $data = $this->search_model->index_pagination_handle($sql);
        $this->load->view('search', $data);
    }
    public function search()
    {      
        $_SESSION['FLAG'] = 'search';
        $sql = $this->search_model->search_sql();
        $data = $this->search_model->search_pagination_handle($sql);
        $this->load->view('search', $data);
        
    }
    
    public function sendOrder()
    {
        $mac_order_Array = $this->search_model->getMacHandle();
        $totalNum = count($mac_order_Array);
        $i = 0;
        $j = 0;
        $data['unvailMac'] = '';
        $perMacOrder = array();
        $unvailMacOrder = array();
        $unvailMac = '';
        for($i = 0; $i < ($totalNum - 1);$i++)
        {
            $result = $this->db->query("SELECT * from tbl_ap_slow_cmds WHERE ap_mac='{$mac_order_Array[$i]}'")->result_array();
            if($result)
            {
                $unvailMacOrder[$j] = $mac_order_Array[$i];
                $j++;
                continue;
            }
            $perMacOrder = array(
                'ApMac' => $mac_order_Array[$i],
                'SlowCmd' => $mac_order_Array[$totalNum - 1]);
            $ch = curl_init();
            echo json_encode($perMacOrder);
            $url = "http://lms1.autelan.com:8180/LMS/platform/lteCommand.do";
            $data_json = json_encode($perMacOrder);
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data_json);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            //curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
            curl_setopt($ch,CURLOPT_HEADER,false);
            $file_contents = curl_exec($ch);
            curl_close($ch);
        }
        if($j >= 1)
        {
            for($k = 0; $k < $j; $k++)
            {
                $data['unvailMac'] .= $unvailMacOrder[$k];
                $data['unvailMac'] .= ",";
            }
            $this->load->view('failMac',$data);
        }
        else
        {
            redirect('search',$unvailMac);
            return $file_contents;
        }
    }
    
//    public function delDevice()
//    {
//        $mac_Array = $this->search_model->getMacHandle();
//        $data['Mac'] = '';
//        $totalNum = count($mac_Array);
//        for($i = 0; $i < ($totalNum - 1); $i++)
//        {
//            $query = $this->db->query("DELETE * from tbl_ap_slow_cmds WHERE ap_mac='{$mac_Array[$i]}'");
//        }
//        redirect('search');
//    }
     
}
