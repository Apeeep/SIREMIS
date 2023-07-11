<script type="text/javascript">
	$(document).ready(function(){
		$("#data").load("master_ref/tipe_pasien/data_tipe_pasien.php");
		$("#id-breadcrumbs").html("Tipe Pasien");
	});

	function tipe_pasien(){
		$("#data").load("master_ref/tipe_pasien/data_tipe_pasien.php");
		$("#id-breadcrumbs").html("Tipe Pasien");
	}
	
	function tambahForm(){
		$("#form-nest").css({display:"block"});
		$.ajax({
			type:"GET",
			url:"master_ref/tipe_pasien/tambah_tipe_pasien.php",
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
				$("#data").load("master_ref/tipe_pasien/data_tipe_pasien.php");
			}
		});
		return false;
	}
	
	function deleteData(id,tipe_pasien){
		var pilih = confirm('Hapus '+tipe_pasien+' dari daftar ??');
		if(pilih==true){
				$.ajax({
					type:"GET",
					url:'master_ref/tipe_pasien/hapus_tipe_pasien.php',
					data:"id_tipe_pasien="+id,
					beforeSend:function(){
						$("#data").html("<img src='assets/images/ajax-loader.gif' />");
					},
					success:function(data){
						$('#data').html(data);
						$('#alert').load("master_ref/tipe_pasien/alert_error.php");
					},
					error:function(data){
						$('#data').html(data);
						$('#alert').load("master_ref/tipe_pasien/alert_error.php");
					}
				});
		}
	}
	
	function editData(id){
		$.ajax({
			type:"GET",
			url:'master_ref/tipe_pasien/edit_tipe_pasien.php',
			data:"id_tipe_pasien="+id,
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