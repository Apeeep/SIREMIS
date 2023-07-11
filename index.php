 <?php
include 'config/cekSession.php';
include "config/fungsi_ago.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Sistem Informasi Rekam Medis Klinik Pratama BP Cilandak</title>
		<link rel="icon" type="image/png" href="assets/images/logo.png" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="assets/css/select2.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.css" />
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.css" />
		<link rel="stylesheet" href="assets/css/colorpicker.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<style type="text/css">
		{literal}
		@import "dataTable/css/demo_table_jui.css";
		@import "dataTable/css/TableTools.css";
		@import "dataTable/css/DT_bootstrap.css";
		@import "dataTable/themes/smoothness/jquery-ui-1.7.2.custom.css";
		{/literal}

		.navbar .navbar-inner {
			background: #307ECC;
			background-color: #307ECC;
		}

		.ttip {
			position: relative;
			display: inline-block;
		}

		.ttip .ttiptext {
			visibility: hidden;
			width: 100px;
			background-color: #307ECC;
			color: #fff;
			text-align: center;
			border-radius: 6px;
			padding: 5px 0;
		
		/* Position the tooltip */
			position: absolute;
			z-index: 1;
			bottom: 120%;
			left: 50%;
			margin-left: -50px;
		}

		.ttip:hover .ttiptext {
			visibility: visible;
		}

		.control-label {
			text-align: left;
		}

		.breadcrumbs {
			display: flex;
			align-items: center;
			gap: 20px;
		}

		</style>
		
<!-- =-=-=-=-=-=-=-=-=-= JavaScript Page =-=-=-=-=-=-=-=-=-= -->
		<script type="text/javascript">
		function swapContent(cv){
			$.ajax({
				type:"GET",
				url:"page.php",
				data:"page="+cv,
				beforeSend:function(){
					$("#content").html("<img src='assets/images/ajax-loader.gif' />");
				},
				success:function(data){
					$("#content").html(data);
				}
			});
		}
		
		function swapContent1(id){
			$.ajax({
				type:"GET",
				url:"survey/edit_survey1.php",
				data:"id="+id,
				beforeSend:function(){
					$("#content").html("<img src='assets/images/ajax-loader.gif' />");
				},
				success:function(data){
					$("#content").html(data);
				}
			});
		}
		</script>
<!-- =-=-=-=-=-=-=-=-=-= JavaScript End Page =-=-=-=-=-=-=-=-=-= -->
		<script src="assets/js/jquery-1.11.2.min.js"></script>
	    <script src="assets/js/highcharts.js"></script>
	    <script src="assets/js/exporting.js"></script>
	</head>
<body>	
<!-- =-=-=-=-=-=-=-=-=-= Navbar Top =-=-=-=-=-=-=-=-=-= -->
		<?php include 'navbar-top.php'; ?> 
<!-- =-=-=-=-=-=-=-=-=-= End Navbar Top =-=-=-=-=-=-=-=-=-= -->
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<!--
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success">
							<i class="icon-signal"></i>
						</button>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>

						<a href="javascript:void(0)" onclick="swapContent('user/user')" class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</a>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div>--><!--#sidebar-shortcuts-->
<!-- =-=-=-=-=-=-=-=-=-= Navbar Right =-=-=-=-=-=-=-=-=-= -->
				<?php include 'navbar-right.php'; ?>
<!-- =-=-=-=-=-=-=-=-=-= End Navbar Right =-=-=-=-=-=-=-=-=-= -->
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						
						<li>
							<a href=""><i class="icon-home home-icon"></i> Home </a> 
						</li>
						<li class="icon icon-long-arrow-right"></li> <li class="active" id="id-breadcrumbs"></li>					
					</ul><!--.breadcrumb-->
					
					<small>
					<span id="dates"><span id="the-day"></span> <span id="the-time"></span> </span> 
					</small>

					<small>
					<span><b>Nama : </b><?php echo $_SESSION['s_nama'] ?></span> 
					</small>

					<small>
					<span><b>Level : </b><?php echo $_SESSION['s_level'] ?></span> 
					</small>
					<!--
					<div class="nav-search" id="nav-search">
						<form class="form-search" />
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="icon-search nav-search-icon"></i>
							</span>
						</form>
					</div>-->
				</div>
<!-- =-=-=-=-=-=-=-=-=-= Main Content =-=-=-=-=-=-=-=-=-= -->
				<div class="page-content" id="content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<?php include_once('home_start.php') ?>
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
<!-- =-=-=-=-=-=-=-=-=-= End Main Content =-=-=-=-=-=-=-=-=-= -->
				<!--
				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-class="default" value="#438EB9" />#438EB9
									<option data-class="skin-1" value="#222A2D" />#222A2D
									<option data-class="skin-2" value="#C6487E" />#C6487E
									<option data-class="skin-3" value="#D0D0D0" />#D0D0D0
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" checked="checked" />
							<label class="lbl" for="ace-settings-header" > Fixed Header</label>
							
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" checked="checked" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>
					</div>
				</div> --><!--/#ace-settings-container-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->
		
<!-- =-=-=-=-=-=-=-=-=-= Scroll Up =-=-=-=-=-=-=-=-=-= -->
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
<!-- =-=-=-=-=-=-=-=-=-= End Scroll Up =-=-=-=-=-=-=-=-=-= -->



<!-- =-=-=-=-=-=-=-=-=-= -->
		<!--basic scripts-->
		<!--[if !IE]>-->
		<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
		<!--<![endif]-->
		<!--[if IE]>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<![endif]-->
		<!--[if !IE]>-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<!--<![endif]-->
		<!--[if IE]>-->
		<!--<script src="assets/js/jquery.2.1.1.min.js"></script> -->
		<!--
		<script type="text/javascript">
 		window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->		
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		
		<!--page specific plugin scripts-->	
		
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.maskMoney.js"></script>
		<script src="assets/js/jquery.maskMoney.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/jquery.autosize-min.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>
		
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>		
		<script src="assets/js/ace-extra.min.js"></script>
		<script src="assets/js/datatable.js"></script>
		<script src="assets/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="assets/js/fuelux/fuelux.spinner.min.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/date-time/moment.min.js"></script>
		<script src="assets/js/date-time/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		
		<script src="assets/js/time.js" type="text/javascript"></script>
		
	</body>
</html>
