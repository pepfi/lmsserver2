<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="<?php echo base_url('resource/img/favicon.png');?>"/>

    <title>Basic Table | Creative - Bootstrap 3 Responsive Admin Template</title>
      
      
    <!-- Bootstrap CSS -->    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resource/css/bootstrap.min.css');?>"/>
    <!-- bootstrap theme -->
    <link href="<?php echo base_url('resource/css/bootstrap-theme.css');?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url('resource/css/elegant-icons-style.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('resource/css/font-awesome.min.css');?>" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url('resource/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('resource/css/style-responsive.css');?>" rel="stylesheet" />
  </head>

  <body class="post-template nav-closed">
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
                                <img alt="" src="<?php echo base_url('resource/img/avatar-mini4.jpg');?>">
                            </span>
                            <span class="username"><?php echo $username;?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="/add"><i class="icon_profile"></i>添加管理员</a>
                            </li>
                            <li>
                                <a href="/all"><i class="icon_mail_alt"></i>查看管理员</a>
                            </li>
                            <li>
                                <a href="/logout"><i class="icon_clock_alt"></i>退出</a>
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
                          <span>用户</span>
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
     
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i> 设备管理</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home">Home</a></li>
						<li><i class="fa fa-th-list"></i>设备管理</li>
					</ol>
				</div>
			</div>
				<div class="post-template nav-closed">
				
				   <div class="boxbox">
					   <button class="select" id="APselect">AP查询</button>
					   <div id="searchSlide">
							<form  method="POST" class="form-inline" action="<?php echo site_url('search/search');?>">
                                
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
									 <input type="text" class="Wdate" name="FirstLoginTimebegin" id="FirstLoginTimebegin" onFocus="WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd HH:mm:ss'})">
								 <div class="laydate-icon " onClick="laydate({elem: '#FirstLoginTimebegin'});" style="width:10px;display:inline-block;border:none;"></div>
							</div>
			 
							<div class="form-group">
								 <label>至：</label>
								 <input type="text" class="Wdate" name="FirstLoginTimeend" id="FirstLoginTimeend" onFocus="WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd HH:mm:ss'})">
								 <div class="laydate-icon " onClick="laydate({elem: '#FirstLoginTimeend'});" style="width:10px;display:inline-block;border:none;"></div>
							</div>
			 
							<div class="form-group" >
								  <label>最后注册时间  从：</label>
								  <input type="text" class="Wdate" name="LastLoginTimebegin"  id="LastLoginTimebegin" onFocus="WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd HH:mm:ss'})">
							   <div class="laydate-icon " onClick="laydate({elem: '#LastLoginTimebegin'});" style="width:10px;display:inline-block;border:none;"></div>
							 </div>
			 
							 <div class="form-group">
								 <label>至：</label>
								 <input type="text" class="Wdate" name="LastLoginTimeend" id="LastLoginTimeend" onFocus="WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd HH:mm:ss'})">
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
	   
	</div>
<br/>
              <!-- Standard button -->


              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Advanced Table
                          </header>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#delete_Modal" data-whatever="@mdo">删除</button>
                          <div class="modal fade" id="delete_Modal" tabindex="-1" role="dialog" aria-labelledby="delete_ModalLabel" >
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="delete_ModalLabel">删除设备</h4>
                                      </div>
                                      <div class="modal-body">
                                          <form action="<?php echo site_url('delete_dev/index');?>"method="post" class="modal-body">
                                              <?php echo validation_errors();?>
                                              <?php echo form_open('delete_dev/index');?>
                                              <div class="form-group">
                                                  <label for="message-text" class="control-label">确认删除:</label>
                                                  <textarea class="form-control" id="apmac_del" name="apmac_del"></textarea>
                                              </div>
                                              <div class="modal-footer">
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary" value="delete_apmac" id="delete_apmac_btn2">Send message</button>
                                              </div>
                                            </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alloc_Modal" data-whatever="@mdo">批量分配设备</button>
                          <div class="modal fade" id="alloc_Modal" tabindex="-1" role="dialog" aria-labelledby="alloc_ModalLabel">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="alloc_ModalLabel"></h4>
                                      </div>
                                      <div class="modal-body">
                                          <form method="post" class="modal-body">
                                              <?php echo validation_errors();?>
                                              <?php echo form_open('alloc_dev/index');?>
                                              <div class="form-group">
                                                  <label for="message-text" class="control-label">批量分配设备:</label>
                                                  <textarea class="form-control" id="apmac_alloc" name="apmac_alloc"></textarea>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary" value="alloc_apmac" id="alloc_apmac_btn2">分配</button>
                                              </div>
                                            </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#relieve_Modal" data-whatever="@mdo">解除绑定</button>
                          <div class="modal fade" id="relieve_Modal" tabindex="-1" role="dialog" aria-labelledby="relieve_ModalLabel">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="relieve_ModalLabel"></h4>
                                      </div>
                                      <div class="modal-body">
                                          <form action="<?php echo site_url('relieve_dev/index');?>" method="post" class="modal-body">
                                              <?php echo validation_errors();?>
                                              <?php echo form_open('relieve_dev/index')?>
                                              <div class="form-group">
                                                  <label for="message-text" class="control-label">解除绑定:</label>
                                                  <textarea class="form-control" id="apmac_relieve" name="apmac_relieve"></textarea>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary" value="relieve_apmac" id="relieve_apmac_btn2">解除</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <a type="button" class="btn btn-info" href="search/download">下载</a>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#push_Modal" data-whatever="@mdo">上传</button>
                          <div class="modal fade" id="push_Modal" tabindex="-1" role="dialog" aria-labelledby="push_ModalLabel" >
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="push_ModalLab el">上传文件</h4>
                                    </div>
                                    <div class="modal-body"> 
                                       
					                    <?php echo $error;?>
                                        <?php echo form_open_multipart('search/upload');?>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">选择文件:</label>
                                                <input type="file" class="form-control" id="File1" name="File1"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" value="upload" id="push_file_btn">上传</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                          </div>
<!--                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#order_Modal" data-whatever="@mdo" id="send_order_btn1">下发命令</button>-->
                          <button type="button" class="btn btn-danger" onclick="openDiv('newDiv')">下发命令</button>
                          <div class="modal fade" id="order_Modal" tabindex="-1" role="dialog" aria-labelledby="order_ModalLabel" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="order_ModalLabel">下发命令</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo site_url('search/sendOrder');?>" method="POST">
                                            <?php echo validation_errors(); ?>
                                            <?php echo form_open('search/sendOrder'); ?>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">apmac:</label>
                                                <textarea class="form-control" id="apmacContent" name="apmacContent"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">输入命令:</label>
                                                <textarea class="form-control" id="aporderContent" name="aporderContent"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" value="send_order" id="send_order_btn2">Send message</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <button type="button" class="btn btn-primary">帮助</button>
                          <div class = "clearfix pagea">
                              <form action="<?php echo site_url('search/pagination');?>" method="POST" class="right clearfix">
                                  <div class="right pagebox">
                                      <label>显示页数:</label>
                                      <input type="text" id="perPageNum" name="perPageNum" />
                                      <label>跳转到第</label>
                                      <input type="text" id="jumpPageNum" name="jumpPageNum" />
                                      <label>页</label>
                                      <input class="btn" type="submit" id="set_page" value="确定" />
                                      <label class="left">总共：</label>
                                      <label class="left"><?php echo $page_num;?></label>
                                      <?php echo $page;?>
                                  </div>
                              </form>
                          </div>
                          <table class="table table-striped table-advance table-hover" id="table">
                           <tbody>
                              <tr> 
                                  <th><input type="checkbox" id="all_check"/></th>
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
                              
                                   <?php foreach($res as $row):?>
                                       
                                        <tr>
                                            <td><input type="checkbox" id="select_check" name="checkedDevice"/></td>
                                            <td class="ap_mac" name="ap_mac"><?php echo $row['ap_mac']; ?></td>
                                            <td><?php echo $row['ap_sn'] ?></td>
                                            <td><?php echo $row['sw_ver'] ?></td>
                                            <td><?php echo $row['web_rsrc_ver'] ?></td>
                                            <td><?php echo $row['last_login_time'] ?></td>
                                            <td><?php echo $row['first_login_time'] ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                                                    <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
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
  <script src="<?php echo base_url('resource/js/jquery.js');?>"></script>
  <script src="<?php echo base_url('resource/js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('resource/js/jquery.scrollTo.min.js');?>"></script>
  <script src="<?php echo base_url('resource/js/jquery.nicescroll.js');?>"> type="text/javascript"</script>
  <script src="<?php echo base_url('resource/js/search_jquery_functions.js');?>" type="text/javascript"></script>
  <script src="<?php echo base_url('resource/js/WdatePicker.js');?>" type="text/javascript"></script>
  <script>
	$(function(){
		$('#searchSlide').hide();
		$('#APselect').click(function(){
			$('#searchSlide').slideToggle();
		})
  	
		$("#all_check").click(function(){
			if(this.checked){
				$("input[name='checkname']").each(function(){this.checked=true;});
			}else{
				$("input[name='checkname']").each(function(){this.checked=false;});
			}
		});
	})
	$(function(){
		var checkAll = $(":checkbox[name=all]");
		var checkNotAll = $(":checkbox[name=checkname]");
		var num = checkNotAll.size();
		checkAll.click(function(){
			var flag = $(this).prop("checked");
			checkNotAll.prop("checked",flag);
		});
		checkNotAll.click(function(){
			var chk = checkNotAll.filter(":checked").size();
			var lalala = $(checkNotAll.filter(":checked")).parent().siblings(".ap_mac").text();
			checkAll.prop("checked",num==chk);
		});
	})
	$(function(){
		$(".searchSlide").hide();
		$(".select").click(function(){
			$(".searchSlide").slideToggle();
		})
	})
    </script>
      //下发命令弹框js
    <script type='text/javascript'>
    function openDiv(newDivID)
    {
        var newMaskID = "mask";  //遮罩层id
        var  newMaskWidth =document.body.scrollWidth;//遮罩层宽度
        var  newMaskHeight =document.body.scrollHeight;//遮罩层高度    
        //mask遮罩层  
        var newMask = document.createElement("div");//创建遮罩层
        newMask.id = newMaskID;//设置遮罩层id
        newMask.style.position = "absolute";//遮罩层位置
        newMask.style.zIndex = "1";//遮罩层zIndex
        newMask.style.width = newMaskWidth + "px";//设置遮罩层宽度
        newMask.style.height = newMaskHeight + "px";//设置遮罩层高度
        newMask.style.top = "0px";//设置遮罩层于上边距离
        newMask.style.left = "0px";//设置遮罩层左边距离
        newMask.style.background = "white";//#33393C//遮罩层背景色
        newMask.style.filter = "alpha(opacity=40)";//遮罩层透明度IE
        newMask.style.opacity = "0.40";//遮罩层透明度FF
        document.body.appendChild(newMask);//遮罩层添加到DOM中
   
        //新弹出层
        var newDivWidth = 400;//新弹出层宽度
        var newDivHeight = 150;//新弹出层高度
        var newDiv = document.createElement("div");//创建新弹出层
        newDiv.id = newDivID;//设置新弹出层ＩＤ
        newDiv.style.position = "absolute";//新弹出层位置
        newDiv.style.zIndex = "9999";//新弹出层zIndex
 
        newDiv.style.width = 430 + "px";//新弹出层宽度
        newDiv.style.height = newDivHeight + "px";//新弹出层高度
        var newDivtop=(document.body.scrollTop + document.body.clientHeight /6 )
        //    - newDivHeight/2) ;//新弹出层距离上边距离
        var newDivleft=(document.body.scrollLeft + document.body.clientWidth/2 
            - newDivWidth/2);//新弹出层距离左边距离
        newDiv.style.top = newDivtop+ "px";//新弹出层距离上边距离
        newDiv.style.left = 470 + "px";//新弹出层距离左边距离
        newDiv.style.background = "#337ab7";//新弹出层背景色
        newDiv.style.border = "1px solid #337ab7";///新弹出层边框样式
        newDiv.style.padding = "5px";//新弹出层
        //newDiv.innerHTML = "此处添加内容";//新弹出层内容
        document.body.appendChild(newDiv);//新弹出层添加到DOM中
	
   
    //弹出层滚动居中
    function newDivCenter()
    {
       newDiv.style.top = (document.body.scrollTop + document.body.clientHeight/2 
                 - newDivHeight/2) + "px";
       newDiv.style.left = (document.body.scrollLeft + document.body.clientWidth/2
                - newDivWidth/2) + "px";
    }
    if(document.all)//处理滚动事件，使弹出层始终居中
    {
        window.attachEvent("onscroll",newDivCenter);
    }
    else
    {
        window.addEventListener('scroll',newDivCenter,false);
    }

	
    //关闭新图层和mask遮罩层

    var newA = document.createElement("span");
    newA.href = "#";
    newA.style.position = "absolute";//span位置
    newA.style.left= 350 + "px";
	newA.style.background = '';
    newA.style.color = 'black';
    newA.innerHTML = "关闭";
    newA.onclick = function()//处理关闭事件
    {
        if(document.all)
        {
            window.detachEvent("onscroll",newDivCenter);
        }
        else
        {
            window.removeEventListener('scroll',newDivCenter,false);
        }
         document.body.removeChild(newMask);//移除遮罩层   
         document.body.removeChild(newDiv);////移除弹出框
        return false;
    }
    newDiv.appendChild(newA);//添加关闭span
	
	//弹出层追加内容1	
    var Order_title = document.createElement("span");
    Order_title.style.position = "absolute";//span位置
    Order_title.style.left=5+ "px";
	Order_title.style.width = 200 + 'px';
	Order_title.style.height = 20 + 'px';
    Order_title.style.color = 'black'
	Order_title.style.background = '';
    Order_title.innerHTML = "Order";
    newDiv.appendChild(Order_title);//添加关闭span
	//弹出层追加内容2	
    var order_Div = document.createElement("span");
    order_Div.style.position = "absolute";//span位置
    order_Div.style.left= 5 + "px";
	order_Div.style.top = 33 + 'px';
	order_Div.style.width = 350 + 'px';
	order_Div.style.height = 350 + 'px';
	order_Div.style.background = '';
    order_Div.innerHTML = "<textarea rows='3' cols='52'>";
    newDiv.appendChild(order_Div);//添加关闭span
	//弹出层追加内容3	
    var submit_Div = document.createElement("span");
    submit_Div.style.position = "absolute";//span位置
    submit_Div.style.left= 320 + "px";
	submit_Div.style.top = 120 + 'px';
	submit_Div.style.width = 50 + 'px';
	submit_Div.style.height = 25 + 'px';
	submit_Div.style.background = '';
    submit_Div.innerHTML = "<input type='submit' name='publish_order' value='下发命令'>";
    newDiv.appendChild(submit_Div);//添加关闭span	
             
    //获取Order
    var order = order_Div.firstChild;
    var orderButton = submit_Div.firstChild;   
    orderButton.onclick = function(){
        var order_string = order.value;
        var Macs_string = getMac();
        var Macs_order_string = Macs_string + order_string;
        window.open('/search/sendOrder/'+Macs_order_string, '_self');
    }
    }
    </script>
    <script type='text/javascript'>
//getMac
    function getMac(){
        var checkedDevice = document.getElementsByName('checkedDevice');
        var Mac_name_string = '';
        for(var i=0; i< checkedDevice.length; i++){
            if(checkedDevice[i].checked == true){
                var Mac_obj = checkedDevice[i].parentNode.nextSibling.nextSibling;
                var Mac_name = Mac_obj.innerHTML;  
                Mac_name_string = Mac_name_string + Mac_name + '_';
            } 
        }
        return Mac_name_string;
    }
  </script>
      
<!--
  <script type="text/javascript">
  function unvailMacFunc(id){
      if (window.confirm("如下设备有未执行命令")) {
          window.location="del_admin/"+id;
      }
  }
  </script>
-->
      
  <script src="<?php echo base_url('resource/js/scripts.js');?>"></script>
  </body>
</html>
