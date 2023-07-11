<script type="text/javascript">
	$(document).ready(function(){
		$("#data").load("reg/data_pasien.php");
		$("#id-breadcrumbs").html("Pasien");
	});
	
	function close(){
		$("#data").load("reg/data_pasien.php");
		$("#id-breadcrumbs").html("Pasien");
	}

	function tambahFormPasien(){
		$("#form-nest").css({display:"block"});
		$.ajax({
			type:"GET",
			url:"reg/tambah_pasien.php",
			data:null,
			beforeSend:function(){
				$("#form").html("<img src='assets/images/ajax-loader.gif' />");
			},
			success:function(data){
				$('#form').html(data);
			}
		});
		$('#form').show("slow");
	}
	
	function submitForm(url){
		var thisPost = $("#forms").serialize();
		$.ajax({
			type:"POST",
			url:url,
			data:thisPost,
			beforeSend:function(){
				$("#form").html("<img src='assets/images/ajax-loader.gif' />");
				$("#data").html("<img src='assets/images/ajax-loader.gif' />");
			},
			success:function(data){
				$('#form').html(data);
				$("#data").load("reg/data_pasien.php");
			}
		});
		return false;
	}
	
	function deleteData(mr,nama){
		var pilih = confirm('Hapus '+nama+' dari daftar ??');
		if(pilih==true){
				$.ajax({
					type:"GET",
					url:'reg/hapus_pasien.php',
					data:"mr="+mr,
					beforeSend:function(){
						$("#data").html("<img src='assets/images/ajax-loader.gif' />");
					},
					success:function(data){
						$('#data').html(data);
						$("#alert").html("<div id='alert' class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data berhasil di hapus</div>");
					},
					error:function(data){
						$("#alert").html("<div id='alert' class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data gagal di hapus</div>");
					}
				});
		}
	}

	function deleteRegistrasi(reg_no,nama){
		var pilih = confirm('Hapus '+nama+' dari daftar ??');
		if(pilih==true){
				$.ajax({
					type:"GET",
					url:'reg/hapus_reg.php',
					data:"reg_no="+reg_no,
					beforeSend:function(){
						$("#data").html("<img src='assets/images/ajax-loader.gif' />");
					},
					success:function(data){
						$('#data').html(data);
						$("#alert").html("<div id='alert' class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data berhasil di hapus</div>");
					},
					error:function(data){
						$("#alert").html("<div id='alert' class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button>Data gagal di hapus</div>");
					}
				});
		}
	}
	
	function editData(mr){
		$.ajax({
			type:"GET",
			url:'reg/edit_pasien.php',
			data:"mr="+mr,
			beforeSend:function(){
				$("#form-nest").css({display:"block"});
				$("#form").html("<img src='assets/images/ajax-loader.gif' />");
			},
			success:function(data){
				$('#form').html(data);
			}
		});
		$('#form').fadeIn(3000);
	}

	function editRegistrasi(mr){
		$.ajax({
			type:"GET",
			url:'reg/edit_registrasi.php',
			data:"mr="+mr,
			beforeSend:function(){
				$("#form-nest").css({display:"block"});
				$("#form").html("<img src='assets/images/ajax-loader.gif' />");
			},
			success:function(data){
				$('#form').html(data);
			}
		});
		$('#form').fadeIn(3000);
	}

	function registrasi(mr){
		$('#form-nest').css({display:"block"});
		$.ajax({
			type:"GET",
			url:"reg/registrasi.php",
			data:"mr="+mr,
			beforeSend:function(){
				$("#form-nest").html();
			},
			success:function(data){
				$('#form-nest').html(data);
			}
		});
		$('#form').show("slow");
	}
	
	
</script>


<div id="form-nest" class="row-fluid" style="display:none">
	<div id="form" class="span12 well">
		
	</div>
</div>

<div class="row-fluid">
	<div id="data" class="span12 well">
		<img src='assets/images/ajax-loader.gif' />
	</div>
</div>