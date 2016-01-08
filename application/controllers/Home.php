<?php
class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('search_model');
        $this->load->helper('url_helper');
        //$this->load->library('form_validation');
        $this->load->library('session');
        //$this->load->helper('form');
        $this->load->helper('url');
    }
    public function index()
    {
       # if((_POST['username']) ===NULL)
       # {
       #     $this->load->view('login2');
       # }

	    $data['username'] = $this->session->userdata('username');
        $this->load->view('home', $data);
    }
}
