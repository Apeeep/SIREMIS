<?php
session_start();
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/ms-excel"); 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Data-tipe_pasien.xls");
require_once '../../config/koneksi.php';
require_once '../tipe_pasien/class.tipe_pasien.php'; 
?>
<div class="row-fluid">
<h3 class="header smaller lighter blue">Daftar Tipe Pasien</h3>
</div>

<table id="tabeldata" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr align="center">
			<th>Tipe</th>
			<th>Alamat</th>
			<th>Telp</th>			
			<th>Kode Tipe Pasien</th>
			<th width="50px">Aktif</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$tipe_pasien = new tipe_pasien($pdo);		
		$query = "SELECT * FROM	tipe_pasien ";		
		$tipe_pasien->view($query);
	?>
	</tbody>
</table>


