
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
	<form id="form" method="post" action="">
		
		<ul class="left-form">
          <h2>DATOS PERSONALES</h2>
		<li>
			<input  type="text" name="nombre" placeholder="Nombre" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
        	<input  type="text" name="apellido_paterno" placeholder="Apellido Paterno" required/></a>
			<div class="clear"> </div>
        </li> 
		<li>
			<input  type="text" name="apellido_materno" placeholder="Apellido Materno" required/></a>
			<div class="clear"> </div>
        </li> 
       
       <li>
			<input  type="text" name="calle" placeholder="Calle" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
			<input  type="text" name="numero" placeholder="Número" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
			<input  type="text" name="colonia" placeholder="Colonia" required/></a>
			<div class="clear"> </div>
        </li> 
         <li>
			<input  type="text" name="entre1" placeholder="Calle" required/></a>
			<div class="clear"> </div>
			<input  type="text" name="entre2" placeholder="Calle" required/></a>
        </li> 
        <li>
			<input  type="text" name="cerca_de" placeholder="Cerca de..." required/></a>
			<div class="clear"> </div>
        </li> 
             
             <h2>DATOS FAMILIARES</h2>
        <li>
			<input  type="text" name="nombre_padre" placeholder="Nombre del Padre o Tutor" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
        	<input  type="text" name="apellido_paterno" placeholder="Apellido Paterno" required/></a>
			<div class="clear"> </div>
        </li> 
		<li>
			<input  type="text" name="apellido_materno" placeholder="Apellido Materno" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
			<input  type="text" name="ocupacion" placeholder="Ocupación" required/></a>
			<div class="clear"> </div>
        </li> 
         <li>
			<input  type="text" name="nombre_madre" placeholder="Nombre de la Madre" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
        	<input  type="text" name="apellido_paterno" placeholder="Apellido Paterno" required/></a>
			<div class="clear"> </div>
        </li> 
		<li>
			<input  type="text" name="apellido_materno" placeholder="Apellido Materno" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
			<input  type="text" name="ocupacion" placeholder="Ocupación" required/></a>
			<div class="clear"> </div>
        </li> 
        <li>
	        	<select form="form" id="id_nivel" name="estciv_pad" required>
					<option disabled selected value>Estado Civil</option>
						<option value="1">Soltero(a)</option>
						<option value="2">Casados</option>
						<option value="3">Unión Libre</option>
						<option value="4">Divorciados</option>
						<option value="5">Separados</option>
						<option value="6">Viudos</option>
				</select>
				<div class="clear"> </div>
	        </li>
	        <li>
		        <h3>Actualmente, ¿Con quién vives?</h3>
				<input  type="text" name="conquien_vive" placeholder="" required/></a>
				<div class="clear"> </div>
        	</li> 
        	 <li>
		        <h3>¿Cuántas personas dependen del ingreso familiar?</h3>
				<input  type="text" name="ingreso" placeholder="" required/></a>
				<div class="clear"> </div>
        	</li> 
        	<li>
		        <h3>¿Cuántas de ellas estudian?</h3>
				<input  type="text" name="cuant_est" placeholder="" required/></a>
				<div class="clear"> </div>
        	</li> 
        	<li>
		        <h3>¿En qué niveles educativos?</h3>
				<input  type="text" name="niv_edu" placeholder="" required/></a>
				<div class="clear"> </div>
        	</li> 

	          <h2>DATOS ESCOLARES</h2>
	          <li>
				<input  type="text" name="esc_prod" placeholder="Escuela" required/></a>
				<div class="clear"> </div>
        	</li>
        	 <li>
				<input  type="text" name="carrera" placeholder="Carrera" required/></a>
				<div class="clear"> </div>
        	</li>

    </ul>
    <ul class="right-form">
	            <br><br>
	     
	       
	        <li>
	        	<input type="date" name="fecha_nac" required/></a>	
	        	<div class="clear"> </div>
	        </li>

	        <li>
				<select form="form" id="id_nivel" name="id_nivel" required>
					<option disabled selected value>Sexo</option>
						<option value="1">Mascuino</option>
						<option value="2">Femenino</option>
				</select>
				<div class="clear"> </div>
	        </li>
	        <li>
	        	<select form="form" id="id_nivel" name="id_nivel" required>
					<option disabled selected value>Estado Civil</option>
						<option value="1">Soltero(a)</option>
						<option value="2">Casado(a)</option>
						<option value="3">Unión Libre</option>
						<option value="4">Divorciado(a)</option>
						<option value="5">Separado(a)</option>
						<option value="6">Viudo(a)</option>
				</select>
				<div class="clear"> </div>
	        </li>
	        <li>
				<select form="form" id="id_nivel" name="id_nivel" required>
					<option disabled selected value>Hijos</option>
						<option value="1">Si</option>
						<option value="2">No</option>
				</select>
				<div class="clear"> </div>
	        </li>
	        <li>
				<input  type="text" name="ciudad" placeholder="Ciudad" required/></a>
				<div class="clear"> </div>
       		 </li> 
       		 <li>
	        	<input type="text" name="telefono" placeholder="Número de Teléfono" required/></a>
	        	<div class="clear"> </div>
	        </li>
	        <li>
	        	<input type="text" name="telefono" placeholder="Número de Teléfono" required/></a>
	        	<div class="clear"> </div>
	        </li>
	        <li>
	        	<input type="email" name="correo" placeholder="Correo electrónico" required/></a>
	        	<div class="clear"> </div>
	        </li>
	         <li>
			<input  type="text" name="edad_pad" placeholder="Edad Padre" required/></a>
			<div class="clear"> </div>
        </li> 
	        <li>
	        	<select form="form" id="id_nivel" name="id_sit" required>
					<option disabled selected value>Situación</option>
						<option value="1">Vive</option>
						<option value="2">Finado</option>
				</select>
				<div class="clear"> </div>
	        </li>
	        <li>
			<input  type="text" name="edad_mad" placeholder="Edad Madre" required/></a>
			<div class="clear"> </div>
        </li> 
	        <li>
	        	<select form="form" id="id_nivel" name="id_sit_madre" required>
					<option disabled selected value>Situación</option>
						<option value="1">Vive</option>
						<option value="2">Finado</option>
				</select>
				<div class="clear"> </div>
	        </li>
	         <li>
				<input  type="text" name="turno" placeholder="Turno" required/></a>
				<div class="clear"> </div>
        	</li>
        	 <li>
				<input  type="text" name="Sem_grad" placeholder="Semestre o Grado" required/></a>
				<div class="clear"> </div>
        	</li>
        	 <li>
				<input  type="text" name="prom" placeholder="Promedio" required/></a>
				<div class="clear"> </div>
        	</li>
        	<li>
	        	<select form="form" id="id_nivel" name="id_sit" required>
					<option disabled selected value>Estado</option>
						<option value="1">Nuevo Ingreso</option>
						<option value="2">Reingreso</option>
				</select>
				<div class="clear"> </div>
	        </li>


				<input type="submit" name="enviar" value="Registrar"/>
		
		   <div class="clear"> </div>
        </ul>
        <div class="clear"> </div>
</form>
</div>
</html>