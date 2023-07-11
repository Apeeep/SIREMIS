<?php
	include_once '../../config/koneksi.php';
	include_once 'class.tipe_pasien.php';
	$tipe_pasien = new tipe_pasien($pdo);
	$id = $_GET['id_tipe_pasien'];
	$tipe_pasien->delete($id);
?>