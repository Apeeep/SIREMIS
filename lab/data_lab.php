<?php
session_start();
include_once '../config/koneksi.php';
include_once '../config/fungsi_indotgl.php';
include_once 'class.lab.php';
?>
<div id="alert"></div>
<div class="row-fluid">
	<div class="table-header">
	Daftar Tindakan Laboratorium
	</div>

<table id="tabeldata" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr align="center">
			<tr align="center">
			<th>No</th>
			<th>Reg.No</th>
			<th>Hasil</th>
			<th>Tindakan</th>
			<th>Nama</th>
			<th>Tempat Tgl Lahir</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
		</tr>
		</tr>
	</thead>
	<tbody>
		<?php
			$tgl1 = date('Y-m-d');
			$lab = new lab($pdo);		
			$query = "SELECT * FROM v_reg WHERE tgl_reg = '$tgl1' AND poli = 'LAB' ";		
			$lab->view($query);
		?>
	</tbody>
</table>


