<!DOCTYPE html>
<html lang="en">
<head>
    <title>Evamerc</title>
    <!-- REQUIRED META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="App para la gestion de usuario y productos">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">
  
        

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <!-- INDEX CSS -->
    <link href="<?php echo base_url();?>assets/css/stils.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../" />
</head>

<body>

    <div>
        <div class="">
        <div class="">
                 <nav class="navegacion">
                <ul class="menu">
                    <div>
                        <center>
                            <div class="logo_inicio">
                                <img src="<?php echo base_url();?>assets/img/evamerc-logo.png">
                            </div>
                        </center>
                        <div class="logo_user">
                            <?php 
                             foreach ($datos as $dato) {
                            ?>
                                 <img src="<?php echo $dato['img_usuario_web'] ?>" align="left"><br><br>
                                 <div><h2><?php echo $dato['nombre_completo'] ;?></h2></div> 
                            <?php
                             }

                            ?>
                            
                        </div>
                    </div>
                    <li style="color:#469eb2"><a>Usuarios</a>
                        <ul class="submenu">
                            <li><a href="<?php echo base_url();?>usuarios_app">Usuarios Aplicacion</a></li>
                            <li><a href="">Usuarios Plataforma</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Tiendas</a>
                        <ul class="submenu">
                            <li><a href="">Agregar</a></li>
                            <li><a href="">Editar</a></li>
                            <li><a href="">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a href="">Productos</a>
                        <ul class="submenu">
                            <li><a href="../productos/productos_register.html">Agregar</a></li>
                            <li><a href="">Editar</a></li>
                            <li><a href="">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a href="../reportes/reportes.html">Reportes</a>
                    </li>
                    <li><a href="../imagenes/imagenes.html">Imagenes</a></li>
                    <li><a href="<?php echo base_url();?>inicio/logout">Cerrar Sesion</a></li>

                </ul>
            </nav>
        </div>
            <div class="col-md-9 pd0">
               <div class="row m0">
                <div class="col-md-9 ">
                    <p>Lista de usuarios</p>
                    <span class="btn btn-primary">Agregar usuario</span>
                     <table width="50%" class="table table-hover table-condensed" id="datatable_usuarios">
                        <thead>
                            <tr>
                              <td>No.</td>
                               <td>Nombre</td>
                               <td>Apellido</td> 
                               <td>Mail</td>
                               <td>Puesto</td>
                               <td>Imagen de usuario</td>
                               <td>Usuario</td>
                               <td>Contraseña</td>
                               <td>Editar</td>
                               <td>Eliminar</td>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <td>No.</td>
                               <td>Nombre</td>
                               <td>Apellido</td> 
                               <td>Mail</td>
                               <td>Puesto</td>
                               <td>Imagen de usuario</td>
                               <td>Usuario</td>
                               <td>Contraseña</td>
                               <td>Editar</td>
                               <td>Eliminar</td>
                            </tr>
                        </tfoot>
                        <tbody>
                    <?php 
                    foreach ($usuarios as $data_usuarios) {
                    ?>
                    <tr>
                    <td><?php echo $data_usuarios['id_usuario_web'];?></td>
                    <td><?php echo $data_usuarios['nombre'];?></td>
                    <td><?php echo $data_usuarios['apellido'];?></td>
                    <td><?php echo $data_usuarios['mail'];?></td>
                    <td><?php echo $data_usuarios['nombre_puesto'];?></td>
                    <td><img width="100%" src="<?php echo $data_usuarios['img_usuario_web'] ?>" align="left"></td>
                    <td><?php echo $data_usuarios['username'];?></td>
                    <td><?php echo $data_usuarios['password'];?></td>
                    <td>
                      <span width="20%" class="btn btn-warning btn-xs">Editar</span>
                    </td>
                    <td>
                        <span width="20%" class="btn btn-danger btn-xs">Eliminar</span>
                    </td>
                    </tr>
                    <?php
                    }?>
                        </tbody>
                    </table>
                </div>
               </div>
            </div>
        </div>
    </div>
        


      
    <!-- JQUERY FIRST, THEN BOOTSTRAP JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
        $('#datatable_usuarios').DataTable();
    });
       $(document).ready(function(){

              var height = $(window).height();

              $('.navegacion').height(height);
        });
    </script>
</body>
</html>



<!--
    Version : 1.0
    Authors : Derian Gutierrez, J David

    Copyright &#169; All rights Reserved

-->