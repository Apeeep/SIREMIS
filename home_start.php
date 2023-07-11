<script type="text/javascript">
	$(document).ready(function(){
		$("#id-breadcrumbs").html("Home");
	});
</script>

<?php
	require_once 'config/koneksi.php';	
	include_once 'config/fungsi_indotgl.php';
	require_once 'class.grafik.php';
?>

<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="icon-remove"></i>
	</button>
		<i class="icon-ok green"></i>
			<?php echo "Selamat datang <strong>". $_SESSION['s_nama']."</strong> anda login sebagai <strong>". $_SESSION['s_level']."</strong>"; ?> <br />
				Untuk mengelola data silahkan pilih menu diatas, atau menu samping pada halaman Home
            
</div>
<table width="100%" border="0">
  <tr>
    <td width="50%"><div id="graph"></div></td>
  </tr>
</table>
<script type="text/javascript">
var chart1;
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         colors: ['#307ECC'],
         chart: {
            renderTo: 'graph',
            type: 'bar',
         },
         title: {
            text: 'Grafik Pasien'
         },
          subtitle: {
                text: 'Pasien Terdaftar Tahun <?php echo date('Y') ?>',
               
            },
         xAxis: {
            categories: ['Bulan']
         },
         yAxis: {
            title: {
               text: 'Jumlah Pasien Terdaftar' 
            }
         },
              series:             
            [
                 //data yang diambil dari database dimasukan ke variable nama dan data
                <?php 
                    $insiden    = new grafik($pdo);
                    $query      = "SELECT * FROM v_graf";  
                    $insiden->grafik_pasien($query);
                ?>
            ]
      });

      

   });  
</script>