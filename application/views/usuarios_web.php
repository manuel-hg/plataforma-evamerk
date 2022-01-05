<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Usuarios Web</title>
  <link href="<?php echo base_url();?>assets/css/MyStyle.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dataTable/datatables.min.css"/>


</head>
<body id="">
<div class="row" style="margin: 0">
  <div class="col-md-12" style="padding: 0">
    <div class="row"style="margin: 0">
    <div class="col-md-3 pd0"style="padding: 0">
    <ul class="navegacion navbar-nav sidebar sidebar-dark accordion bg-green" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <hr class="sidebar-divider my-0">
        <div class="sidebar-brand-icon">
          <br>
          <img width="80%" src="<?php echo base_url();?>assets/img/evamerc-logo.png">
        </div>
        <div class="sidebar-brand-text mx-3">
        </div>
      </a>
      <br>
      <li class="nav-item text-white text-center">
        Bienvenido:<br>
          <?php 
            foreach ($datos as $dato) {
          ?>
          <?php echo $dato['nombre_completo'] ;?><br>
          <img width="20%" src="<?php echo $dato['img_usuario_web'] ?>">
         <?php
        }
        ?>
      </li>
          <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Administracion
      </div>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administracion de usuarios:</h6>
            <a class="collapse-item active">Plataforma</a>
            <a class="collapse-item" href="usuarios_app">Aplicacion</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>tiendas">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Tiendas</span></a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>productos">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Productos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>roles">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Roles</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Gestion de informacion
      </div>
          
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>informe">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Reportes de captura</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>mapeo">
          <i class="fas fa-fw fa-table"></i>
          <span>Reportes de comparación</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>inicio/logout">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Cerrar Sesion</span></a>
      </li>
    </ul>
  </div>
  <div class="col-md-9"style="padding: 0">
    <div class="row"style="margin: 0">
      <div class="container">
        <h1 class="text-center">Lista de usuarios</h1>

        <button class="btn btn-primary btn-green"  id="addUser"><i class="fas fa-plus-circle"></i> Agregar usuario web</button> 
        <br>
        <br>
       
          
                     <table width="100%" class="table table-striped table-bordered" id="tbl-userWeb">
                        <thead>
                            <tr>
                              <td>No.</td>
                               <td>Nombre</td>
                               <td>Apellido</td> 
                               <td>Mail</td>
                               <td>Puesto</td>
                               <td>Imagen de usuario</td>
                               <td>Usuario</td>
                               <td>Editar</td>
                               <td>Eliminar</td>
                            </tr>
                        </thead>
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
                    <td><img width="30%" src="<?php echo $data_usuarios['img_usuario_web'] ?>" align="left"></td>
                    <td><?php echo $data_usuarios['username'];?></td>
                    <td>
                       <button type="button" class="btn btn-warning btn-xs" onClick="actualizar(<?php echo $data_usuarios['id_usuario_web'];?>)">
                         <i class="fas fa-user-edit"></i>
                       </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger btn-xs"onClick="eliminar(<?php echo $data_usuarios['id_usuario_web'];?>)">
                         <i class="fas fa-user-edit"></i>
                       </button>
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
              </div>

<div class="modal fade" id="agregarusuario" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header-green">
        <h5 class="modal-title text-white text-center" id="exampleModalLabel"></h5>
        <button type="button" class="close close-green" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-image" >

      <form class="register-form mt-4"  method="post" enctype="multipart/form-data" id="type-from">
        </p>
          <div class="row justify-content-around">
            <div class="col-md-4">
              <input type="hidden" id="iduser" name="iduser">
              <div class="form-group">
                <input type="text" class="form-control form-control-green" name="nombre" id="nombre" placeholder="Nombre" required>
                <?php  echo  form_error ('nombre');?>
              </div>
              <div class="form-group">                
                <input type="text" class="form-control form-control-green" name="apellido" id="apellido"placeholder="Apellido" required>
                 <?php  echo  form_error ('apellido');?>
              </div>
              <div class="form-group">                 
                <input type="mail" name="email" id="email" class="form-control form-control-green" placeholder="Email" required>
                <?php  echo  form_error ('email');?>
              </div>
              <div class="form-group"> 
                <input type="text" name="usuario" id="usuario" class="form-control form-control-green" placeholder="Usuario" required>
                <?php  echo  form_error ('usuario');?>
              </div>                          
            </div>
            <div class="col-md-4">
              <div class="input-group mb-3">
                <input type="password" name="password" id="password" class="form-control form-control-green" placeholder="Password">
                <div id="visualiza" class="input-group-append m-3">
                  <img width="20%" class="pass-toggle" src="<?php echo base_url();?>assets/img/evamerc-pass.png" onclick="visualizar()">
                  <?php  echo  form_error ('password');?>
                </div>
              </div>

             
              <div class="form-group">
                   <select id="puesto" name="puesto" id="puesto" class="form-control form-control-green" required>
                    <option selected require>Seleccione el rol</option>
                   <?php 
                        foreach ($puesto as $data_puesto) {
                        ?>
                        <option value="<?php echo $data_puesto['id_puesto'] ?>">
                          <?php echo $data_puesto['nombre_puesto'] ?>
                        </option>
                  <?php
                  }?>
                      
                    </select>
                  <?php  echo  form_error ('puesto');?>
              </div>
              <br>
              <div class="custom-file form-group" id="ocultarimg">
                <input name="archivo[]" type="file" class="custom-file-input"  id="customFileLang" lang="es">
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-5">
          <div class="col-md-3">
            <button type="submit" class="btn btn-primary btn-block btn-green" id="add-user"><i class="fas fa-arrow-alt-circle-right"></i> Agregar</button>
            <button type="submit" class="btn btn-primary btn-block btn-green" id="edit-user"><i class="fas fa-edit"></i> Editar</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-green" role="document">
    <div class="modal-cont modal-green">
      <div class="modal-header-green">
        <h5 class="modal-title text-white text-center" id="exampleModalLabel">Eliminar Usuario</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-green">
        <form action="<?php echo base_url();?>deleteusuariosweb" method="post">
          <p id="nameuser" class="text-white text-center"></p>
          </form>
      </div>
      <div class="modal-foo modal-green">
        <button type="submit" class="btn btn-primary btn-green" onclick="eliminarUser()">Aceptar</button>
        <button type="button" class="btn btn-secondary btn-green" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>



   <script src="<?php echo base_url();?>assets/js/vendor/jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/sb-admin-2.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/bootstrap.bundle.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/dataTable/datatables.min.js"></script> 
  <script type="text/javascript" src="<?php echo base_url();?>assets/dataTable/Buttons/js/buttons.print.js"></script> 
  <script src="<?php echo base_url();?>assets/js/librerias/script.js"></script>
  <script type="text/javascript">
    var baseurl="<?php echo base_url();?>";
    $(document).ready(function() {
        $('#tbl-userWeb').DataTable({
          responsive: true,
               "language": {
                  "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              },
              "buttons": {
                  "copy": "Copiar",
                  "colvis": "Visibilidad"
              }
            },
            dom: 'Bfrtip',
            buttons : [
            {
              extend: 'print',
              text: 'Imprimir',
              tittle: '',
              exportOptions: { 
                columns: [0,1,2,3,4,5],
                stripHtml:false
              }
            },
            {
              extend: 'excel',
              text: 'Exportar a excel',
              exportOptions: {
              columns: [0,1,2,3,4],
                stripHtml:false
            }
            }
            ]
          });
        
    } );
   /* $('#tbl-userApp').DataTable( {
        responsive: true
    } );*/
    
  </script>
</body>
</html>