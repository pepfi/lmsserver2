<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="<?php echo base_url('resource/img/favicon.png');?>" />

    <title>Creative - Bootstrap Admin Template</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url('resource/css/bootstrap.min.css');?>" rel="stylesheet" />
    <!-- " php echo base_url('/JS/jquery1.8.3.min.js')?>"  -->
    <!-- bootstrap theme -->
    <link href="<?php echo base_url('resource/css/bootstrap-theme.css');?>" rel="stylesheet" />
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url('resource/css/elegant-icons-style.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('resource/css/font-awesome.min.css');?>" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="<?php echo base_url('resource/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css');?>" rel="stylesheet" />
	<link href="<?php echo base_url('resource/assets/fullcalendar/fullcalendar/fullcalendar.css');?>" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="<?php echo base_url('resource/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css');?>" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?php echo base_url('resource/css/owl.carousel.css');?>" type="text/css" />
	<link href="<?php echo base_url('resource/css/jquery-jvectormap-1.2.2.css');?>" rel="stylesheet" />
    <!-- Custom styles -->
	<link rel="stylesheet" href="<?php echo base_url('resource/css/fullcalendar.css');?>" />
	<link href="<?php echo base_url('resource/css/widgets.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('resource/css/style.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('resource/css/style-responsive.css');?>" rel="stylesheet" />
	<link href="<?php echo base_url('resource/css/xcharts.min.css');?>" rel=" stylesheet" />	
	<link href="<?php echo base_url('resource/css/jquery-ui-1.10.4.min.css');?>" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
      
      
     <!--map_style.css by wmg --> 
    <link href="<?php echo base_url('resource/css/map_style.css');?>" rel="stylesheet" /> 
      <!--end map_style.css -->
  </head>

  <body>
      
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="home.php" class="logo">Autelan <span class="lite">Cloud</span></a>
            <!--logo end-->


            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    

                   
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="<?php echo base_url('resource/img/avatar-mini4.jpg');?>" />
                            </span>
                            
                            <span class="username"><?php echo $username; ?></span>
                            
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <!--editor wmg-->
                            <li class="eborder-top">
                                <a href="admin_oper/list_admin"><i class="icon_profile"></i>查看管理员</a>
                            </li>
                            <li>
                                <a href="admin_oper/add_admin" target="_self"><i class="icon_mail_alt"></i>添加管理员</a>
                            </li>

                            <li>
                                <a href="/logout" target="_self"><i class="icon_clock_alt"></i>退出</a>
                            </li>
                            <!--editor wmg-->
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
                      <a class="" href="<?php echo site_url('home');?>">
                          <i class="icon_house_alt"></i>
                          <span>仪表盘</span>
                      </a>
                  </li>
	               <li class="">
                      <a class="" href="<?php echo site_url('search');?>">
                          <i class="icon_search"></i>
                          <span>设备管理</span>
                      </a>
                  </li>      

                  <li>
                      <a class="" href="<?php echo site_url('widgets');?>"> 
                          <i class="icon_genius"></i>
                          <span>用户管理</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="<?php echo site_url('chart_chartjs');?>">
                          <i class="icon_piechart"></i>
                          <span>统计</span>                          
                      </a>
                                         
                  </li>
                  <li>                     
                      <a class="" href="<?php echo site_url('basic_table');?>">
                          <i class="icon_table"></i>
                          <span>日志</span>                          
                      </a>
                                         
                  </li>                                    
              
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> 仪表盘</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>仪表盘</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<!-- <i class="fa fa-cloud-download"></i> -->
						<div class="count"><?php echo $dev_account;?></div>
						<div class="title">在线设备</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<!-- <i class="fa fa-shopping-cart"></i> -->
						<div class="count">115200</div>
						<div class="title">在线用户</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
				
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<!-- <i class="fa fa-thumbs-o-up"></i> -->
						<div class="count">1111</div>
						<div class="title">日志</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				

			</div><!--/.row-->
		
            <!--map start by wmg-->
           <div id="mymap" tabindex="0">
                        
                <!-- process data for map-->
                <?php
                     $n = 0;
                     $provinces_total = 35;
                     for ($i = 0; $i <$provinces_total-1; $i++) {
                         $p = "<div id='".$n."' style='visibility:hidden;width:0px;height:0px'>".$province[$i]['dev']."</div>";
                         echo $p;
                         $n++;
                     }
                    
                ?>
                <!--end process data-->

              <script src="<?php echo base_url('resource/js/map.js');?>"></script>
               <script src="http://webapi.amap.com/maps?v=1.3&key="></script>
               <script type="text/javascript">
                   for (var i = 0; i < provinces.length; i += 1) {
                        provinces[i].count = document.getElementById(i).innerHTML;
                   }
                    var mapObj = new AMap.Map('mymap', {
                        resizeEnable: true,
                            zoom: 5,//缩放级别
                            zooms:[4,18],//缩放级别范围
                            center: [106.485352, 34.603692]
                    });
                    var createMarker = function(data,hide) {
                        var div = document.createElement('div');
                        div.className = 'circle';//className属性
                        var r = Math.floor(data.count / 1024);//返回小于参数的最大整数
                        div.style.backgroundColor = hide?'#393':'#09f';
                        div.innerHTML = data.count || 0;//显示count值
                        var marker = new AMap.Marker({
                            content: div,//点标记显示内容，content有效时，icon属性将被覆盖
                            title:data.name,//鼠标滑过时显示的标题
                            position: data.center.split(','),//将字符分拆成字符数组
                            offset: new AMap.Pixel(-24, 5),//构造一个像素坐标对象
                            zIndex: data.count//点标记的叠加顺序
                        });
                        marker.subMarkers = [];//创建子点???????
                        if(data.name==='北京市'||data.name==='河南省'){
//                            marker.setLabel({content:'&larr;请点击',offset:new AMap.Pixel(45,0)})//将按钮的标签设置为指定的字符串
                            mapObj.setCenter(marker.getPosition());//getPosition获取点标记的位置(经纬度)；设置地图显示的中心点
                        }
                        if(!hide){
                            marker.setMap(mapObj)//为Marker指定目标显示地图
                        }
                        if(data.subDistricts&&data.subDistricts.length){
                            for(var i = 0 ; i<data.subDistricts.length;i+=1){
                                marker.subMarkers.push(createMarker(data.subDistricts[i],true));//数组中添加新元素????
                            }
                        }
                        return marker;
                    }
                    //地图缩放结束后停留的级别小于6的时候将溢出所有市一级的标记
                    var _onZoomEnd = function(e) {
                        if (mapObj.getZoom() < 6) {//获取当前地图缩放级别
                            for (var i = 0; i < markers.length; i += 1) {
                                mapObj.remove(markers[i].subMarkers)
                            }
                            mapObj.add(markers);//添加地图覆盖物数组
                        }
                    }
                    //当Marker点被点击的时候，我们将显示其下级的Marker标记
                    var _onClick = function(e) {
                        if(e.target.subMarkers.length){
                            mapObj.add(e.target.subMarkers);//添加地图覆盖物数组
                            mapObj.setFitView(e.target.subMarkers);//setFitView方法用来将地图调整到合适的范围来显示我们需要展示的markers
                            mapObj.remove(markers)//移除地图覆盖物数组
                        }
                    }
                    
                    var markers = []; //province见Demo引用的JS文件
                    for (var i = 0; i < provinces.length; i += 1) {
                        var marker = createMarker(provinces[i]);
                        markers.push(marker);//数组中添加新元素
                        AMap.event.addListener(marker, 'click', _onClick);//注册事件的对象，事件名称，事件处理函数
                    }
                    //mapObj.setFitView();
                    AMap.event.addListener(mapObj, 'zoomend', _onZoomEnd);//zoomend：缩放停止时触发
                        
                </script>               
             
              
			 
           </div>
            <!--map end by wmg-->
            
		  
		  <!-- Today status end -->
			
              
				
			<div class="row">
               	
				<div class="col-md-12">	
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><strong>Registered Users</strong></h2>
						</div>
						<div class="panel-body">
                            
							<table class="table bootstrap-datatable countries">
								<thead>
									<tr>
										<th>Province</th>
										<th>Users</th>
										<th>Online</th>
										<th>Performance</th>
									</tr>
								</thead>
                                
								<tbody>
<!--                注册用户/在线用户/perform      start              -->
                                    <?php
                                          foreach ($province as $value) {  
                                                echo "<tr>";
            
                                                    echo "<td>".$value['name']."</td>";
                                                    echo "<td>".$value['dev']."</td>";
                                                    echo "<td>".$value['online']."</td>";
                                                    echo "<td>";
                                                        echo "<div class='progress thin'>";
                                                            if ($value['dev']) {
                                                                $online_rate = round($value['online']*100/$value['dev'], 0);
                                                            }
                                                            else {
                                                                $online_rate = 0;
                                                            }
                                                            $offline_rate = 100 - $online_rate;
                                                            echo "<div class='progress-bar progress-bar-danger' style='width:".$online_rate."%'></div>";
                                                            echo "<div class='progress-bar progress-bar-warning' style='width:".$offline_rate."%'></div>";
                                                        echo "</div>";
                                                    echo "</td>";
                                                echo "</tr>";
                                        }
                                    ?>
<!--                end 注册用户/在线用户/perform                     -->
								</tbody>
							</table>
                                
						</div>
	
					</div>	

				</div><!--/col-->
				
              </div>

                    
                   
                <!-- statics end -->
              
            
				

              <!-- project team & activity start -->


              <!-- project team & activity end -->

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="<?php echo base_url('resource/js/jquery.js');?>"></script>
	<script src="<?php echo base_url('resource/js/jquery-ui-1.10.4.min.js');?>"></script>
    <script src="<?php echo base_url('resource/js/jquery-1.8.3.min.js');?>"></script>
    <script type="resource/text/javascript" src="<?php echo base_url('resource/js/jquery-ui-1.9.2.custom.min.js');?>"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url('resource/js/bootstrap.min.js');?>"></script>
    <!-- nice scroll -->
    <script src="<?php echo base_url('resource/js/jquery.scrollTo.min.js');?>"></script>
    <script src="<?php echo base_url('resource/js/jquery.nicescroll.js');?>" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="<?php echo base_url('resource/assets/jquery-knob/js/jquery.knob.js');?>"></script>
    <script src="<?php echo base_url('resource/js/jquery.sparkline.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('resource/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js');?>"></script>
    <script src="<?php echo base_url('resource/js/owl.carousel.js');?>" ></script>
    <!-- jQuery full calendar -->
    <script src="<?php echo base_url('resource/js/fullcalendar.min.js');?>"></script> <!-- Full Google Calendar - Calendar -->
	<script src="<?php echo base_url('resource/assets/fullcalendar/fullcalendar/fullcalendar.js');?>"></script>
    <!--script for this page only-->
    <script src="<?php echo base_url('resource/js/calendar-custom.js');?>"></script>
	<script src="<?php echo base_url('resource/js/jquery.rateit.min.js');?>"></script>
    <!-- custom select -->
    <script src="<?php echo base_url('resource/js/jquery.customSelect.min.js');?>" ></script>
	<script src="<?php echo base_url('resource/assets/chart-master/Chart.js');?>"></script>
   
    <!--custome script for all page-->
    <script src="<?php echo base_url('resource/js/scripts.js');?>"></script>
    <!-- custom script for this page-->
    <script src="<?php echo base_url('resource/js/sparkline-chart.js');?>"></script>
    <script src="<?php echo base_url('resource/js/easy-pie-chart.js');?>"></script>
	<script src="<?php echo base_url('resource/js/jquery-jvectormap-1.2.2.min.js');?>"></script>
	<script src="<?php echo base_url('resource/js/jquery-jvectormap-world-mill-en.js');?>"></script>
	<script src="<?php echo base_url('resource/js/xcharts.min.js');?>"></script>
	<script src="<?php echo base_url('resource/js/jquery.autosize.min.js');?>"></script>
	<script src="<?php echo base_url('resource/js/jquery.placeholder.min.js');?>"></script>
	<script src="<?php echo base_url('resource/js/gdp-data.js');?>"></script>	
	<script src="<?php echo base_url('resource/js/morris.min.js');?>"></script>
	<script src="<?php echo base_url('resource/js/sparklines.js');?>"></script>	
	<script src="<?php echo base_url('resource/js/charts.js');?>"></script>
	<script src="<?php echo base_url('resource/js/jquery.slimscroll.min.js');?>"></script>
  <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });
      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true
          });
      });
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});
  </script>

  </body>
</html>