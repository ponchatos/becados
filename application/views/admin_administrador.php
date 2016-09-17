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

	<style>
		table {
		    border-collapse: collapse;
		    width: 100%;
		}

		th, td {
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}

		thead {
		    background-color: #D20102;
		    color: white;
		}
	</style>


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
		    <ul class="w3-pagination w3-white w3-border-bottom" style="width:100%;">

		   <li><a href="#" class="tablink" id="btn_cUsuarios">CREAR USUARIOS</a></li>
		   <li><a href="#" class="tablink" id="btn_eUsuarios">ELIMINAR USUARIOS</a></li>
				  </ul>


	    	<div id="div_cUsuarios">
	  
						<div class="forms">
								<div class="form-body" data-example-id="simple-form-inline">
									<form class="form-inline"> 
										<div class="form-group"> 
											<label for="exampleInputName2">Usuario:</label> 
											<input type="text" class="form-control" id="exampleInputName2 " name="usuario" required/>
										</div> 
										<div class="form-group"> 
											<label for="exampleInputEmail2">Contraseña:</label> 
											<input type="text" name="password" class="form-control" id="exampleInputName2 " required/>  
										</div> 
										<div class="form-group"> 
												<label for="exampleInputEmail2">Privilegios:</label> 
												<select name="privilegios" form="form_create_user" >
													<option value="50" selected>Auxiliar</option>
													<option value="99">Administrador</option>
												</select>
										</div>			

									</form> 
								</div>
						</div>
			
					
				<div class="forms">
						<div class="form-three widget-shadow">
							<form class="form-horizontal">
								<div class="form-group">
										<label for="disabledinput" class="col-sm-3 control-label">Nombre:</label>
										<div class="col-sm-7">
											<input type="text" name="nombre" class="form-control" required />
										</div>
								</div>
								<div class="form-group">
										<label for="disabledinput" class="col-sm-3 control-label">Apellido Paterno:</label>
										<div class="col-sm-7">
											<input type="text" name="ape_pat" class="form-control" required />
										</div>
								</div>
								<div class="form-group">
										<label for="disabledinput" class="col-sm-3 control-label">Apellido Materno:</label>
										<div class="col-sm-7">
											<input type="text"  name="ape_pmat" class="form-control" required />
											
										</div>
										<input name="submit"  class="col-sm-2" type="submit" value="Registrar">
								</div>
								
							</form>
						</div>
					</div>
			</div>			    		
		    <div id="div_eUsuarios">
				<?php 
			        if($this->session->flashdata("message") != null){
			          echo $this->session->flashdata("message");
			        }
				?>
			
				<table id="tabla_usuarios">
					<thead>
						<tr>
							<th>#</th>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Privilegios</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$cont = 1;
							if(isset($usuarios)){
								foreach ($usuarios as $row) {
									echo "<tr>";
									echo "<td>".$cont."</td>";
									echo "<td>".$row->usuario."</td>";
									echo "<td>".$row->nombre." ".$row->apellido_paterno." ".$row->apellido_materno."</td>";
									echo "<td>".$row->privilegios."</td>";
									$eliminar_text = "<td><form method='post' action='".base_url()."dashboard/administrador_delete_user'><input type='hidden' name='usuario' value='".$row->usuario."'><button>Eliminar</button></form></td>";
									echo $row->privilegios < 99 ? $eliminar_text : "";
									echo "</tr>";
									$cont++;
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
<script type="text/javascript">
$(document).ready(function(){


	$("#div_eUsuarios").hide();

	$("#btn_cUsuarios").click(function(event){
		event.preventDefault();
		$("#div_cUsuarios").show();
		$("#div_eUsuarios").hide();
	});	

	$("#btn_eUsuarios").click(function(event){
		event.preventDefault();
		$("#div_cUsuarios").hide();
		$("#div_eUsuarios").show();
	});	
});
</script>

</body>
</html>