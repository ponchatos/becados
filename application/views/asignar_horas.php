<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="<?php echo base_url();?>css/modal.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url();?>css/w3.css" rel='stylesheet' type='text/css' />
	<style>
		tr.row_becado.odd:hover,tr.row_becado.even:hover {
		    background-color: #FF9696;
		    cursor: pointer;
		}
	</style>
</head>
<body>
<div id="div_message" class="w3-container w3-green w3-card-8" style="display:none;">
	<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
	<div id="message"></div>
</div>
<table id="becados_tabla">
	<thead>
		<tr>
			<th>Folio</th>
			<th>Nombre</th>
			<th>Horas</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if(isset($becados_tabla)){
				foreach ($becados_tabla as $row) {
					echo '<tr class="row_becado">';
					echo '<td>'.$row["id_becado"].'</td>';
					echo '<td>'.$row["nombre"].' '.$row["ape_pat"].' '.$row["ape_mat"].'</td>';
					echo '<td>'.$row["horas"].'</td>';
					echo '</tr>';
				}
			}
		?>
	</tbody>
</table>

<div id="myModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
    	<div class="modal-header" style="height:70px">
	    	<span class="close">×</span>
	    	<h3 class="modalTitle">Titulo</h3>
	    </div>
	    <div class="modal-body">
	    	<div class="modal_agregar_horas" style="display:none;">
	    		<form id="agregar_horas">
	    			<input type="hidden" name="id_becado_hddn" value=""/>
	    			Nombre:
	    			<input type="text" name="nombre" value="" disabled/>
	    			Evento:
	    			<input type="text" name="evento" required value="" placeholder="Evento" />
	    			Horas:
	    			<input type="number" name="horas" required value="" placeholder="Horas" />
	    			Fecha:
	    			<input type="date" name="fecha" required="" value="" placeholder="Fecha" />
	    			Observación:
	    			<input type="text" name="observacion" value="" placeholder="Observacion" />
	    			<br>
	    			<button id="btn_agegar_horas">Agregar</button>
	    		</form>
	    	</div>
	    	<div class="loader" style="display:none;"></div>
	    	<div id="div_modalMessage" class="w3-container w3-red w3-card-8" style="display:none;">
				<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
				<div id="modalMessage"></div>
			</div>
  		</div>
  	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var table=$('#becados_tabla').DataTable({
		"destroy":true,
	    "pageLength": 10,
	    "autoWidth": false
	});
	$("#agregar_horas").submit(function(e){
		e.preventDefault();
		var id_becado_hddn=$( "input[name='id_becado_hddn']").val();
		var evento=$( "input[name='evento']").val();
		var horas=$( "input[name='horas']").val();
		var fecha=$( "input[name='fecha']").val();
		var observacion=$( "input[name='observacion']").val();
		if(horas < 0){
			$("#div_modalMessage").show();
			$("#modalMessage").text('No puedes ingresar horas negativas');
			return false;
		}
		$(".loader").show();

		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/dashboard/agregar_horas",
			dataType: 'json',
			data: {id_becado_hddn:id_becado_hddn,evento:evento,horas:horas,fecha:fecha,observacion:observacion},
			success: function(obj) {
				if(obj.success==1){
					$("#message").text('');
					$("#message").append("<h3>Bien!</h3><p>"+obj.message+"</p>");
					$("#div_message").show();
					$("#myModal").hide();
					$( "input[name='id_becado_hddn']").val('');
					$( "input[name='evento']").val('');
					$( "input[name='horas']").val('');
					$( "input[name='fecha']").val('');
					$( "input[name='observacion']").val('');
				}else{
					$("#div_modalMessage").show();
					$("#modalMessage").text('');
					$("#modalMessage").append('<h3>Error!</h3><p>'+obj.message+'</p>');
				}
				$(".loader").hide();
			},
			error: function(res){
				$(".loader").hide();
				$(".modalMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
	});
	$('#becados_tabla tbody').on( 'click','tr',function (e) {
		var id_becado=$(this).children('td:nth-child(1)').text();
		var nombre=$(this).children('td:nth-child(2)').text();
		$("input[name='id_becado_hddn']").val(id_becado);
		$("input[name='nombre']").val(nombre);
		//$('#hddn_credencial').val(folio);
		<?php 
			//if(isset($this->session->userdata['logged_in'])&&$this->session->userdata['logged_in']['privilegios']==99)
			//	echo "$('#hddn_eliminar').val(folio);\n";
		?>
		$('.modal_agregar_horas').show();
		$('#myModal').show();
	});
	$('.close').on('click',function(e){
		$('#myModal,#div_modalMessage').hide();
	});
	$(window).click(function(event){
		if(event.target.id == "myModal"){
			$('#myModal,#div_modalMessage').hide();
		}
	});
});
</script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
</body>
</html>