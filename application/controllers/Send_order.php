<?php
class Send_order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper(array('form','url'));
        $this->load->model('send_order_model');
    
    } 
    
    public function index()
    {
        $order_info = $this->send_order_model->send_order();
	if(!$order_info)
	{
	    echo "此设备有未执行的命令!";
	    return 0;
	}
//	echo "$order_info['Flag']";

         // print_r($order_info);
  
        $timeout = 5;
        echo json_encode($order_info);
        $ch = curl_init();
//        echo "11";
        $url = "http://lms1.autelan.com:8180/LMS/platform/lteCommand.do";
        $data = json_encode($order_info);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 //       curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);

//        curl_setopt($ch,CURLOPT_HEADER,false);
//        echo "333";
        $file_contents = curl_exec($ch);
//        echo "444";
        curl_close($ch);
//        echo "555";
        return $file_contents;
       
//        
//        echo "222";
//        ob_start();
//        curl_exec($ch);
//        echo "3333";
//        
//        $return_content = ob_get_contents();
//        ob_end_clean();
//        
//        $return_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
//        return array($return_code,$return_content);
//        //echo "{$order_info['ap_order_text']}";
//        //echo "{$order_info['ap_mac_text']}";
//        //echo "111111";
////        $data = array(
////                'order_info' => $this->send_order_model->send_order(),
////                'page_num' => '1');
////        $this->load->view("testorder",$data);
    }
}
