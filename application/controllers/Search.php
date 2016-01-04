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
        $str = $this->search_model->download_handle();
        force_download($filename,$str);
    }
    
    /*上传文件*/
    public function upload()
    {
        $filename = $_FILES['File1']['tmp_name'];
        if(empty($filename))
        {
            echo '请选择要导入的CSV文件!';
            exit;
        }
        $uploadFlag = $this->search_model->upload_handle($filename);
        redirect('search');
      
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
        
    }
     
}
