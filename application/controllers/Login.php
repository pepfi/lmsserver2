<?php
class Login extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        
        $this->load->model('Home_model');
        /*session&cookie start by wmg*/
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->helper('array');
        /*session&cookie end by wmg*/
            
    }
    
    function index()
    {
        $data['title'] = 'login';
        $data['error'] = '';
        $this->load->view('admin/login_form', $data);   

    }
    function getProvince($ip_query_result) {
        return substr($ip_query_result,0,6);
    }

    function validate_credentials()
    {
        $query = $this->Login_model->validate();
        
        if($query)
        {
            $data = array(
                    'username' => $this->input->post('username'),
                    'is_logged_in' => true,
                    //'role' => $this->admin_model->member_role($this->input->post('username')),
                    //'user_id' => $this->admin_model->member_id($this->input->post('username'))
                    );
            $this->session->set_userdata($data);
            //echo 'success';
           //$this->load->view('admin/login_success');
            redirect('home');
            
        }
        else
        {
            $data['error'] = 'Invalid Username or Password';
            //$data['main_content'] = 'login_form';
            $this->load->view('admin/login_form', $data);
        }
    }

    public function verification()
    {
        
        
        /* check cookie start by wmg */
        if (get_cookie('username'))
        {
            $data['username'] = get_cookie('username');
            $data['region_status'] = $this->Home_model->get_region_status();
            $data['province'] = array(array('dev' => 0, 'online' => 0, 'name' => '北京'),
                                     array('dev' => 0, 'online' => 0, 'name' => '天津'),
                                     array('dev' => 0, 'online' => 0, 'name' => '河北'),
                                     array('dev' => 0, 'online' => 0, 'name' => '山西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '内蒙古'),
                                     array('dev' => 0, 'online' => 0, 'name' => '辽宁'),
                                     array('dev' => 0, 'online' => 0, 'name' => '吉林'),
                                     array('dev' => 0, 'online' => 0, 'name' => '黑龙江'),
                                     array('dev' => 0, 'online' => 0, 'name' => '上海'),
                                     array('dev' => 0, 'online' => 0, 'name' => '江苏'),
                                     array('dev' => 0, 'online' => 0, 'name' => '浙江'),
                                     array('dev' => 0, 'online' => 0, 'name' => '安徽'),
                                     array('dev' => 0, 'online' => 0, 'name' => '福建'),
                                     array('dev' => 0, 'online' => 0, 'name' => '江西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '山东'),
                                     array('dev' => 0, 'online' => 0, 'name' => '河南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '湖北'),
                                     array('dev' => 0, 'online' => 0, 'name' => '湖南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '广东'),
                                     array('dev' => 0, 'online' => 0, 'name' => '广西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '海南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '重庆'),
                                     array('dev' => 0, 'online' => 0, 'name' => '四川'),
                                     array('dev' => 0, 'online' => 0, 'name' => '贵州'),
                                     array('dev' => 0, 'online' => 0, 'name' => '云南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '西藏'),
                                     array('dev' => 0, 'online' => 0, 'name' => '陕西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '甘肃'),
                                     array('dev' => 0, 'online' => 0, 'name' => '青海'),
                                     array('dev' => 0, 'online' => 0, 'name' => '宁夏'),
                                     array('dev' => 0, 'online' => 0, 'name' => '新疆'),
                                     array('dev' => 0, 'online' => 0, 'name' => '台湾'),
                                     array('dev' => 0, 'online' => 0, 'name' => '香港'),
                                     array('dev' => 0, 'online' => 0, 'name' => '澳门')
                                     );
            foreach($data['region_status'] as $value)
            {
                
                $province = $this->getProvince($value['ap_i_p_area']); 
                switch ($province) {
                    
                    case '北京':
                        $data['province'][0]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][0]['online'] += 1; 
                         } 
                        break;
                    case '天津':
                        $data['province'][1]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][1]['online'] += 1; 
                         } 
                        break;
                    case '河北':
                        $data['province'][2]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][2]['online'] += 1; 
                         }                                           
                        break;
                    case '山西':
                        $data['province'][3]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][3]['online'] += 1; 
                         }                                             
                        break;
                    case '内蒙':
                        $data['province'][4]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][4]['online'] += 1; 
                         }                                            
                        break;
                        
                    case '辽宁':
                        $data['province'][5]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][5]['online'] += 1; 
                         }                                             
                        break;
                    case '吉林':
                        $data['province'][6]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][6]['online'] += 1; 
                         }                                             
                        break;
                    case '黑龙':
                        $data['province'][7]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][7]['online'] += 1; 
                         }                                              
                        break;
                    case '上海':
                        $data['province'][8]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][8]['online'] += 1; 
                         }                                              
                        break;
                    case '江苏':
                        $data['province'][9]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][9]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '浙江':
                        $data['province'][10]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][10]['online'] += 1; 
                         }                                             
                        break;
                    case '安徽':
                        $data['province'][11]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][11]['online'] += 1; 
                         }                                            
                        break;
                    case '福建':
                        $data['province'][12]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][12]['online'] += 1; 
                         }                                            
                        break;
                    case '江西':
                        $data['province'][13]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][13]['online'] += 1; 
                         }                                             
                        break;
                    case '山东':
                       ///
                        $data['province'][14]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][14]['online'] += 1; 
                         } 
                        break;
                        
                    case '河南':
                        $data['province'][15]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][15]['online'] += 1; 
                         }                                             
                        break;
                    case '湖北':
                        $data['province'][16]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][16]['online'] += 1; 
                         }                                            
                        break;
                    case '湖南':
                        $data['province'][17]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][17]['online'] += 1; 
                         }                                            
                        break;
                    case '广东':
                        $data['province'][18]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][18]['online'] += 1; 
                         }                                             
                        break;
                    case '广西':
                        $data['province'][19]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][19]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '海南':
                        $data['province'][20]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][20]['online'] += 1; 
                         }                                            
                        break;
                    case '重庆':
                        $data['province'][21]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][21]['online'] += 1; 
                         }                                             
                        break;
                    case '四川':
                        $data['province'][22]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][22]['online'] += 1; 
                         }                                             
                        break;
                    case '贵州':
                        $data['province'][23]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][23]['online'] += 1; 
                         }                                             
                        break;
                    case '云南':
                        $data['province'][24]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][24]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '西藏':
                        $data['province'][25]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][25]['online'] += 1; 
                         }                                             
                        break;
                    case '陕西':
                        $data['province'][26]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][26]['online'] += 1; 
                         }                                            
                        break;
                    case '甘肃':
                        $data['province'][27]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][27]['online'] += 1; 
                         }                                              
                        break;
                    case '青海':
                        $data['province'][28]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][28]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '宁夏':
                        $data['province'][29]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province']['online'] += 1; 
                         }                                             
                        break;
                    case '新疆':
                        $data['province'][30]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][30]['online'] += 1; 
                         }                                             
                        break;
                    case '台湾':
                        $data['province'][31]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][31]['online'] += 1; 
                         }                                             
                        break;
                    case '香港':
                        $data['province'][32]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][32]['online'] += 1; 
                         }                                             
                        break;
                    case '澳门':
                        $data['province'][33]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][33]['online'] += 1; 
                         }                                             
                        break;
                    default:
                        break;
                }
            }
            
            $data['dev_account'] = 0;
            for ($i = 0; $i < 34; $i++) {
                $data['dev_account'] = $data['dev_account'] + $data['province'][$i]['online'];
            }
            
            $this->load->view("home", $data);
           
        return 0;
        }
        /* check cookie end by wmg */
        
        //        link back 
        if ($this->session->userdata('username'))  {
            $data['username'] = $this->session->userdata('username');
            $data['region_status'] = $this->Home_model->get_region_status();
            $data['province'] = array(array('dev' => 0, 'online' => 0, 'name' => '北京'),
                                     array('dev' => 0, 'online' => 0, 'name' => '天津'),
                                     array('dev' => 0, 'online' => 0, 'name' => '河北'),
                                     array('dev' => 0, 'online' => 0, 'name' => '山西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '内蒙古'),
                                     array('dev' => 0, 'online' => 0, 'name' => '辽宁'),
                                     array('dev' => 0, 'online' => 0, 'name' => '吉林'),
                                     array('dev' => 0, 'online' => 0, 'name' => '黑龙江'),
                                     array('dev' => 0, 'online' => 0, 'name' => '上海'),
                                     array('dev' => 0, 'online' => 0, 'name' => '江苏'),
                                     array('dev' => 0, 'online' => 0, 'name' => '浙江'),
                                     array('dev' => 0, 'online' => 0, 'name' => '安徽'),
                                     array('dev' => 0, 'online' => 0, 'name' => '福建'),
                                     array('dev' => 0, 'online' => 0, 'name' => '江西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '山东'),
                                     array('dev' => 0, 'online' => 0, 'name' => '河南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '湖北'),
                                     array('dev' => 0, 'online' => 0, 'name' => '湖南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '广东'),
                                     array('dev' => 0, 'online' => 0, 'name' => '广西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '海南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '重庆'),
                                     array('dev' => 0, 'online' => 0, 'name' => '四川'),
                                     array('dev' => 0, 'online' => 0, 'name' => '贵州'),
                                     array('dev' => 0, 'online' => 0, 'name' => '云南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '西藏'),
                                     array('dev' => 0, 'online' => 0, 'name' => '陕西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '甘肃'),
                                     array('dev' => 0, 'online' => 0, 'name' => '青海'),
                                     array('dev' => 0, 'online' => 0, 'name' => '宁夏'),
                                     array('dev' => 0, 'online' => 0, 'name' => '新疆'),
                                     array('dev' => 0, 'online' => 0, 'name' => '台湾'),
                                     array('dev' => 0, 'online' => 0, 'name' => '香港'),
                                     array('dev' => 0, 'online' => 0, 'name' => '澳门')
                                     );
            foreach($data['region_status'] as $value)
            {
                
                $province = $this->getProvince($value['ap_i_p_area']); 
                switch ($province) {
                    
                    case '北京':
                        $data['province'][0]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][0]['online'] += 1; 
                         } 
                        break;
                    case '天津':
                        $data['province'][1]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][1]['online'] += 1; 
                         } 
                        break;
                    case '河北':
                        $data['province'][2]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][2]['online'] += 1; 
                         }                                           
                        break;
                    case '山西':
                        $data['province'][3]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][3]['online'] += 1; 
                         }                                             
                        break;
                    case '内蒙':
                        $data['province'][4]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][4]['online'] += 1; 
                         }                                            
                        break;
                        
                    case '辽宁':
                        $data['province'][5]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][5]['online'] += 1; 
                         }                                             
                        break;
                    case '吉林':
                        $data['province'][6]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][6]['online'] += 1; 
                         }                                             
                        break;
                    case '黑龙':
                        $data['province'][7]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][7]['online'] += 1; 
                         }                                              
                        break;
                    case '上海':
                        $data['province'][8]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][8]['online'] += 1; 
                         }                                              
                        break;
                    case '江苏':
                        $data['province'][9]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][9]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '浙江':
                        $data['province'][10]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][10]['online'] += 1; 
                         }                                             
                        break;
                    case '安徽':
                        $data['province'][11]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][11]['online'] += 1; 
                         }                                            
                        break;
                    case '福建':
                        $data['province'][12]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][12]['online'] += 1; 
                         }                                            
                        break;
                    case '江西':
                        $data['province'][13]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][13]['online'] += 1; 
                         }                                             
                        break;
                    case '山东':
                       ///
                        $data['province'][14]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][14]['online'] += 1; 
                         } 
                        break;
                        
                    case '河南':
                        $data['province'][15]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][15]['online'] += 1; 
                         }                                             
                        break;
                    case '湖北':
                        $data['province'][16]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][16]['online'] += 1; 
                         }                                            
                        break;
                    case '湖南':
                        $data['province'][17]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][17]['online'] += 1; 
                         }                                            
                        break;
                    case '广东':
                        $data['province'][18]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][18]['online'] += 1; 
                         }                                             
                        break;
                    case '广西':
                        $data['province'][19]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][19]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '海南':
                        $data['province'][20]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][20]['online'] += 1; 
                         }                                            
                        break;
                    case '重庆':
                        $data['province'][21]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][21]['online'] += 1; 
                         }                                             
                        break;
                    case '四川':
                        $data['province'][22]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][22]['online'] += 1; 
                         }                                             
                        break;
                    case '贵州':
                        $data['province'][23]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][23]['online'] += 1; 
                         }                                             
                        break;
                    case '云南':
                        $data['province'][24]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][24]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '西藏':
                        $data['province'][25]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][25]['online'] += 1; 
                         }                                             
                        break;
                    case '陕西':
                        $data['province'][26]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][26]['online'] += 1; 
                         }                                            
                        break;
                    case '甘肃':
                        $data['province'][27]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][27]['online'] += 1; 
                         }                                              
                        break;
                    case '青海':
                        $data['province'][28]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][28]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '宁夏':
                        $data['province'][29]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province']['online'] += 1; 
                         }                                             
                        break;
                    case '新疆':
                        $data['province'][30]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][30]['online'] += 1; 
                         }                                             
                        break;
                    case '台湾':
                        $data['province'][31]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][31]['online'] += 1; 
                         }                                             
                        break;
                    case '香港':
                        $data['province'][32]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][32]['online'] += 1; 
                         }                                             
                        break;
                    case '澳门':
                        $data['province'][33]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][33]['online'] += 1; 
                         }                                             
                        break;
                    default:
                        break;
                }
            }
            
            $data['dev_account'] = 0;
            for ($i = 0; $i < 34; $i++) {
                $data['dev_account'] = $data['dev_account'] + $data['province'][$i]['online'];
            }
            
            $this->load->view("home", $data);
            return 0;
        }      
        //        link back end
        
        if(! $this->Login_model->match_info())
        { 
            
            $this->load->view("login2");
        }
        else
        {
            
            $data['userinfo'] = $this->Login_model->match_info();
            
            
            /*添加调用session by wmg start*/
            $this->session->set_userdata("username", $data['userinfo']['mastername']);
            $data['username'] = $this->session->userdata('username');
            /*添加调用session end*/

            
            /* set cookie by wmg */
            if ($this->input->post('remember'))
            {
                set_cookie('username', $data['userinfo']['mastername'], time()+60*60*24*7);
            }
            /* set cookie end */
         

            $data['region_status'] = $this->Home_model->get_region_status();
            $data['province'] = array(array('dev' => 0, 'online' => 0, 'name' => '北京'),
                                     array('dev' => 0, 'online' => 0, 'name' => '天津'),
                                     array('dev' => 0, 'online' => 0, 'name' => '河北'),
                                     array('dev' => 0, 'online' => 0, 'name' => '山西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '内蒙古'),
                                     array('dev' => 0, 'online' => 0, 'name' => '辽宁'),
                                     array('dev' => 0, 'online' => 0, 'name' => '吉林'),
                                     array('dev' => 0, 'online' => 0, 'name' => '黑龙江'),
                                     array('dev' => 0, 'online' => 0, 'name' => '上海'),
                                     array('dev' => 0, 'online' => 0, 'name' => '江苏'),
                                     array('dev' => 0, 'online' => 0, 'name' => '浙江'),
                                     array('dev' => 0, 'online' => 0, 'name' => '安徽'),
                                     array('dev' => 0, 'online' => 0, 'name' => '福建'),
                                     array('dev' => 0, 'online' => 0, 'name' => '江西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '山东'),
                                     array('dev' => 0, 'online' => 0, 'name' => '河南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '湖北'),
                                     array('dev' => 0, 'online' => 0, 'name' => '湖南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '广东'),
                                     array('dev' => 0, 'online' => 0, 'name' => '广西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '海南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '重庆'),
                                     array('dev' => 0, 'online' => 0, 'name' => '四川'),
                                     array('dev' => 0, 'online' => 0, 'name' => '贵州'),
                                     array('dev' => 0, 'online' => 0, 'name' => '云南'),
                                     array('dev' => 0, 'online' => 0, 'name' => '西藏'),
                                     array('dev' => 0, 'online' => 0, 'name' => '陕西'),
                                     array('dev' => 0, 'online' => 0, 'name' => '甘肃'),
                                     array('dev' => 0, 'online' => 0, 'name' => '青海'),
                                     array('dev' => 0, 'online' => 0, 'name' => '宁夏'),
                                     array('dev' => 0, 'online' => 0, 'name' => '新疆'),
                                     array('dev' => 0, 'online' => 0, 'name' => '台湾'),
                                     array('dev' => 0, 'online' => 0, 'name' => '香港'),
                                     array('dev' => 0, 'online' => 0, 'name' => '澳门')
                                     );
            foreach($data['region_status'] as $value)
            {
                
                $province = $this->getProvince($value['ap_i_p_area']); 
                switch ($province) {
                    
                    case '北京':
                        $data['province'][0]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][0]['online'] += 1; 
                         } 
                        break;
                    case '天津':
                        $data['province'][1]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][1]['online'] += 1; 
                         } 
                        break;
                    case '河北':
                        $data['province'][2]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][2]['online'] += 1; 
                         }                                           
                        break;
                    case '山西':
                        $data['province'][3]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][3]['online'] += 1; 
                         }                                             
                        break;
                    case '内蒙':
                        $data['province'][4]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][4]['online'] += 1; 
                         }                                            
                        break;
                        
                    case '辽宁':
                        $data['province'][5]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][5]['online'] += 1; 
                         }                                             
                        break;
                    case '吉林':
                        $data['province'][6]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][6]['online'] += 1; 
                         }                                             
                        break;
                    case '黑龙':
                        $data['province'][7]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][7]['online'] += 1; 
                         }                                              
                        break;
                    case '上海':
                        $data['province'][8]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][8]['online'] += 1; 
                         }                                              
                        break;
                    case '江苏':
                        $data['province'][9]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][9]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '浙江':
                        $data['province'][10]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][10]['online'] += 1; 
                         }                                             
                        break;
                    case '安徽':
                        $data['province'][11]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][11]['online'] += 1; 
                         }                                            
                        break;
                    case '福建':
                        $data['province'][12]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][12]['online'] += 1; 
                         }                                            
                        break;
                    case '江西':
                        $data['province'][13]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][13]['online'] += 1; 
                         }                                             
                        break;
                    case '山东':
                       ///
                        $data['province'][14]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][14]['online'] += 1; 
                         } 
                        break;
                        
                    case '河南':
                        $data['province'][15]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][15]['online'] += 1; 
                         }                                             
                        break;
                    case '湖北':
                        $data['province'][16]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][16]['online'] += 1; 
                         }                                            
                        break;
                    case '湖南':
                        $data['province'][17]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][17]['online'] += 1; 
                         }                                            
                        break;
                    case '广东':
                        $data['province'][18]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][18]['online'] += 1; 
                         }                                             
                        break;
                    case '广西':
                        $data['province'][19]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][19]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '海南':
                        $data['province'][20]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][20]['online'] += 1; 
                         }                                            
                        break;
                    case '重庆':
                        $data['province'][21]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][21]['online'] += 1; 
                         }                                             
                        break;
                    case '四川':
                        $data['province'][22]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][22]['online'] += 1; 
                         }                                             
                        break;
                    case '贵州':
                        $data['province'][23]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][23]['online'] += 1; 
                         }                                             
                        break;
                    case '云南':
                        $data['province'][24]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][24]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '西藏':
                        $data['province'][25]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][25]['online'] += 1; 
                         }                                             
                        break;
                    case '陕西':
                        $data['province'][26]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][26]['online'] += 1; 
                         }                                            
                        break;
                    case '甘肃':
                        $data['province'][27]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][27]['online'] += 1; 
                         }                                              
                        break;
                    case '青海':
                        $data['province'][28]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][28]['online'] += 1; 
                         }                                             
                        break;
                        
                    case '宁夏':
                        $data['province'][29]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province']['online'] += 1; 
                         }                                             
                        break;
                    case '新疆':
                        $data['province'][30]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][30]['online'] += 1; 
                         }                                             
                        break;
                    case '台湾':
                        $data['province'][31]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][31]['online'] += 1; 
                         }                                             
                        break;
                    case '香港':
                        $data['province'][32]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][32]['online'] += 1; 
                         }                                             
                        break;
                    case '澳门':
                        $data['province'][33]['dev'] += 1;
                         if ($value['ap_status'] == 'online') {
                            $data['province'][33]['online'] += 1; 
                         }                                             
                        break;
                    default:
                        break;
                }
            }
            
            $data['dev_account'] = 0;
            for ($i = 0; $i < 34; $i++) {
                $data['dev_account'] = $data['dev_account'] + $data['province'][$i]['online'];
            }
            
            $this->load->view("home", $data);
           
        }
    }
}