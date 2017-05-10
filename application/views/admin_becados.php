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
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">


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
										<li><a href="<?php echo base_url();?>"><i class="fa fa-tachometer"></i> <span>INICIO</span></a></li>
										 <li><a href="<?php echo base_url();?>dashboard/becados"><i class="fa fa-file-text-o"></i> <span>BECADOS</span></a></li>
									<li><a href="<?php echo base_url();?>dashboard/solicitudes"><i class="lnr lnr-pencil"></i> <span>SOLICITUDES</span></a></li>
									<li><a href="<?php echo base_url();?>dashboard/administrador"><i class="lnr lnr-chart-bars"></i> <span>ADMINISTRADOR</span></a></li>
									<li><a href="<?=base_url()?>user_authentication/logout""><i class="fa fa-file-text-o"></i> <span>SALIR</span></a></li>
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
		   <li><a href="#" class="tablink" id="btn_horas">HORAS</a></li>
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
				<form id="save_dgenerales">
					<button>Guardar Datos Generales</button>
				</form>
				<br><br><br>
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
				<form id="btn_pago_realizado" style="display:none;">
					<button>Confirmar pago realizado</button>
				</form>
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
						<select name="sexo" form="form_dpersonales">
							<option value="M">Masculino</option>
							<option value="F">Femenino</option>		
						</select>
					</div>
					

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
					<form id="save_dpersonales">
						<button>Guardar Datos Personales</button>
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
				<br><br><br>

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
				</form>
				<br>

				<form class="form-inline">
				
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
				<form id="save_dfamiliares">
					<button>Guardar Datos Familiares</button>
				</form>
			</div>
			
			<div id="div_descolares">
				<form class="form-inline">
					
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
					<form id="save_descolares">
						<button>Guardar Datos Escolares</button>
					</form>
			</div>
			<div id="div_horas">

			<table id="horas_tabla">
					<thead>
						<tr>
							<th>Evento</th>
							<th>Horas</th>
							<th>Fecha</th>
							<th>Observación</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
						<div id="div_comprobantes">

			<div class="w3-row-padding w3-margin-top" >

				<div class="w3-third">
				<div class="w3-card-2">
					<a href="#" target="_blank">
						<img style="width:100%" name="img_pago" src="<?=base_url()?>images/sin_imagen.png" />
					</a>
					<div class="w3-container w3-center">
						<h4>COMPROBANTE DE PAGO</h4>
						<br>
						<select name="select_pago">
							<option value="0">Sin Validar</option>
							<option value="1">Validada</option>
						</select>
					</div>
				</div>
				</div>
				<div class="w3-third">
				<div class="w3-card-2">
					<center><img src="<?=base_url()?>images/alert.png" style="width:50%"></center>
					<div class="w3-container w3-center">
						<h4>! VERIFICA ANTES DE VALIDAR ¡</h4>
					</div>
				</div>
				</div>
				 
				<div class="w3-third">
				<div class="w3-card-2">
					<a href="" target="_blank">
								<img style="width:100%" name="img_boleta" src="<?=base_url()?>images/sin_imagen.png" />
							</a>
					<div class="w3-container w3-center">
						<h4>BOLETA DE CALIFICACIONES</h4>
						<br>
						<select name="select_boleta">
							<option value="0">Sin Validar</option>
							<option value="1">Validada</option>
						</select>
					</div>
				</div>
				</div>
				<form id="save_comprobantes">
						<button>Guardar Estado de Comprobantes</button>
				</form>
			</div>	

				<!--Comprobante de pago:
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
				<form id="save_comprobantes">
						<button>Guardar Estado de Comprobantes</button>
				</form>

			</div>-->

	    	<div class="loader" style="display:none;"></div>
	    	<div id="div_modalMessage" class="w3-container w3-red w3-card-8" style="display:none;">
				<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
				<div id="modalMessage"></div>
			</div>
	    </div>
		
			

				<!--Comprobante de pago:
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
				<form id="save_comprobantes">
						<button>Guardar Estado de Comprobantes</button>
				</form>

			</div>-->

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

	function setModalErrorMessage(message){
		$("#div_modalMessage").attr("class","w3-container w3-red w3-card-8");
		setModalMessage(message);
	}

	function setModalSuccessMessage(message){
		$("#div_modalMessage").attr("class","w3-container w3-green w3-card-8");
		setModalMessage(message);
	}

	function setModalMessage(message){
		$("#modalMessage").text('');
		$("#modalMessage").append(message);
		$("#div_modalMessage").show();
	}

	function clearModal(){
		$("input").each(function(){
			$(this).val('');
		});
		$("#btn_pago_realizado").hide();
		$("img[name='img_pago'],img[name='img_boleta']").attr('src',"<?=base_url()?>images/sin_imagen.png");
		$("img[name='img_pago'],img[name='img_boleta']").parent().attr('href',"");
	}

	var id_becado;
	$('#becados_tabla tbody').on( 'click','tr',function (e) {
		id_becado=$(this).children('td:nth-child(1)').text();
		var horas_realizadas=$(this).children('td:nth-child(4)').text();
		$(".loader").show();
		$("#pagos_tabla").children("tbody").text("");
		$("#horas_tabla").children("tbody").text("");
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
				$("select[name='sexo'] option[value='"+obj.data.sexo+"']").attr('selected','selected');
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
				//$("input[name='nivel_educativo']").val(obj.data.nivel_educativo);
				//$("select[name='periodo'] option:contains("+obj.data.periodo+")").attr('selected','selected');
				$("input[name='periodo']").val(obj.data.periodo);
				$("select[name='nivel_educativo'] option:contains("+obj.data.nivel_educativo+")").attr('selected','selected');
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

				$.each(obj.data.horas, function( index, value ){
					var str = "<tr><td>"+value.evento+"</td><td>"+value.horas+"</td><td>"+value.fecha+"</td><td>"+value.observacion+"</td></tr>";
					$("#horas_tabla").children("tbody").append(str);
				});

				if(obj.data.pago!=null){
					$("img[name='img_pago']").attr("src","<?=base_url()?>"+obj.data.pago.url);
					$("img[name='img_pago']").parent().attr("href","<?=base_url()?>"+obj.data.pago.url);
					$("select[name='select_pago'] option[value='"+obj.data.pago.validacion+"']").attr('selected','selected');
				}else{
					$("img[name='img_pago']").attr("src","<?=base_url()?>images/sin_imagen.png");
					$("img[name='img_pago']").parent().attr("href","");
					$("select[name='select_pago'] option[value='0']").attr('selected','selected');
				}

				if(obj.data.boleta!=null){
					$("img[name='img_boleta']").attr("src","<?=base_url()?>"+obj.data.boleta.url);
					$("img[name='img_boleta']").parent().attr("href","<?=base_url()?>"+obj.data.boleta.url);
					$("select[name='select_boleta'] option[value='"+obj.data.boleta.validacion+"']").attr('selected','selected');
				}else{
					$("img[name='img_boleta']").attr("src","<?=base_url()?>images/sin_imagen.png");
					$("img[name='img_boleta']").parent().attr("href","");
					$("select[name='select_boleta'] option[value='0']").attr('selected','selected');
				}

				if(obj.data.pago_realizado===false && obj.data.pago!=null && obj.data.boleta!=null && horas_realizadas>30){
					$("#btn_pago_realizado").show();
				}
				//$("#div_modalMessage").show();
				//$("#modalMessage").text('');
				//$("#modalMessage").append(JSON.stringify(obj));
			},
			error: function(res){
				$(".loader").hide();
				//$("#modalMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
				setModalErrorMessage('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
		$('#myModal').show();
	});

	$("#btn_pago_realizado").submit(function(e){
		e.preventDefault();

		$(".loader").show();
		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/ajax_post/update_pago_realizado",
			dataType: 'json',
			data: {id_becado:id_becado},
			success: function(obj) {
				$(".loader").hide();
				//$("#modalMessage").text('Datos actualizados correctamente');
				//$("#div_modalMessage").show();
				if(obj.success==1){
					setModalSuccessMessage('Confirmación de pago realizada correctamente');

					$("#btn_pago_realizado").hide();
					$("#pagos_tabla").children("tbody").text("");
					$.each(obj.pagos_realizados, function( index, value ){
						var str = "<tr><td>"+value.periodo+"</td><td>"+value.fecha+"</td><td>"+value.importe+"</td></tr>";
						$("#pagos_tabla").children("tbody").append(str);
					});

				}else{
					setModalErrorMessage(obj.message);
				}

			},
			error: function(res){
				$(".loader").hide();
				//$("#modalMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
				//$("#div_modalMessage").show();
				setModalErrorMessage('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
	});

	$("#save_dgenerales").submit(function(e){
		e.preventDefault();
		$(".loader").show();

		var status = $("select[name='status']").val();
		var notas = $("input[name='notas']").val();
		var recomendado = $("input[name='recomendado']").val();
		var observacion = $("input[name='observacion']").val();
		var car_compromiso = $("select[name='car_compromiso']").val();
		var formulario_IB = $("select[name='formulario_IB']").val();
		var puntaje_encuesta_p1 = $("input[name='puntaje_encuesta_p1']").val();
		var nivel = $("input[name='nivel']").val();
		var diagnostico_social = $("input[name='diagnostico_social']").val();
		var puntaje_encuesta_p2 = $("input[name='puntaje_encuesta_p2']").val();
		var v = $("input[name='v']").val();

		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/ajax_post/update_data_becado",
			dataType: 'json',
			data: {id_becado:id_becado,status:status,notas:notas,recomendado:recomendado,observacion:observacion,car_compromiso:car_compromiso,formulario_IB:formulario_IB,puntaje_encuesta_p1:puntaje_encuesta_p1,nivel:nivel,diagnostico_social:diagnostico_social,v:v},
			success: function(obj) {
				$(".loader").hide();
				//$("#modalMessage").text('Datos actualizados correctamente');
				//$("#div_modalMessage").show();
				if(obj.success==1){
					setModalSuccessMessage('Datos actualizados correctamente');
				}else{
					setModalErrorMessage(obj.message);
				}

			},
			error: function(res){
				$(".loader").hide();
				//$("#modalMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
				//$("#div_modalMessage").show();
				setModalErrorMessage('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
	});

	$("#save_dpersonales").submit(function(e){
		e.preventDefault();
		$(".loader").show();

		var nombre = $("input[name='nombre']").val();
		var ape_pat = $("input[name='ape_pat']").val();
		var ape_mat = $("input[name='ape_mat']").val();
		var fec_nac = $("input[name='fec_nac']").val();
		var sexo = $("select[name='sexo']").val();
		var edo_civil = $("select[name='estado_civil_solicitante']").val();
		var hijos = $("select[name='hijos']").val();
		var calle = $("input[name='calle']").val();
		var num_casa = $("input[name='num_casa']").val();
		var colonia = $("input[name='colonia']").val();
		var entre_calle_1 = $("input[name='entre_calle_1']").val();
		var entre_calle_2 = $("input[name='entre_calle_2']").val();
		var cerca_de = $("input[name='cerca_de']").val();
		var ciudad = $("input[name='ciudad']").val();
		var tel = $("input[name='tel']").val();
		var cel = $("input[name='cel']").val();
		var correo = $("input[name='correo']").val();
		var facebook = $("input[name='facebook']").val();
		var h_artisticas = $("input[name='h_artisticas']").val();
		var h_civicas = $("input[name='h_civicas']").val();
		var h_deportivas = $("input[name='h_deportivas']").val();
		var h_lenguaje = $("input[name='h_lenguaje']").val();

		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/ajax_post/update_data_personales",
			dataType: 'json',
			data: {id_becado:id_becado,nombre:nombre,ape_pat:ape_pat,ape_mat:ape_mat,sexo:sexo,fec_nac:fec_nac,estado_civil_solicitante:edo_civil,hijos:hijos,calle:calle,num_casa:num_casa,colonia:colonia,entre_calle_1:entre_calle_1,entre_calle_2:entre_calle_2,cerca_de:cerca_de,ciudad:ciudad,tel:tel,cel:cel,correo:correo,facebook:facebook,h_artisticas:h_artisticas,h_civicas:h_civicas,h_deportivas:h_deportivas,h_lenguaje:h_lenguaje},
			success: function(obj) {
				$(".loader").hide();
				//$("#modalMessage").text('Datos actualizados correctamente');
				//$("#div_modalMessage").show();
				if(obj.success==1){
					setModalSuccessMessage('Datos actualizados correctamente');
				}else{
					setModalErrorMessage(obj.message);
				}

			},
			error: function(res){
				$(".loader").hide();
				//$("#modalMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
				//$("#div_modalMessage").show();
				setModalErrorMessage('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
	});

	$("#save_dfamiliares").submit(function(e){
		e.preventDefault();
		$(".loader").show();

		//var nombre = $("input[name='nombre']").val();
		var  padre_nombre = $("input[name='padre_nombre']").val();
		var  padre_ape_pat = $("input[name='padre_ape_pat']").val();
		var  padre_ape_mat = $("input[name='padre_ape_mat']").val();
		var  padre_edad = $("input[name='padre_edad']").val();
		var  padre_ocupacion = $("input[name='padre_ocupacion']").val();
		var  padre_nivel_educativo= $("select[name='padre_nivel_educativo']").val();
		var  padre_vivo_muerto= $("select[name='padre_vivo_muerto']").val();
		var  madre_nombre = $("input[name='madre_nombre']").val();
		var  madre_ape_pat = $("input[name='madre_ape_pat']").val();
		var  madre_ape_mat = $("input[name='madre_ape_mat']").val();
		var  madre_edad = $("input[name='madre_edad']").val();
		var  madre_ocupacion = $("input[name='madre_ocupacion']").val();
		var  madre_nivel_educativo= $("select[name='madre_nivel_educativo']").val();
		var  madre_vivo_muerto= $("select[name='madre_vivo_muerto']").val();
		var  edo_civil_padres= $("select[name='edo_civil_padres']").val();
		var  vive_con = $("input[name='vive_con']").val();
		var  personas_dependen_ingreso = $("input[name='personas_dependen_ingreso']").val();
		var  familia_estudian = $("input[name='familia_estudian']").val();
		var  niveles_estudian = $("input[name='niveles_estudian']").val();


		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/ajax_post/update_data_familiares",
			dataType: 'json',
			data: {id_becado:id_becado,padre_nombre:padre_nombre,padre_ape_pat:padre_ape_pat,padre_ape_mat:padre_ape_mat,padre_edad:padre_edad,padre_ocupacion:padre_ocupacion,padre_nivel_educativo:padre_nivel_educativo,padre_vivo_muerto:padre_vivo_muerto,madre_nombre:madre_nombre,madre_ape_pat:madre_ape_pat,madre_ape_mat:madre_ape_mat,madre_edad:madre_edad,madre_ocupacion:madre_ocupacion,madre_nivel_educativo:madre_nivel_educativo,madre_vivo_muerto:madre_vivo_muerto,edo_civil_padres:edo_civil_padres,vive_con:vive_con,personas_dependen_ingreso:personas_dependen_ingreso,familia_estudian:familia_estudian,niveles_estudian:niveles_estudian},
			success: function(obj) {
				$(".loader").hide();
				//$("#modalMessage").text('Datos actualizados correctamente');
				//$("#div_modalMessage").show();
				if(obj.success==1){
					setModalSuccessMessage('Datos actualizados correctamente');
				}else{
					setModalErrorMessage(obj.message);
				}

			},
			error: function(res){
				$(".loader").hide();
				//$("#modalMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
				//$("#div_modalMessage").show();
				setModalErrorMessage('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
	});

	$("#save_descolares").submit(function(e){
		e.preventDefault();
		$(".loader").show();

		//var periodo = $("input[name='periodo']").val();
		var nivel_educativo= $("select[name='nivel_educativo']").val();
		var escuela= $("select[name='escuela']").val();
		var carrera = $("input[name='carrera']").val();
		var grado = $("input[name='grado']").val();
		var promedio = $("input[name='promedio']").val();
		var turno= $("select[name='turno']").val();
		var estado= $("select[name='estado']").val();
		

		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/ajax_post/update_data_escolares",
			dataType: 'json',
			data: {id_becado:id_becado,nivel_educativo:nivel_educativo,escuela:escuela,carrera:carrera,grado:grado,promedio:promedio,turno:turno,estado:estado},
			success: function(obj) {
				$(".loader").hide();
				//$("#modalMessage").text('Datos actualizados correctamente');
				//$("#div_modalMessage").show();
				if(obj.success==1){
					setModalSuccessMessage('Datos actualizados correctamente');
				}else{
					setModalErrorMessage(obj.message);
				}

			},
			error: function(res){
				$(".loader").hide();
				//$("#modalMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
				//$("#div_modalMessage").show();
				setModalErrorMessage('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
	});

	$("#save_comprobantes").submit(function(e){
		e.preventDefault();
		$(".loader").show();

		//var periodo = $("input[name='periodo']").val();
		var boleta= $("select[name='select_boleta']").val();
		var pago= $("select[name='select_pago']").val();
		

		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/ajax_post/update_comprobantes",
			dataType: 'json',
			data: {id_becado:id_becado,boleta:boleta,pago:pago},
			success: function(obj) {
				$(".loader").hide();
				//$("#modalMessage").text('Datos actualizados correctamente');
				//$("#div_modalMessage").show();
				if(obj.success==1){
					setModalSuccessMessage('Datos actualizados correctamente');
				}else{
					setModalErrorMessage(obj.message);
				}

			},
			error: function(res){
				$(".loader").hide();
				//$("#modalMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
				//$("#div_modalMessage").show();
				setModalErrorMessage('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
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
	$("#div_horas").hide();

	function selectTab(tab){
		$("#div_dgenerales").hide();
		$("#div_dfamiliares").hide();
		$("#div_descolares").hide();
		$("#div_dpersonales").hide();
		$("#div_comprobantes").hide();
		$("#div_horas").hide();

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
	$("#btn_horas").click(function (event){
		event.preventDefault();
		selectTab("#div_horas");
	});

});
</script>

<script src="<?=base_url();?>js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
</body>
</html>