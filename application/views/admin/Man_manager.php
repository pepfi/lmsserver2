<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="<?php echo base_url('resource/img/favicon.png');?>">

    <title>Widgets | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('resource/img/favicon.png');?>" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url('resource/css/bootstrap-theme.css');?>" rel="stylesheet">
    <!-- external css -->
    <!-- font icon -->
    <link href="<?php echo base_url('resource/css/elegant-icons-style.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('resource/css/font-awesome.min.css');?>" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url('resource/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('resource/css/style-responsive.css');?>" rel="stylesheet" />

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
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">Autelan <span class="lite">Cloud</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="<?php echo base_url('resource/img/avatar-mini4.jpg');?>" >
                            </span>
                            <span class="username"><?php echo $username;?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="/add" target="_self"><i class="icon_profile"></i>添加管理员</a>
                            </li>
                            <li>
                                <a href="/all" target="_self"><i class="icon_mail_alt"></i>查看管理员</a>
                            </li>
                            <li>
                                <a href="/logout" target="_self"><i class="icon_clock_alt"></i>退出</a>
                            </li>

                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
     <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="/home">
                          <i class="icon_house_alt"></i>
                          <span>仪表盘</span>
                      </a>
                  </li>
	               <li class="">
                      <a class="" href="/search">
                          <i class="icon_search"></i>
                          <span>设备管理</span>
                      </a>
                  </li>      

                  <li>
                      <a class="" href="/widgets">
                          <i class="icon_genius"></i>
                          <span>用户管理</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="/chart_chartjs">
                          <i class="icon_piechart"></i>
                          <span>统计</span>                          
                      </a>
                                         
                  </li>
                  <li>                     
                      <a class="" href="/basic_table">
                          <i class="icon_table"></i>
                          <span>日志</span>                          
                      </a>
                                         
                  </li>                                    
              
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <div style="height:900px;width:1200px;float:left;margin-left:300px;margin-top:110px;">
            <table border="1" width="1000">
            <tr style="background:#394a59;height:50px;text-align:left;text-indent:20px">
            <td><font color="white">编号</font></td>
            <td><font color="white">管理员</font></td>
            <td><font color="white">邮箱</font></td>
            <td><font color="white">删除</font></td>
            </tr>
             
            <?php foreach ($manager as $data_item): ?>
                <tr style="background:white;height:35px;text-align:left;text-indent:20px">
                    <td><?php echo $data_item['masterID']; ?></td>
                    <td><?php echo $data_item['mastername']; ?></td>
                    <td><?php echo $data_item['masteremail']; ?></td>
                    <td>
                        <a href="/del/<?php echo $data_item['masterID'];?>" target="_self">删除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
                
            </table>
      </div>
  </section>
      <!-- del manager -->
      
  <!-- container section end -->

    <!-- javascripts -->
    <script src="resource/js/jquery.js"></script>
    <script src="resource/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="resource/js/jquery.scrollTo.min.js"></script>
    <script src="resource/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery knob -->
    <script src="resource/assets/jquery-knob/js/jquery.knob.js"></script>
    <!--custome script for all page-->
    <script src="resource/js/scripts.js"></script>

  <script>

      //knob
      $(".knob").knob();

  </script>

  </body>
</html>
