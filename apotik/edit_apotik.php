<?php
session_start();
require_once '../config/koneksi.php';
require_once 'class.apotik.php';
$obat1 = new apotik($pdo);
if(!empty($_POST['obat'])){
	$id_obat 	= $_POST['id_obat'];
	$obat		= $_POST['obat'];
	$satuan		= $_POST['satuan'];
	$harga 		= str_replace(['Rp. ',',','.'],'', $_POST['harga']);
	$update_by 	= $_SESSION['s_user'];
	if($obat1->update($id_obat,$obat,$satuan,$harga,$update_by)){
		$sg   = "ok";
		$msg1 = "Data telah di Edit";
		$alert='alert-success';
	}else{
		$g = "err";
		$msg2 = "Data tidak bisa Edit";
		$alert='alert-error';
	}
}
?>

<form id="forms" method="post" onSubmit="return submitForm('<?php echo $_SERVER['PHP_SELF']; ?>')" class="form-horizontal" autocomplete="off">
	<fieldset>
		<legend>Edit Obat</legend>
		<span>
		<?php
		if(isset($sg) and $sg=='ok'){
			echo "
			<div class='alert $alert'>
			<button type='button' class='close' id='close' data-dismiss='alert'>&times;</button>
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
		if(isset($_GET['id_obat']))
		{
			$id = $_GET['id_obat'];
			extract($obat1->getID($id));	
		} 
		?>
		</span>
		<div class="row-fluid">
			<div class="span4">
				<div class="control-group">
				<label class="control-label" for="obat" >Obat</label>
					<div class="controls">
					<input type="hidden" id="id_obat" name="id_obat" value="<?php echo $id_obat; ?>" required>
					<input type="text" id="obat" name="obat" value="<?php echo $obat; ?>" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Satuan</label>
					<div class="controls">
						<select name="satuan" id="satuan"  required class="chzn-select" data-placeholder="Pilih Satuan.............">
							<option value="<?php echo $satuan; ?>"><?php echo $satuan; ?></option>
							<option value="Tablet">Tablet</option>
							<option value="Kapsul">Kapsul</option>	
							<option value="MM">MM</option>	
							<option value="CC">CC</option>
							<option value="Box">Box</option>
							<option value="Botol">Botol</option>
							<option value="Pcs">Pcs</option>								
						</select>
					</div>
				</div>	
				<div class="control-group">
				<label class="control-label" for="harga" > Harga Satuan Rp</label>
					<div class="controls">
					<input type="text" id="harga" name="harga" value="<?php echo $harga; ?>" required>
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
		$('#harga').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
	});	
</script>