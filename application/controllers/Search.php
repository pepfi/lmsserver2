<?php
class Search extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('search_model');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper(array('form','url'));
        /*session start by wmg*/
        $this->load->library('session');
        /*session end by wmg*/
	$this->load->library('pagination');
	$this->load->library('ftp');
    }
    
    private $per_page = '20';
    
    #public $config['per_page'] = $this->per_page;
   # public $current_page = intval($this->input->get_post('per_page',true));
    private $prev_link = '上一页';
    private $next_link = '下一页';
    public function set_pages()
    {
        if($this->form_validation->run() === FALSE)
        {
             $config_page['per_page'] = $this->per_page;
            
        }
        else
        {
            $page_info = $this->search_model->set_pages();
            $config_page['per_page'] = $page_info['PerPageNum'];
        }
    }
    public function index()
    {
        
        //$this->form_validation->set_rules('mac', 'ApMac', 'required');
       // $this->form_validation->set_rules('apgroup', 'apgroup', 'required');
        //$this->form_validation->set_rules('swver', 'swver', 'required');
        //$this->form_validation->set_rules('apstatus', 'apstatus', 'required');
        $this->form_validation->set_rules('apip', 'apip', 'valid_ip');
        //$this->form_validation->set_rules('FirstLoginTimebegin', 'FirstLoginTimebegin', 'required');
       // $this->form_validation->set_rules('FirstLoginTimeend', 'FirstLoginTimeend', 'required');
        //$this->form_validation->set_rules('LastLoginTimebegin', 'LastLoginTimebegin', 'required');
        //$this->form_validation->set_rules('LastLoginTimeend', 'LastLoginTimeend', 'required');
        //$this->form_validation->set_rules('apsn', 'apsn', 'required');
       // $this->form_validation->set_rules('webrsrcver', 'webrsrcver', 'required');
       // $this->form_validation->set_rules('apiparea', 'apiparea', 'required');
        
        if($this->form_validation->run() === FALSE)
        {
			
	        $config = array();
            $config['per_page'] = $this->per_page;
            $current_page = intval($this->input->get_post('per_page',true));
            
            if($current_page == 0)
            {
                $current_page = 1;
            }
            $offset = ($current_page - 1) * $config['per_page'];
            $search_info = $this->search_model->list_page($offset,$config['per_page'],$order='id desc');
            $config['base_url'] = 'http://121.43.231.237:888/index.php/search/index';
            $config['prev_link'] = $this->prev_link;
            $config['next_link'] = $this->next_link;
            $config['total_rows'] = $search_info['total'];//数据总条数
            
            $config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
	        $total_page = ($search_info['total'] / $this->per_page) + 1;
            $this->pagination->initialize($config);
            
            $data = array(
                'info' => $search_info['res'],
                'total' => $search_info['total'],
                'current_page' => $config['per_page'],
		        'page_num' => $total_page,
                'page' => $this->pagination->create_links(),
		        'username' => $this->session->userdata('username'),
                'error' => '');
            $this->load->view('search',$data);
        }
        else
        {
	        $config = array();
            $config['per_page'] = $this->per_page;
            $current_page = intval($this->input->get_post('per_page',true));
            
            if($current_page == 0)
            {
                $current_page = 1;
            }
            $offset = ($current_page - 1) * $config['per_page'];
            $search_info = $this->search_model->user_form($offset,$config['per_page'],$order='id desc');
            $config['base_url'] = 'http://121.43.231.237:888/index.php/search/index';
            $config['prev_link'] = $this->prev_link;
            $config['next_link'] = $this->next_link;
            $config['total_rows'] = $search_info['total'];//数据总条数
            $config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $total_page = ($search_info['total'] / $this->per_page) + 1;
            $this->pagination->initialize($config);
            
            $data = array(
                'info' => $search_info['res'],
                'total' => $search_info['total'],
                'current_page' => $config['per_page'],
                'page' => $this->pagination->create_links(),
                'page_num' => $total_page,
	            'username' => $this->session->userdata('username'),
                'error' => '');
            $this->load->view('search',$data);
                 
        }
    } 
}
