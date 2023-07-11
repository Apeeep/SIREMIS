<?php
session_start();
require_once '../../config/koneksi.php';
require_once 'class.dokter.php';
require_once '../../config/fungsi_sqltgl.php';
$dokter = new dokter($pdo);
if(!empty($_POST['nama_dokter'])){
	$nama_dokter	= $_POST['nama_dokter'];
	$alamat_dokter	= $_POST['alamat_dokter'];
	$telp_dokter	= $_POST['telp_dokter'];
	$bidang_keahlian= $_POST['bidang_keahlian'];
	$aktif			= $_POST['aktif'];
	$created_by 	= $_SESSION['s_user'];
	if($dokter->create($nama_dokter,$alamat_dokter,$telp_dokter,$bidang_keahlian,$aktif,$created_by)){
		$sg   = "ok";
		$msg1 = "Data telah ditambahkan";
		$alert='alert-success';
	}else{
		$g = "err";
		$msg2 = "Data tidak bisa dimasukan";
		$alert='alert-error';
	}
}
?>

<form id="forms" method="post" onSubmit="return submitForm('<?php echo $_SERVER['PHP_SELF']; ?>')" class="form-horizontal" autocomplete="off">
	<fieldset>
		<legend>Tambah dokter</legend>
		<span>
		 <?php
		if(isset($sg) and $sg=='ok'){
			echo "
			<div class='alert $alert'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			$msg1
			</div>";
		}elseif(isset($sg) and $sg=='err'){
			echo "
			<div class='alert $alert'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			$msg2
			</div>";}
		?>
		</span>
		<div class="row-fluid">
			<div class="span6">
				<div class="control-group">
				<label class="control-label" for="nama_dokter" >Nama</label>
					<div class="controls">
					<input type="text" id="nama_dokter" name="nama_dokter" required>
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="alamat_dokter" >Alamat</label>
					<div class="controls">
					<textarea class="span12" id="alamat_dokter" name="alamat_dokter" ></textarea>
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="telp_dokter" >Telp</label>
					<div class="controls">
					<input type="text" id="telp_dokter" name="telp_dokter">
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="bidang_keahlian" >Bidang Keahlian</label>
					<div class="controls">
					<input type="text" id="bidang_keahlian" name="bidang_keahlian" required>
					</div>
				</div>
				<div class="control-group" style="display:none;">
				<label class="control-label">Aktif</label>
					<div class="controls">
						<label>
							<input name="aktif" type="radio" value="Y" checked />
							<span class="lbl"> Y</span>
						</label>
						<label>
							<input name="aktif" type="radio" value="N" />
							<span class="lbl"> N</span>
						</label>
					</div>
				</div>
			</div>						
		</div>
		<div class="form-actions" style="padding-left:0">
			<div style="float:right;">
				<button type="submit" class="btn btn-success">Tambah</button>
				<button type="button" id="close" class="btn btn-danger" >Batal</button>
			</div>
		</div>
		
	</fieldset>
</form>

<script type="text/javascript">
	$(document).ready(function(){
		$("#close").click(function(){
			$("#form-nest").hide("slow");
		});
		$(".chzn-select").chosen();
	});
</script>