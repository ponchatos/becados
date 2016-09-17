<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	--------------------PAGOS AUTORIZADOS POR PERIODO-----------------------<br>
	<select name="periodo">
		<option disabled selected>Seleccione un periodo</option>
		<?php
			if(isset($periodos)){
				var_dump($periodos);
				foreach ($periodos as $row) {
					echo "<option value='".$row->id_periodo."'>".$row->nombre."</option>";
				}
			}
		?>
	</select>

	<table id="tabla_pagos_autorizados">
		<thead></thead>
		<tbody></tbody>
	</table>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("select[name=periodo]").on('change', function(){
		var id_periodo = this.value;

		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/ajax_post/get_pagos_autorizados",
			dataType: 'json',
			data: {id_periodo:id_periodo},
			success: function(obj) {
				//$(".loader").hide();
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
					$("#tabla_pagos_autorizados").children('tbody').text('');
				}
			},
			error: function(res){
				//$(".loader").hide();
				//$("#modalMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
				//$("#div_modalMessage").show();
				//setModalErrorMessage('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
	});
});
</script>
</html>