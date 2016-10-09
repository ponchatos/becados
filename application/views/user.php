
<!DOCTYPE HTML>
<html>
<head>
<title>SISTEMA DE CONTROL DE BECAS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="<?=base_url();?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="<?=base_url();?>css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="<?=base_url();?>css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="<?=base_url();?>css/icon-font.min.css" type='text/css' />
<link href="<?=base_url();?>css/modal.css" rel='stylesheet' type='text/css' />

</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
			<!-- top_bg -->
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
				<!-- /top_bg -->
				</div>
				<div class="header_bg">
						
							<div class="header">
								<div class="head-t">
									<div class="logo">
										<a href="#"><img src="<?=base_url();?>images/logo_patt.png" class="img-responsive" alt=""> </a>

									</div>
										<!-- start header_right -->
										
							
								<div class="clearfix"> </div>
	<div class="women_main" id="inicio">
   		<div class="w_content" >
				<div class="panel panel-widget forms-panel">
					<div class="forms">
						<div class="panel panel-widget forms-panel">
						<div class="forms">
								<div class="form-body" data-example-id="simple-form-inline">
									<form class="form-inline"> 
										<div class="form-group"> 
											<label for="exampleInputName2">Periodo:</label> 
											<input type="text" class="form-control" id="exampleInputName2 " name="periodo" disabled value="<?php echo isset($periodo)?$periodo:'';?>"/>
										</div> 
										<div class="form-group"> 
											<label for="exampleInputEmail2">Horas del Periodo:</label> 
											<input type="text" name="horas" class="form-control" id="exampleInputName2 " disabled value="<?php echo isset($horas)?$horas:'';?>"/>  
										</div> 
											<label for="exampleInputEmail2">Status:</label> 
											<input type="text" name="status" class="form-control" id="exampleInputName2 " disabled value="<?php echo isset($status)?$status:'';?>"/>
									</form> 
								</div>
						</div>
						</div>
					</div>
					<div class="panel panel-widget forms-panel">
					<div class="forms">
						<div class="form-three widget-shadow">
							<form class="form-horizontal">
								<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Nombre:</label>
										<div class="col-sm-8">
											<input type="text" name="nombre" class="form-control1" id="disabledinput" disabled value="<?php echo isset($nombre)?$nombre:'';?>"/>
										</div>
								</div>
								<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Escuela:</label>
										<div class="col-sm-8">
											<input type="text" name="escuela" class="form-control1" id="disabledinput" disabled value="<?php echo isset($escuela)?$escuela:'';?>"/>
										</div>
								</div>
								<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Grado:</label>
										<div class="col-sm-8">
											<input type="text" name="grado" class="form-control1" id="disabledinput" disabled value="<?php echo isset($grado)?$grado:'';?>"/>
										</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				</div>
		</div>	
	</div>
	<div class="women_main" id="modDatos">
   		<div class="w_content" >
   			<div class="panel panel-widget forms-panel">
					<div class="forms">
						<div class="panel panel-widget forms-panel">
						<div class="forms">
								<div class="form-body" data-example-id="simple-form-inline">
									<form class="form-inline"> 
										<div class="form-group"> 
											<label for="exampleInputName2">Teléfono:</label>
											<input type="text" name="tel" class="form-control" id="exampleInputName2 " disabled value="<?php echo isset($tel)?$tel:'';?>"/> 
										</div> 
										<div class="form-group"> 
											<label for="exampleInputEmail2">Celular:</label> 
											<input type="text" name="cel" class="form-control" id="exampleInputName2 " disabled value="<?php echo isset($cel)?$cel:'';?>"/>
											<button type="submit" class="btn btn-default" id="modify_data">MODIFICAR DATOS</button> 
										</div>
									</form> 
								</div>				
						</div>
						</div>
					</div> 
				</div>
				<div class="panel panel-widget forms-panel">
					<div class="forms">
						<div class="form-three widget-shadow">
							<form class="form-horizontal">
								<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Correo:</label>
										<div class="col-sm-8">
											<input type="text" name="correo" class="form-control1" id="disabledinput" disabled value="<?php echo isset($correo)?$correo:'';?>"/>
										</div>
								</div>
								<div class="form-group">
										<label for="disabledinput" class="col-sm-2 control-label">Facebook:</label>
										<div class="col-sm-8">
											<input type="text" name="face" class="form-control1" id="disabledinput" disabled value="<?php echo isset($face)?$face:'';?>"/>
										</div>
								</div>
							</form>
						</div>
					</div>
				</div>
		</div>	
	</div>

