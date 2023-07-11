<div id="form" class="modal" tabindex="-1" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a href="javascript:void(0)" onclick="swapContent('kasir/kasir')">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</a>
				<h4 class="blue bigger">Pembayaran</h4>
			</div>

			<div class="modal-body">
			<?php
			session_start();

			include_once '../config/koneksi.php';
			include_once '../config/fungsi_indotgl.php';
			include_once 'class.kasir.php';
			$kasir = new kasir($pdo);
			if(isset($_GET['reg_no']))
		    {
		      $id = $_GET['reg_no'];
		      extract($kasir->getID($id));  
		    }else{
		      $id = $_POST['reg_no'];
		      extract($kasir->getID($id));
		    }
			?>
	        <table id="tabeldata" class="table table-striped table-bordered table-hover" width="100%">
				<thead>
					<tr>
						<th><div align="center">No Reg</div></th>
						<th><div align="center">Total Harga</div></th>
						<th><div align="center">Jumlah Bayar</div></th>			
						<th><div align="center">Kembalian</div></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$query = "SELECT * FROM bayar where reg_no = '$id' ";
						$kasir->viewbayar($query);		
					?>
				</tbody>
			</table>
			<?php if($id_tipe_pasien==1){ ?>
			<div class="modal-footer">
			 <div align="center"><strong>Pasien Ditanggung BPJS</strong></div>
			</div>
			<?php }else if($id_tipe_pasien==3){ ?>
			<div class="modal-footer">
			 <div align="center"><strong>Pasien Ditanggung Asuransi Kesehatan</strong></div>
			</div>
			<?php }else{ ?>
			<div class="modal-footer">				
				<?php if($poli=='LAB'){ echo "
				<a href='javascript:void(0)' onclick=\"window.open('../siremis-marcil/lab/kwitansi_lab.php?reg_no=$id')\"  class='btn btn-primary'><i class='icon-print icon-white'></i> Print</a>"; 
				}else{
				 echo "<a href='javascript:void(0)' onclick=\"window.open('../siremis-marcil/poli/print_bayar.php?reg_no=$id')\"  class='btn btn-primary'><i class='icon-print icon-white'></i> Print</a>" ; } ?> 
				<?php if($kasir->ff($id)){echo ""; 
				}else{
				echo "<a href='javascript:void(0)' onclick='Tambahbayar($id)' class='btn btn-primary' >Bayar</a>";}?>
				<a href="javascript:void(0)" onclick="swapContent('kasir/kasir')" class="btn btn-primary"> Tutup</a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<script type="text/javascript">

</script>