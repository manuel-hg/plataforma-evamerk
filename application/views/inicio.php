<!DOCTYPE html>
<html lang="es">

<head><meta charset="euc-jp">
    <title>Iniciar login</title>
    
    <meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css">

</head>

<body>
  <div class="cont">
    <div class="logo">
      <img src="<?php echo base_url();?>assets/img/evamerc-logo.png" alt="Logo" class="logo-img">
    </div>
    <div class="form">
      <form method="post">
        <h2>Iniciar Sesi&oacute;n</h2>
        <?php if(@$error_login): ?>
                     <div class="alert alert-danger text-center" role="alert">
                       Error en el usuario o contrase&ntilde;a.
                     </div> 
                     <?php endif; ?>
                     <?php echo @validation_errors(); ?>
        <input type="text" placeholder="USUARIO" id="usuario" name="usuario" value="<?php echo @$_POST['usuario']; ?>">
        <input type="password" placeholder=" CONTRASE&Ntilde;A" name="password" id="password" onkeyup="ocultarboton()" value="<?php echo @$_POST['password']; ?>">
        <img class="pass-toggle" src="<?php echo base_url();?>assets/img/evamerc-pass.png" onkeyup="myFunction()">
        <div class="img-input">
          <input class="img" type="image" id="image" alt="Login" src="<?php echo base_url();?>assets/img/evamerc-login-off.png" required>
        </div>
      </form>
    </div>
  </div>
   <script src="<?php echo base_url();?>assets/js/vendor/jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Custom JS -->
  <script src="<?php echo base_url();?>assets/js/librerias/toggle.js"></script>
</body>
</html>