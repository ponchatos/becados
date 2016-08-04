<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="<?php echo base_url();?>css/modal.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url();?>css/w3.css" rel='stylesheet' type='text/css' />
	<style>
		tr.row_solicitud.odd:hover,tr.row_solicitud.even:hover {
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
	<table id="solicitudes_tabla">
		<thead>
			<tr>
				<th>N° Solicitud</th>
				<th>Fecha de Solicitud</th>
				<th>Nombre</th>
				<th>Promedio</th>
				<th>Nivel</th>
				<th>Puntaje</th>
			</tr>
		</thead>	
		<tbody>
			<?php
			if(isset($solicitudes_tabla)){
				foreach ($solicitudes_tabla as $row) {
					echo '<tr class="row_solicitud">';
					echo '<td>'.$row["id_solicitud"].'</td>';
					echo '<td>'.$row["fec_solicitud"].'</td>';
					echo '<td>'.$row["nombre"].' '.$row["ape_pat"].' '.$row["ape_mat"].'</td>';
					echo '<td>'.$row["promedio"].'</td>';
					echo '<td>'.$row["nivel_educativo"].'</td>';
					echo '<td>'.$row["puntaje"].'</td>';
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
	    	<div class="loader" style="display:none;"></div>
	    	N° Solicitud<input type="text" name="id_solicitud" disabled/>
			Fecha de Solicitud<input type="text" name="fec_solicitud" disabled/>
			Nombre<input type="text" name="nombre" disabled/>
			Sexo<input type="text" name="sexo" disabled/>
			Fecha de Nacimiento<input type="text" name="fec_nac" disabled/>
			Estado Civil<input type="text" name="estado_civil_solicitante" disabled/>
			Tiene Hijos<input type="text" name="hijos" disabled/>
			Direccion<input type="text" name="direccion" disabled/>
			Entre Calle <input type="text" name="entre_calle_1" disabled/>
			y Calle <input type="text" name="entre_calle_2" disabled/>
			Cerca de <input type="text" name="cerca_de" disabled/>
			Ciudad<input type="text" name="ciudad" disabled/>
			Telefono<input type="text" name="tel" disabled/>
			Celular<input type="text" name="cel" disabled/>
			Correo<input type="text" name="correo" disabled/>
			Nombre de Padre o Tutor<input type="text" name="padre_nombre" disabled/>
			Edad de Padre o Tutor<input type="text" name="padre_edad" disabled/>
			Nivel Educativo de Padre o Tutor<input type="text" name="padre_nivel_educativo" disabled/>
			Ocupacion de Padre o Tutor<input type="text" name="padre_ocupacion" disabled/>
			Estado del Padre o Tutor<input type="text" name="padre_vivo_muerto" disabled/>
			Nombre de Madre o Tutor<input type="text" name="madre_nombre" disabled/>
			Edad de Madre o Tutor<input type="text" name="madre_edad" disabled/>
			Nivel Educativo de Madre o Tutor<input type="text" name="madre_nivel_educativo" disabled/>
			Ocupacion de Madre o Tutor<input type="text" name="madre_ocupacion" disabled/>
			Estado del Madre o Tutor<input type="text" name="madre_vivo_muerto" disabled/>
			Estado Civil de los Padres<input type="text" name="edo_civil_padres" disabled/>
			Actualmente,¿Con quién vives?<input type="text" name="vive_con" disabled/>
			¿Cuántas personas dependen del ingreso familiar	<input type="text" name="personas_dependen_ingreso" disabled/>
			¿Cuántas de ellas estudian?<input type="text" name="familia_estudian" disabled/>
			¿En qué niveles educativos?<input type="text" name="niveles_estudian" disabled/>
			Periodo	<input type="text" name="periodo" disabled/>
			Nivel Educativo	<input type="text" name="nivel_educativo" disabled/>
			Escuela	<input type="text" name="escuela" disabled/>
			Carrera	<input type="text" name="carrera" disabled/>
			Grado<input type="text" name="grado" disabled/>
			Turno<input type="text" name="turno" disabled/>
			Promedio<input type="text" name="promedio" disabled/>
			Estado de Inscripcion	<input type="text" name="estado" disabled/>
			1.- ¿Cuál es el total de cuartos, piezas o habitaciones con que cuenta su hogar?<input type="text" name="res1" disabled/>
			2.- ¿Cuántos baños completos con regadera y W.C. (excusado) hay para uso exclusivo de los integrantes del hogar?<input type="text" name="res2" disabled/>
			3.- ¿En el hogar cuenta con regadera funcionando en alguno de los baños?<input type="text" name="res3" disabled/>
			4.- Contanto todos los focos que utiliza para iluminar su hogar, incluyendo los techos, paredes y lámparas de buró o piso ¿Cuántos focos tiene su vivienda?<input type="text" name="res4" disabled/>
			5.- El piso de su hogar es predominate de tierra, cemento o de algún otro tipo de acabado?<input type="text" name="res5" disabled/>
			6.- ¿Cuántos automóviles propios, excluyendo taxis, tienen en su hogar?<input type="text" name="res6" disabled/>
			7.- ¿Cuántas televisiones a color tienen funcionando e su hogar?<input type="text" name="res7" disabled/>
			8.- ¿Cuántas computadoras personales, ya sea de escritorio o laptop, tienen funcionando en su hogar?	<input type="text" name="res8" disabled/>
			9.- ¿En su hogar cuentan con estufa de gas o eléctrica?	<input type="text" name="res9" disabled/>
			10.- Pensando en la persona que aporta la mayor parte del ingreso a su hogar, ¿Cuál fue el último año de estudios que completó? ¿Realizó otros estudios?<input type="text" name="res10" disabled/>
			<form id="form_cal">
				Calificacion Respuesta 1<input class="cal" type="number" name="cal1" required/>
				Calificacion Respuesta 2<input class="cal" type="number" name="cal2" required/>
				Calificacion Respuesta 3<input class="cal" type="number" name="cal3" required/>
				Calificacion Respuesta 4<input class="cal" type="number" name="cal4" required/>
				Calificacion Respuesta 5<input class="cal" type="number" name="cal5" required/>
				Calificacion Respuesta 6<input class="cal" type="number" name="cal6" required/>
				Calificacion Respuesta 7<input class="cal" type="number" name="cal7" required/>
				Calificacion Respuesta 8<input class="cal" type="number" name="cal8" required/>
				Calificacion Respuesta 9<input class="cal" type="number" name="cal9" required/>
				Calificacion Respuesta 10<input class="cal" type="number" name="cal10" required/>
				Puntaje<input type="text" name="puntaje" disabled/>
				Nivel<input type="text" name="nivel"/>
				Observaciones<input type="text" name="observaciones"/>
				<select name="proceso" form="form_cal">
					<option value="0">Solicitud</option>
					<option value="1">En Proceso</option>
					<option value="2">Becar</option>
					<option disabled>-------</option>
					<option value="3">Eliminar</option>
				</select>
				<button id="btn_proc_solicitud">Procesar Solicitud</button>
			</form>
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
	var table=$('#solicitudes_tabla').DataTable({
		"destroy":true,
	    "pageLength": 10,
	    "autoWidth": false
	});



	var id_solicitud;
	$(".loader").hide();

	$("#btn_prueba").click(function(e){
		e.preventDefault();
		$(".row_solicitud").each(function(){
			if($(this).children('td:nth-child(1)').text()==4){
				table.row($(this)).remove().draw();
			}
			
		});
	});

	$(".cal").change(function () {
	    //var suma = $("input[name='cal1']").val()+
	    //$(this).val()
	    $(this).val(($(this).val()==""||$(this).val()==null)?0:$(this).val());
	    var suma=0;
	    $(".cal").each(function(index){
	    	suma+=parseInt($(this).val());
	    });
	    $(":input[name='puntaje']").val(suma);
	});

	$('#form_cal').submit(function(e){
		e.preventDefault();
		$(".loader").show();

		var cal1=$("input[name='cal1']").val();
		var cal2=$("input[name='cal2']").val();
		var cal3=$("input[name='cal3']").val();
		var cal4=$("input[name='cal4']").val();
		var cal5=$("input[name='cal5']").val();
		var cal6=$("input[name='cal6']").val();
		var cal7=$("input[name='cal7']").val();
		var cal8=$("input[name='cal8']").val();
		var cal9=$("input[name='cal9']").val();
		var cal10=$("input[name='cal10']").val();
		var nivel=$("input[name='nivel']").val();
		var observaciones=$("input[name='observaciones']").val();
		var proceso=$("select[name='proceso']").val();

		if(proceso==3){
			if(!confirm("¿Esta seguro de eliminar esta solicitud?\nNo habrá vuelta atras")){
				$(".loader").hide();
				return false;
			}
		}
		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/dashboard/set_solicitud_info",
			dataType: 'json',
			data: {id_solicitud:id_solicitud,cal1:cal1,cal2:cal2,cal3:cal3,cal4:cal4,cal5:cal5,cal6:cal6,cal7:cal7,cal8:cal8,cal9:cal9,cal10:cal10,nivel:nivel,observaciones:observaciones,proceso:proceso},
			success: function(obj) {
				if(obj.success==1){
					$("#div_message").show();
					$("#message").text(obj.message);
					$("#myModal").hide();
					
					if(proceso==3){
						$(".row_solicitud").each(function(){
							if($(this).children('td:nth-child(1)').text()==id_solicitud){
								table.row($(this)).remove().draw();
							}
						});
					}
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

	$('#solicitudes_tabla tbody').on( 'click','tr',function (e) {
		id_solicitud=$(this).children('td:nth-child(1)').text();
		$(".loader").show();

		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/dashboard/get_solicitud_info",
			dataType: 'json',
			data: {id_solicitud:id_solicitud},
			success: function(obj) {
				if(obj.success==1){
					$("input[name='id_solicitud']").val(obj.data.id_solicitud);
					$("input[name='fec_solicitud']").val(obj.data.fec_solicitud);
					$("input[name='nombre']").val(obj.data.nombre+" "+obj.data.ape_pat+" "+obj.data.ape_mat);
					//$("input[name='ape_pat']").val(obj.data.ape_pat);
					//$("input[name='ape_mat']").val(obj.data.ape_mat);
					$("input[name='sexo']").val(obj.data.sexo);
					$("input[name='fec_nac']").val(obj.data.fec_nac);
					$("input[name='estado_civil_solicitante']").val(obj.data.estado_civil_solicitante);
					$("input[name='hijos']").val(obj.data.hijos);
					$("input[name='direccion']").val(obj.data.calle+" "+obj.data.num_casa+" "+obj.data.colonia);
					//$("input[name='num_casa']").val(obj.data.num_casa);
					//$("input[name='colonia']").val(obj.data.colonia);
					$("input[name='entre_calle_1']").val(obj.data.entre_calle_1);
					$("input[name='entre_calle_2']").val(obj.data.entre_calle_2);
					$("input[name='cerca_de']").val(obj.data.cerca_de);
					$("input[name='ciudad']").val(obj.data.ciudad);
					$("input[name='tel']").val(obj.data.tel);
					$("input[name='cel']").val(obj.data.cel);
					$("input[name='correo']").val(obj.data.correo);
					$("input[name='facebook']").val(obj.data.facebook);
					$("input[name='padre_nombre']").val(obj.data.padre_nombre+" "+obj.data.padre_ape_pat+" "+obj.data.padre_ape_mat);
					$("input[name='padre_edad']").val(obj.data.padre_edad);
					$("input[name='padre_nivel_educativo']").val(obj.data.padre_nivel_educativo);
					$("input[name='padre_ocupacion']").val(obj.data.padre_ocupacion);
					$("input[name='padre_vivo_muerto']").val(obj.data.padre_vivo_muerto);
					$("input[name='madre_nombre']").val(obj.data.madre_nombre+" "+obj.data.madre_ape_pat+" "+obj.data.madre_ape_mat);
					$("input[name='madre_edad']").val(obj.data.madre_edad);
					$("input[name='madre_nivel_educativo']").val(obj.data.madre_nivel_educativo);
					$("input[name='madre_ocupacion']").val(obj.data.madre_ocupacion);
					$("input[name='madre_vivo_muerto']").val(obj.data.madre_vivo_muerto);
					$("input[name='edo_civil_padres']").val(obj.data.edo_civil_padres);
					$("input[name='vive_con']").val(obj.data.vive_con);
					$("input[name='personas_dependen_ingreso']").val(obj.data.personas_dependen_ingreso);
					$("input[name='familia_estudian']").val(obj.data.familia_estudian);
					$("input[name='niveles_estudian']").val(obj.data.niveles_estudian);
					$("input[name='periodo']").val(obj.data.periodo);
					$("input[name='nivel_educativo']").val(obj.data.nivel_educativo);
					$("input[name='escuela']").val(obj.data.escuela);
					$("input[name='carrera']").val(obj.data.carrera);
					$("input[name='grado']").val(obj.data.grado);
					$("input[name='turno']").val(obj.data.turno);
					$("input[name='promedio']").val(obj.data.promedio);
					$("input[name='estado']").val(obj.data.estado);
					$("input[name='res1']").val(obj.data.res1);
					$("input[name='res2']").val(obj.data.res2);
					$("input[name='res3']").val(obj.data.res3);
					$("input[name='res4']").val(obj.data.res4);
					$("input[name='res5']").val(obj.data.res5);
					$("input[name='res6']").val(obj.data.res6);
					$("input[name='res7']").val(obj.data.res7);
					$("input[name='res8']").val(obj.data.res8);
					$("input[name='res9']").val(obj.data.res9);
					$("input[name='res10']").val(obj.data.res10);
					$("input[name='cal1']").val(obj.data.cal1);
					$("input[name='cal2']").val(obj.data.cal2);
					$("input[name='cal3']").val(obj.data.cal3);
					$("input[name='cal4']").val(obj.data.cal4);
					$("input[name='cal5']").val(obj.data.cal5);
					$("input[name='cal6']").val(obj.data.cal6);
					$("input[name='cal7']").val(obj.data.cal7);
					$("input[name='cal8']").val(obj.data.cal8);
					$("input[name='cal9']").val(obj.data.cal9);
					$("input[name='cal10']").val(obj.data.cal10);
					$("input[name='puntaje']").val(obj.data.puntaje);
					$("input[name='nivel']").val(obj.data.nivel);
					$("input[name='observaciones']").val(obj.data.observaciones);
					$("select[name='proceso'] option[value='"+obj.data.proceso+"']").attr('selected','selected');
					//alert($("select[name='proceso'] option[value="+obj.data.proceso+"]").text());
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
		//var nombre=$(this).children('td:nth-child(2)').text();
		//$("input[name='id_becado_hddn']").val(id_becado);
		//$("input[name='nombre']").val(nombre);
		<?php 
			//if(isset($this->session->userdata['logged_in'])&&$this->session->userdata['logged_in']['privilegios']==99)
			//	echo "$('#hddn_eliminar').val(folio);\n";
		?>
		//$('.modal_agregar_horas').show();
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