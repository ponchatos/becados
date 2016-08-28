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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="<?=base_url();?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="<?=base_url();?>css/style.css" rel='stylesheet' type='text/css' />
	<link href="<?=base_url();?>css/font-awesome.css" rel="stylesheet"> 
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url();?>css/icon-font.min.css" type='text/css' />



</head>
<body>
<div style="margin:0 auto;text-align:center"><button onclick="document.getElementById('Modal_Becar').style.display = 'block';">Pa abrir modal, especialmente para ti chiquito ;)</button></div>
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
				<div class="resp_table">
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
				</div>
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
	    	N° Solicitud: <input type="text" name="id_solicitud" disabled/>
	    	Fecha de Solicitud: <input type="text" name="fec_solicitud" disabled/>
	    	
	    </div>
	    <div class="modal-body">
	    	<div class="loader" style="display:none;"></div>

			<ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">

		   <li><a href="#" class="tablink" id="btn_dpersonales">DATOS PERSONALES</a></li>
		   <li><a href="#" class="tablink" id="btn_dfamiliares">DATOS FAMILIARES</a></li>
		   <li><a href="#" class="tablink" id="btn_descolares">DATOS ESCOLARES</a></li>
		   <li><a href="#" class="tablink" id="btn_dencuesta">DATOS ENCUESTA</a></li>
		  </ul>


	    	<div id="div_dpersonales">

				<p>Nombre</p><input type="text"   class="form-control" name="nombre" disabled/>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Sexo</p><input type="text"  class="form-control"  name="sexo" disabled/>
					</div>
					<div class="form-group"> 
						<p>Fecha de Nacimiento</p><input type="text" class="form-control" id="exampleInputName2 " name="fec_nac" disabled/>
					</div>
					<div class="form-group"> 
						<p>Estado Civil</p><input type="text" class="form-control" id="exampleInputName2 " name="estado_civil_solicitante" disabled/>
					</div>
					<div class="form-group"> 
						<p>Tiene Hijos</p><input type="text" class="form-control" id="exampleInputName2 " name="hijos" disabled/>
					</div>
				</form>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Direccion</p><input type="text" name="direccion" disabled/>
					</div>
					<div class="form-group"> 
						<p>Entre Calle </p><input type="text" name="entre_calle_1" disabled/>
					</div>
					<div class="form-group"> 
						<p>y Calle </p><input type="text" name="entre_calle_2" disabled/>
					</div>
					<div class="form-group"> 
						<p>Cerca de </p><input type="text" name="cerca_de" disabled/>
					</div>
				</form>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Ciudad</p><input type="text" name="ciudad" disabled/>
					</div>
					<div class="form-group"> 
						<p>Teléfono </p><input type="text" name="tel" disabled/>
					</div>
					<div class="form-group"> 
						<p>Celular </p><input type="text" name="cel" disabled/>
					</div>
					<div class="form-group"> 
						<p>Correo </p><input type="text" name="correo" disabled/>
					</div>
				</form>
	
			</div>
			<div id="div_dfamiliares">
				<p>Nombre de Padre o Tutor</p><input type="text"  class="form-control" name="padre_nombre" disabled/>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Edad</p><input type="text" name="padre_edad" disabled/>
					</div>
					<div class="form-group"> 
						<p>Nivel Educativo</p><input type="text" name="padre_nivel_educativo" disabled/>
					</div>
					<div class="form-group"> 
						<p>Ocupación</p><input type="text" name="padre_ocupacion" disabled/>
					</div>
					<div class="form-group"> 
						<p>Estado</p><input type="text" name="padre_vivo_muerto" disabled/>
					</div>
				</form>
				<br>
				<p>Nombre de Madre o Tutor</p><input type="text" class="form-control" name="madre_nombre" disabled/>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Edad</p><input type="text" name="madre_edad" disabled/>
					</div>
					<div class="form-group"> 
						<p>Nivel Educativo</p><input type="text" name="madre_nivel_educativo" disabled/>
					</div>
					<div class="form-group"> 
						<p>Ocupación</p><input type="text" name="madre_ocupacion" disabled/>
					</div>
					<div class="form-group"> 
						<p>Estado</p><input type="text" name="madre_vivo_muerto" disabled/>
					</div>
				</form>
				<br>
				<form class"form-inline">
					<div class="form-group">
						<p>Estado Civil de los Padres</p><input type="text" name="edo_civil_padres" disabled/>
					</div>
				</form>
				<br>
				<p>Actualmente,¿Con quién vives?</p><input type="text" name="vive_con" class="form-control" disabled/>
				<br>
				<p>¿Cuántas personas dependen del ingreso familiar?</p><input type="text" name="personas_dependen_ingreso" class="form-control" disabled/>
				<br>
				<p>¿Cuántas de ellas estudian?</p><input type="text" name="familia_estudian" class="form-control" disabled/>
				<br>
				<p>¿En qué niveles educativos?</p><input type="text" name="niveles_estudian" class="form-control" disabled/>
				<br>
			</div>
			<div id="div_descolares">
				<form class="form-inline">
					<div class="form-group"> 
						<p>Periodo</p><input type="text" name="periodo" disabled/>
					</div>
					<div class="form-group"> 
						<p>Nivel Educativo</p><input type="text" name="nivel_educativo" disabled/>
					</div>
					
				</form>
				<br>
				<p>Escuela</p><input type="text" class="form-control" name="escuela" disabled/>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>Carrera</p><input type="text" name="carrera" disabled/>
					</div>
					<div class="form-group"> 
						<p>Grado</p><input type="text" name="grado" disabled/>
					</div>
					<div class="form-group"> 
						<p>Turno</p><input type="text" name="turno" disabled/>
					</div>
					<div class="form-group"> 
						<p>Promedio</p><input type="text" name="promedio" disabled/>
					</div>
					<div class="form-group"> 
						<p>Estado de Inscripción</p><input type="text" name="estado" disabled/>
					</div>
				</form>

			</div>
			<div id="div_dencuesta">
				<form class="form-inline">
					<div class="form-group"> 
						<p>1.- ¿Cuál es el total de cuartos, piezas o habitaciones con que cuenta su hogar?</p>
					</div>
				</form>
				<form class="form-inline">
					<div class="w3-container w3-half">
						Respuesta:<input type="text"  name="res1" disabled/>
					</div>
					<div class="form-group"> 
						Calificación:<input class="cal" type="number" name="cal1" required/>
					</div>
					
				</form>
				<br>

				<form class="form-inline">
					<div class="form-group">
						<p>2.-¿Cuántos baños completos con regadera y W.C. (excusado) hay para uso exclusivo de los integrantes del hogar?</p>
					</div>
				</form>
				<form class="form-inline">
					<div class="w3-container w3-half">
						Respuesta:<input type="text" name="res2"  disabled/>
					</div>
					<div class="form-group" > 
						Calificación:<input class="cal" type="number" name="cal2" required/>
					</div>
					
				</form>
				<br>

				<form class="form-inline">
					<div class="form-group"> 
						<p>3.- ¿En el hogar cuenta con regadera funcionando en alguno de los baños?</p>
					</div>
				</form>
				<form class="form-inline">
					<div class="w3-container w3-half"> 
						Respuesta:<input type="text" name="res3"  disabled/>
					</div>
					<div class="form-group"> 
						Calificación:<input class="cal" type="number" name="cal3" required/>
					</div>
				</form>
				<br>

				<form class="form-inline">
					<div class="form-group"> 
						<p>4.- Contanto todos los focos que utiliza para iluminar su hogar, incluyendo los techos, paredes y lámparas de buró o piso ¿Cuántos focos tiene su vivienda?</p>
					</div>
				</form>
				<form class="form-inline">
					<div class="w3-container w3-half"> 
						Respuesta:<input type="text" name="res4" disabled/>
					</div>
					<div class="form-group"> 
						Calificación:<input class="cal" type="number" name="cal4" required/>
					</div>
				</form>
				<br>

				<form class="form-inline">
					<div class="form-group"> 
						<p>5.- El piso de su hogar es predominate de tierra, cemento o de algún otro tipo de acabado?</p>
					</div>
				</form>
				<form class="form-inline">
					<div class="w3-container w3-half"> 
						Respuesta:<input type="text" name="res5" disabled/>
					</div>
					<div class="form-group"> 
						Calificación:<input class="cal" type="number" name="cal5" required/>
					</div>
				</form>
				<br>

				<form class="form-inline">
					<div class="form-group"> 
						<p>6.- ¿Cuántos automóviles propios, excluyendo taxis, tienen en su hogar?</p>
					</div>
				</form>
				<form class="form-inline">
					<div class="w3-container w3-half"> 
						Respuesta:<input type="text" name="res6" disabled/>
					</div>
					<div class="form-group"> 
						Calificación:<input class="cal" type="number" name="cal6" required/>
					</div>
				</form>
				<br>

				<form class="form-inline">
					<div class="form-group"> 
						<p>7.- ¿Cuántas televisiones a color tienen funcionando e su hogar?</p>
					</div>
				</form>
				<form class="form-inline">
					<div class="w3-container w3-half"> 
						Respuesta:<input type="text" name="res7" disabled/>
					</div>
					<div class="form-group"> 
						Calificación:<input class="cal" type="number" name="cal7" required/>
					</div>
				</form>
				<br>
				<form class="form-inline">
					<div class="form-group"> 
						<p>8.- ¿Cuántas computadoras personales, ya sea de escritorio o laptop, tienen funcionando en su hogar?</p>
					</div>
				</form>
				<form class="form-inline">
					<div class="w3-container w3-half"> 
						Respuesta:<input type="text" name="res8" disabled/>
					</div>
					<div class="form-group"> 
						Calificación:<input class="cal" type="number" name="cal8" required/>
					</div>
				</form>
				<br>

				<form class="form-inline">
					<div class="form-group"> 
						<p>9.- ¿En su hogar cuentan con estufa de gas o eléctrica?</p>
					</div>
				</form>
				<form class="form-inline">
					<div class="w3-container w3-half"> 
						Respuesta:<input type="text" name="res9" disabled/>
					</div>
					<div class="form-group"> 
						Calificación:<input class="cal" type="number" name="cal9" required/>
					</div>
				</form>
				<br>

				<form class="form-inline">
					<div class="form-group"> 
						<p>10.- Pensando en la persona que aporta la mayor parte del ingreso a su hogar, ¿Cuál fue el último año de estudios que completó? ¿Realizó otros estudios?</p>
					</div>
				</form>
				<form class="form-inline">
					<div class="w3-container w3-half"> 
						Respuesta:<input type="text" name="res10" disabled/>
					</div>
					<div class="form-group"> 
						Calificación:<input class="cal" type="number" name="cal10" required/>
					</div>
				</form>
				<br>
				
				
					<form class="form-inline" >
						<div class="w3-container w3-half"> 
							
						</div>
						<div class="form-group"> 
							Puntaje:&nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="puntaje" disabled/>
						</div>
					</form>

					<form class="form-inline" >
						<div class="w3-container w3-half"> 
							Nivel:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="nivel"/>
						</div>
						<div class="form-group"> 
							Status:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <select name="proceso" form="form_cal">
										<option value="0">Solicitud</option>
										<option value="1">En Proceso</option>
										<option value="2">Becar</option>
										<option disabled>-------</option>
										<option value="3">Eliminar</option>
									</select>
						</div>
					</form>
					<br>
					<br>
					<p>Observaciones:<p><textarea type="text" class="form-control" name="observaciones"/></textarea>
					
				<form id="form_cal" >
					<button id="btn_proc_solicitud">Procesar Solicitud</button>
					<!--<input type="submit" value="Procesar Solicitud"/>-->
					
					
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
	<div id="Modal_Becar" class="modal">
		<div class="modal-content">
	    	<div class="modal-header" style="height:70px">
		    	<span class="close">×</span>
		    	N° Solicitud: <input type="text" name="id_solicitud" disabled/>
		    	Fecha de Solicitud: <input type="text" name="fec_solicitud" disabled/>
		    	
		    </div>
		    <div class="modal-body">
		    	<div class="loader" style="display:none;"></div>
		    	

		    	<form id="form_becar" name="form_becar" method="post" class="form-inline">
		    		<div class="form-group"> 
						<p>Recomendado por:</p><input type="text" name="recomendado" />
					</div>

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="form-group"> 
						<p>Carta compromiso:</p>
						<input type="radio" name="car_compromiso" value="1" />Si
						<input type="radio" name="car_compromiso" value="0" checked/>No	
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="form-group">
						<p>Formulario:</p>
						<input type="radio" name="formulario_IB" value="1" />Si
						<input type="radio" name="formulario_IB" value="0" checked/>No
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="form-group">
						<p>Facebook:</p>
						<input type="text" name="facebook"/>
					</div>
						<p>---------------------------------------------------------------------------------------------------------------------------------</p>
					<br>
					<p>HABILIDADES:</p>
					<div class="form-group">
						<P>Artisticas:</P>
						<input type="text" name="h_artisticas"/>
					</div>
					<div class="form-group">
						<P>Deportivas:</P>
						<input type="text" name="h_deportivas"/>
					</div>
					<div class="form-group">
						<P>Civicas:</P>
						<input type="text" name="h_civicas"/>
					</div>
					<div class="form-group">
						<P>Lenguaje:</P>
						<input type="text" name="h_lenguaje"/>
					</div>
					<br><br>
					<div class="form-group">
						<P>Puntaje:</P>
						<input type="text" name="puntaje"/>
					</div>
					<div class="form-group">
						<P>V:</P>
						<input type="text" name="v"/>
					</div>
					<div class="form-group">
						<P>Diagnostico Social:</P>
						<input type="text" name="diagnostico_social" />
					</div>
					<br><br>

					<div class="form-group">
						<P>Observación:</P>
						<textarea form="form_becar" name="observacion_becado" cols="50" rows="6" maxlength="400"></textarea>
					</div>					
				<p>---------------------------------------------------------------------------------------------------------------------------------</p>
				<p>USUARIOS</p>
					<br>
					<div class="form-group">
						<P>Crear usuario:</P>
						<input type="text" name="username" required/>
					</div>
					<br>	
					<div class="form-group">
						<P>Contraseña:</P>
						<input type="password" name="password" required/>
					</div>	
					<div class="form-group">
						<P>Confirmar contraseña:</P>
						<input type="password" name="confirm_password" required>
						<button class="genPass" onclick="generate_password();" value="Generar Contraseña">Generar Contraseña</button>
						<button class="genPass" onclick="toggle_password();" value="Ver/Ocultar Contraseña">Ver/Ocultar Contraseña</button>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" id="btn_becar" value="Becar">Becar</button>
					</div>
					<div id="div_modalBecarMessage" class="w3-container w3-red w3-card-8" style="display:none;">
						<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
						<div id="modalBecarMessage"></div>
					</div>
				</form>
		    </div>
		</div>
	</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){


	$("#div_dfamiliares").hide();
	$("#div_descolares").hide();
	$("#div_dencuesta").hide();

	$("#btn_dpersonales").click(function(event){
		event.preventDefault();
		$("#div_dpersonales").show();
		$("#div_dfamiliares").hide();
		$("#div_descolares").hide();
		$("#div_dencuesta").hide();

	});
	$("#btn_dfamiliares").click(function(event){
		event.preventDefault();
		$("#div_dpersonales").hide();
		$("#div_dfamiliares").show();
		$("#div_descolares").hide();
		$("#div_dencuesta").hide();

	});
	$("#btn_descolares").click(function(event){
		event.preventDefault();
		$("#div_dpersonales").hide();
		$("#div_dfamiliares").hide();
		$("#div_descolares").show();
		$("#div_dencuesta").hide();

	});
	$("#btn_dencuesta").click(function(event){
		event.preventDefault();
		$("#div_dpersonales").hide();
		$("#div_dfamiliares").hide();
		$("#div_descolares").hide();
		$("#div_dencuesta").show();

	});

});
</script>

