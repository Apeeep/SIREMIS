<?php
/* 
	-- --------------------------------------------------------
	-- --------------------------------------------------------
	-- Nama File : print_user_xls.php  
	-- Author    : Rafif Ahnafyusi
	-- Email     : rafifahnafyusi@gmail.com
	-- Github    : github.com/apeeep
	-- Copyright [c] 2023 Rafif Ahnafyusi
*/
session_start();
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/ms-excel"); 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Data-User.xls");
require_once '../../config/koneksi.php';
require_once '../user/class.user.php'; 
?>
<div class="row-fluid">
<h3 class="header smaller lighter blue">Daftar User</h3>
</div>
<table width="100%" border="1" align="Top" cellpadding="5" cellspacing="5" padding-top="0px">
	<thead>
		<tr>
			<th>Username</th>
			<th>Nama Lengkap</th>
			<th>Email</th>
			<th>No.Telp.</th>
			<th>Level</th>
			<th>Aktif</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$user = new user($pdo);
		if ($_SESSION['s_level'] == 'administrator'){
			$query = "SELECT * FROM v_print_user ";	
		}else{			
			$query = "SELECT * FROM v_print_user WHERE username ='$_SESSION[s_user]'";	
		}		
		$user->prin($query);
	?>
	</tbody>
</table>