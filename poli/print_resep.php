
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Document</title>
<link rel="icon" type="image/png" href="../assets/images/logo.png" />
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
<?php
	session_start();
	include_once '../config/koneksi.php';
	include_once '../config/fungsi_indotgl.php';
	include_once 'class.poli.php';
	$dok = new poli($pdo);
	if(isset($_GET['reg_no']))
	    {
	      $id = $_GET['reg_no'];
	      extract($dok->getID($id));
	      if ($dok->getDokter($id)){
	      	extract($dok->getDokter($id));
	      }	
         if ($dok->getrujuk1($id)){
          extract($dok->getrujuk1($id));
        }       
	        
	}else{
	      $id = $_POST['reg_no'];
	      extract($dok->getID($id));
	}
?>
<body>
<p>&nbsp;</p>
<div style="width:95%;margin:0 auto;">
<div class="row-fluid">
<table width="100%">
  <tr>
    <td height="72"><div align="left"><img src="../../siremis-marcil/assets/images/logo.png" width="67" height="54" /></div></td>
    <td valign="bottom"><div align="left" class="style1">
      <p>KLINIK PRATAMA BP CILANDAK <br /> 
        <span class="style2">Komp. Marinir Cilandak, Jl. Memed Raya, Cilandak Timur, Pasar Minggu <br /> Jakarta Selatan 12560 Telp. 021-7821173, Fax 021-7821173 <br /> Email : klinikpratama.marcil@gmail.com </span> </p>      
    </div></td>
    <td>&nbsp;</td>
  </tr>  
</table>
<hr class="style1">
<h3 class="header smaller lighter blue">
  <div align="center">RESEP</div>
</h3>
</div>
<table width="100%">
  <tr>
    <td width="17%">MR / Reg No </td>
    <td width="1%">:</td>
    <td width="31%"><?php echo $mr ." /".$reg_no; ?></td>
    <td width="8%">&nbsp;</td>
    <td width="21%">Dokter Pemeriksa</td>
    <td width="22%">: 
      <?php if ($dok->getDokter($id)){ echo $nama_dokter; } ?></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><?php echo $nama; ?></td>
    <td>&nbsp;</td>
    <td>Diagnosa Awal </td>
    <td>: <?php echo $diagnosa; ?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin </td>
    <td>:</td>
    <td><?php echo $jenis_kelamin ?></td>
    <td>&nbsp;</td>
    <td>Diagnosa Dokter </td>
    <td>: 
      <?php if ($dok->getDokter($id)){ echo $diagnosa_dokter;} ?></td>
  </tr>
  <tr>
    <td>Tempat Tgl Lahir</td>
    <td>:</td>
    <td><?php echo $tempat_lahir.", ".tgl_indo($tgl_lahir); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Alamat</td>
    <td valign="top">:</td>
    <td><?php echo $alamat.", Desa ".$nama_kel.", Kec. ".$nama_kec.", ".$nama_kab."-".$nama_prov; ?></td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td rowspan="2" valign="top">: </td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    </tr>
</table>
<p><strong>RESEP</strong></p>
<table width="100%" border="1" cellspacing="3" cellpadding="3">
  <tr>
    <td width="28%"><strong>Obat</strong></td>
    <td width="17%"><div align="center"><strong>Qty</strong></div></td>
    <td width="17%"><div align="center"><strong>Satuan</strong></div></td>
    </tr>
  
  <tbody>
    <?php	
		$query = "SELECT * FROM v_resep where reg_no = '$id' ";		
		$dok->viewResepDokter($query);
	?>
  </tbody>
</table>
<hr />
<table width="100%" cellspacing="3" cellpadding="3">
  <tr>
    <td width="65%">&nbsp;</td>
    <td width="35%">Jakarta, <?php echo date('d-M-Y') ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>( ............................. ) </td>
  </tr>
</table>
<p>&nbsp;</p>
<p><button class="style12" id="tombol" onclick="window.print()" ><i class="icon-print"></i>Print</button></p>
</div>
</body>
</html>