<script type="text/javascript">
	$(document).ready(function(){
		$("#data").load("master_ref/tindakan/data_tindakan.php");
		$("#id-breadcrumbs").html("Tindakan");
	});

	function Tindakan(){
		$("#data").load("master_ref/tindakan/data_tindakan.php");
		$("#id-breadcrumbs").html("Tindakan");
	}
	
	function tambahForm(){
		$("#form-nest").css({display:"block"});
		$.ajax({
			type:"GET",
			url:"master_ref/tindakan/tambah_tindakan.php",
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
				$("#data").load("master_ref/tindakan/data_tindakan.php");
			}
		});
		return false;
	}
	
	function deleteData(id,tindakan){
		var pilih = confirm('Hapus '+tindakan+' dari daftar ??');
		if(pilih==true){
				$.ajax({
					type:"GET",
					url:'master_ref/tindakan/hapus_tindakan.php',
					data:"id_tindakan="+id,
					beforeSend:function(){
						$("#data").html("<img src='assets/images/ajax-loader.gif' />");
					},
					success:function(data){
						$('#data').html(data);
						$('#alert').load("master_ref/tindakan/alert_error.php");
					},
					error:function(data){
						$('#data').html(data);
						$('#alert').load("master_ref/tindakan/alert_error.php");
					}
				});
		}
	}
	
	function editData(id){
		$.ajax({
			type:"GET",
			url:'master_ref/tindakan/edit_tindakan.php',
			data:"id_tindakan="+id,
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