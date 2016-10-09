<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="<?php echo base_url();?>css/modal.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url();?>css/w3.css" rel='stylesheet' type='text/css' />
</head>
<body>
	--------------------PAGOS AUTORIZADOS POR PERIODO-----------------------<br>
	<div class="message" style="display:none;"></div>
	<select name="periodo">
		<option disabled selected>Seleccione un periodo</option>
		<?php
			if(isset($periodos)){
				var_dump($periodos);
				foreach ($periodos as $row) {
					echo "<option value='".$row->id_periodo."'>".$row->ciclo." ".$row->anio."</option>";
				}
			}
		?>
	</select>
	<form target="_blank" method="POST" action="<?=base_url()?>pdf_creator/lista_pagos">
		<input id="id_periodo" type="hidden" name="id_periodo">
		<button id="btn_pdf" disabled="disabled">Generar PDF</button>
	</form>
	<br>
	<div class="loader_div" style="display:none;"><div class="loader"></div>Espere mientras se cargan los datos<br></div>

	<table id="tabla_pagos_autorizados">
		<thead></thead>
		<tbody></tbody>
	</table>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("select[name=periodo]").on('change', function(){
		$(".loader_div").show();
		$("select[name='periodo']").attr('disabled','disabled');
		
		$("#id_periodo").val(this.value);
		$("#btn_pdf").removeAttr("disabled");

		var id_periodo = this.value;

		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/ajax_post/get_pagos_autorizados",
			dataType: 'json',
			data: {id_periodo:id_periodo},
			success: function(obj) {
				$(".loader_div").hide();
				$("select[name='periodo']").removeAttr('disabled');
				//$("#modalMessage").text('Datos actualizados correctamente');
				//$("#div_modalMessage").show();
				/*if(obj.success==1){
					setModalSuccessMessage('Datos actualizados correctamente');
				}else{
					setModalErrorMessage(obj.message);
				}*/
				if(obj.success == 1){

					$("#tabla_pagos_autorizados").children('thead').text('');
					$("#tabla_pagos_autorizados").children('thead').append('<th>Nombre Completo</th>');
					
					$("#tabla_pagos_autorizados").children('tbody').text('');
					$.each(obj.data, function(key,value) {
					  $("#tabla_pagos_autorizados").children('tbody').append('<td>'+value.nombre+' '+value.ape_pat+' '+value.ape_mat+'</td>');
					});


				}else{
					$("#tabla_pagos_autorizados").children('thead').text('');
					$("#tabla_pagos_autorizados").children('thead').append('<th>Nombre Completo</th>');
					$("#tabla_pagos_autorizados").children('tbody').text('No hay resultados');
				}
			},
			error: function(res){
				$(".loader_div").hide();
				$(".message").show();
				$(".message").text('Hubo un error al obtener los datos');
				//$("#modalMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
				//$("#div_modalMessage").show();
				//setModalErrorMessage('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
	});
});
</script>
</html>