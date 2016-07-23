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
  		<div class="modal-body">

  		</div>
  	</div>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#btn_compobante").click(function(event) {
		event.preventDefault();
		$(".modalTitle").text('Comprobante');
		$(".modal-body").text('Texto');
		$("#myModal").show();
	});

	$("#btn_boleta").click(function(event) {
		event.preventDefault();
		$(".modalTitle").text('Boleta');
		$(".modal-body").text('Texto');
		$("#myModal").show();
	});

	$(".close").click(function(event){
		event.preventDefault();
		$("#myModal").hide();
	});

	$(window).click(function(event){
		event.preventDefault();
		if(event.target.id == "myModal"){
			$("#myModal").hide();
		}
	});
});
</script>
<!--<script type="text/javascript">
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("modify_data");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on the button, open the modal 
	btn.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}
</script>-->
</html>