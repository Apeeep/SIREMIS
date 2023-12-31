<?php 
/* 
	-- --------------------------------------------------------
	-- --------------------------------------------------------
	-- Nama File : edit_user.php  
	-- Author    : Rafif Ahnafyusi
	-- Email     : rafifahnafyusi@gmail.com
	-- Github    : github.com/apeeep
	-- Copyright [c] 2023 Rafif Ahnafyusi
*/
	session_start();
	include_once '../../config/koneksi.php';
	require_once '../user/class.user.php';
?>

<form name="multiform" id="multiform" class="form-horizontal" action="master_ref/user/multi-form-submit-edit.php" method="POST" enctype="multipart/form-data">
	<div id="alert"></div>	
	<fieldset>
		<legend>Edit User</legend>
		<span>
		<?php
		if(isset($sg) and $sg=='ok'){
			echo "
			<div class='alert $alert'>
			<button type='button' class='close' id='close' data-dismiss='alert'>&times;</button>
			$msg1
			</div>";
        	?>
		<?php }elseif(isset($sg) and $sg=='err'){
			echo "
			<div class='alert $alert'>
			<button type='button' class='close' id='close' data-dismiss='alert'>&times;</button>
			$msg2
			</div>"; }else {	
								$user = new user($pdo);
								if(isset($_GET['username']))
								{
									$id = $_GET['username'];
									extract($user->getID($id));	
								}
		?>
		</span>
		<div class="row-fluid">
			<div class="span5">
				<div class="control-group">
					<label class="control-label" for="inputusername">Username</label>
					<div class="controls">
						<input type="text" id="" name="username" readonly="readonly" value="<?php echo $username; ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword" >Password</label>
					<div class="controls">
						<input type="password" id="" name="password" autocomplete="off"><span class="help-block">Apabila tidak diubah, kosongkan saja</span>
						<input type="hidden" id="" name="password1" autocomplete="off" value="<?php echo $password; ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputNamaLengkap" >Nama Lengkap</label>
					<div class="controls">
						<input type="text" id="" name="nama_lengkap" autocomplete="off" value="<?php echo $nama_lengkap ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputEmail" >Email</label>
					<div class="controls">
						<input type="email" id="" name="email" autocomplete="off" value="<?php echo $email ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputNoTelp" >No.Telp.</label>
					<div class="controls">
						<input class="form-control input-mask-phone" name="no_telp"  value="<?php echo $no_telp ?>" type="text" id="form-field-mask-2" />
					</div>
				</div>
				<?php 
				if ($_SESSION['s_level'] == 'Administrator') {
				?>
				<div class="control-group">
					<label class="control-label">Level</label>
						<div class="controls">
						<select name="level" id="level" required class="chzn-select" data-placeholder="Pilih Level.............">
							<option value="<?php echo $level ?>"><?php echo $level ?></option>
							<option value=""></option>
							<option value="Operator">Operator</option>
							<option value="Dokter">Dokter</option>
							<option value="Laboratorium">Laboratorium/Analis</option>
							<option value="Apotik">Apotik</option>
							<option value="Administrator">Administrator</option>
						</select>
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
				
				<?php
				}else{
					?>	
					<input type="hidden" id="" name="level" value="<?php echo $level; ?>">
					<input name="aktif" type="hidden" value="N" <?php echo ($aktif=='N')?'checked':''; ?> />
					<input name="aktif" type="hidden" value="Y" <?php echo ($aktif=='Y')?'checked':''; ?> />
				
				<?php } ?>				
			</div>
			<div class="span5">					
				<div class="control-group">
		            <label class="control-label">Foto</label>
		            <div class="controls">
			            <div id="image_preview">
			            <?php $foto = 'master_ref/user/img_user/'.$foto_user; ?>
			            <img id="previewing" src="<?php  echo $foto; ?>" width="250" height="250"/></div>
			            <span id='loading'></span>
		                <div id="message"></div>
	           		</div>
       			</div>
       			<div class="control-group">
					<label class="control-label" for="inputNoTelp" >Pilih Foto</label>
					<div class="controls">
						<input type="hidden" name="file1" value="<?php echo $foto_user; ?>"/>
						<input type="file" name="file" id="file"/>
					</div>
				</div>
			</div>
		</div>
		<div class="form-actions" style="padding-left:0px;">
				<div class="controls-group" style="float:right;">
				<button type="submit" class="btn btn-success" >Edit</button>
				<button type="button" id="close" class="btn btn-danger" >Tutup</button>
			</div>
		</div>
	<?php } ?>
	</fieldset>
</form>

<script type="text/javascript">
//-----------------------------------------------------------------------------------------------------------
$(document).ready(function(){
	$("#close").click(function(){
		$("#form-nest").hide("slow");
	});
	$(".chzn-select").chosen();
	$.mask.definitions['~']='[+-]';
	$('.input-mask-phone').mask('9999-9999-9999');
	$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
});
//----------------------------------------------------------------------------------------------------------
$(function() {
        $("#file").change(function() {
            $("#message").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
                $('#previewing').attr('src','noimage.png');
                $("#message").html("<p id='error'>Mohon Pilih File dengan benar</p>"+"<h4>Catatan</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                return false;
            }else{
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded(e) {
        $("#file").css("color","#FFFFFF");
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').attr('width', '250px');
        $('#previewing').attr('height', '230px');
    };
//-------------------------------------------------------------------------------------------------------------
$(document).ready(function(){
 function getDoc(frame) {
     var doc = null;     
     // IE8 cascading access check
     try {
         if (frame.contentWindow) {
             doc = frame.contentWindow.document;
         }
     } catch(err) {
     }
     if (doc) { // successful getting content
         return doc;
     }
     try { // simply checking may throw in ie8 under ssl or mismatched protocol
         doc = frame.contentDocument ? frame.contentDocument : frame.document;
     } catch(err) {
         // last attempt
         doc = frame.document;
     }
     return doc;
 }
$("#multiform").submit(function(e){
	//$("#alert").html("<img src='assets/images/ajax-loader.gif'/>");
	var formObj = $(this);
	var formURL = formObj.attr("action");
if(window.FormData !== undefined)  // for HTML5 browsers
//	if(false)
	{	
		var formData = new FormData(this);
		$.ajax({
        	url: formURL,
	        type: 'POST',
			data:  formData,
			mimeType:"multipart/form-data",
			contentType: false,
    	    cache: false,
        	processData:false,
        	beforeSend:function(){
				$("#multiform").html("<img src='assets/images/ajax-loader.gif' />");
				$("#data").html("<img src='assets/images/ajax-loader.gif' />");
			},
			success: function(data, textStatus, jqXHR)
		    {
				$("#multiform").html(data);
				$("#data").load("master_ref/user/data_user.php");
		    },
		  	error: function(jqXHR, textStatus, errorThrown) 
	    	{
				$("#alert").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
	    		
	    	} 	        
	   });
        e.preventDefault();
        e.unbind();
   }
   else  //for olden browsers
	{
		//generate a random id
		var  iframeId = 'unique' + (new Date().getTime());

		//create an empty iframe
		var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');

		//hide it
		iframe.hide();

		//set form target to iframe
		formObj.attr('target',iframeId);

		//Add iframe to body
		iframe.appendTo('body');
		iframe.load(function(e)
		{
			var doc = getDoc(iframe[0]);
			var docRoot = doc.body ? doc.body : doc.documentElement;
			var data = docRoot.innerHTML;
			$("#multiform").html(data);
			$("#data").load("master_ref/user/data_user.php");
		});
	
	}

});
$("#multi-post").click(function()
	{
		
	$("#multiform").submit();	
});

});
</script>