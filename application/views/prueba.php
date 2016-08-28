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
	<form method="post" action="<?=base_url()?>ajax_post/get_data_becado">
		<input name="id_becado" type="text" value="5"/>
		<input type="submit" value="Send"/>
		
	</form>
	<br><br><bR>
	<form method="post" action="<?=base_url().'dashboard/set_solicitud_info'?>">
		<input name="id_solicitud" type="text" value="3"/>
		<input name="cal1" type="text" value="4"/>
		<input name="cal2" type="text" value="3"/>
		<input name="cal3" type="text" value="2"/>
		<input name="cal4" type="text" value="1"/>
		<input name="cal5" type="text" value="2"/>
		<input name="cal6" type="text" value="3"/>
		<input name="cal7" type="text" value="4"/>
		<input name="cal8" type="text" value="5"/>
		<input name="cal9" type="text" value="6"/>
		<input name="cal10" type="text" value="7"/>
		<input name="proceso" type="text" value="0"/>
		<input name="nivel" type="text" value="B"/>
		<input name="observaciones" type="text" value="Jijitl"/>
		<input type="submit" value="asd"/>
	</form>
	<form id="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url();?>dashboard/upload_comprobante">
		<input id="file" type="file" name="userfile" />
		<!--<input type="text" name="asd2" value="!form_error('asd2')?set_value('asd2'):''?>"/>-->
		<!--<input type="submit" value="enviar"/>-->
		<button id="send">Enviar</button>
		<button id="prueba">Pba</button>
		<input type="submit" value="submit"/>
	</form>
	<div id="testo"></div>
	<br><br>
	<form>
		<input type="checkbox" name="chbx" value="aa"/>
		<button>Send</button>
	</form>
</body>
</html>