<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Roles</title>
  <link href="<?php echo base_url();?>assets/css/MyStyle.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.css" rel="stylesheet">


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
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administracion de usuarios:</h6>
            <a class="collapse-item" href="usuarios_web">Plataforma</a>
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
      <li class="nav-item active">
        <a class="nav-link">
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
         <div class="table-reponsive">
          <h1 class="text-center">Lista de roles</h1>
                    <button class="btn btn-primary btn-green"  onclick="agrerol();"><i class="fas fa-plus-circle"></i> Agregar Rol</button> 
                    <br>
                    <br>
                     <table  class="table table-hover table-condensed small" id="datatable_rol" >
                        <thead>
                            <tr>
                              <td>Id de rol</td>
                               <td>Nombre</td>
                               <td>Apellido</td> 
                               <td>Mail</td>
                               <td>Estado</td>
                               <td>Localidad</td>
                               <td>Tienda</td>
                               <td>Editar</td>
                               <td>Eliminar</td>
                            </tr>
                        </thead>
                        <tbody>
                     <?php 
                    foreach ($role as $data_role) {
                    ?>
                    <tr>
                    <td><?php echo $data_role['id_rol_usuario'];?></td>
                    <td><?php echo $data_role['nombre'];?></td>
                    <td><?php echo $data_role['apellido'];?></td>
                    <td><?php echo $data_role['mail'];?></td>
                    <td><?php echo $data_role['estado'];?></td>
                    <td><?php echo $data_role['localidad'];?></td>
                    <td><?php echo $data_role['nombre_tienda'];?></td>
                    <td>
                      <button type="button" class="btn btn-warning btn-xs" onclick="update_rol(<?php echo $data_role['id_rol_usuario'];?>)">
                       <i class="fas fa-user-edit"></i>
                    </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger btn-xs" onclick="eliminarrol(<?php echo $data_role['id_rol_usuario'];?>);">
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
</div>

<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-green" role="document">
    <div class="modal-cont modal-green">
      <div class="modal-header-green">
        <h5 class="modal-title text-white text-center" id="exampleModalLabel">Eliminar rol</h5>
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
        <button type="submit" class="btn btn-primary btn-green" onclick="eliminarrole()">Aceptar</button>
        <button type="button" class="btn btn-secondary btn-green" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_role" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header-green">
        <h5 class="modal-title text-white text-center" id="exampleModalLabelrole"></h5>
        <button type="button" class="close close-green" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-image" >

      <form class="register-form mt-4"  method="post" enctype="multipart/form-data" id="form-role">
        </p>
          <div class="row justify-content-around">
            <div class="col-md-12">
              <input type="hidden" id="idrol" name="idrol">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <select id="tienda_rol" name="tienda_rol"class="form-control form-control-green" required>
                    <option selected value="">Seleccione la tienda</option>
                   <?php 
                        foreach ($stores as $data_stores) {
                          $tienda_completa=$data_stores['nombre_tienda']." ".$data_stores['localidad'];
                        ?>
                        <option value="<?php echo $data_stores['id_tiendas_usuario'];?>">
                          <?php echo $tienda_completa; ?>
                        </option>
                      <?php
                      }?>
                  </select>
                  </div> 
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <select id="usuario_rol" name="usuario_rol"class="form-control form-control-green">
                    <option selected value="">Seleccione el usuario</option>
                   <?php 
                        foreach ($usuarios as $data_usuarios) {
                          $nombre_completo=$data_usuarios['nombre']." ".$data_usuarios['apellido'];
                        ?>
                        <option value="<?php echo $data_usuarios['id_usuario_app'];?>">
                          <?php echo $nombre_completo; ?>
                        </option>
                      <?php
                      }?>
                  </select>
                  </div> 
                </div>
              </div>          
            </div>
            
          </div>
          <div class="col-md-12">
            <button class="btn btn-primary btn-block btn-green" id="add-rol" onclick="agrerole()"><i class="fas fa-arrow-alt-circle-right"></i> Agregar</button>
            <button type="submit" class="btn btn-primary btn-block btn-green" id="edit-rol"><i class="fas fa-edit"></i> Editar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 <script src="<?php echo base_url();?>assets/js/vendor/jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/librerias/script.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/sb-admin-2.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/bootstrap.bundle.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/dataTable/datatables.min.js"></script> 
  <script type="text/javascript" src="<?php echo base_url();?>assets/dataTable/Buttons/js/buttons.print.js"></script> 
  <script type="text/javascript">
    var baseurl="<?php echo base_url();?>";
    $(document).ready(function() {
        $('#datatable_rol').DataTable({
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
                columns: [0,1,2,3,4,5,6],
                stripHtml:false
              }
            },
            {
              extend: 'excel',
              text: 'Exportar a excel',
              exportOptions: {
              columns: [0,1,2,3,4,5,6],
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