<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/main.css">
	<title>Becas Patronato</title>
</head>
<body>
<header id="main-header">
        <img  id="logo-header" src="<?php echo base_url();?>css/images/rojo.jpg">
        <nav>
            <ul>
                <li><a href="<?php echo base_url();?>administracion/">REGISTRO</a></li>
                <li><a href="<?php echo base_url();?>administracion/busqueda">BUSQUEDA</a></li>
                <li><a href="<?php echo base_url();?>administracion/listas">LISTAS</a></li>
                <?php
                    if(isset($this->session->userdata['logged_in'])&&$this->session->userdata['logged_in']['privilegios']==99)
                        echo '<li><a href="'.base_url().'administracion/admin_users">ADMINISTRADOR</a></li>';
                ?>
                <li><a href="<?php echo base_url();?>user_authentication/logout">CERRAR SESION</a></li>
            </ul>
        </nav>
 
    </header>