<script type="text/javascript">
	function randomPassword(length=10) {
	    var chars = "abcdefghijklmnopqrstuvwxyz1234567890";
	    var pass = "";
	    for (var x = 0; x < length; x++) {
	        var i = Math.floor(Math.random() * chars.length);
	        pass += chars.charAt(i);
	    }
	    return pass;
	}

	function generate_password() {
	    form_becar.password.type="text";
	    form_becar.confirm_password.type="text";
	    var pass=randomPassword(10);
	    form_becar.password.value = pass;
	    form_becar.confirm_password.value = pass;
	}

	function toggle_password(){
		form_becar.password.type=form_becar.password.type=="text"?"password":"text";
	    form_becar.confirm_password.type=form_becar.confirm_password.type=="text"?"password":"text";
	}
</script>

<script type="text/javascript">
$(document).ready(function() {
	var table=$('#solicitudes_tabla').DataTable({
		"destroy":true,
	    "pageLength": 10,
	    "autoWidth": false,
	    "responsive": true
	});



	var id_solicitud;
	$(".loader").hide();

	$(".genPass").click(function(e){
		e.preventDefault();
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
		var observaciones=$("textarea[name='observaciones']").val();
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
					
					if(proceso==2){
						$("#Modal_Becar").show();
					}
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

	$("#form_becar").submit(function(event){
		event.preventDefault();
		if($("input[name=password").val()!=$("input[name=confirm_password").val()){
			$("#modalBecarMessage").text("Los campos de contraseña no coinciden");
			$("#div_modalBecarMessage").show();
			return false;
		}
		//$("#form_becar").submit();
		var recomendado = $("input[name='recomendado']").val();
		var observacion = $("input[name='observacion_becado']").val();
		var car_compromiso = $("input[type='radio'][name='car_compromiso']:checked").val();
		var formulario_IB = $("input[name='formulario_IB']:checked").val();
		var facebook = $("input[name='facebook']").val();
		var h_artisticas = $("input[name='h_artisticas']").val();
		var h_deportivas = $("input[name='h_deportivas']").val();
		var h_civicas = $("input[name='h_civicas']").val();
		var h_lenguaje = $("input[name='h_lenguaje']").val();
		var puntaje = $("input[name='puntaje']").val();
		var v = $("input[name='v']").val();
		var diagnostico_social = $("textarea[name='diagnostico_social']").val();
		var username = $("input[name='username']").val();
		var password = $("input[name='password']").val();
		var confirm_password = $("input[name='confirm_password']").val();

		/*var str = 
		"id_solicitud="+id_solicitud
		+"\n,recomendado="+recomendado
		+"\n,observacion="+observacion
		+"\n,car_compromiso="+car_compromiso
		+"\n,formulario_IB="+formulario_IB
		+"\n,facebook="+facebook
		+"\n,h_artisticas="+h_artisticas
		+"\n,h_deportivas="+h_deportivas
		+"\n,h_civicas="+h_civicas
		+"\n,h_lenguaje="+h_lenguaje
		+"\n,puntaje="+puntaje
		+"\n,v="+v
		+"\n,diagnostico_social="+diagnostico_social
		+"\n,username="+username
		+"\n,password="+password
		+"\n,confirm_password="+confirm_password;
		alert(str);*/

		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/dashboard/becar",
			dataType: 'json',
			data: {id_solicitud:id_solicitud,recomendado:recomendado,observacion:observacion,car_compromiso:car_compromiso,formulario_IB:formulario_IB,facebook:facebook,h_artisticas:h_artisticas,h_deportivas:h_deportivas,h_civicas:h_civicas,h_lenguaje:h_lenguaje,puntaje:puntaje,v:v,diagnostico_social:diagnostico_social,username:username,password:password,confirm_password:confirm_password},
			success: function(obj) {
				if(obj.success==1){
					$("#div_message").show();
					$("#message").text(obj.message);
					$("#Modal_Becar").hide();

						$(".row_solicitud").each(function(){
							if($(this).children('td:nth-child(1)').text()==id_solicitud){
								table.row($(this)).remove().draw();
							}
						});
				}else{
					$("#div_modalBecarMessage").show();
					$("#modalBecarMessage").text('');
					$("#modalBecarMessage").append('<h3>Error!</h3><p>'+obj.message+'</p>');
				}
				$(".loader").hide();
			},
			error: function(res){
				$(".loader").hide();
				$(".modalBecarMessage").text('<h3>Error!</h3><p>'+res.statusText+'</p>');
			}
		});
	});

	function clearModal(){
		$("input").each(function(){
			if($(this).attr('type')!="radio" && $(this).attr('type')!="submit"){
				$(this).val('');
			}
		});
	}

	$('#solicitudes_tabla tbody').on( 'click','tr',function (e) {
		clearModal();
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
		<?php 
		?>
		$('#myModal').show();
	});
	$('.close').on('click',function(e){
		$('#myModal,#div_modalMessage,#Modal_Becar,#div_modalBecarMessage').hide();
		//$('#myModal,#div_modalMessage').hide();
	});
	$(window).click(function(event){
		if(event.target.id == "myModal" || event.target.id == "Modal_Becar"){
			$('#myModal,#div_modalMessage,#Modal_Becar,#div_modalBecarMessage').hide();
			//$('#myModal,#div_modalMessage').hide();
		}
	});
});
</script>
<script src="<?=base_url();?>js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
<style type="text/css">
	.resp_table{
		 overflow-x: auto !important;
		 white-space: nowrap !important;
	}
</style>
</body>
</html>