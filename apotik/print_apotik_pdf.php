<?php
/* 
	-- --------------------------------------------------------
	-- --------------------------------------------------------
	-- Nama File : print_apotik_pdf.php  
	-- Author    : Rafif Ahnafyusi
	-- Email     : rafifahnafyusi@gmail.com
	-- Github    : github.com/apeeep
	-- Copyright [c] 2023 Rafif Ahnafyusi 
	*/
	
	session_start();
	include_once '../config/koneksi.php';
	include_once 'class.apotik.php';

	// Define relative path from this script to mPDF
	$nama_dokumen='Daftar Obat'; //Beri nama file PDF hasil.
	define('../assets/MPDF57/');
	include("../assets/MPDF57/mpdf.php");
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
    <td height="72"><div align="left"><img src="../../../siremis-marcil/assets/images/logo.png" width="67" height="54" /></div></td>
    <td valign="bottom"><div align="left" class="style1">
      <p>KLINIK PRATAMA BP CILANDAK <br /> 
        <span class="style2">Komp. Marinir Cilandak, Jl. Memed Raya, Cilandak Timur, Pasar Minggu <br /> Jakarta Selatan 12560 Telp. 021-7821173, Fax 021-7821173 <br /> Email : klinikpratama.marcil@gmail.com </span> </p>      
    </div></td>
    <td>&nbsp;</td>
  </tr>  
</table>
<hr />
<h3 class="header smaller lighter blue">Daftar Obat</h3>
</div>
<table width="100%" border="1" align="Top" cellpadding="5" cellspacing="5" padding-top="0px">
	<thead>
		<tr align="center">
			<th width="20px">ID</th>
			<th>Obat</th>
			<th>Qty</th>
			<th>Satuan</th>
			<th>Harga</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$apotik = new apotik($pdo);		
			$query = "SELECT * FROM v_obat_qty_stok";		
			$apotik->prin($query);
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