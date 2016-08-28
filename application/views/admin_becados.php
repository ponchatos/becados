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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
	<link href="<?=base_url();?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="<?=base_url();?>css/style.css" rel='stylesheet' type='text/css' />
	<link href="<?=base_url();?>css/font-awesome.css" rel="stylesheet"> 
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url();?>css/icon-font.min.css" type='text/css' />



</head>
<body>
<div class="page-container">
	<div class="left-content">
	   <div class="inner-content">
			<div class="header-section">
						<div class="top_bg">
							
								<div class="header_top">
									<div class="top_right">
										<p>SISTEMA DE GESTION DE BECAS</p>
									</div>
									<div class="top_left">
										<h2> Patronato Pro-Educación de Ahome A.C.</h2>
									</div>
										<div class="clearfix"> </div>
								</div>
							
						</div>
					<div class="clearfix"></div>
				</div>
				<div class="header_bg">
						
							<div class="header">
								<div class="head-t">
									<div class="logo">
										<a href="index.html"><img src="<?=base_url();?>images/logo_patt.png" class="img-responsive" alt=""> </a>

									</div>
								<div class="clearfix"> </div>
	<div class="women_main">
		    <div class="w_content">
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
		</div>
	</div>
	<div class="clearfix"> </div>
  
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="#"><i class="fa fa-tachometer"></i> <span>INICIO</span></a></li>
										 <li><a href="#"><i class="fa fa-file-text-o"></i> <span>BECADOS</span></a></li>
									<li><a href="#"><i class="lnr lnr-pencil"></i> <span>SOLICITUDES</span></a></li>
									<li><a href="#"><i class="lnr lnr-chart-bars"></i> <span>ADMINISTRADOR</span></a></li>
									<li><a href="#"><i class="fa fa-file-text-o"></i> <span>SALIR</span></a></li>
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>						
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<div class="clearfix"> </div>

	<div id="myModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
    	<div class="modal-header" style="height:70px">
	    	<span class="close">×</span>
	    	<h3 class="modalTitle" name="nombre"></h3>
	    </div>
	    <div class="modal-body">
	    	<div class="loader" style="display:none;"></div>

			<ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">

		   <li><a href="#" class="tablink" id="btn_dgenerales">DATOS GENERALES</a></li>
		   <li><a href="#" class="tablink" id="btn_dpersonales">DATOS PERSONALES</a></li>
		   <li><a href="#" class="tablink" id="btn_dfamiliares">DATOS FAMILIARES</a></li>
		   <li><a href="#" class="tablink" id="btn_descolares">DATOS ESCOLARES</a></li>
		   <li><a href="#" class="tablink" id="btn_comprobantes">COMPROBANTES</a></li>
		  </ul>


	    	<div id="div_dgenerales">
	    		<br>
	    		Estado del Becado
						<select name="status" form="form_dbecado"  id="exampleInputName2 ">
						<?php 
							if(isset($campos_data['status'])){
								foreach ($campos_data['status'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}
								
							}
						?>
						</select>
						<br>
						<br>
						<br>
				<form class="form-inline">

					<div class="form-group"> 
						<p>Notas</p><input type="text"  name="notas"/>
					</div>
					<div class="form-group"> 
						<p>Recomendado</p><input type="text" name="recomendado" />
					</div>
					<div class="form-group"> 
						<p>Observación</p><input type="text"  name="observacion"/>
					</div>
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				 	<div class="form-group">
						<p>Carta Compromiso</p>
							<select name="car_compromiso" form="form_dbecado"  id="exampleInputName2 ">
								<option value="0">Documento Faltante</option>
								<option value="1">Documento Entregado</option>		
							</select> 
					</div>
					<div class="form-group"> 
						<p>Formulario IB</p>
						<select name="formulario_IB" form="form_dbecado">
							<option value="0">Documento Faltante</option>
							<option value="1">Documento Entregado</option>		
						</select>
					</div>
				</form>
				<br>
				<form class="form-inline">
					<P>PUNTAJES</P>
					<br>
					<div class="form-group"> 
						<p>Encuesta 1</p><input type="text" name="puntaje_encuesta_p1" />
					</div>
					<div class="form-group"> 
						<p>Nivel</p><input type="text" name="nivel" />
					</div>
					<div class="form-group"> 
						<p>Diagnostico Social</p><input type="text" name="diagnostico_social" />
					</div>
					<div class="form-group"> 
						<p>Encuesta 2</p><input type="text" name="puntaje_encuesta_p2" />
					</div>
					
					<div class="form-group"> 
						<p>V</p><input type="text" name="v" />
					</div>
				</form>
				<table id="pagos_tabla">
					<thead>
						<tr>
							<th>Periodo de Pago</th>
							<th>Fecha de Pago</th>
							<th>Importe</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>

			<div id="div_dpersonales">
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Nombre</p><input type="text"  name="nombre"/>
					</div>
					<div class="form-group"> 
						<p>Apellido Paterno</p><input type="text" name="ape_pat"/>
					</div>
					<div class="form-group"> 
						<p>Apellido Materno</p><input type="text" name="ape_mat"/>
					</div>
					<div class="form-group"> 
						<p>Facha de Nacimiento</p><input type="text" name="fec_nac"/>
					</div>
				</form>
				<br>
				<form class="form-inline">
					<div class="form-group">
						<p>Sexo</p>
						<select name="Sexo" form="form_dpersonales">
							<option value="M">Masculino</option>
							<option value="F">Femenino</option>		
						</select>
					</div>
					&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

					<div class="form-group">
						<p>Estado Civil</p>
						<select name="estado_civil_solicitante" form="form_dpersonales" >
							<?php 
								if(isset($campos_data['edo_civiles'])){
									foreach ($campos_data['edo_civiles'] as $row) {
										echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
									}			
								}
							?>
						</select>
					</div>
					&nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					<div class="form-group">
						<p>¿El Solicitante Tiene Hijos?</p>
						<select name="hijos" form="form_dpersonales">
							<?php 
								if(isset($campos_data['estado_hijos'])){
									foreach ($campos_data['estado_hijos'] as $row) {
										echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
									}			
								}
							?>
						</select>
					</div>
				</form>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Calle</p><input type="text" name="calle" />
					</div>
					<div class="form-group"> 
						<p>Número de Casa</p><input type="text" name="num_casa" />
					</div>
					<div class="form-group"> 
						<p>Colonia</p><input type="text" name="colonia" />
					</div>
				</form>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Entre Calle</p><input type="text" name="entre_calle_1" />
					</div>
					<div class="form-group"> 
						<p>y Calle</p><input type="text" name="entre_calle_2" />
					</div>
					<div class="form-group"> 
						<p>Cerca de</p><input type="text" name="cerca_de" />
					</div>
					<div class="form-group"> 
						<p>Ciudad</p><input type="text" name="ciudad" />
					</div>
				</form>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Teléfono</p><input type="text" name="tel" />
					</div>
					<div class="form-group"> 
						<p>Celular</p><input type="text" name="cel" />
					</div>
					<div class="form-group"> 
						<p>Correo</p><input type="text" name="correo" />
					</div>
					<div class="form-group"> 
						<p>Facebook</p><input type="text" name="facebook" />
					</div>
				</form>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Habilidades Artísticas</p><input type="text" name="h_artisticas" />
					</div>
					<div class="form-group"> 
						<p>Habilidades Cívicas</p><input type="text" name="h_civicas" />
					</div>
					<div class="form-group"> 
						<p>Habilidades Deportivas</p><input type="text" name="h_deportivas" />
					</div>
					<div class="form-group"> 
						<p>Habilidades  Lingüísticas</p><input type="text" name="h_lenguaje" />
					</div>
				</form>
			</div>
				
			<div id="div_dfamiliares">
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Nombre del Padre</p><input type="text" name="padre_nombre" />
					</div>
					<div class="form-group"> 
						<p>Apellido Paterno</p><input type="text" name="padre_ape_pat" />
					</div>
					<div class="form-group"> 
						<p>Apellido Materno</p><input type="text" name="padre_ape_mat" />
					</div>
					<div class="form-group"> 
						<p>Edad</p><input type="text" name="padre_edad" />
					</div>
					<div class="form-group"> 
						<p>Ocupación</p><input type="text" name="padre_ocupacion" />
					</div>
				</form>
				<br>

				<form class="form-inline">
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; 
					<div class="form-group"> 
						<p>Nivel Educativo</p>
						<select name="padre_nivel_educativo" form="form_dfamiliares">
						<?php 
							if(isset($campos_data['nivel'])){
								foreach ($campos_data['nivel'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
						</select>
					</div>
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					<div class="form-group"> 
						<p>Estado</p>
						<select name="padre_vivo_muerto" form="form_dfamiliares">
						<?php 
							if(isset($campos_data['estado_vida'])){
								foreach ($campos_data['estado_vida'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
						</select>
					</div>
				</form>
				<br>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Nombre de la Madre</p><input type="text" name="madre_nombre" />
					</div>
					<div class="form-group"> 
						<p>Apellido Paterno</p><input type="text" name="madre_ape_pat" />
					</div>
					<div class="form-group"> 
						<p>Apellido Materno</p><input type="text" name="madre_ape_mat" />
					</div>
					<div class="form-group"> 
						<p>Edad</p><input type="text" name="madre_edad" />
					</div>
					<div class="form-group"> 
						<p>Ocupación</p><input type="text" name="madre_ocupacion" />
					</div>
				</form>
				<br>

				<form class="form-inline">
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; 
					<div class="form-group"> 
						<p>Nivel Educativo</p>
						<select name="madre_nivel_educativo" form="form_dfamiliares">
						<?php 
							if(isset($campos_data['nivel'])){
								foreach ($campos_data['nivel'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
						</select>
					</div>
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					<div class="form-group"> 
						<p>Estado</p>
						<select name="madre_vivo_muerto" form="form_dfamiliares">
						<?php 
							if(isset($campos_data['estado_vida'])){
								foreach ($campos_data['estado_vida'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
						</select>
					</div>
					<br>
					<br>
				<form class="form-inline">
						<div class="form-group"> 
							<p>Estado Civil de los Padres</p>
							<select name="edo_civil_padres" form="form_dfamiliares" >
								<?php 
									if(isset($campos_data['edo_civiles'])){
										foreach ($campos_data['edo_civiles'] as $row) {
											echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
										}			
									}
								?>
							</select>
						</div>
				</form>
				</form>
				<br>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Vive con</p><input type="text" name="vive_con" />
					</div>
					<div class="form-group"> 
						<p>Dependen del Ingreso</p><input type="text" name="personas_dependen_ingreso" />
					</div>
					<div class="form-group"> 
						<p>Familiares que Estudian</p><input type="text" name="familia_estudian" />
					</div>
					<div class="form-group"> 
						<p>Niveles que Estudian</p><input type="text" name="niveles_estudian" />
					</div>
				</form>
			</div>
			
			<div id="div_descolares">
				<form class="form-inline">
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					<div class="form-group"> 
						<p>Periodo</p><input type="text" name="periodo" disabled/>
					</div>
					<div class="form-group"> 
						<p>Nivel Educativo</p>
						<select name="nivel_educativo" form="form_descolares">
							<?php 
								if(isset($campos_data['nivel'])){
									foreach ($campos_data['nivel'] as $row) {
										echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
									}			
								}
							?>
						</select>
					</div>
				</form>
				<br>
				<p>Escuela</p>
					<select name="escuela" form="form_descolares">
						<?php 
							if(isset($campos_data['escuela'])){
								foreach ($campos_data['escuela'] as $row) {
									echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
								}			
							}
						?>
					</select>
				<br>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Carrera</p><input type="text" name="carrera" />
					</div>
					<div class="form-group"> 
						<p>Grado</p><input type="text" name="grado"/>
					</div>
					<div class="form-group"> 
						<p>Promedio</p><input type="text" name="promedio"/>
					</div>
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; 
					&nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; 
					&nbsp; &nbsp;   
					<div class="form-group"> 
						<p>Turno</p>
						<select name="turno" form="form_descolares">
							<?php 
								if(isset($campos_data['turno'])){
									foreach ($campos_data['turno'] as $row) {
										echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
									}			
								}
							?>
						</select>
					</div> 
					<div class="form-group"> 
						<p>Estado de Inscripción</p>
						<select name="estado" form="form_descolares">
							<?php 
								if(isset($campos_data['estado_inscripcion'])){
									foreach ($campos_data['estado_inscripcion'] as $row) {
										echo '<option value="'.$row['value'].'">'.$row['data'].'</option>';
									}			
								}
							?>
						</select>
					</div>
				
					
					</form>

			</div>

			<div id="div_comprobantes">
				Comprobante de pago:
				<a href="" target="_blank">
					<img width="300" name="img_pago" src="<?=base_url()?>images/sin_imagen.png" />
				</a>
				<select name="select_pago">
					<option value="0">Sin Validar</option>
					<option value="1">Validada</option>
				</select>
				<br>
				Boleta de calificaciones:
				<a href="" target="_blank">
					<img width="300" name="img_boleta" src="<?=base_url()?>images/sin_imagen.png" />
				</a>
				<select name="select_boleta">
					<option value="0">Sin Validar</option>
					<option value="1">Validada</option>
				</select>
			</div>

	    	<div class="loader" style="display:none;"></div>
	    	<div id="div_modalMessage" class="w3-container w3-red w3-card-8" style="display:none;">
				<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
				<div id="modalMessage"></div>
			</div>
	    </div>
	</div>
	</div>
</div>
</div>
</div>
</div>
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
		//$("select[name='status'] option:contains("+obj.data.status+")").attr('selected','selected');
		clearModal();
	});

	function clearModal(){
		$("input").each(function(){
			$(this).val('');
		});
		$("img[name='img_pago'],img[name='img_boleta']").attr('src',"<?=base_url()?>images/sin_imagen.png");
		$("img[name='img_pago'],img[name='img_boleta']").parent().attr('href',"");
	}

	var id_becado;
	$('#becados_tabla tbody').on( 'click','tr',function (e) {
		id_becado=$(this).children('td:nth-child(1)').text();
		$(".loader").show();
		$("#pagos_tabla").children("tbody").text("");
		clearModal();

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
				$("h3[name='nombre']").text(obj.data.nombre);
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

				$.each(obj.data.pagos, function( index, value ){
					var str = "<tr><td>"+value.periodo+"</td><td>"+value.fecha+"</td><td>"+value.importe+"</td></tr>";
					$("#pagos_tabla").children("tbody").append(str);
				});

				if(obj.data.pago!=null){
					$("img[name='img_pago']").attr("src","<?=base_url()?>"+obj.data.pago.url);
					$("img[name='img_pago']").parent().attr("href","<?=base_url()?>"+obj.data.pago.url);
					$("select[name='select_pago'] option[value='"+obj.data.pago.validacion+"']").attr('selected','selected');
				}

				if(obj.data.boleta!=null){
					$("img[name='img_boleta']").attr("src","<?=base_url()?>"+obj.data.boleta.url);
					$("img[name='img_boleta']").parent().attr("href","<?=base_url()?>"+obj.data.boleta.url);
					$("select[name='select_boleta'] option[value='"+obj.data.boleta.validacion+"']").attr('selected','selected');
				}
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

<script type="text/javascript">
$(document).ready(function(){


	$("#div_dfamiliares").hide();
	$("#div_descolares").hide();
	$("#div_dpersonales").hide();
	$("#div_comprobantes").hide();

	function selectTab(tab){
		$("#div_dgenerales").hide();
		$("#div_dfamiliares").hide();
		$("#div_descolares").hide();
		$("#div_dpersonales").hide();
		$("#div_comprobantes").hide();
		$(tab).show();
	}

	$("#btn_dgenerales").click(function(event){
		event.preventDefault();
		selectTab("#div_dgenerales");

	});
	$("#btn_dpersonales").click(function(event){
		event.preventDefault();
		selectTab("#div_dpersonales");

	});

	$("#btn_dfamiliares").click(function(event){
		event.preventDefault();
		selectTab("#div_dfamiliares");

	});
	$("#btn_descolares").click(function(event){
		event.preventDefault();
		selectTab("#div_descolares");

	});

	$("#btn_comprobantes").click(function (event){
		event.preventDefault();
		selectTab("#div_comprobantes");
	});

});
</script>

<script src="<?=base_url();?>js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
</body>
</html>