<!DOCTYPE html>
<html>
  <?php
  if (isset($this->session->userdata['logged_in'])) {

    header("location: ".base_url()."dashboard/");
  }?>

  <head>
    <title>Login</title>
    <link href="<?php echo base_url();?>css/style_login.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="im">
      <img src="<?php echo base_url();?>css/images/pat.jpg">
    </div>
   <div class="main ">
    
    <div class="login-form">
      <h1>INICIAR SESIÓN</h1>
          <div class="head">
            <img src="<?php echo base_url();?>css/images/log.jpg" alt=""/>
          </div>
          <?php 
            if($this->session->flashdata("message") != null){
              echo $this->session->flashdata("message");
            }
          ?>
        <form action=<?php echo '"'.base_url().'user_authentication/user_login_process/"'; ?> method="post">
          <?php echo validation_errors(); ?>
            <input type="text" name="username" class="text" placeholder="USUARIO" >
            <input type="password" name="password" placeholder="CONTRASEÑA">
            <div class="submit">
              <input type="submit" onclick="myFunction()" value="ACCEDER" >
          </div>  
        </form>
      </div>
       <div class="bar ">
     <p>SISTEMA DE BECADOS</p>
    </div>
</body>
</html>