<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>../assets/home/images/icon.ico">
    <link href="<?php echo base_url();?>assets/css/ajustes.css" rel="stylesheet">

    <title>Registro</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url();?>assets/custombers/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/custombers/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/custombers/css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="bod">

    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-6">
          <div class="card card-register mx-auto mt-5 shadow-lg p-3 mb-5 bg-white rounded">
            <div class="card-header-red">
              <div class="row">
                <div class="col-lg-3 col-sm-12 text-center"><a href="<?php echo base_url();?>"><img  src="<?php echo base_url();?>assets/img/logo_avante.png" alt="Generic placeholder image" id="logo_princ"></a>
                </div>
                <div class="col-lg-6 col-sm-12 text-center">
                  <br>
                  <h5>Registrarse</h5>                 
                </div>
                <div class="col-lg-3"></div>
              </div>                   
            </div>
            <div class="card-body">
              
              <form action="<?php echo base_url();?>registrar" method="post">
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Nombre"  autofocus="autofocus" value ="<?php  echo  set_value ( 'username' );  ?>">
                    <label for="username"><i class="fas fa-user-circle"></i> Nombre</label>
                  </div>
                  <div class="text-center">
                    <?php  echo  form_error ('username');  ?>
                  </div>                        
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address"   value =" <?php  echo  set_value ('inputEmail');?>">
                    <label for="inputEmail"><i class="fas fa-envelope-square"></i> Correo electrónico</label>
                  </div>
                  <div class="text-center">
                    <?php  echo  form_error ('inputEmail');  ?>
                      
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-lg-6 col-sm-12">
                      <div class="form-label-group">
                        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" >
                        <label for="inputPassword"><i class="fas fa-user-lock"></i> Contraseña</label>
                      </div>
                      <div class="text-center">
                        <?php  echo  form_error ('inputPassword');  ?> 
                      </div>
                      
                    </div>
                    <div class="col-lg-6 col-sm-12">
                      <div class="form-label-group">
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirme su contraseña">
                        <label for="confirmPassword" style="font-size: .92em;"><i class="fas fa-lock"></i> Confirme su contraseña</label>
                      </div>
                      <div class="text-center">
                        <?php  echo  form_error ('confirmPassword');  ?>
                      </div>                      
                    </div>                                        
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                      <label class="form-check-label" for="invalidCheck2">
                        Acepto los <a href=""><b>términos</b></a> 
                      </label>
                    </div>
                  </div>
                  
                    
                </div>
                <div class="row justify-content-md-center">
                  <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-danger btn-block">Registrar</button>
                  </div>
                </div>
              </form>
              <br>
              <br>
              <div class="dropdown-divider"></div>
              <div class="text-right">
                <a class="d-block small mt-3" href="<?php echo base_url();?>Inicio">Login <i class="fas fa-arrow-alt-circle-right"></i></a>                
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>assets/custombers/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/custombers/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/custombers/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/custombers/js/main.js"></script>


  </body>

</html>
..