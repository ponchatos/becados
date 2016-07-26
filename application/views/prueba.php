<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#prueba").click(function(event){
				event.preventDefault();
				$("#testo").text("asd");
			});
			$("#send").click(function(event){
				event.preventDefault();
				//file=$("#file").val();
				//var formData = new FormData($('#form')[0]);
				var formData = new FormData( $("#form")[0] );
				$.ajax({
		            url : "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/dashboard/upload_comprobante",
		            type : 'POST',
		            data : formData,
		            //async : false,
		            cache : false,
		            contentType : false,
		            processData : false,
		            success : function(data) {
		                //alert(JSON.stringify(data));
		                $("#testo").text(JSON.stringify(data));
		            }
		        });
				/*$.ajax({
					type: "POST",
					url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/dashboard/upload_comprobante",
					data: formData,
					mimeType: "multipart/form-data",
					success: function(res) {
						if (res)
						{
							alert(JSON.stringify(res));
						}else{
							alert(JSON.stringify(res));
						}
					}
				});*/
			});
		});
	</script>
</head>
<body>
	<form id="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url();?>dashboard/upload_comprobante">
		<input id="file" type="file" name="userfile" />
		<!--<input type="text" name="asd2" value="!form_error('asd2')?set_value('asd2'):''?>"/>-->
		<!--<input type="submit" value="enviar"/>-->
		<button id="send">Enviar</button>
		<button id="prueba">Pba</button>
		<input type="submit" value="submit"/>
	</form>
	<div id="testo"></div>
</body>
</html>