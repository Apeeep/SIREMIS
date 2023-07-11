<?php
	/* 
	-- --------------------------------------------------------
	-- --------------------------------------------------------
	-- Nama File : data_pasien.php  
	-- Author    : Rafif Ahnafyusi
	-- Email     : rafifahnafyusi@gmail.com
	-- Github    : github.com/apeeep
	-- Copyright [c] 2023 Rafif Ahnafyusi
*/
	session_start();
	include_once '../config/koneksi.php';
	include_once '../config/fungsi_indotgl.php';
	include_once 'class.pasien.php';
?>

<div class="tabbable">
	<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
		<li class="active">
			<a data-toggle="tab" href="#home4">Registrasi</a>
		</li>

		<li>
			<a data-toggle="tab" href="#profile4">Pasien Terdaftar</a>
		</li>
	</ul>
	<div class="tab-content">
		<div id="home4" class="tab-pane in active">
<!-- ==================================================PASIEN============================================================== -->		
			<div id="alert"></div>
			<div class="row-fluid">
			<h3 class="header smaller lighter blue">Data Pasien</h3>
				<div class="table-header">
					<a href="javascript:void(0)" onclick="tambahFormPasien()" class="btn btn-primary" ><i class="icon-plus icon-white"></i>Pasien Baru</a>
				 <a href="javascript:void(0)" target="" onclick="window.open('../siremis-marcil/reg/print_pasien.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-print icon-white"></i>Cetak</a>
				 <a href="javascript:void(0)" target="" onclick="window.open('../siremis-marcil/reg/print_pasien_pdf.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-file-alt"></i>Export PDF</a>
				 <a href="javascript:void(0)" onclick="window.open('../siremis-marcil/reg/print_pasien_xls.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-table"></i>Export XLS</a>
				</div>

			<table id="tabeldata1" class="table table-striped table-bordered table-hover" width="100%">
				<thead>
					<tr align="center">
						<th>No.MR</th>
						<th>Nomor BPJS</th>
						<th>Nama</th>
						<th>Tempat Tgl Lahir</th>
						<th>Pangkat</th>
						<th>NRP/NIP</th>
						<th width="300">Alamat</th>
						<th>Jenis Kelamin</th>
						<th>Telp</th>
						<th>Reg</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$pasien = new pasien($pdo);		
					$query = "SELECT * FROM v_pasien";		
					$pasien->view($query);
				?>
				</tbody>
			</table>
			</div>
		</div>
<!-- =========================================================REG===========================================================-->
		<div id="profile4"  class="tab-pane">
		<div id="alert1"></div>
			<div class="row-fluid">
			<h3 class="header smaller lighter blue">Pasien Terdaftar Tanggal <?php echo date('d-M-Y'); ?>  </h3>

			<div class="table-header">
					<a href="javascript:void(0)" onclick="tambahFormPasien()" class="btn btn-primary" ><i class="icon-plus icon-white"></i>Pasien Baru</a>				 
					<a href="javascript:void(0)" target="" onclick="window.open('../siremis-marcil/reg/print_pasien_terdaftar.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-print icon-white"></i>Cetak</a>
					<a href="javascript:void(0)" target="" onclick="window.open('../siremis-marcil/reg/print_pasien_terdaftar_pdf.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-file-alt"></i>Export PDF</a>
					<a href="javascript:void(0)" onclick="window.open('../siremis-marcil/reg/print_pasien_terdaftar_xls.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-table"></i>Export XLS</a>
			
			</div>
			<table id="tabeldata" class="table table-striped table-bordered table-hover" width="100%">
				<thead>
					<tr align="center">
						<th>No.MR</th>
						<th>Poli/Unit Tujuan</th>
						<th>Diagnosa</th>
						<th>Nama</th>
						<th>Tempat Tgl Lahir</th>
						<th>Alamat</th>
						<th>Jenis Kelamin</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$tgl1 = date('Y-m-d');
					$pasien = new pasien($pdo);		
					$query = "SELECT * FROM v_reg WHERE tgl_reg = '$tgl1' ";		
					$pasien->viewreg($query);
				?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<!-- =========================================================JAVASCRIPT==========================================================-->
<script type="text/javascript">
	jQuery(function($) {
		$('#myTab[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			//if($(e.target).attr('#tgl1') == "#profile4") doSomethingNow();
		});
		$(".tanggal").datepicker({
			dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
			yearRange: '1970:2050',
			autoclose: true,
			todayHighlight: true,
		});
	});	
</script>
