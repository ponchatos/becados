<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form id="form_becar" name="form_becar" method="post" action="<?=base_url()?>dashboard/becar">

	<input type="text" name="id_solicitud" value="9"/>


	Nombre:
	<input type="text" name="nombre" disabled/>
	Recomendado por:
	<input type="text" name="recomendado" />
	Observación:
	<input type="text" name="observacion_becado" />
	Carta compromiso:
	<input type="radio" name="car_compromiso" value="0" checked/>No<br>
	<input type="radio" name="car_compromiso" value="1" />Si<br>
	Formulario:
	<input type="radio" name="formulario_IB" value="0" checked/>No<br>
	<input type="radio" name="formulario_IB" value="1" />Si<br>
	Facebook:
	<input type="text" name="facebook"/>
	Habilidades:
	Artisticas:
	<input type="text" name="h_artisticas"/>
	Deportivas:
	<input type="text" name="h_deportivas"/>
	Civicas:
	<input type="text" name="h_civicas"/>
	Lenguaje:
	<input type="text" name="h_lenguaje"/>
	Puntaje:
	<input type="text" name="puntaje"/>
	V:
	<input type="text" name="v"/>
	Diagnostico Social:
	<textarea form="form_becar" name="diagnostico_social" cols="50" rows="6" maxlength="400"></textarea>
	<br>
	Crear usuario:
	<input type="text" name="username" required/>
	Contraseña:
	<input type="password" name="password" required/>
	Confirmar contraseña:
	<input type="password" name="confirm_password" required>
	<input type="button" onclick="generate_password();" value="Generar Contraseña">
	<input type="button" onclick="toggle_password();" value="Ver/Ocultar Contraseña">
	
	<br>
	<input type="submit" value="Becar"/>

	<div id="div_modalMessage" class="w3-container w3-red w3-card-8">
		<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
		<div id="modalMessage"></div>
	</div>
	
	
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#form_becar").submit(function(event){
		//event.preventDefault();
		if($("input[name=password").val()!=$("input[name=confirm_password").val()){
			$("#modalMessage").text("Los campos de contraseña no coinciden");
			return false;
		}
		$("#form_becar").submit();
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
</body>
</html>