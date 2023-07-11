<?php
/* 
	-- --------------------------------------------------------
	-- --------------------------------------------------------
	-- Nama File : hapus_pasien.php  
	-- Author    : Rafif Ahnafyusi
	-- Email     : rafifahnafyusi@gmail.com
	-- Github    : github.com/apeeep
	-- Copyright [c] 2023 Rafif Ahnafyusi
*/
	include_once '../config/koneksi.php';
	include_once 'class.pasien.php';
	$pasien = new pasien($pdo);
	$id = $_GET['mr'];
	$pasien->delete($id);
	header('location:data_pasien.php');
?>