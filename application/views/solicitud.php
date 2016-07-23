
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="<?php echo base_url();?>css/styles.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
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
  
  <br>
	<form id="form" method="post" action="<?php echo base_url();?>solicitud/registrar_solicitud">
		
		<ul class="left-form">
		<li>
			<select required form="form" name="nivel_educativo">
				<option selected disabled>Selecciona nivel educativo</option>
				<?php
					if(isset($niveles_educativos)){
						foreach ($niveles_educativos as $nivel) {
							echo '<option selected value="'.$nivel["id_nivel"].'">'.$nivel["nombre"].'</option>';
						}
					}
				 ?>
			</select>
		</li>
          <h2>DATOS PERSONALES</h2>
		<li>
			<input  type="text" name="nombre" placeholder="Nombre" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
        	<input  type="text" name="ape_pat" placeholder="Apellido Paterno" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
		<li>
			<input  type="text" name="ape_mat" placeholder="Apellido Materno" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
       
       <li>
			<input  type="text" name="calle" placeholder="Calle" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
			<input  type="text" name="num_casa" placeholder="Número de casa" value="123" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
			<input  type="text" name="colonia" placeholder="Colonia" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
         <li>
			<input  type="text" name="entre_calle_1" placeholder="Entre Calle" value="ASD" required/></a>
			<div class="clear"> </div>
			<input  type="text" name="entre_calle_2" placeholder="y Calle" value="ASD" required/></a>
        </li> 
        <li>
			<input  type="text" name="cerca_de" placeholder="Cerca de" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
             
             <h2>DATOS FAMILIARES</h2>
        <li>
			<input  type="text" name="padre_nombre" placeholder="Nombre del Padre o Tutor" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
        	<input  type="text" name="padre_ape_pat" placeholder="Apellido Paterno del Padre o Tutor" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
		<li>
			<input  type="text" name="padre_ape_mat" placeholder="Apellido Materno del Padre o Tutor" value="ASD" required/></a>
			<div class="clear"> </div>
        </li>
        <li>
			<select required form="form" name="padre_escolaridad">
				<option selected disabled>Nivel educativo del padre</option>
				<?php
					if(isset($niveles_educativos)){
						foreach ($niveles_educativos as $nivel) {
							echo '<option selected value="'.$nivel["id_nivel"].'">'.$nivel["nombre"].'</option>';
						}
					}
				 ?>
			</select>
		</li>
        <li>
			<input  type="text" name="padre_ocupacion" placeholder="Ocupación del padre o tutor" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
         <li>
			<input  type="text" name="madre_nombre" placeholder="Nombre de la Madre" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
        	<input  type="text" name="madre_ape_pat" placeholder="Apellido Paterno de la Madre" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
		<li>
			<input  type="text" name="madre_ape_mat" placeholder="Apellido Materno de la Madre" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
			<select required form="form" name="madre_escolaridad">
				<option selected disabled>Nivel educativo de la madre</option>
				<?php
					if(isset($niveles_educativos)){
						foreach ($niveles_educativos as $nivel) {
							echo '<option selected value="'.$nivel["id_nivel"].'">'.$nivel["nombre"].'</option>';
						}
					}
				 ?>
			</select>
		</li>
        <li>
			<input  type="text" name="madre_ocupacion" placeholder="Ocupación" value="ASD" required/></a>
			<div class="clear"> </div>
        </li> 
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
        	 <li>
		        <h3>¿Cuántas personas dependen del ingreso familiar?</h3>
				<input  type="number" name="personas_dependen_ingreso" placeholder="" value="3" required/></a>
				<div class="clear"> </div>
        	</li> 
        	<li>
		        <h3>¿Cuántas de ellas estudian?</h3>
				<input  type="number" name="cuantas_estudian" placeholder="" value="1" required/></a>
				<div class="clear"> </div>
        	</li> 
        	<li>
		        <h3>¿En qué niveles educativos?</h3>
				<input  type="text" name="en_que_niveles" placeholder="" value="ASD" required/></a>
				<div class="clear"> </div>
        	</li> 

	          <h2>DATOS ESCOLARES</h2>
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
        	 <li>
				<input  type="text" name="carrera" placeholder="Carrera" value="ASD" required/></a>
				<div class="clear"> </div>
        	</li>

    </ul>
    <ul class="right-form">
	            <br><br>
	     
	       
	        <li>
	        	<input type="date" name="fec_nac" value="2000-01-05" required/></a>	
	        	<div class="clear"> </div>
	        </li>

	        <li>
				<select form="form" id="id_sexo" name="sexo" required>
					<option disabled selected value>Seleccione Sexo</option>
						<option selected value="M">Masculino</option>
						<option value="F">Femenino</option>
				</select>
				<div class="clear"> </div>
	        </li>
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
	        <li>
				<select form="form" id="id_hijos" name="hijos" required>
					<option disabled selected value>Hijos</option>
						<option selected value="1">Si</option>
						<option value="0">No</option>
				</select>
				<div class="clear"> </div>
	        </li>
	        <li>
				<input  type="text" name="ciudad" placeholder="Ciudad" value="ASD" required/></a>
				<div class="clear"> </div>
       		 </li> 
       		 <li>
	        	<input type="text" name="telefono" placeholder="Número de Teléfono" value="123" required/></a>
	        	<div class="clear"> </div>
	        </li>
	        <li>
	        	<input type="text" name="celular" placeholder="Número de Celular" value="123" required/></a>
	        	<div class="clear"> </div>
	        </li>
	        <li>
	        	<input type="email" name="correo" placeholder="Correo electrónico" value="ASD@asd.com" required/></a>
	        	<div class="clear"> </div>
	        </li>
	        <li>
				<input type="number" name="padre_edad" placeholder="Edad del Padre o Tutor" value="12" required/></a>
				<div class="clear"> </div>
        	</li> 
	        <li>
	        	<select form="form" id="id_vive_padre" name="padre_vivo_muerto" required>
					<option disabled selected value>Situación</option>
					<option selected value="1">Vive</option>
					<option value="2">Finado</option>
				</select>
				<div class="clear"> </div>
	        </li>
	        <li>
				<input  type="text" name="madre_edad" placeholder="Edad de la Madre" value="32" required/></a>
				<div class="clear"> </div>
	        </li> 
	        <li>
	        	<select form="form" id="id_vive_madre" name="madre_vivo_muerto" required>
					<option disabled selected value>Situación</option>
						<option selected value="1">Vive</option>
						<option value="2">Finado</option>
				</select>
				<div class="clear"> </div>
	        </li>
	         <li>
				<select form="form" id="id_turno" name="turno" required>
					<option disabled selected value>Selecciona turno</option>
					<?php
						if(isset($turnos)){
							foreach ($turnos as $turno) {
								echo '<option selected value="'.$turno["id_turno"].'">'.$turno["nombre"].'</option>';
							}
						}
					 ?>
				</select>
        	</li>
        	 <li>
				<input  type="text" name="grado" placeholder="Semestre o Grado" value="ASD" required/></a>
				<div class="clear"> </div>
        	</li>
        	 <li>
				<input  type="text" name="promedio" placeholder="Promedio" value="5" required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
	        	<select form="form" id="id_ingreso" name="ingreso" required>
					<option disabled selected value>Estado</option>
						<option selected value="1">Nuevo Ingreso</option>
						<option value="2">Reingreso</option>
				</select>
				<div class="clear"> </div>
	        </li>
	        <li>
				<input  type="text" name="p1" placeholder="P1" value="2" required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
				<input  type="text" name="p2" placeholder="P2" value="2" required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
				<input  type="text" name="p3" placeholder="P3" value="2" required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
				<input  type="text" name="p4" placeholder="P4" value="2" required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
				<input  type="text" name="p5" placeholder="P5" value="2" required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
				<input  type="text" name="p6" placeholder="P6" value="2" required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
				<input  type="text" name="p7" placeholder="P7" value="2" required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
				<input  type="text" name="p8" placeholder="P8" value="2" required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
				<input  type="text" name="p9" placeholder="P9" value="2" required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
				<input  type="text" name="p10" placeholder="P10" value="2" required/></a>
				<div class="clear"> </div>
        	</li>

				<input type="submit" name="enviar" value="Registrar"/>
		
		   <div class="clear"> </div>
        </ul>
        <div class="clear"> </div>
</form>
</div>
</html>