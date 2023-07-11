<?php
/* 
	-- --------------------------------------------------------
	-- --------------------------------------------------------
	-- Nama File : hapus_user.php  
	-- Author    : Rafif Ahnafyusi
	-- Email     : rafifahnafyusi@gmail.com
	-- Github    : github.com/apeeep
	-- Copyright [c] 2023 Rafif Ahnafyusi
*/
	include_once '../../config/koneksi.php';
	include_once 'class.user.php';
	$user = new user($pdo);
	$id = $_GET['username'];
	$user->delete($id);
	header('location:data_user.php');
	
?>