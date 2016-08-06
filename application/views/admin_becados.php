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
				<th>N° Becado</th>
				<th>Nombre</th>
				<th>Semestre</th>
				<th>Horas</th>
				<th>Boleta</th>
				<th>Comprobante</th>
				<th>Pago</th>
				<th>Status</th>
			</tr>
		</thead>	
		<tbody>
			<?php
			if(isset($becados_tabla)){
				foreach ($becados_tabla as $row) {
					echo '<tr class="row_becado">';
					echo '<td>'.$row["id_becado"].'</td>';
					echo '<td>'.$row["nombre"].' '.$row["ape_pat"].' '.$row["ape_mat"].'</td>';
					echo '<td>'.$row["grado"].'</td>';
					echo '<td>'.$row["horas"].'</td>';
					echo '<td>'.$row["boleta"].'</td>';
					echo '<td>'.$row["comprobante"].'</td>';
					echo '<td>'.$row["pago"].'</td>';
					echo '<td>'.$row["status"].'</td>';
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

	    	<div>
	    		<form id="form_dbecado">
					estado del becado
					<select name="status" form="form_dbecado">
						<?php 
							if(isset($campos_data['status'])){
								foreach ($campos_data['status'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}
								
							}
						?>
						<!--<option value="1">Activo</option>
								<option value="2">Baja</option>
								<option value="3">Egresado</option>-->
					</select>
					<button id="btn_prueba">Prueba</button><br>
					notas<input type="text" name="notas" />
					recomendado<input type="text" name="recomendado" />
					observacion<input type="text" name="observacion" />
					carta compromiso
					<select name="car_compromiso" form="form_dbecado">
						<option value="0">Documento Faltante</option>
						<option value="1">Documento Entregado</option>		
					</select>
					Formulario IB
					<select name="formulario_IB" form="form_dbecado">
						<option value="0">Documento Faltante</option>
						<option value="1">Documento Entregado</option>		
					</select>
				</form>

				<form id="form_dpersonales">
					nombre<input type="text" name="nombre" />
					apellido paterno<input type="text" name="ape_pat" />
					apellido materno<input type="text" name="ape_mat" />
					Sexo
					<select name="Sexo" form="form_dpersonales">
						<option value="M">Masculino</option>
						<option value="F">Femenino</option>		
					</select>
					fecha de nacimiento<input type="text" name="fec_nac" />
					Estado Civil del Solicitante
					<select name="estado_civil_solicitante" form="form_dpersonales">
						<?php 
							if(isset($campos_data['edo_civiles'])){
								foreach ($campos_data['edo_civiles'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
					¿El Solicitante Tiene Hijos?
					<select name="hijos" form="form_dpersonales">
						<?php 
							if(isset($campos_data['estado_hijos'])){
								foreach ($campos_data['estado_hijos'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
					calle<input type="text" name="calle" />
					num_casa<input type="text" name="num_casa" />
					colonia<input type="text" name="colonia" />
					entre_calle_1<input type="text" name="entre_calle_1" />
					entre_calle_2<input type="text" name="entre_calle_2" />
					cerca_de<input type="text" name="cerca_de" />
					ciudad<input type="text" name="ciudad" />
					telefono<input type="text" name="tel" />
					celular<input type="text" name="cel" />
					correo<input type="text" name="correo" />
					facebook<input type="text" name="facebook" />
					habilidades artisticas<input type="text" name="h_artisticas" />
					habilidades civicas<input type="text" name="h_civicas" />
					h_deportivas<input type="text" name="h_deportivas" />
					habilidades linguisticas<input type="text" name="h_lenguaje" />
				</form>

				<form id="form_dfamiliares">
					nombre del padre<input type="text" name="padre_nombre" />
					apellido paterno del padre<input type="text" name="padre_ape_pat" />
					apellido materno del padre<input type="text" name="padre_ape_mat" />
					edad del padre<input type="text" name="padre_edad" />
					Nivel Educativo del padre
					<select name="padre_nivel_educativo" form="form_dfamiliares">
						<?php 
							if(isset($campos_data['nivel'])){
								foreach ($campos_data['nivel'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
					ocupacion del padre<input type="text" name="padre_ocupacion" />
					estado de vida del padre
					<select name="padre_vivo_muerto" form="form_dfamiliares">
						<?php 
							if(isset($campos_data['estado_vida'])){
								foreach ($campos_data['estado_vida'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
					nombre de la madre<input type="text" name="madre_nombre" />
					apellido paterno de la madre<input type="text" name="madre_ape_pat" />
					apellido materno de la madre<input type="text" name="madre_ape_mat" />
					edad de la madre<input type="text" name="madre_edad" />
					Nivel Educativo de la madre
					<select name="madre_nivel_educativo" form="form_dfamiliares">
						<?php 
							if(isset($campos_data['nivel'])){
								foreach ($campos_data['nivel'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
					ocupacion de la madre<input type="text" name="madre_ocupacion" />
					estado de vida de la madre
					<select name="madre_vivo_muerto" form="form_dfamiliares">
						<?php 
							if(isset($campos_data['estado_vida'])){
								foreach ($campos_data['estado_vida'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
					Estado Civil de los Padres
					<select name="edo_civil_padres" form="form_dfamiliares">
						<?php 
							if(isset($campos_data['edo_civiles'])){
								foreach ($campos_data['edo_civiles'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
					vive con<input type="text" name="vive_con" />
					personas que dependen del ingreso<input type="text" name="personas_dependen_ingreso" />
					familiares que estudian<input type="text" name="familia_estudian" />
					niveles que estudian<input type="text" name="niveles_estudian" />
				</form>

				<form id="form_encuesta_p1">
					puntaje encuesta 1<input type="text" name="puntaje_encuesta_p1" />
					nivel<input type="text" name="nivel" />
				</form>

				<form id="form_encuesta_p2">
					v<input type="text" name="v" />
					diagnostico social<input type="text" name="diagnostico_social" />
					puntaje encuesta 2<input type="text" name="puntaje_encuesta_p2" />
				</form>

				<form id="form_descolares">
					periodo<input type="text" name="periodo" disabled/>
					Nivel Educativo del Solicitante
					<select name="nivel_educativo" form="form_descolares">
						<?php 
							if(isset($campos_data['nivel'])){
								foreach ($campos_data['nivel'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
					Escuela 
					<select name="id_escuela" form="form_descolares">
						<?php 
							if(isset($campos_data['escuela'])){
								foreach ($campos_data['escuela'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
					carrera<input type="text" name="carrera" />
					grado<input type="text" name="grado" />
					Turno 
					<select name="turno" form="form_descolares">
						<?php 
							if(isset($campos_data['turno'])){
								foreach ($campos_data['turno'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
					promedio<input type="text" name="promedio" />
					estado
					<select name="estado" form="form_descolares">
						<?php 
							if(isset($campos_data['estado_inscripcion'])){
								foreach ($campos_data['estado_inscripcion'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
				</form>

				periodo pago<input type="text" name="periodo_pago" disabled/>
				fecha<input type="text" name="fecha_pago" disabled/>
				importe<input type="text" name="importe_pago" disabled/>

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

	$('#btn_prueba').click(function(e){
		e.preventDefault();
		//$("select[name='status']").find('option[text="Egresado"]').attr('selected','selected');
		$("select[name='status'] option:contains("+obj.data.status+")").attr('selected','selected');
	});

	var id_becado;
	$('#becados_tabla tbody').on( 'click','tr',function (e) {
		id_becado=$(this).children('td:nth-child(1)').text();
		$(".loader").show();

		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/ajax_post/get_data_becado",
			dataType: 'json',
			data: {id_becado:id_becado},
			success: function(obj) {
				$(".loader").hide();
				
				$("input[name='status']").val(obj.data.status);
				$("input[name='notas']").val(obj.data.notas);
				$("input[name='recomendado']").val(obj.data.recomendado);
				$("input[name='observacion']").val(obj.data.observacion);
				$("select[name='car_compromiso'] option[value='"+obj.data.car_compromiso+"']").attr('selected','selected');
				$("select[name='formulario_IB'] option[value='"+obj.data.formulario_IB+"']").attr('selected','selected');
				$("input[name='nombre']").val(obj.data.nombre);
				$("input[name='ape_pat']").val(obj.data.ape_pat);
				$("input[name='ape_mat']").val(obj.data.ape_mat);
				$("select[name='Sexo'] option[value='"+obj.data.sexo+"']").attr('selected','selected');
				$("input[name='fec_nac']").val(obj.data.fec_nac);
				$("select[name='estado_civil_solicitante'] option:contains("+obj.data.estado_civil_solicitante+")").attr('selected','selected');
				$("select[name='hijos'] option[value='"+obj.data.hijos+"']").attr('selected','selected');
				$("input[name='calle']").val(obj.data.calle);
				$("input[name='colonia']").val(obj.data.colonia);
				$("input[name='num_casa']").val(obj.data.num_casa);
				$("input[name='entre_calle_1']").val(obj.data.entre_calle_1);
				$("input[name='entre_calle_2']").val(obj.data.entre_calle_2);
				$("input[name='cerca_de']").val(obj.data.cerca_de);
				$("input[name='ciudad']").val(obj.data.ciudad);
				$("input[name='tel']").val(obj.data.tel);
				$("input[name='cel']").val(obj.data.cel);
				$("input[name='correo']").val(obj.data.correo);
				$("input[name='facebook']").val(obj.data.facebook);
				$("input[name='h_artisticas']").val(obj.data.h_artisticas);
				$("input[name='h_civicas']").val(obj.data.h_civicas);
				$("input[name='h_deportivas']").val(obj.data.h_deportivas);
				$("input[name='h_lenguaje']").val(obj.data.h_lenguaje);
				$("input[name='padre_nombre']").val(obj.data.padre_nombre);
				$("input[name='padre_ape_pat']").val(obj.data.padre_ape_pat);
				$("input[name='padre_ape_mat']").val(obj.data.padre_ape_mat);
				$("input[name='padre_edad']").val(obj.data.padre_edad);
				$("select[name='padre_nivel_educativo'] option:contains("+obj.data.nivel+")").attr('selected','selected');
				$("input[name='padre_ocupacion']").val(obj.data.padre_ocupacion);
				$("select[name='padre_vivo_muerto'] option[value='"+obj.data.estado_vida+"']").attr('selected','selected');
				$("input[name='madre_nombre']").val(obj.data.madre_nombre);
				$("input[name='madre_ape_pat']").val(obj.data.madre_ape_pat);
				$("input[name='madre_ape_mat']").val(obj.data.madre_ape_mat);
				$("input[name='madre_edad']").val(obj.data.madre_edad);
				$("select[name='madre_nivel_educativo'] option:contains("+obj.data.nivel+")").attr('selected','selected');
				$("input[name='madre_ocupacion']").val(obj.data.madre_ocupacion);
				$("select[name='madre_vivo_muerto'] option[value='"+obj.data.estado_vida+"']").attr('selected','selected');
				$("select[name='edo_civil_padres'] option:contains("+obj.data.edo_civil_padres+")").attr('selected','selected');
				$("input[name='vive_con']").val(obj.data.vive_con);
				$("input[name='personas_dependen_ingreso']").val(obj.data.personas_dependen_ingreso);
				$("input[name='familia_estudian']").val(obj.data.familia_estudian);
				$("input[name='niveles_estudian']").val(obj.data.niveles_estudian);
				$("input[name='puntaje_encuesta_p1']").val(obj.data.puntaje_encuesta_1);
				$("input[name='nivel']").val(obj.data.nivel);
				$("input[name='v']").val(obj.data.v);
				$("input[name='diagnostico_social']").val(obj.data.diagnostico_social);
				$("input[name='puntaje_encuesta_p2']").val(obj.data.puntaje_encuesta_2);
				$("input[name='nivel_educativo']").val(obj.data.nivel_educativo);
				$("select[name='periodo'] option:contains("+obj.data.periodo+")").attr('selected','selected');
				$("select[name='nivel educativo'] option:contains("+obj.data.nivel_educativo+")").attr('selected','selected');
				$("select[name='escuela'] option:contains("+obj.data.escuela+")").attr('selected','selected');
				$("input[name='carrera']").val(obj.data.carrera);
				$("input[name='grado']").val(obj.data.grado);
				$("select[name='turno'] option:contains("+obj.data.turno+")").attr('selected','selected');
				$("input[name='promedio']").val(obj.data.promedio);
				$("select[name='estado'] option[value='"+obj.data.estado+"']").attr('selected','selected');
				//$("#div_modalMessage").show();
				//$("#modalMessage").text('');
				//$("#modalMessage").append(JSON.stringify(obj));
			},
			error: function(res){
				$(".loader").hide();
				$(".modalMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
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

</body>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
</html>