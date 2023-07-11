<?php
session_start();
include_once '../../config/koneksi.php';
include_once 'class.tipe_pasien.php';
?>
<?php if ($_SESSION['s_level'] == 'Administrator') { ?>
<div id="alert"></div>
<div class="row-fluid">
<h3 class="header smaller lighter blue">Daftar Tipe Pasien</h3>
	<div class="table-header">
		<a href="javascript:void(0)" onclick="tambahForm()" class="btn btn-primary" ><i class="icon-plus icon-white"></i>Tambah</a>
	 <?php } ?>
	 <a href="javascript:void(0)" target="" onclick="window.open('../siremis-marcil/master_ref/tipe_pasien/print_tipe_pasien.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-print icon-white"></i>Cetak</a>
	 <a href="javascript:void(0)" target="" onclick="window.open('../siremis-marcil/master_ref/tipe_pasien/print_tipe_pasien_pdf.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-file-alt"></i>Export PDF</a>
	 <a href="javascript:void(0)" onclick="window.open('../siremis-marcil/master_ref/tipe_pasien/print_tipe_pasien_xls.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-table"></i>Export XLS</a>
	</div>

<table id="tabeldata" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr align="center">
			<th>Tipe</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$tipe_pasien = new tipe_pasien($pdo);		
		$query = "SELECT * FROM	tipe_pasien";		
		$tipe_pasien->view($query);
	?>
	</tbody>
</table>


