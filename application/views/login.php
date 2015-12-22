<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>autelan车联网网管登录</title>
</head>

<body>
<?php echo validation_error();?>
<?php echo form_open('form');?>
<form>
	<h5>Username</h5>
	<input type="text" name="username" value="" size="50"/>
	
	<h5>Password</h5>
	<input type="text" name="password" value="" size="50"/>
	
	<div><input type="submit" value="Submit"/></div>
</form>
</body>
</html>
