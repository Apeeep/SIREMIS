<?php
session_start();
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/ms-excel"); 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Data-Pasien.xls");
require_once '../config/koneksi.php';
include_once '../config/fungsi_indotgl.php';
require_once 'class.pasien.php'; 
?>
<div class="row-fluid">
<h3 class="header smaller lighter blue">Daftar Pasien</h3>
</div>
<table id="tabeldata" border="1" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr align="center">
			<th>No.MR</th>
			<th>Nama</th>
			<th>Tempat Tgl Lahir</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Telp</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$pasien = new pasien($pdo);		
		$query = "SELECT * FROM v_pasien";		
		$pasien->prin($query);
	?>
	</tbody>
</table>