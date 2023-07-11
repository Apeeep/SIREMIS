<?php
/* 
	-- --------------------------------------------------------
	-- --------------------------------------------------------
	-- Nama File : tambah_pasien.php  
	-- Author    : Rafif Ahnafyusi
	-- Email     : rafifahnafyusi@gmail.com
	-- Github    : github.com/apeeep
	-- Copyright [c] 2023 Rafif Ahnafyusi
*/
session_start();
require_once '../config/koneksi.php';
require_once 'class.pasien.php';
require_once '../config/fungsi_sqltgl.php';
$pasien = new pasien($pdo);
if(!empty($_POST['nama'])){
	$no_bpjs 		= $_POST['no_bpjs'];
	$nama 			= $_POST['nama'];
	$tempat_lahir 	= $_POST['tempat_lahir'];
	$tgl_lahir 		= tgl_sql($_POST['tgl_lahir']);
	$pangkat	 	= $_POST['pangkat'];
	$nip		 	= $_POST['nip'];
	$alamat 		= $_POST['alamat'];
	$id_prov		= $_POST['id_prov'];
	$id_kab 		= $_POST['id_kab'];
	$id_kec 		= $_POST['id_kec'];
	$id_kel 		= $_POST['id_kel'];
	$jenis_kelamin	= $_POST['jenis_kelamin'];
	$tlp 			= $_POST['tlp'];
	$created_by 	= $_SESSION['s_user'];
	if($pasien->create($no_bpjs,$nama,$tempat_lahir,$tgl_lahir,$pangkat,$nip,$alamat,$id_prov,$id_kab,$id_kec,$id_kel,$jenis_kelamin,$tlp,$created_by)){
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
		<legend>Tambah pasien</legend>
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
			<div class="span4">
				<div class="control-group">
				<label class="control-label" for="no_bpjs" >Nomor BPJS</label>
					<div class="controls">
					<input class="input-mask-nobpjs" type="text" id="no_bpjs" name="no_bpjs">
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="nama" >Nama</label>
					<div class="controls">
					<input type="text" id="nama" name="nama" required>
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="TempatLahir" >Tempat Lahir</label>
					<div class="controls">
					<input type="text" id="tempat_lahir" name="tempat_lahir">
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="inputtgl">Tanggal Lahir</label>
					<div class="controls" style="display:flex;align-items:center;gap:10px;">								
						<input type="text" id="tgl_lahir" class="tanggal span7" name="tgl_lahir" data-date-format="dd-mm-yyyy" />
						<i class="icon-calendar bigger-120"></i>
					</div>
				</div>
				<div class="control-group">
				<label class="control-label">Jenis Kelamin</label>
					<div class="controls" style="display:flex;align-items:center;gap:15px;">
						<label style="display:flex;align-items:center;gap:15px;">
							<input name="jenis_kelamin" type="radio" value="Laki-Laki" checked />
							<span class="lbl"> Laki - Laki</span>
						</label>
						<label style="display:flex;align-items:center;gap:15px;">
							<input name="jenis_kelamin" type="radio" value="Perempuan" />
							<span class="lbl"> Perempuan</span>
						</label>
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="Pangkat" >Pangkat</label>
					<div class="controls">
					<input type="text" id="pangkat" name="pangkat">
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="nip" >NRP/NIP</label>
					<div class="controls">
					<input type="text" id="nip" name="nip" maxlength="18">
					</div>
				</div>	
			</div>
			<div class="span6">
				<div class="control-group">
				<label class="control-label" for="alamat" >Alamat</label>
					<div class="controls">
					<textarea class="span12" id="alamat" name="alamat" ></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Provinsi</label>
					<div class="controls">
						<select name="id_prov" id="id_prov" required>
							<option value=""></option>
							<?php							
								$pasien = new pasien($pdo);
								$pasien->prov();							
							?>						
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Kab/Kota</label>
					<div class="controls">
						<select name="id_kab" id="id_kab" required>
							<option value=""></option>					
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Kecamatan</label>
					<div class="controls">
						<select name="id_kec" id="id_kec" required>
							<option value=""></option>					
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Kelurahan</label>
					<div class="controls">
						<select name="id_kel" id="id_kel" required>
							<option value=""></option>					
						</select>
					</div>
				</div>
				<div class="control-group">
				<label class="control-label" for="telp_pasien" >Telp</label>
					<div class="controls">
					<input type="text" class="form-control input-mask-phone" id="tlp" name="tlp">
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
		$(".tanggal").datepicker({
			dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
			yearRange: '1970:2050',
			autoclose: true,
			todayHighlight: true,
		});
		$.mask.definitions['~']='[+-]';
		$('.input-mask-phone').mask('9999-9999-9999');
		$('.input-mask-nobpjs').mask('9999999999999');
		$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
	});
	var htmlobjek;
	$(document).ready(function(){
	  //apabila terjadi event onchange terhadap object <select id=propinsi>
	  $("#id_prov").change(function(){
	    var id_prov = $("#id_prov").val();
	    $.ajax({
	        url: "reg/ambilprov.php",
	        data: "id_prov="+id_prov,
	        cache: false,
	        success: function(msg){
	            $("#id_kab").html(msg);
	        }
	    });
	  });

	  $("#id_kab").change(function(){
	    var id_kab = $("#id_kab").val();
	    $.ajax({
	        url: "reg/ambilkab.php",
	        data: "id_kab="+id_kab,
	        cache: false,
	        success: function(msg){
	            $("#id_kec").html(msg);
	        }
	    });
	  });

	  $("#id_kec").change(function(){
	    var id_kec = $("#id_kec").val();
	    $.ajax({
	        url: "reg/ambilkec.php",
	        data: "id_kec="+id_kec,
	        cache: false,
	        success: function(msg){
	            $("#id_kel").html(msg);
	        }
	    });
	  });

	});
</script>