<div class="women_main" id="docs">
   		<div class="w_content" >
   			<div class="panel panel-widget forms-panel">
					<div class="forms">
						<div class="panel panel-widget forms-panel">
						<div class="forms">
								<div class="form-body" data-example-id="simple-form-inline">
									<form class="form-inline">
										<b>
											Formatos de archivos permitidos: gif, jpg y png<br>
											Tamaño y dimensiones máximas: 2MB, 3264px x 2448px.<br>
										</b>
										<div class="form-group"> 
											<label for="exampleInputName2">Compobante de Pago:</label> 
											<button id="btn_compobante" type="submit" class="btn btn-default">SUBIR</button>
										</div> 
										<div class="form-group"> 
											<label for="exampleInputEmail2">Boleta de Calificaciones:</label> 
											<button type="submit" id="btn_boleta" class="btn btn-default">SUBIR</button>
										</div>
									</form> 
								</div>				
						</div>
						</div>
					</div> 
				</div>
		</div>	
	</div>
</div>
</div>
</div>
</div>


<div id="myModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
    	<div class="modal-header" style="height:70px">
	    	<span class="close">×</span>
	    	<CENTER><h3 class="modalTitle">Titulo</h3></CENTER>
  		</div>
  		<div class="div_modify_user">
  			<form id="form_modify_user">
  				<br>
				Teléfono:
				<input id="mod_tel" type="text"  name="mod_tel" required value="<?php echo isset($tel)?$tel:'';?>"/>
				Celular:
				<input id="mod_cel" type="text" name="mod_cel" value="<?php echo isset($cel)?$cel:'';?>"/>
				Correo:
				<input id="mod_correo" type="text" name="mod_correo" value="<?php echo isset($correo)?$correo:'';?>"/>
				Facebook:
				<input id="mod_face" type="text" name="mod_face" value="<?php echo isset($face)?$face:'';?>"/>
				<br>
				<br>
				<br>

				<center><button id="send_modify_data" >GUARDAR CAMBIOS</button></center>
			</form>
  		</div>
  		<center><div class="modalImg">
  			<a style="display:none" class="a_comprobante a_pago" href="<?php if(isset($comprobantes['pago'])) echo base_url()."".$comprobantes['pago']['url']; ?>" target="_blank">
  				<img class="img_pago" src="<?php if(isset($comprobantes['pago'])) echo base_url()."".$comprobantes['pago']['url']; ?>" width="400px"/>
  			</a><br>
  			<a style="display:none" class="a_comprobante a_boleta" href="<?php if(isset($comprobantes['boleta'])) echo base_url()."".$comprobantes['boleta']['url']; ?>" target="_blank">
  				<img class="img_boleta" src="<?php if(isset($comprobantes['boleta'])) echo base_url()."".$comprobantes['boleta']['url']; ?>" width="400px"/>
  			</a><br>
  		</div></center>
  		<center><div class="modal-body">

  		</div></center>
  		
  		<div class="modal-button" >
  			<div class="tool-tips">
  				<div class="tool-tips graph-form">
  					<div class="bs-example-tooltips">
				  		<button id="send_pago" >Cambiar Comprobante</button>
				  		<button id="send_boleta">Cambiar Comprobante</button>
				  		<div class="loader"></div>
		  			</div>
		  		</div>
	  		</div>
  		</div>
  		<div class="modalMessage" style="color:red;"></div>
  	</div>
</div>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<!--//content-inner-->
			<!--/sidebar-menu-->
<div class="sidebar-menu">
	<header class="logo1">
	<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
	</header>
	<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
	<div class="menu">
		<ul id="menu" >
			<li id="btn_inicio"><a href="#"><i class="fa fa-tachometer"></i> <span>INICIO</span></a></li>
			 
		<li id="btn_modDatos"><a href="#"><i class="lnr lnr-pencil"></i> <span>MODIFICAR DATOS</span></a></li>
		<li id="btn_docs"><a href="#"><i class="fa fa-file-text-o"></i> <span>SUBIR DOCUMENTOS</span></a></li>
		<li id="salir" ><a href="<?=base_url()?>user_authentication/logout"><i class="lnr lnr-layers"></i><span>SALIR</span></a></li>
	  </ul>
	</div>
  </div>
  <div class="clearfix"></div>		
<!--</div>-->
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

<script type="text/javascript">
$(document).ready(function() {

	$("#modDatos").hide();
	$("#docs").hide();

	$("#btn_inicio").click(function(event){
		event.preventDefault();
		$("#inicio").show();
		$("#modDatos").hide();
		$("#docs").hide();

	});

	$("#btn_modDatos").click(function(event){
		event.preventDefault();
		$("#modDatos").show();
		$("#inicio").hide();
		$("#docs").hide();

	});

	$("#btn_docs").click(function(event){
		event.preventDefault();
		$("#docs").show();
		$("#inicio").hide();
		$("#modDatos").hide();

	});

});
</script>

