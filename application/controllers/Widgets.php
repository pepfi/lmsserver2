<?php
class Widgets extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
        
        /*session start by wmg*/
        $this->load->library('session');
        /*session end by wmg*/
    }
    
    public function index()
    {
        /*调用session bywmg start*/
        $data['username'] = $this->session->userdata('username');
        /*调用session end*/
        $this->load->view('widgets', $data);
    }
}