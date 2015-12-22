<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php
	class Pages extends CI_Controller{
	
		public function view($page = 'home')
		{
			if(!file_exists(APPPATH.'/views/pages/'.$page.'.php'))
			{
				show_404();
			}
			$data['title'] = ucfirst($page);
			
			$this->load->view('templates/header', $data);
    		$this->load->view('pages/'.$page, $data);
    		$this->load->view('templates/footer', $data);
		}
	}
?>
</body>
</html>