<script type="text/javascript">
$(document).ready(function() {
	
	$("#send_pago,#send_boleta,.loader,.div_modify_user").hide();

	$("#modify_data").click(function(event) {
		event.preventDefault();
		$(".modalTitle").text('MODIFICAR DATOS PERSONALES');
		$(".modal-body").text('');
		$(".div_modify_user").show();
		$("#myModal").show();
	});

	$("#form_modify_user").submit(function(e){
		e.preventDefault();
		$(".loader").show();
		var tel=$('#mod_tel').val();
		var cel=$('#mod_cel').val();
		var correo=$('#mod_correo').val();
		var face=$('#mod_face').val();
		jQuery.ajax({
			type: "POST",
			url: "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/dashboard/modify_user",
			dataType: 'json',
			data: {mod_tel:tel,mod_cel:cel,mod_correo:correo,mod_face:face},
			success: function(obj) {
				if(obj.success==1){
					$( "input[name='tel']").val(tel);
					$( "input[name='cel']").val(cel);
					$( "input[name='correo']").val(correo);
					$( "input[name='face']").val(face);
					$(".div_modify_user").hide();
					$("#myModal").hide();
				}else{
					$(".modalMessage").text(obj.message);
				}
				$(".loader").hide();
			},
			error: function(res){
				$(".loader").hide();
				$(".modalMessage").text(res.statusText);
			}
		});
	});


	$("#btn_compobante").click(function(event) {
		event.preventDefault();
		$(".modalTitle").text('COMPROBANTE DE PAGO');
		$(".modal-body,.modalMessage").text('');
		$(".a_pago").show();
		<?php 
		echo '$(".modal-body").append(\'';
		$valid='';
		if(isset($comprobantes['pago'])){
			$valid=$comprobantes['pago']['validacion']==1?'disabled':'';
			if($valid) echo 'Tu comprobante ya fue validado.<br> ';
		}
			echo '<form id="form_pago" method="post" enctype="multipart/form-data">';
			echo '<br><input id="file" type="file" name="userfile" '.$valid.'/><br>';
			
			echo '</form>';
			echo '\');';
		?>
		$("#send_pago").show();
		$("#myModal").show();
	});

	$("#send_pago").click(function(event){
		event.preventDefault();
		var formData = new FormData( $("#form_pago")[0] );
		$(".loader").show();
		$.ajax({
            url : "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/dashboard/upload_comprobante",
            type : 'POST',
            data : formData,
            //async : false,
            cache : false,
            contentType : false,
            processData : false,
            success : function(data) {
                var obj = jQuery.parseJSON(data);
                if(obj.img_success==1){
                	$(".modalMessage").text(obj.img_message);
                	$(".img_pago").attr('src',"<?php echo base_url(); ?>"+obj.img_url);
                	$(".a_pago").attr('href',"<?php echo base_url(); ?>"+obj.img_url);
                }else{
                	$(".modalMessage").text(obj.img_message);
                }
                $(".loader").hide();
            },
            error : function(xhr){
            	$(".modalMessage").text(xhr.statusText);
            	$(".loader").hide();
            }
        });
	});

	$("#btn_boleta").click(function(event) {
		event.preventDefault();
		$(".modalTitle").text('BOLETA DE CALIFICACIONES');
		$(".modal-body,.modalMessage").text('');
		$(".a_boleta").show();
		<?php 
		echo '$(".modal-body").append(\'';
		$valid='';
		if(isset($comprobantes['boleta'])){
			$valid=$comprobantes['boleta']['validacion']==1?'disabled':'';
			if($valid) echo 'Tu comprobante ya fue validado.<br> ';
		}
			echo '<form id="form_boleta" method="post" enctype="multipart/form-data">';
			echo '<input id="file" type="file" name="userfile" '.$valid.'/>';
			
			echo '</form>';
			echo '\');';
		?>
		$("#send_boleta").show();
		$("#myModal").show();
	});

	$("#send_boleta").click(function(event){
		event.preventDefault();
		var formData = new FormData( $("#form_boleta")[0] );
		$(".loader").show();
		$.ajax({
            url : "http://<?php echo $_SERVER['SERVER_NAME']; ?>/becados/dashboard/upload_boleta",
            type : 'POST',
            data : formData,
            //async : false,
            cache : false,
            contentType : false,
            processData : false,
            success : function(data) {
                var obj = jQuery.parseJSON(data);
                if(obj.img_success==1){
                	$(".modalMessage").text(obj.img_message);
                	$(".img_boleta").attr('src',"<?php echo base_url(); ?>"+obj.img_url);
                	$(".a_boleta").attr('href',"<?php echo base_url(); ?>"+obj.img_url);
                }else{
                	$(".modalMessage").text(obj.img_message);
                }
                $(".loader").hide();
            },
            error : function(xhr){
            	$(".modalMessage").text(xhr.statusText);
            	$(".loader").hide();
            }
        });
	});

	$(".close").click(function(event){
		event.preventDefault();
		$("#send_pago,#send_boleta,.loader,.a_pago,.a_boleta,.div_modify_user").hide();
		$("#myModal").hide();
	});

	$(window).click(function(event){
		if(event.target.id == "myModal"){
			$("#send_pago,#send_boleta,.loader,.a_pago,.a_boleta,.div_modify_user").hide();
			$("#myModal").hide();
		}
	});
});
</script>


</body>
</html>
