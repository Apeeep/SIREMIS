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
 	<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
 	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
 	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" /> -->

 	<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
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
 	<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" /> -->
 	<style type="text/css">
 		@import "dataTable/css/demo_table_jui.css";
 		@import "dataTable/css/TableTools.css";
 		@import "dataTable/css/DT_bootstrap.css";
 		@import "dataTable/themes/smoothness/jquery-ui-1.7.2.custom.css";

 		* {
 			font-family: "Poppins", sans-serif;
 		}

 		#navbar {
 			background: linear-gradient(#1565c0, #0d47a1);
 		}

 		#accordion-item {
 			background: linear-gradient(#2D92D1, #0d47a1);
 		}

 		.navbar .navbar-inner {
 			background: #307ECC;
 			background-color: #307ECC;
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
 		function swapContent(cv) {
 			$.ajax({
 				type: "GET",
 				url: "page.php",
 				data: "page=" + cv,
 				beforeSend: function() {
 					$("#content").html("<img src='assets/images/ajax-loader.gif' />");
 				},
 				success: function(data) {
 					$("#content").html(data);
 				}
 			});
 		}

 		function swapContent1(id) {
 			$.ajax({
 				type: "GET",
 				url: "survey/edit_survey1.php",
 				data: "id=" + id,
 				beforeSend: function() {
 					$("#content").html("<img src='assets/images/ajax-loader.gif' />");
 				},
 				success: function(data) {
 					$("#content").html(data);
 				}
 			});
 		}
 	</script>
 	<!-- =-=-=-=-=-=-=-=-=-= JavaScript End Page =-=-=-=-=-=-=-=-=-= -->
 	<script src="assets/js/jquery-1.11.2.min.js"></script>
 	<script src="https://code.highcharts.com/highcharts.js"></script>
 	<script src="assets/js/exporting.js"></script>
 </head>

 <body>
 	<!-- ================== NAVBAR TOP ================== -->
 	<?php include 'navbar-top.php'; ?>
 	<!-- ================== NAVBAR TOP ================== -->
 	<div class="main-container d-flex">
 		<div class="sidebar">
 			<!-- ================== SIDEBAR ================== -->
 			<?php include 'navbar-left.php'; ?>
 			<!-- ================== SIDEBAR ================== -->
 		</div>
 		<div class="main-content container-fluid">
 			<div class="breadcrumbs" id="breadcrumbs">
 				<ul class="breadcrumb">
 					<li class="breadcrumb-item">
 						<a href=""><i class="icon-home home-icon"></i> Home </a>
 					</li>
 					<li class="fa-solid fa-angle-right"></li>
 					<li class="breadcrumb-item active" id="id-breadcrumbs"></li>
 				</ul>
 				<small>
 					<span id="dates"><span id="the-day"></span> <span id="the-time"></span> </span>
 				</small>
 				<small>
 					<span><b>Nama : </b><?php echo $_SESSION['s_nama'] ?></span>
 				</small>
 				<small>
 					<span><b>Level : </b><?php echo $_SESSION['s_level'] ?></span>
 				</small>
 			</div>
 			<div class="page-content" id="content">
 				<?php include_once('home_start.php') ?>
 			</div>
 		</div>
 	</div>
 	</div>

 	<script>
 		function myFunction(e) {
 			var elems = document.querySelector(".active");
 			if (elems !== null) {
 				elems.classList.remove("active");
 			}
 			e.target.classList.add("active");
 		}
 	</script>
 	<script type="text/javascript">
 		window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
 	</script>
 	<script type="text/javascript">
 		if ("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
 	</script>

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

 	<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
 	<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>
 	<script src="assets/js/date-time/moment.min.js"></script>
 	<script src="assets/js/date-time/daterangepicker.min.js"></script>

 	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

 	<script src="assets/js/time.js" type="text/javascript"></script>

 </body>

 </html>