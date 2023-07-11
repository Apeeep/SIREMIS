<?php
session_start();
require_once '../../config/koneksi.php';
require_once 'class.tipe_pasien.php';
$tipe_pasien = new tipe_pasien($pdo);
if(!empty($_POST['nama_tipe_pasien'])){
	$nama_tipe_pasien	= $_POST['nama_tipe_pasien'];
	$alamat_tipe_pasien	= $_POST['alamat_tipe_pasien'];
	$telp_tipe_pasien	= $_POST['telp_tipe_pasien'];
	$aktif						= $_POST['aktif'];
	$created_by 				= $_SESSION['s_user'];
	if($tipe_pasien->create($nama_tipe_pasien,$alamat_tipe_pasien,$telp_tipe_pasien,$aktif,$created_by)){
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
		<legend>Tambah Tipe Pasien</legend>
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
				<label class="control-label" for="nama_tipe_pasien" >Nama</label>
					<div class="controls">
					<input type="text" id="nama_tipe_pasien" name="nama_tipe_pasien" required>
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="alamat_tipe_pasien" >Alamat</label>
					<div class="controls">
					<textarea class="span12" id="alamat_tipe_pasien" name="alamat_tipe_pasien" ></textarea>
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="telp_tipe_pasien" >Telp</label>
					<div class="controls">
					<input class="form-control input-mask-phone" name="telp_tipe_pasien" type="text" id="form-field-mask-2" />
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
		$.mask.definitions['~']='[+-]';
		$('.input-mask-phone').mask('9999-9999-9999');
		$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
	});
</script>