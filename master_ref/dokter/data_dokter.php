<?php
session_start();
include_once '../../config/koneksi.php';
include_once 'class.dokter.php';
?>
<?php if ($_SESSION['s_level'] == 'Administrator' ) { ?>
<div id="alert"></div>
<div class="row-fluid">
<h3 class="header smaller lighter blue">Daftar Dokter Pelaksana</h3>
	<div class="table-header">
		<a href="javascript:void(0)" onclick="tambahForm()" class="btn btn-primary" ><i class="icon-plus icon-white"></i>Tambah</a>
	 <?php } ?>
	 <a href="javascript:void(0)" target="" onclick="window.open('../siremis-marcil/master_ref/dokter/print_dokter.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-print icon-white"></i>Cetak</a>
	 <a href="javascript:void(0)" target="" onclick="window.open('../siremis-marcil/master_ref/dokter/print_dokter_pdf.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-file-alt"></i>Export PDF</a>
	 <a href="javascript:void(0)" onclick="window.open('../siremis-marcil/master_ref/dokter/print_dokter_xls.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-table"></i>Export XLS</a>
	</div>

<table id="tabeldata" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr align="center">
			<th>Dokter</th>
			<th>Alamat</th>
			<th>Telp</th>
			<th>Bidang Keahlian</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$dokter = new dokter($pdo);		
		$query = "SELECT * FROM dokter";		
		$dokter->view($query);
	?>
	</tbody>
</table>


