<?php
	session_start();
	require_once '../config/koneksi.php';
	require_once 'class.poli.php';
	$dok = new poli($pdo);
	if(isset($_GET['reg_no']))
	    {
	      $id = $_GET['reg_no'];
	      extract($dok->getID($id));  
	    }else{
	      $id = $_POST['reg_no'];
	      extract($dok->getID($id));
	    }
	if(!empty($_POST['reg_no'])){
		$reg_no 		= $_POST['reg_no'];
		$id_tindakan	= $_POST['id_tindakan'];
		$harga 			= $_POST['harga'];
 		if($dok->TambahTindakan($reg_no,$id_tindakan,$harga)){
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
<div id="form" class="modal" tabindex="-1" >
<div class="modal-dialog">

<form id="forms" method="post" onSubmit="return submitForm('<?php echo $_SERVER['PHP_SELF']; ?>')" class="form-horizontal" autocomplete="off">
	<fieldset>
		<div class="modal-header">
        	<h4 class="blue bigger">Tambah Tindakan</h4>
     	 </div>
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
		 <div class="modal-content">
			<div class="control-group">
			<label class="control-label" for="reg_no" >Reg No</label>
				<div class="controls">
				<input type="text" id="reg_no" name="reg_no" value="<?php echo $reg_no; ?>" readonly="readonly">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Tindakan</label>
				<div class="controls">
					<select name="id_tindakan" id="id_tindakan" onchange="pilih2(this.value)">
						<option value=""></option>	
						<?php
							// ============== menggunakan Mysqli karena PDO belum bisa pakai JsArray ini ====================== //
							$jsArray2 	= "var dpa = new Array();\n";
							$link 		=  mysqli_connect('localhost','root','','siremis-marcil');
							if ($poli=='Umum') {
								$query 	= "SELECT id_tindakan,tindakan,harga FROM tindakan ";
							}elseif ($poli=='UGD') {
								$query 	= "SELECT id_tindakan,tindakan,harga FROM tindakan WHERE id_tindakan BETWEEN 3 AND 100";
							}else{
								$query 	= "SELECT id_tindakan,tindakan,harga FROM tindakan WHERE id_tindakan BETWEEN 2 AND 100 ";
							}
							
							$data		=  mysqli_query($link, $query) ;
							while($row=mysqli_fetch_array($data)){
								echo "<option value='$row[id_tindakan]'>$row[tindakan]</option>";
								$jsArray2 .= "dpa['" . $row['id_tindakan'] . "'] = {name:'" . addslashes($row['harga'])."'};\n";
							}
						?>							
					</select>
				</div>
			</div>	
					<input type="hidden" id="harga" name="harga">
															
		</div>
		<div class="modal-footer">
	      <button type="submit" class="btn btn-primary" ><i class="icon-plus icon-white"></i>Tambah</button>
	      <?php echo "
	        <a href='javascript:void(0)' onclick='Tindakan($id)' class='btn btn-primary' ><i class='icon-close icon-white'></i>Tutup</a> "; ?>
    	</div>		
	</fieldset>
</form>
</div>
</div>
<script type="text/javascript">   
    <?php echo $jsArray2; ?> 
    function pilih2(id){
		document.getElementById('harga').value=dpa[id].name;
	};
</script> 