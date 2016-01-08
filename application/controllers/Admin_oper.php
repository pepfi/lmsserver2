<?php
    class Admin_oper extends CI_Controller {
        
        public function __construct(){
            error_reporting(E_ALL ^ E_NOTICE);
            parent::__construct();
            $this->load->model('admin_oper_model');
        }
                
//        public function addadmin(){
//            if ($this->session->userdata('username') != ''){
//                $this->form_validation->set_rules('username', 'Username', 'required');
//                $this->form_validation->set_rules('password', 'Password', 'required');
//                $this->form_validation->set_rules('email', 'Email', 'required');
//                
//                if ($this->form_validation->run() === FALSE)
//                {
//                    $this->load->view('admin/add_admin');
//                }
//                else
//                {
//                    $this->Admin_oper_model->add_admin();
//                    $this->load->view('admin/add_ok');
//                }
//            }
//            
//        }
//        
//        public function allmanager(){
//            if ($this->session->userdata('username') != ''){
//                $data['manager'] = $this->Admin_oper_model->all_manager();
//                $data['username'] = $this->session->userdata('username');
//                
//    
//                $this->load->view('admin/Man_manager',$data);
//            }
//        }
//        
//        public function deladmin() {
//            if ($this->session->userdata('username') != ''){
//                $this->Admin_oper_model->del_admin();
//                $this->load->view('admin/del_ok');
//            }
//        }
        
        
        
        public function index()
	    {
            $data['title'] = 'login';
            $data['error'] = '';
            $this->load->view('admin/login_form', $data);
	    } 
    
        function validate_credentials()
        {
            //$this->load->model('admin_model');
            $this->session->set_userdata('res',$this->admin_oper_model->validate());
            $this->session->set_userdata('username',$this->input->post('username'));
            if (!$_SESSION['res']) {
                $data['error'] = 'Invalid Username or Password';
                $this->load->view('admin/login_form', $data);        
            }
            else {
                redirect('home/index');
            }
        }
    
        public function list_admin(){
            $data['userslist'] = $this->admin_oper_model->list_admin();
            $this->load->view('admin/header');        
            $this->load->view('admin/list_admin', $data);        
            $this->load->view('admin/footer');
        }
        public function add_admin(){
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');
//        $this->form_validation->set_rules('blocked', 'Blocked', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['error'] = '';
                $this->load->view('admin/header');
                $this->load->view('admin/add_admin', $data);
                $this->load->view('admin/footer');
            }else {
                $data['admininfo'] = array('firstname' => 'Tom',
                                       'lastname' => 'John', 
                                       'username' => $this->input->post('username'),
                                       'password' => md5($this->input->post('password')),
                                       'email' => $this->input->post('email'),
                                       'role' => $this->input->post('role'),
                                       'language' => 'english',
                                       'blocked' => ($this->input->post('blocked')=='')?'1':'0',);
                if (!$this->admin_oper_model->validate_admin($data['admininfo']['username'])){
                    $res = $this->admin_oper_model->add_admin($data['admininfo']);
                    if ($res) {
                        redirect('admin_oper/list_admin');
                    }
                    else {
                        echo "添加失败，请检查数据表字段";
                    }
                }
                else {
                    $data['error'] = "账号".$this->input->post('username')."已经存在！";
                    $this->load->view('admin/header');
                    $this->load->view('admin/add_admin', $data);
                    $this->load->view('admin/footer');            
                }
            }
        }
        public function del_admin(){
            $res = $this->admin_oper_model->del_admin();        
            if ($res) {
                redirect('admin_oper/list_admin');
            }
            else {
                echo "删除失败";
            }
        }
        public function modify_admin(){
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');
//        $this->form_validation->set_rules('blocked', 'Blocked', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['modify_info'] = $this->admin_oper_model->modify_admin_getdata();
                $this->load->view('admin/header');
                $this->load->view('admin/modify_admin', $data);
                $this->load->view('admin/footer');
            }else { 
                $res= $this->admin_oper_model->modify_admin_updatedata();
                if ($res) {
                    redirect('admin_oper/list_admin');
                }
                else {
                    echo "修改失败";
                }
            }       
        }
    
        public function logout(){
            $this->session->sess_destroy();
            $data['error'] = '';
            $this->load->view('admin/login_form', $data);
        }
        
        
    }
