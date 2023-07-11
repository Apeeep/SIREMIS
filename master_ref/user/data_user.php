<?php
/* 
	-- --------------------------------------------------------
	-- --------------------------------------------------------
	-- Nama File : data_user.php  
	-- Author    : Rafif Ahnafyusi
	-- Email     : rafifahnafyusi@gmail.com
	-- Github    : github.com/apeeep
	-- Copyright [c] 2023 Rafif Ahnafyusi
*/
session_start();
require_once '../../config/koneksi.php';
require_once '../user/class.user.php';
?>
<?php if ($_SESSION['s_level'] == 'Administrator'){ //|| $_SESSION['s_level'] == 'admin' ) { ?>
<div id="alert"></div>
<div class="row-fluid">
<h3 class="header smaller lighter blue">Daftar User</h3>
	<div class="table-header">
		<a href="javascript:void(0)" onclick="tambahForm()" class="btn btn-primary" ><i class="icon-plus icon-white"></i>Tambah</a> <?php } ?>
		<a href="javascript:void(0)" target="" onclick="window.open('../siremis-marcil/master_ref/user/print_user.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-print icon-white"></i>Cetak</a>
		<a href="javascript:void(0)" target="" onclick="window.open('../siremis-marcil/master_ref/user/print_user_pdf.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-file-alt"></i>Export PDF</a>
		<a href="javascript:void(0)" onclick="window.open('../siremis-marcil/master_ref/user/print_user_xls.php','name','width=900,height=600')" class="btn btn-primary" ><i class="icon-table"></i>Export XLS</a>
	</div>

<table id="tabeldata" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<th>Username</th>
			<th>Nama Lengkap</th>
			<th>Email</th>
			<th>No.Telp.</th>
			<th>Level</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$user = new user($pdo);
		if ($_SESSION['s_level'] == 'Administrator'){
			$query = "SELECT * FROM	users ";	
		}else{			
			$query = "SELECT * FROM users WHERE username ='$_SESSION[s_user]'";	
		}		
		$user->view($query);
	?>
	</tbody>
</table>

