<?php
/* 
	-- --------------------------------------------------------
	-- --------------------------------------------------------
	-- Nama File : print_pasien_terdaftar_pdf.php  
	-- Author    : Rafif Ahnafyusi
	-- Email     : rafifahnafyusi@gmail.com
	-- Github    : github.com/apeeep
	-- Copyright [c] 2023 Rafif Ahnafyusi 
	*/

	session_start();
	include_once '../config/koneksi.php';	
	include_once '../config/fungsi_indotgl.php';
	include_once 'class.pasien.php';

	// Define relative path from this script to mPDF
	$nama_dokumen='Pasien Terdaftar'; //Beri nama file PDF hasil.
	defined('../assets/mpdf60/');
	include_once("../assets/mpdf60/mpdf.php");
	$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document

	//Beginning Buffer to save PHP variables and HTML tags
	ob_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Document</title>
<link href="../assets/css/print.css" rel="stylesheet" type="text/css" media="print" />
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
</style>
<style type="text/css">
<!--
.style1 {
	font-family: inherit;
	font-weight: bold;
	font-size: 24px;
}
.style2 {font-size: 16px}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<div style="width:95%;margin:0 auto;">
<div class="row-fluid">
<table width="100%">
  <tr>
    <td><div align="left"><img src="../../../siremis-marcil/assets/images/logo_atas.png"/></div></td>
    <td valign="bottom"><div align="left" class="style1">
      <p>KLINIK PRATAMA BP CILANDAK <br /> 
        <span class="style2">Komp. Marinir Cilandak, Jl. Memed Raya, Cilandak Timur, Pasar Minggu <br /> Jakarta Selatan 12560 Telp. 021-7821173, Fax 021-7821173 <br /> Email : klinikpratama.marcil@gmail.com </span> </p>      
    </div></td>
    <td>&nbsp;</td>
  </tr>  
</table>
<hr />
<h3 class="header smaller lighter blue">Pasien Terdaftar</h3>
</div>
<table id="tabeldata" border="1" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr align="center">
			<th>No.MR</th>
			<th>Poli </th>
			<th>Diagnosa</th>
			<th>Nama</th>
			<th>Tempat Tgl Lahir</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Registrasi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$pasien = new pasien($pdo);		
		$query = "SELECT * FROM v_reg";		
		$pasien->PrinReg($query);
	?>
	</tbody>
</table>
</div>
</body>
</html>
<?php

	$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
	ob_end_clean();
	//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
	$mpdf->WriteHTML(utf8_encode($html));
	$mpdf->Output($nama_dokumen.".pdf" ,'I');
	exit;
	
?>