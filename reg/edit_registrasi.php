<?php 
	session_start();
	include_once '../config/koneksi.php';	
	require_once '../config/fungsi_sqltgl.php';
	require_once 'class.pasien.php';
	$reg  = new pasien($pdo);
	if(isset($_GET['mr']))
    {
      $id = $_GET['mr'];
      extract($reg->getEditReg($id));  
    }else{
      $id = $_POST['mr'];
      extract($reg->getEditReg($id));
    }
	if(!empty($_POST['reg_no'])){
		$reg_no 		= $_POST['reg_no'];
		$mr				= $_POST['mr'];
		$poli 			= $_POST['poli'];
		$tgl_reg 		= date('Y-m-d');
		$tipe_pasien	= $_POST['tipe_pasien'];
		$diagnosa		= $_POST['diagnosa'];
		$update_by		= $_SESSION['s_user'];
		if($reg->updatereg($reg_no,$mr,$poli,$tgl_reg,$tipe_pasien,$diagnosa,$update_by)){
			$sg   = "ok";
			$msg1 = "Data Berhasil di Update";
			$alert='alert-success';
		}else{
			$g = "err";
			$msg2 = "Data Gagal Di Edit";
			$alert='alert-error';
		}
	}	
?>

<div id="form" class="modal" tabindex="-1" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a href="javascript:void(0)" onclick="swapContent('reg/reg')">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</a>
				<h4 class="blue bigger">Registrasi</h4>
			</div>
	
			<div class="modal-body">
			<span>
					 <?php
					if(isset($sg) and $sg=='ok'){
						echo "
						<div class='alert $alert'>
						<button type='button' class='close' data-dismiss='alert1'>&times;</button>
						$msg1
						</div>";
					}elseif(isset($sg) and $sg=='err'){
						echo "
						<div class='alert $alert'>
						<button type='button' class='close' data-dismiss='alert1'>&times;</button>
						$msg2
						</div>";}
					?>
					</span>
			<form id="forms" method="post" onSubmit="return submitForm('<?php echo $_SERVER['PHP_SELF']; ?>')" class="form-horizontal" autocomplete="off">
				<fieldset>
					
					 <div class="row-fluid">
						<div class="span4">
							<div class="control-group">
							<label class="control-label" for="mr" >No.MR</label>
								<div class="controls">
								<input type="hidden" id="reg_no" name="reg_no" value="<?php echo $reg_no; ?>" readonly="readonly">
								<input type="text" id="mr" name="mr" value="<?php echo $mr; ?>" readonly="readonly">
								</div>
							</div>
							<div class="control-group">
						        <label class="control-label" for="poli" >Poli</label>
						        <div class="controls">
						        <select name="poli" id="poli">
						        	<option value="<?php echo $poli; ?>"><?php echo $poli; ?></option>
							        <option value="UGD">Unit Gawat Darurat</option>
							        <option value="Umum">Umum</option>
							        <option value="Gigi">Gigi</option>            
							        <option value="Obgyn">Obgyn</option>
							        <option value="LAB">Laboratorium</option>
						        </select>
						        </div>
					        </div>
					        <div class="control-group">
						        <label class="control-label" for="tipe_pasien" >Tipe Pasien</label>
						        <div class="controls">
						        <select name="tipe_pasien" id="tipe_pasien">
						        	<option value="<?php echo $id_tipe_pasien; ?>"><?php echo $nama_tipe_pasien; ?></option>
							        <?php							
										$pasien = new pasien($pdo);
										$pasien->tipePasien();							
									?>
						        </select>
						        </div>
					        </div>
					        <div class="control-group">
							<label class="control-label" for="diagnosa" >Diagnosa</label>
								<div class="controls">
								<input type="text" id="diagnosa" name="diagnosa" value="<?php echo $diagnosa; ?>" required>
								</div>
							</div>
						</div>							
					</div>
						<div class="controls">
					      <button type="submit" class="btn btn-primary" >Edit</button>
					      <?php echo "
					        <a href='javascript:void(0)' onclick=swapContent('reg/reg') class='btn btn-primary' ><i class='icon-close icon-white'></i>Tutup</a> "; ?>
			      		</div>		      		
		        </fieldset>
			</form>
		    </div>	
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#close").click(function(){
			$("#form-nest").hide("slow");
		});
		$(".chzn-select").chosen();
	});	
</script>

