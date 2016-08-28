
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
		
          <h2>DATOS PERSONALES</h2>
		<li>
			<input  type="text" name="nombre" placeholder="Nombre"  required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
        	<input  type="text" name="ape_pat" placeholder="Apellido Paterno"  required/></a>
			<div class="clear"> </div>
        </li> 
		<li>
			<input  type="text" name="ape_mat" placeholder="Apellido Materno"  required/></a>
			<div class="clear"> </div>
        </li> 
       
       <li>
			<input  type="text" name="calle" placeholder="Calle"  required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
			<input  type="text" name="num_casa" placeholder="Número de casa"  required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
			<input  type="text" name="colonia" placeholder="Colonia"  required/></a>
			<div class="clear"> </div>
        </li> 
         <li>
			<input  type="text" name="entre_calle_1" placeholder="Entre Calle"  required/></a>
			<div class="clear"> </div>
			<input  type="text" name="entre_calle_2" placeholder="y Calle"  required/></a>
        </li> 
        <li>
			<input  type="text" name="cerca_de" placeholder="Cerca de"  required/></a>
			<div class="clear"> </div>
        </li> 
        <br><br>
             
             <h2>DATOS FAMILIARES</h2>
        <li>
			<input  type="text" name="padre_nombre" placeholder="Nombre del Padre o Tutor"  required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
        	<input  type="text" name="padre_ape_pat" placeholder="Apellido Paterno del Padre o Tutor"  required/></a>
			<div class="clear"> </div>
        </li> 
		<li>
			<input  type="text" name="padre_ape_mat" placeholder="Apellido Materno del Padre o Tutor"  required/></a>
			<div class="clear"> </div>
        </li>
       <br>
       <br>
       <br>
       <br>
         <li>
			<input  type="text" name="madre_nombre" placeholder="Nombre de la Madre"  required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
        	<input  type="text" name="madre_ape_pat" placeholder="Apellido Paterno de la Madre"  required/></a>
			<div class="clear"> </div>
        </li> 
		<li>
			<input  type="text" name="madre_ape_mat" placeholder="Apellido Materno de la Madre"  required/></a>
			<div class="clear"> </div>
        </li> 
        
        <li>
	        	<select form="form" id="id_edo_civil_padres" name="edo_civil_padres" required>
					<option disabled selected value>Estado Civil de los Padres</option>
					<?php
						if(isset($edos_civiles)){
							foreach ($edos_civiles as $edo_civil) {
								echo '<option value="'.$edo_civil["id_edo_civil"].'">'.$edo_civil["nombre"].'</option>';
							}
						}
					 ?>
						<!--
						<option value="1">Soltero(a)</option>
						<option >Casados</option>
						<option value="3">Unión Libre</option>
						<option value="4">Divorciados</option>
						<option value="5">Separados</option>
						<option value="6">Viudos</option>-->
				</select>
				<div class="clear"> </div>
	        </li>
	        <br>
	        <br>
	        <h4>Actualmente, ¿Con quién vives?</h4>
	        <br>
	        <li>
				<input  type="text" name="vive_con" placeholder=""  required/></a>
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
	          <li>
			<select required form="form" name="nivel_educativo">
				<option selected disabled>Selecciona nivel educativo</option>
				<?php
					if(isset($niveles_educativos)){
						foreach ($niveles_educativos as $nivel) {
							echo '<option  value="'.$nivel["id_nivel"].'">'.$nivel["nombre"].'</option>';
						}
					}
				 ?>
			</select>
		</li>
	          <li>
				<select form="form" id="id_escuela" name="escuela"  required>
					<option disabled selected value>Seleccione Escuela</option>
					<?php
						if(isset($escuelas)){
							foreach ($escuelas as $escuela) {
								echo '<option  value="'.$escuela["id_escuela"].'">'.$escuela["nombre"].'</option>';
							}
						}
					 ?>
				</select>
				<div class="clear"> </div>
        	</li>
        	 <li>
				<input  type="text" name="carrera" placeholder="Carrera"  required/></a>
				<div class="clear"> </div>
        	</li>
        	<br>
        	<br>

        	<h2>ESTUDIO SOCIO-ECONÓMICO</h2>
        	
        	 <h4>Seleccione la respuesta que considere correcta dependiendo de sus situación, trate de ser lo más exacto posible.</h4>
        	 <br>
        	 <br>
        	 <br>
        	 <h4>1.-¿Cuál es el total de cuartos, piezas o habitaciones con que cuenta su hogar?, por favor 
        	 	no incluya baños, medios baños, pasillos, patios y zotehuelas.</h4>
        	 <li>
            	<select form="form"  name="p1" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7 o más.</option>
				</select>
            </li>
            <br>
            <br>
            <h4>2.-¿Cuántos baños completos con regadera y W.C. (excusado)  hay parab uso exclusivo de los integrantes de su hogar?</h4>
            <br>
            <li>
            	<select form="form"  name="p2" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4 o más.</option>
				</select>
				<br>
				<br>
            </li>
            <h4>3.-¿En el hogar cuenta co regadera funcionando en alguno de los baños?</h4>
            <li>
            	<select form="form"  name="p3" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option value="1">No tiene.</option>
						<option value="2">Si tiene.</option>
				</select>
			</li>
			 <h4>4.-Contando todos los focos que utiliza para iluminar su hogar, incluyendo los techos, paredes y lámparas de buró o piso, ¿cuántos focos tiene su vivienda?</h4>
            <li>
            	<select form="form"  name="p4" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option value="1">De 0 a 5</option>
						<option value="1">De 6 a 10</option>
						<option value="1">De 11 a 15</option>
						<option value="1">De 16 a 20</option>
						<option value="1">21 o más.</option>

				</select>
			</li>
			 <h4>5.-El piso de su hogar es predominantemente de tierra, o de cemento, o de algún otro tipo de acabado?</h4>
            <li>
            	<select form="form"  name="p5" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option value="1">Tierra o cemento (firme de).</option>
						<option value="1">Otro tipo de acabado o material.</option>
				</select>
			</li>
    </ul>
    <ul class="right-form">
	            <br><br>
	     
	       <br>
	       <br>
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
								echo '<option value="'.$edo_civil["id_edo_civil"].'">'.$edo_civil["nombre"].'</option>';
							}
						}
					 ?>
						<!--
						<option value="1">Soltero(a)</option>
						<option >Casados</option>
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
				<input  type="text" name="ciudad" placeholder="Ciudad"  required/></a>
				<div class="clear"> </div>
       		 </li> 
       		 <li>
	        	<input type="text" name="telefono" placeholder="Número de Teléfono"  required/></a>
	        	<div class="clear"> </div>
	        </li>
	        <li>
	        	<input type="text" name="celular" placeholder="Número de Celular"  required/></a>
	        	<div class="clear"> </div>
	        </li>
	        <li>
	        	<input type="email" name="correo" placeholder="Correo electrónico"  required/></a>
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
	        <li>
				<input type="number" name="padre_edad" placeholder="Edad del Padre o Tutor"  required/></a>
				<div class="clear"> </div>
        	</li> 
	        <li>
	        	<select form="form" id="id_vive_padre" name="padre_vivo_muerto" required>
					<option disabled selected value>Situación</option>
					<option selected value="1">Vive</option>
					<option >Finado</option>
				</select>
				<div class="clear"> </div>
	        </li>
	         
	         <li>
			<select required form="form" name="padre_escolaridad">
				<option selected disabled>Nivel educativo del padre</option>
				<?php
					if(isset($niveles_educativos)){
						foreach ($niveles_educativos as $nivel) {
							echo '<option  value="'.$nivel["id_nivel"].'">'.$nivel["nombre"].'</option>';
						}
					}
				 ?>
			</select>
			</li>
			<li>
				<input  type="text" name="padre_ocupacion" placeholder="Ocupación del padre o tutor"  required/></a>
				<div class="clear"> </div>
        	</li> 
	        <br>
	        <br>
	        <br>
	        <li>
				<input  type="text" name="madre_edad" placeholder="Edad de la Madre"  required/></a>
				<div class="clear"> </div>
	        </li> 
	        <li>
	        	<select form="form" id="id_vive_madre" name="madre_vivo_muerto" required>
					<option disabled selected value>Situación</option>
						<option selected value="1">Vive</option>
						<option >Finado</option>
				</select>
				<div class="clear"> </div>
	        </li>
	        <li>
			<select required form="form" name="madre_escolaridad">
				<option selected disabled>Nivel educativo de la madre</option>
				<?php
					if(isset($niveles_educativos)){
						foreach ($niveles_educativos as $nivel) {
							echo '<option  value="'.$nivel["id_nivel"].'">'.$nivel["nombre"].'</option>';
						}
					}
				 ?>
			</select>
		</li>
        <li>
			<input  type="text" name="madre_ocupacion" placeholder="Ocupación"  required/></a>
			<div class="clear"> </div>
        </li> 
        <br>
        <br>
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
				<input  type="text" name="en_que_niveles" placeholder=""  required/></a>
				<div class="clear"> </div>
        	</li> 

        	<br>
        	<br>
        	<br>
        	<br>
        	<br>
	         <li>
				<select form="form" id="id_turno" name="turno" required>
					<option disabled selected value>Selecciona turno</option>
					<?php
						if(isset($turnos)){
							foreach ($turnos as $turno) {
								echo '<option  value="'.$turno["id_turno"].'">'.$turno["nombre"].'</option>';
							}
						}
					 ?>
				</select>
        	</li>
        	 <li>
				<input  type="text" name="grado" placeholder="Semestre o Grado"  required/></a>
				<div class="clear"> </div>
        	</li>
        	 <li>
				<input  type="text" name="promedio" placeholder="Promedio"  required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
	        	<select form="form" id="id_ingreso" name="ingreso" required>
					<option disabled selected value>Tipo de Incripción</option>
						<option value="1">Nuevo Ingreso</option>
						<option >Reingreso</option>
				</select>
				<div class="clear"> </div>
	        </li>
	        <br>
	        <br>
	        <br>
	        <br>
	        <br>
	         <h4>6.-¿Cuántos automóviles propios, excluyendo taxis, tienen en su hogar?</h4>
            <li>
            	<select form="form"  name="p6" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option value="1">Ninguno</option>
						<option value="1">1</option>
						<option value="1">2 </option>
						<option value="1">3 o más.</option>
				</select>
			</li>
			<h4>7.-¿Cuántas computadoras personales, ya sea de escritorio o laptop, tiene funcionando en su hogar?</h4>
            <li>
            	<select form="form"  name="p7" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option value="1">Ninguno</option>
						<option value="1">1</option>
						<option value="1">2 o más.</option>
				</select>
			</li>
			<h4>8.-¿Cuántas computadoras personales, ya sea de escritorio o laptop, tiene funcionando en su hogar?</h4>
            <li>
            	<select form="form"  name="p8" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option value="1">Ninguno</option>
						<option value="1">1</option>
						<option value="1">2 o más.</option>
				</select>
			</li>
			<h4>9.-¿En su hogar cuentan con estufa de gas o eléctrica?</h4>
            <li>
            	<select form="form"  name="p9" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option value="1">Si tiene.</option>
						<option value="1">No tiene.</option>
				</select>
			</li>
			<h4>10.-Pensando en la persona que aporta la mayor parte del ingreso a su hogar, ¿Cuál fue el último año de estudios que completó?, ¿Realizó otros estudios?</h4>
            <li>
            	<select form="form"  name="p8" required>
					<option disabled selected value>Seleccione una Opción</option>
						<option value="1">No estudió.</option>
						<option value="1">Primaria Incompleta.</option>
						<option value="1">Primaria Completa.</option>
						<option value="1">Secundaria Incompleta.</option>
						<option value="1">Secundaria Incompleta.</option>
						<option value="1">Carrera Comercial.</option>
						<option value="1">Carrera Técnica.</option>
						<option value="1">Preparatoria Incompleta.</option>
						<option value="1">Preparatoria Completa.</option>
						<option value="1">Licenciatura Incompleta.</option>
						<option value="1">Licenciatura Completa.</option>
						<option value="1">Diplomado o Maestría.</option>
						<option value="1">Doctorado.</option>
						<option value="1">No sé.</option>
				</select>
			</li>



	        <br>
	        <br>

				<input type="submit" name="enviar" value="Registrar"/>
		
		   <div class="clear"> </div>
        </ul>
        <div class="clear"> </div>
</form>
</div>
</html>