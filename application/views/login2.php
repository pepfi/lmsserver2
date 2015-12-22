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
        <link rel="stylesheet" type="text/css" href="resource/static/bootstrap-3.3.5/dist/css/bootstrap.min.css">
        <script src="resource/static/js/jquery-1.10.2.min.js"></script>
        <script src="resource/static//bootstrap-3.3.5/dist/js/bootstrap.min.js"></script>
        <script src="resource/static/js/zepto.js"></script>
    </head>
    <body>
    <div class="container">
	<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 loginbox"> 
		<div class="panel panel-info" > 
			<div class="panel-heading"> 
				<div class="panel-title">傲天动联车载无线路由器云管理登陆</div> 				
			</div> 
			<div class="panel-body panel-pad"> 
               
				<!--<form id="loginform" class="form-horizontal" role="form">-->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-inline">
                
						<div class="input-group margT25"> 
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span> 
							<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email"> 
						</div> 
						<div class="input-group margT25"> 
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
							<input id="login-password" type="password" class="form-control" name="password" placeholder="password"> 
						</div> 
						<div class="input-group" style="margin-left:100px"> 
							<div class="checkbox"> 
								<label> 
									<input id="login-remember" type="checkbox" name="remember" value="1">记住我 
								</label> 
							</div> 
						</div> 
						 
                        <input class="btn btn-default" type="submit" value="登录" style="margin-left:185px;margin-top:2px"/>
					</form> 
				</div> 
			</div> 
		</div> 
	</div>
</body>
</html>  
