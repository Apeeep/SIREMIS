
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Document</title>
<link rel="icon" type="image/jpg" href="../../assets/images/rs.jpg" />
<link href="../../assets/css/print.css" rel="stylesheet" type="text/css" media="print" />
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
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
<?php
session_start();
include_once '../../config/koneksi.php';
include_once 'class.tindakan_lab.php';
?>
<body>
<p>&nbsp;</p>
<div style="width:95%;margin:0 auto;">
<div class="row-fluid">
<table width="100%">
  <tr>
    <td height="72"><div align="left"><img src="../../../siremis-marcil/assets/images/logo.png" width="70" height="60" /></div></td>
    <td valign="bottom"><div align="left" class="style1">
      <p>KLINIK PRATAMA BP CILANDAK <br /> 
        <span class="style2">Komp. Marinir Cilandak, Jl. Memed Raya, Cilandak Timur, Pasar Minggu <br /> Jakarta Selatan 12560 Telp. 021-7821173, Fax 021-7821173 <br /> Email : klinikpratama.marcil@gmail.com </span> </p>      
    </div></td>
    <td>&nbsp;</td>
  </tr>  
</table>
<hr />
<h3 class="header smaller lighter blue">Daftar Tindakan Laboratorium</h3>
</div>
<table width="100%" border="1" align="Top" cellpadding="5" cellspacing="5" padding-top="0px">
	<thead>
		<tr align="center">
			<th>Tindakan Laboratorium</th>
			<th>Harga</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$tindakan_lab = new tindakan_lab($pdo);		
		$query = "SELECT * FROM tindakan_lab";		
		$tindakan_lab->prin($query);
	?>
	</tbody>
</table>
<p></p>
<p><button class="style12" id="tombol" onclick="window.print()" ><i class="icon-print"></i>Print</button></p>
</div>
</body>
</html>