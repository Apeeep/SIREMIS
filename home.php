<script type="text/javascript">
   $(document).ready(function() {
      $("#id-breadcrumbs").html("Home");
   });
</script>

<?php
require_once 'config/cekSession.php';
require_once 'config/koneksi.php';
require_once 'config/fungsi_indotgl.php';
require_once 'class.grafik.php';
?>

<!-- ================== ALERT ================== -->
<div class="alert alert-info alert-dismissible fade show" role="alert">
   Selamat datang <strong><?php echo $_SESSION['s_nama'] ?></strong>, anda login sebagai <strong><?php echo $_SESSION['s_level'] ?></strong>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<!-- ================== ALERT ================== -->

<!-- ================== GRAPH ================== -->
<div class="container-fluid">
   <div id="container" class="w-100"></div>
</div>
<script>
   const chart = Highcharts.chart('container', {
      colors: ['#307ECC'],
      chart: {
         type: 'bar'
      },
      title: {
         text: 'Grafik Pasien'
      },
      subtitle: {
         text: 'Pasien Terdaftar Tahun <?php echo date('Y') ?>'
      },
      legend: {
         align: 'right',
         verticalAlign: 'middle',
         layout: 'vertical'
      },
      xAxis: {
         categories: ['Bulan']
      },
      yAxis: {
         title: {
            text: 'Jumlah Pasien Terdaftar'
         }
      },
      series: [<?php
               $insiden    = new grafik($pdo);
               $query      = "SELECT * FROM v_graf";
               $insiden->grafik_pasien($query);
               ?>],
      responsive: {
         rules: [{
            condition: {
               maxWidth: 500,
               minWidth: 0
            },
            chartOptions: {
               legend: {
                  align: 'center',
                  verticalAlign: 'bottom',
                  layout: 'horizontal'
               }
            }
         }]
      }
   });
</script>
<!-- ================== GRAPH ================== -->