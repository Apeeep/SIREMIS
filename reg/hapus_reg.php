<?php
	include_once '../config/koneksi.php';
	include_once 'class.pasien.php';
	$reg = new pasien($pdo);
	$id = $_GET['reg_no'];
	$reg->deleteRegistrasi($id);
	header('location:data_pasien.php');
?>