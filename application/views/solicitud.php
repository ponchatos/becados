<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="<?php echo base_url();?>css/w3.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url();?>css/styles.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <!--//webfonts-->
</head>
<body>
	<div class="main">
    <div class="header" >
 
    <div class="header">
      <h1>SOLICITUD DE BECA</h1>
    </div>
    </div>
    <p>FAVOR DE LLENAR TODOS LOS CAMPOS</p>
    <p><?php echo validation_errors(); ?></p>
    <div id="div_message" class="w3-container w3-red w3-card-8">
    	<?php 
	    	if(isset($error_message)){
	    	echo '</br>
				<span onclick="this.parentElement.style.display=\'none\'" class="w3-closebtn">&times;</span>
				<div id="message">'.$error_message.'</div>
				</br>';
			}
		?>
	</div>

  
  <br>
	<form id="form" method="post" action="<?php echo base_url();?>solicitud/registrar_solicitud">
		
		<ul class="left-form">		
          <h2>DATOS PERSONALES</h2>
		  <br>
		  <h4>Nombre:</h4>
				<br>
		<li>
			<input  type="text" name="nombre" placeholder="Nombre" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
		 <h4>Apellido Paterno:</h4>
				<br>
        <li>
        	<input  type="text" name="ape_pat" placeholder="Apellido Paterno" value="ASD" required/></a>
			<div class="clear"> </div>
        </li>
		<h4>Apellido Materno:</h4>
		<br>		
		<li>
			<input  type="text" name="ape_mat" placeholder="Apellido Materno" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
       <h4>Calle:</h4>
		<br>	
       <li>
			<input  type="text" name="calle" placeholder="Calle" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
		<h4>Número de casa:</h4>
		<br>	
        <li>
			<input  type="text" name="num_casa" placeholder="Número de casa" value="123" required/></a>
			<div class="clear"> </div>
        </li> 
		<h4>Colonia:</h4>
		<br>	
        <li>
			<input  type="text" name="colonia" placeholder="Colonia" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
		<h4>Entre Calle:</h4>
		<br>	
         <li>
			<input  type="text" name="entre_calle_1" placeholder="Entre Calle" value="ASD" required/></a>
			<div class="clear"> </div>			
        </li>
		<h4>y Calle:</h4>
		<br>	
		<li>						
			<input  type="text" name="entre_calle_2" placeholder="y Calle" value="ASD" required/></a>
			<div class="clear"> </div>
        </li>	
		<h4>Cerca de:</h4>
		<br>			
        <li>
			<input  type="text" name="cerca_de" placeholder="Cerca de" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
             
             <h2>DATOS FAMILIARES</h2>
		<h4>Nombre del Padre o Tutor:</h4>
		<br>	
        <li>
			<input  type="text" name="padre_nombre" placeholder="Nombre del Padre o Tutor" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
		<h4>Apellido Paterno del Padre o Tutor:</h4>
		<br>
        <li>
        	<input  type="text" name="padre_ape_pat" placeholder="Apellido Paterno del Padre o Tutor" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
		<h4>Apellido Materno del Padre o Tutor:</h4>
		<br>
		<li>
			<input  type="text" name="padre_ape_mat" placeholder="Apellido Materno del Padre o Tutor" value="ASD" required/></a>
			<div class="clear"> </div>
        </li>
		<br>
		<br>
		<br>
		<br> 
		<h4>Nombre de la Madre:</h4>
		<br>	   
         <li>
			<input  type="text" name="madre_nombre" placeholder="Nombre de la Madre" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
		<h4>Apellido Paterno de la Madre:</h4>
		<br>
        <li>
        	<input  type="text" name="madre_ape_pat" placeholder="Apellido Paterno de la Madre" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
		<h4>Apellido Materno de la Madre:</h4>
		<br>
		<li>
			<input  type="text" name="madre_ape_mat" placeholder="Apellido Materno de la Madre" value="ASD" required/></a>
			<div class="clear"> </div>
        </li>
		<h4>Estado Civil:</h4>
		<br>		
        <li>
	        	<select form="form" id="id_edo_civil_padres" name="edo_civil_padres" required>
					<option disabled selected value>Estado Civil</option>
					<?php
						if(isset($edos_civiles)){
							foreach ($edos_civiles as $edo_civil) {
								echo '<option selected value="'.$edo_civil["id_edo_civil"].'">'.$edo_civil["nombre"].'</option>';
							}
						}
					 ?>
						<!--
						<option value="1">Soltero(a)</option>
						<option value="2">Casados</option>
						<option value="3">Unión Libre</option>
						<option value="4">Divorciados</option>
						<option value="5">Separados</option>
						<option value="6">Viudos</option>-->
				</select>
				<div class="clear"> </div>
	        </li>
	        <br>
	        <h4>Actualmente, ¿Con quién vives?</h4>
	        <br>
	        <li>
				<input  type="text" name="vive_con" placeholder="" value="ASD" required/></a>
				<div class="clear"> </div>
        	</li> 
        	 
		        <h4>¿Cuántas personas dependen del ingreso familiar?</h4>
				<br>
				<li>
				<input  type="number" name="personas_dependen_ingreso" placeholder="" value="3" required/></a>
				<div class="clear"> </div>
        	</li> 
			<br>
			<br>
	          <h2>DATOS ESCOLARES</h2>
			  <h4>Nivel Educativo:</h4>
				<br>
			  <li>
			<select required form="form" name="nivel_educativo">
				<option selected disabled>Selecciona nivel educativo</option>
				<?php
					if(isset($niveles_educativos)){
						foreach ($niveles_educativos as $nivel) {
							echo '<option selected  value="'.$nivel["id_nivel"].'">'.$nivel["nombre"].'</option>';
						}
					}
				 ?>
			</select>
			<div class="clear"> </div>
		</li>
		<h4>Escuela:</h4>
				<br>
	          <li>
				<select form="form" id="id_escuela" name="escuela" value="ASD" required>
					<option disabled selected value>Seleccione Escuela</option>
					<?php
						if(isset($escuelas)){
							foreach ($escuelas as $escuela) {
								echo '<option selected value="'.$escuela["id_escuela"].'">'.$escuela["nombre"].'</option>';
							}
						}
					 ?>
				</select>
				<div class="clear"> </div>
        	</li>
			<h4>Carrera:</h4>
				<br>
        	 <li>
				<input  type="text" name="carrera" placeholder="Carrera" value="ASD" required/></a>
				<div class="clear"> </div>
        	</li>
			<br>
        	<br>
			<br>
        	<br>
        	<br>			
        	<h2>ESTUDIO SOCIO-ECONÓMICO</h2>
        	
        	 <h4>Seleccione la respuesta que considere correcta dependiendo de sus situación, trate de ser lo más exacto posible.</h4>
        	 <br>
        	 <br>
        	 <br>
        	 <h4>1.-¿Cuál es el total de cuartos, piezas o habitaciones con que cuenta su hogar?, por favor 
        	 	no incluya baños, medios baños, pasillos, patios y zotehuelas.</h4>
			<br><div class="clear"> </div>
        	 <li>
            	<select form="form"  name="p1" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option selected value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7 o más.</option>
				</select>
				<div class="clear"> </div>
            </li>           
            <h4>2.-¿Cuántos baños completos con regadera y W.C. (excusado)  hay para uso exclusivo de los integrantes de su hogar?</h4>
            <br><div class="clear"> </div>
            <li>
            	<select form="form"  name="p2" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option selected value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4 o más.</option>
				</select>
				<div class="clear"> </div>
				
            </li><div class="clear"> </div>
            <h4>3.-¿En el hogar cuenta con regadera funcionando en alguno de los baños?</h4><br><div class="clear"> </div>
            <li>
            	<select form="form"  name="p3" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option selected value="1">No tiene.</option>
						<option value="2">Si tiene.</option>
				</select>
			</li>
			 <h4>4.-Contando todos los focos que utiliza para iluminar su hogar, incluyendo los techos, paredes y lámparas de buró o piso, ¿cuántos focos tiene su vivienda?</h4><br><div class="clear"> </div>
            <li>
            	<select form="form"  name="p4" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option selected value="1">De 0 a 5</option>
						<option value="2">De 6 a 10</option>
						<option value="3">De 11 a 15</option>
						<option value="4">De 16 a 20</option>
						<option value="5">21 o más.</option>

				</select>
			</li>
			 <h4>5.-El piso de su hogar es predominantemente de tierra, o de cemento, o de algún otro tipo de acabado?</h4>
            <li>
            	<select form="form"  name="p5" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option selected value="1">Tierra o cemento (firme de).</option>
						<option value="2">Otro tipo de acabado o material.</option>
				</select>
			</li>

    </ul>
    <ul class="right-form">
	            <br><br>
			<br>
			<br>
			<br>
			<h4>Fecha de Nacimiento:</h4>
			<br>
	        <li>
	        	<input type="date" name="fec_nac" value="2000-01-05" required/></a>	
	        	<div class="clear"> </div>
	        </li>
			<h4>Sexo:</h4>
			<br>
	        <li>
				<select form="form" id="id_sexo" name="sexo" required>
					<option disabled selected value>Seleccione Sexo</option>
						<option selected value="M">Masculino</option>
						<option value="F">Femenino</option>
				</select>
				<div class="clear"> </div>
	        </li>
			<h4>Estado Civil:</h4>
			<br>
	        <li>
	        	<select form="form" id="id_edo_civil" name="edo_civil" required>
					<option disabled selected value>Estado Civil</option>
					<?php
						if(isset($edos_civiles)){
							foreach ($edos_civiles as $edo_civil) {
								echo '<option selected value="'.$edo_civil["id_edo_civil"].'">'.$edo_civil["nombre"].'</option>';
							}
						}
					 ?>
						<!--
						<option value="1">Soltero(a)</option>
						<option value="2">Casados</option>
						<option value="3">Unión Libre</option>
						<option value="4">Divorciados</option>
						<option value="5">Separados</option>
						<option value="6">Viudos</option>-->
				</select>
				<div class="clear"> </div>
	        </li>
	        <h4>Tiene Hijos:</h4>
			<br>
			<li>
				<select form="form" id="id_hijos" name="hijos" required>
					<option disabled selected value>Hijos</option>
						<option selected value="1">Si</option>
						<option value="0">No</option>
				</select>
				<div class="clear"> </div>
	        </li>
			<h4>Ciudad:</h4>
			<br>
	        <li>
				<input  type="text" name="ciudad" placeholder="Ciudad" value="ASD" required/></a>
				<div class="clear"> </div>
       		 </li> 
			 <h4>Número de Teléfono:</h4>
			<br>
       		 <li>
	        	<input type="text" name="telefono" placeholder="Número de Teléfono" value="123" required/></a>
	        	<div class="clear"> </div>
	        </li>
			 <h4>Número de Celular:</h4>
			<br>
	        <li>
	        	<input type="text" name="celular" placeholder="Número de Celular" value="123" required/></a>
	        	<div class="clear"> </div>
	        </li>
			 <h4>Correo electrónico:</h4>
			<br>
	        <li>
	        	<input type="email" name="correo" placeholder="Correo electrónico" value="ASD@asd.com" required/></a>
	        	<div class="clear"> </div>
	        </li>
			<br>
	        <br>
	        <br>
	        <br>
	        <br>
	        <br>
	        <br>
	        <br>
			<h4>Edad del Padre o Tutor:</h4>
	        <br>
	        <li>
				<input type="number" name="padre_edad" placeholder="Edad del Padre o Tutor" value="12" required/></a>
				<div class="clear"> </div>
        	</li> 
			<h4>...:</h4>
	        <br>
	        <li>
	        	<select form="form" id="id_vive_padre" name="padre_vivo_muerto" required>
					<option disabled selected value>Situación</option>
					<option selected  value="1">Vive</option>
					<option value="2">Finado</option>
				</select>
				<div class="clear"> </div>
	        </li>
			<h4>Nivel educativo del padre:</h4>
	        <br>
			<li>
			<select required form="form" name="padre_escolaridad">
				<option selected disabled>Nivel educativo del padre</option>
				<?php
					if(isset($niveles_educativos)){
						foreach ($niveles_educativos as $nivel) {
							echo '<option selected  value="'.$nivel["id_nivel"].'">'.$nivel["nombre"].'</option>';
						}
					}
				 ?>
			</select>
			<div class="clear"> </div>
			</li>
			<h4>Ocupación:</h4>
	        <br>
			<li>
				<input  type="text" name="padre_ocupacion" placeholder="Ocupación del padre o tutor" value="32"   required/></a>
				<div class="clear"> </div>
        	</li> 
	        <br>
	        <br>
	        <br>
			<h4>Edad:</h4>
	        <br>
	        <li>
				<input  type="text" name="madre_edad" placeholder="Edad de la Madre" value="32" required/></a>
				<div class="clear"> </div>
	        </li> 
			<h4>...:</h4>
	        <br>
	        <li>
	        	<select form="form" id="id_vive_madre" name="madre_vivo_muerto" required>
					<option disabled selected value>Situación</option>
						<option selected value="1">Vive</option>
						<option value="2">Finado</option>
				</select>
				<div class="clear"> </div>
	        </li>
			<h4>Nivel educativo de la madre:</h4>
	        <br>
	        <li>
			<select required form="form" name="madre_escolaridad">
				<option selected disabled>Nivel educativo de la madre</option>
				<?php
					if(isset($niveles_educativos)){
						foreach ($niveles_educativos as $nivel) {
							echo '<option selected  value="'.$nivel["id_nivel"].'">'.$nivel["nombre"].'</option>';
						}
					}
				 ?>
			</select>
			<div class="clear"> </div>
		</li>
		<h4>Ocupación:</h4>
	        <br>
        <li>
			<input  type="text" name="madre_ocupacion" placeholder="Ocupación"  value="1" required/></a>
			<div class="clear"> </div>
        </li>        
         <br>
         <br>
         <h4>¿Cuántas de ellas estudian?</h4> 
         <br>
        	<li>
				<input  type="number" name="cuantas_estudian" placeholder="" value="1" required/></a>
				<div class="clear"> </div>
        	</li>
        	<h4>¿En qué niveles educativos?</h4> 
        	<br>
        	<li>
				<input  type="text" name="en_que_niveles" placeholder="" value="1"  required/></a>
				<div class="clear"> </div>
        	</li> 

        	<br>
        	<br>
        	<br>
        	<br>
			<h4>Turno:</h4>
        	<br>
	         <li>
				<select form="form" id="id_turno" name="turno" required>
					<option disabled selected value>Selecciona turno</option>
					<?php
						if(isset($turnos)){
							foreach ($turnos as $turno) {
								echo '<option selected  value="'.$turno["id_turno"].'">'.$turno["nombre"].'</option>';
							}
						}
					 ?>
				</select>
				<div class="clear"> </div>
        	</li>
			<h4>Semestre o Grado:</h4>
        	<br>
        	 <li>
				<input  type="text" name="grado" placeholder="Semestre o Grado" value="2"   required/></a>
				<div class="clear"> </div>
        	</li>
			<h4>Promedio:</h4>
        	<br>
        	 <li>
				<input  type="text" name="promedio" placeholder="Promedio" value="2"  required/></a>
				<div class="clear"> </div>
        	</li>
			<h4>Tipo de Incripción:</h4>
        	<br><div class="clear"> </div>
        	<li>
	        	<select form="form" id="id_ingreso" name="ingreso" required>
					<option disabled selected value>Tipo de Incripción</option>
						<option selected value="1">Nuevo Ingreso</option>
						<option value="2">Reingreso</option>
				</select>
				<div class="clear"> </div>
	        </li>
	        <br>
	        <br>
	        <br>
	        <br>
	        <br>
			 <h4>6.-¿Cuántos automóviles propios, excluyendo taxis, tienen en su hogar?</h4><br><div class="clear"> </div>
            <li>
            	<select form="form"  name="p6" id="p6" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option selected value="1">Ninguno</option>
						<option value="2">1</option>
						<option value="3">2 </option>
						<option value="4">3 o más.</option>
				</select>
				<div class="clear"> </div>
			</li>
			<h4>7.-¿Cuántas computadoras personales, ya sea de escritorio o laptop, tiene funcionando en su hogar?</h4>
            <br><div class="clear"> </div><li>
            	<select form="form"  name="p7" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option selected value="1">Ninguno</option>
						<option value="2">1</option>
						<option value="3">2 o más.</option>
				</select>
				<div class="clear"> </div>
			
			</li>
			<h4>8.-¿Cuántas computadoras personales, ya sea de escritorio o laptop, tiene funcionando en su hogar?</h4>
            <br><div class="clear"> </div><li>
            	<select form="form"  name="p8" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option selected value="1">Ninguno</option>
						<option value="2">1</option>
						<option value="3">2 o más.</option>
				</select>
				<div class="clear"> </div>
			</li>
			<h4>9.-¿En su hogar cuentan con estufa de gas o eléctrica?</h4><br><div class="clear"> </div>
            <li>
            	<select form="form"  name="p9" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option value="1">No tiene.</option>
						<option selected value="2">Si tiene.</option>						
				</select>
				<div class="clear"> </div>
			</li>
			<h4>10.-Pensando en la persona que aporta la mayor parte del ingreso a su hogar, ¿Cuál fue el último año de estudios que completó?, ¿Realizó otros estudios?</h4>
            <br>
			<div class="clear"> </div><li>
            	<select form="form"  name="p10" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option selected value="1">No estudió.</option>
						<option value="2">Primaria Incompleta.</option>
						<option value="3">Primaria Completa.</option>
						<option value="4">Secundaria Incompleta.</option>
						<option value="5">Secundaria Incompleta.</option>
						<option value="6">Carrera Comercial.</option>
						<option value="7">Carrera Técnica.</option>
						<option value="8">Preparatoria Incompleta.</option>
						<option value="9">Preparatoria Completa.</option>
						<option value="10">Licenciatura Incompleta.</option>
						<option value="11">Licenciatura Completa.</option>
						<option value="12">Diplomado o Maestría.</option>
						<option value="13">Doctorado.</option>
						<option value="14">No sé.</option>
				</select>
				<div class="clear"> </div>
			</li>
			<h4>Estado:</h4><br>
        	<li>
	        	<select form="form" id="id_ingreso" name="ingreso" required>
					<option disabled selected value>Estado</option>
						<option selected value="1">Nuevo Ingreso</option>
						<option value="2">Reingreso</option>
				</select>
				<div class="clear"> </div>
	        </li>
        	<li>
        		  <?php echo form_error('g-recaptcha-response','<div style="color:red;">','</div>');?>
        		<div class="g-recaptcha" data-sitekey="6Lc7yCUTAAAAAHp5VeVPxlKuK0rEyElECzsoWIhn"></div>
        	</li>
				<input type="submit" name="enviar" value="Registrar"/>
		
		   <div class="clear"> </div>
        </ul>
        <div class="clear"> </div>
</form>
</div>
</html>
<body>