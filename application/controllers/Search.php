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
        $mac_order_Array = $this->search_model->sendOrderHandle();
        $totalNum = count($mac_order_Array);
        $i = 0;
        $perMacOrder = array();
        for($i = 0; $i < ($totalNum - 1);$i++)
        {
            $perMacOrder = array(
                'ApMac' => $mac_order_Array[$i],
                'SlowCmd' => $mac_order_Array[$totalNum - 1]);
            $ch = curl_init();
            echo json_encode($perMacOrder);
            $url = "http://lms1.autelan.com:8180/LMS/platform/lteCommand.do";
            $data = json_encode($perMacOrder);
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            //curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
            curl_setopt($ch,CURLOPT_HEADER,false);
            $file_contents = curl_exec($ch);
            curl_close($ch);
        }
        redirect('search');
        return $file_contents;
    }
     
}
