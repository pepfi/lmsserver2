<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>
        Embedded Web Server
        </title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
        name="viewport" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <meta content="black" name="apple-mobile-web-app-status-bar-style" />
        <meta name="format-detection" content="telephone=no" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('resource/static/bootstrap-3.3.5/dist/css/bootstrap.min.css');?>" >
        <link href="<?php echo base_url('resource/css/elegant-icons-style.css');?>" rel="stylesheet" />
        <script src="<?php echo base_url('resource/static/js/jquery-1.10.2.min.js');?>"></script>
        <script src="<?php echo base_url('resource/static//bootstrap-3.3.5/dist/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('resource/static/js/zepto.js');?>"></script>
    </head>
    <body>
    <div class="container">
	<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 loginbox"> 
		<div class="panel panel-info" > 
			<div class="panel-heading"> 
				<div class="panel-title">添加管理员</div> 				
			</div> 
			<div class="panel-body panel-pad"> 
               
				<!--<form id="loginform" class="form-horizontal" role="form">-->
                <?php echo form_open('admin_oper/addadmin'); ?>   
						<div class="input-group margT25" style="margin-top:2px"> 
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span> 
							<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username"> 
						</div> 
						<div class="input-group margT25" style="margin-top:2px"> 
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
							<input id="login-password" type="password" class="form-control" name="password" placeholder="password"> 
						</div> 
						<div class="input-group margT25" style="margin-top:2px"> 
							<span class="input-group-addon"><i class="icon_mail_alt"></i></span> 
							<input id="login-password" type="password" class="form-control" name="email" placeholder="email"> 
						</div> 
						 
                        <input class="btn btn-default"  style="float:left;margin-left:210px;margin-top:5px"type="submit" value="添加"/>
					</form> 
				</div> 
			</div> 
		</div> 
	</div>
</body>
</html>  
