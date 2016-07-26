<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="<?php echo base_url();?>css/modal.css" rel='stylesheet' type='text/css' />
</head>
<body>
Nombre:
<input type="text" name="nombre" disabled value="<?php echo isset($nombre)?$nombre:'';?>"/>
Escuela:
<input type="text" name="escuela" disabled value="<?php echo isset($escuela)?$escuela:'';?>"/>
Grado:
<input type="text" name="grado" disabled value="<?php echo isset($grado)?$grado:'';?>"/>
<br><br>


Teléfono:
<input type="text" name="tel" disabled value="<?php echo isset($tel)?$tel:'';?>"/>
Celular:
<input type="text" name="cel" disabled value="<?php echo isset($cel)?$cel:'';?>"/>
Correo:
<input type="text" name="correo" disabled value="<?php echo isset($correo)?$correo:'';?>"/>
Facebook:
<input type="text" name="face" disabled value="<?php echo isset($face)?$face:'';?>"/>
<button id="modify_data">Modificar Datos</button>
<br><br>


Periodo:
<input type="text" name="periodo" disabled value="<?php echo isset($periodo)?$periodo:'';?>"/>
Horas:
<input type="text" name="horas" disabled value="<?php echo isset($horas)?$horas:'';?>"/>
Status:
<input type="text" name="status" disabled value="<?php echo isset($status)?$status:'';?>"/>
Comprobante de pago:
<button id="btn_compobante">Ver Comprobante</button>
Boleta de calificaciones
<button id="btn_boleta">Ver Boleta</button>


<div id="myModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
    	<div class="modal-header" style="height:70px">
	    	<span class="close">×</span>
	    	<h3 class="modalTitle">Titulo</h3>
  		</div>
  		<div class="modalImg">
  			<a style="display:none" class="a_comprobante a_pago" href="<?php if(isset($comprobantes['pago'])) echo base_url()."".$comprobantes['pago']['url']; ?>" target="_blank">
  				<img class="img_pago" src="<?php if(isset($comprobantes['pago'])) echo base_url()."".$comprobantes['pago']['url']; ?>" width="400px"/>
  			</a><br>
  			<a style="display:none" class="a_comprobante a_boleta" href="<?php if(isset($comprobantes['boleta'])) echo base_url()."".$comprobantes['boleta']['url']; ?>" target="_blank">
  				<img class="img_boleta" src="<?php if(isset($comprobantes['boleta'])) echo base_url()."".$comprobantes['boleta']['url']; ?>" width="400px"/>
  			</a><br>
  		</div>
  		<div class="modal-body">

  		</div>
  		<div class="modal-button">
	  		<button id="send_pago">Cambiar Comprobante</button>
	  		<button id="send_boleta">Cambiar Comprobante</button>
	  		<div class="loader"></div>
  		</div>
  		<div class="modalMessage" style="color:red;"></div>
  	</div>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	$("#send_pago,#send_boleta,.loader").hide();

	$("#modify_data").click(function(event) {
		event.preventDefault();
		$(".modalTitle").text('Modificar Datos Personales');
		$(".modal-body").text('Texto');
		$("#myModal").show();
	});

	$("#btn_compobante").click(function(event) {
		event.preventDefault();
		$(".modalTitle").text('Comprobante');
		$(".modal-body,.modalMessage").text('');
		$(".a_pago").show();
		<?php 
		echo '$(".modal-body").append(\'';
		$valid='';
		if(isset($comprobantes['pago'])){
			$valid=$comprobantes['pago']['validacion']==1?'disabled':'';
			if($valid) echo 'Tu comprobante ya fue validado.<br> ';
		}
			echo '<form id="form_pago" method="post" enctype="multipart/form-data">';
			echo '<input id="file" type="file" name="userfile" '.$valid.'/>';
			
			echo '</form>';
			echo '\');';
		?>
		$("#send_pago").show();
		$("#myModal").show();
	});

	$("#send_pago").click(function(event){
		event.preventDefault();
		var formData = new FormData( $("#form_pago")[0] );
		$(".loader").show();
		$.ajax({
            url : "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/dashboard/upload_comprobante",
            type : 'POST',
            data : formData,
            //async : false,
            cache : false,
            contentType : false,
            processData : false,
            success : function(data) {
                var obj = jQuery.parseJSON(data);
                if(obj.img_success==1){
                	$(".modalMessage").text(obj.img_message);
                	$(".img_pago").attr('src',"<?php echo base_url(); ?>"+obj.img_url);
                	$(".a_pago").attr('href',"<?php echo base_url(); ?>"+obj.img_url);
                }else{
                	$(".modalMessage").text(obj.img_message);
                }
                $(".loader").hide();
            },
            error : function(xhr){
            	$(".modalMessage").text(xhr.statusText);
            	$(".loader").hide();
            }
        });
	});

	$("#btn_boleta").click(function(event) {
		event.preventDefault();
		$(".modalTitle").text('Boleta');
		$(".modal-body,.modalMessage").text('');
		$(".a_boleta").show();
		<?php 
		echo '$(".modal-body").append(\'';
		$valid='';
		if(isset($comprobantes['boleta'])){
			$valid=$comprobantes['boleta']['validacion']==1?'disabled':'';
			if($valid) echo 'Tu comprobante ya fue validado.<br> ';
		}
			echo '<form id="form_boleta" method="post" enctype="multipart/form-data">';
			echo '<input id="file" type="file" name="userfile" '.$valid.'/>';
			
			echo '</form>';
			echo '\');';
		?>
		$("#send_boleta").show();
		$("#myModal").show();
	});

	$("#send_boleta").click(function(event){
		event.preventDefault();
		var formData = new FormData( $("#form_boleta")[0] );
		$(".loader").show();
		$.ajax({
            url : "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/dashboard/upload_boleta",
            type : 'POST',
            data : formData,
            //async : false,
            cache : false,
            contentType : false,
            processData : false,
            success : function(data) {
                var obj = jQuery.parseJSON(data);
                if(obj.img_success==1){
                	$(".modalMessage").text(obj.img_message);
                	$(".img_boleta").attr('src',"<?php echo base_url(); ?>"+obj.img_url);
                	$(".a_boleta").attr('href',"<?php echo base_url(); ?>"+obj.img_url);
                }else{
                	$(".modalMessage").text(obj.img_message);
                }
                $(".loader").hide();
            },
            error : function(xhr){
            	$(".modalMessage").text(xhr.statusText);
            	$(".loader").hide();
            }
        });
	});

	$(".close").click(function(event){
		event.preventDefault();
		$("#send_pago,#send_boleta,.loader,.a_pago,.a_boleta").hide();
		$("#myModal").hide();
	});

	$(window).click(function(event){
		if(event.target.id == "myModal"){
			$("#send_pago,#send_boleta,.loader,.a_pago,.a_boleta").hide();
			$("#myModal").hide();
		}
	});
});
</script>
</html>