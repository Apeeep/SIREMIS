<?php 
	session_start();
	include_once '../../config/koneksi.php';
	require_once 'class.dokter.php';
	$dokter = new dokter($pdo);
	if(!empty($_POST['id_dokter'])){
		$id_dokter		= $_POST['id_dokter'];
		$nama_dokter	= $_POST['nama_dokter'];
		$alamat_dokter	= $_POST['alamat_dokter'];
		$telp_dokter	= $_POST['telp_dokter'];
		$bidang_keahlian= $_POST['bidang_keahlian'];
		$aktif			= $_POST['aktif'];
		$update_by		= $_SESSION['s_user'];
		if($dokter->update($id_dokter,$nama_dokter,$alamat_dokter,$telp_dokter,$bidang_keahlian,$aktif,$update_by)){
			$sg   = "ok";
			$msg1 = "Data Berhasil Di Update";
			$alert='alert-success';
		}else{
			$g = "err";
			$msg2 = "Data Gagal Di Update";
			$alert='alert-error';
		}
	}
?>

<form id="forms" method="post" onSubmit="return submitForm('<?php echo $_SERVER['PHP_SELF']; ?>')" class="form-horizontal" autocomplete="off">
	<fieldset>
		<legend>Edit Dokter</legend>
		<span>
		<?php
		if(isset($sg) and $sg=='ok'){
			echo "
			<div class='alert $alert'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			$msg1
			</div>";
        	?>
		<?php }elseif(isset($sg) and $sg=='err')
		{
			echo "
			<div class='alert $alert'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			$msg2
			</div>"; 
		}
		else
		{
		if(isset($_GET['id_dokter']))
		{
			$id = $_GET['id_dokter'];
			extract($dokter->getID($id));	
		} 
		?>
		</span>
		<div class="row-fluid">
			<div class="span9">
				<div class="control-group">
				<label class="control-label" for="id_dokter" >ID dokter</label>
					<div class="controls">
					<input type="text" id="id_dokter" name="id_dokter" value="<?php echo $id_dokter; ?>" readonly="readonly">
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="nama_dokter" >Nama</label>
					<div class="controls">
					<input type="text" id="nama_dokter" name="nama_dokter" value="<?php echo $nama_dokter; ?>">
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="alamat_dokter" >Alamat</label>
					<div class="controls">
					<textarea class="span12" id="alamat_dokter" name="alamat_dokter" value="<?php echo $alamat_dokter; ?>" ><?php echo $alamat_dokter; ?></textarea>
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="telp_dokter" >Telp</label>
					<div class="controls">
					<input type="text" id="telp_dokter" name="telp_dokter" value="<?php echo $telp_dokter; ?>">
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="bidang_keahlian" >Bidang Keahlian</label>
					<div class="controls">
					<input type="text" id="bidang_keahlian" name="bidang_keahlian" required value="<?php echo $bidang_keahlian; ?>">
					</div>
				</div>				
				<div class="control-group" style="display:none;">
					<label class="control-label">Aktif</label>
					<div class="controls">
						<label>
							<input name="aktif" type="radio" value="Y" <?php echo ($aktif=='Y')?'checked':''; ?> />
							<span class="lbl"> Y</span>
						</label>
						<label>
							<input name="aktif" type="radio" value="N" <?php echo ($aktif=='N')?'checked':''; ?> />
							<span class="lbl"> N</span>
						</label>
					</div>
				</div>
			</div>							
		</div>
		<div class="form-actions" style="padding-left:0px;">
				<div class="controls-group" style="float:right;">
				<button type="submit" class="btn btn-success">Edit</button>
				<button type="button" id="close" class="btn btn-danger" >Tutup</button>
				</div>
		</div>
		<?php 
		}
		?>		
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