<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="http://localhost" />
    <base target="_blank" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Basic Table | Creative - Bootstrap 3 Responsive Admin Template</title>
      
      
    <!-- Bootstrap CSS -->    
    <link rel="stylesheet" type="text/css" href="<?php echo sprintf("css/bootstrap.min.css");?>"</lin>>
    <!-- bootstrap theme -->
    <link href="<?php echo sprintf("css/bootstrap-theme.css");?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo sprintf("css/elegant-icons-style.css");?>" rel="stylesheet" />
    <link href="<?php echo sprintf("css/font-awesome.min.css");?>" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo sprintf("css/style.css");?>" rel="stylesheet">
    <link href="<?php echo sprintf("css/style-responsive.css");?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <!-- container section start -->
   <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">Autelan <span class="lite">Cloud</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>
			
           <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start -->
                <ul class="nav pull-right top-menu">
                    
                    <!-- task notificatoin start -->
                    <!--<li id="task_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="icon-task-l"></i>
                            <span class="badge bg-important">8</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have 6 pending letter</p>
                            </li>

                        </ul>
                    </li>-->
                    <!-- task notificatoin end -->
                    <!-- inbox notificatoin start -->
                    <!--</h1><li id="mail_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important">8</span>
                        </a>
                       
                    </li>-->
                    <!-- inbox notificatoin end -->
                   
                    <!-- user login dropdown start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar-mini4.jpg">
                            </span>
                            <span class="username">admin</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                            </li>

                        </ul>
                    </li>
                    <!-- user login dropdown end --> 
                </ul>
                <!-- notificatoin dropdown end -->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
     <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="home.html">
                          <i class="icon_house_alt"></i>
                          <span>仪表盘</span>
                      </a>
                  </li>
	               <li class="">
                      <a class="" href="search.html">
                          <i class="icon_search"></i>
                          <span>搜索</span>
                      </a>
                  </li>      

                  <li>
                      <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>用户</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>统计</span>                          
                      </a>
                                         
                  </li>
                  <li>                     
                      <a class="" href="basic_table.html">
                          <i class="icon_table"></i>
                          <span>日志</span>                          
                      </a>
                                         
                  </li>                                    
              
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i> 搜索</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home.html">Home</a></li>
						<li><i class="fa fa-th-list"></i>搜索</li>
					</ol>
				</div>
			</div>
			<div class="boxbox ">
	<p class="select">AP查询</p>
    <div class="box">
    	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-inline">
		<div class="form-group" >
			 <label>MAC:</label>
			 <input class="form-control " type="text" name="mac" id="mac">
		 </div>
		 <div class="form-group" >
			 <label>热点：</label>
			 <select name="apgroup" class="form-control" class="form-control ">
				<option value="" ></option>          
				<option value="大唐-航美-北京">大唐-航美-北京</option>
				<option value="电信">电信</option>
				<option value="移动">移动</option>
			 </select>
		 </div>
		 <div class="form-group" >
			 <label>固件版本：</label>
			 <input type="text" name="swver" id="swver" class="form-control ">
		 </div>
		 <div class="form-group" >
			 <label>设备状态：</label>
			 <select name="apstatus" class="form-control ">
				<option value="" ></option>         
				<option value="在线">在线</option>
				<option value="离线">离线</option>
			  </select>
		  </div>
		  <div class="form-group" > 
			 <label>IP地址：</label>
			 <input  class="form-control " type="text" name="apip" id="apip">
		 </div>
		 <div class="form-group" >
			 <label> 首次注册时间  从：</label>
			 <input readonly class="form-control " name="FirstLoginTimebegin" id="FirstLoginTimebegin">
	     	<div class="laydate-icon " onClick="laydate({elem: '#FirstLoginTimebegin'});" style="width:10px;display:inline-block;border:none;"></div>
		 </div>
		 <div class="form-group">
			 <label>至：</label>
			 <input class="form-control " readonly name="FirstLoginTimeend" id="FirstLoginTimeend">
			 <div class="laydate-icon " onClick="laydate({elem: '#FirstLoginTimeend'});" style="width:10px;display:inline-block;border:none;"></div>
		 </div>
		 <div class="form-group" >
		 <label>最后注册时间  从：</label>
		 <input  class="form-control " name="LastLoginTimebegin"  id="LastLoginTimebegin">
	     <div class="laydate-icon " onClick="laydate({elem: '#LastLoginTimebegin'});" style="width:10px;display:inline-block;border:none;"></div>
		 </div>
		 <div class="form-group">
			 <label>至：</label>
			 <input class="form-control " name="LastLoginTimeend" id="LastLoginTimeend">
			 <div class="laydate-icon " onClick="laydate({elem: '#LastLoginTimeend'});" style="width:10px;display:inline-block;border:none;"></div>
	     </div>
		   <div class="form-group" >
			   <label>设备编号  ： </label> 
			   <input class="form-control " type="text" name="apsn" id="apsn">
		   </div>
		   <div class="form-group" >   
			   <label>内容版本  ：</label>
			   <input class="form-control " type="text" name="webrsrcver"  id="webrsrcver">
		   </div>
		   <div class="form-group" > 
			   <label>IP归属地：</label>
			   <input class="form-control " type="text" name="apiparea" id="apiparea"> 
		   </div>                 
		   <input class="btn btn-default" type="submit" value="搜索"/>
</form>
        		
    </div>
   
</div>
<br/>

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Advanced Table
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class=""></i> ApMac</th>
                                 <th><i class=""></i> ApSn</th>
                                 <th><i class=""></i> SwVer</th>
                                 <th><i class=""></i> WebRsrcVer</th>
                                 <th><i class=""></i> LastLoginTime</th>
                                 <th><i class=""></i> FirstLoginTime</th>
								 <th> apip</th>
								 <th> apiparea</th>
								 <th> apgroup</th>
								 <th> apstatus</th>
								 <th> 更多操作</th>
                              </tr>
                              
                                   <?php foreach($info as $row):?>
                                       
                                        <tr>
                                            <td><?php echo $row['ApMac'] ?></td>
                                            <td><?php echo $row['ApSn'] ?></td>
                                            <td><?php echo $row['SwVer'] ?></td>
                                            <td><?php echo $row['WebRsrcVer'] ?></td>
                                            <td><?php echo $row['LastLoginTime'] ?></td>
                                            <td><?php echo $row['FirstLoginTime'] ?></td>
                                            <td><?php echo $row['apip'] ?></td>
                                            <td><?php echo $row['apiparea'] ?></td>
                                            <td><?php echo $row['apstatus'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                                                    <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                
                                
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    
    <script src="<?php echo sprintf("application/view/js/jquery.js"); ?>"></script>
    <script src="<?php echo sprintf("js/bootstrap.min.js"); ?>"></script>
    <!-- nicescroll -->
    <script src="<?php echo sprintf("js/jquery.scrollTo.min.js");?>"</scrip>></script>
    <script src="<?php echo sprintf("js/jquery.nicescroll.js");?>" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="<?php echo sprintf("js/scripts.js");?>"</scrip>></script>
      

  </body>
</html>
