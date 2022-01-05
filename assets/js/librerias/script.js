function visualizar() {
  var x = document.getElementById("password-app");
  if (x.type === "password") {
    x.type = "text"
  } else {
    x.type = "password";
  }
}




function actualizar(id_usuario) {
  $("#iduser").val(id_usuario);
  $("#ocultarimg").hide();
        $.post(baseurl+'Home/set_usuarios_web',
          {id_usuario_web:id_usuario},
          function(data){
          var result=JSON.parse(data);
          $.each(result, function(i,item){          
            $('#exampleModalLabel').html('Editar usuario web');
            $('#type-from').attr('action', 'actualizarusuariosweb');
            $("#agregarusuario").modal();
            $("#edit-user").show();
            $("#add-user").hide();
            $("#nombre").val(item.nombre);
            $("#apellido").val(item.apellido);
            $("#email").val(item.mail);
            $("#usuario").val(item.username);
            $("#password").hide();
            $("#visualiza").hide();
            puest=item.id_puesto;
            $("#puesto").empty();
            $.post(baseurl+"Home/puesto",
              function(data){
                var result=JSON.parse(data);
                $.each(result, function(i,val){
                  if (val.id_puesto==puest) {
                    $('#puesto').append("<option value='"+val.id_puesto+"' selected>"+val.nombre_puesto+"</option>")
                  }else{
                    $('#puesto').append("<option value='"+val.id_puesto+"'>"+val.nombre_puesto+"</option>")
                  }                 
                });
              });
          });
        }
      );
}

function eliminar(id_usuario) {
  $("#iduser").val(""); 
  $("#iduser").val(id_usuario);
  $.post(baseurl+'Home/set_usuarios_web',
          {id_usuario_web:id_usuario},
          function(data){
           
          var result=JSON.parse(data);
          $.each(result, function(i,item){
            $("#eliminar").modal();
            $("#nameuser").html("¿Estas seguro que quieres eliminar a "+item.nombre+"?");
          });
        }
      );
}

function eliminar_app(id_usuario) {
  $("#iduser").val(""); 
  $("#iduser").val(id_usuario);
  $.post(baseurl+'Home/set_user_app',
          {id_usuario_app:id_usuario},
          function(data){
           
          var result=JSON.parse(data);
          $.each(result, function(i,item){
            $("#eliminar").modal();
            $("#nameuser").html("¿Estas seguro que quieres eliminar a "+item.nombre+"?");
          });
        }
      );
}

function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xlsm':'excel_data.xlsm';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
  $('#addUser').click(function() {
  $("#agregarusuario").modal();
  $("#password").show();
  $("#visualiza").show();
  $("#nombre").val("");
  $("#apellido").val("");
  $("#email").val("");
  $("#usuario").val("");
  $("#password").val("");
  $('#exampleModalLabel').html('Agregar usuario web');
  $('#type-from').attr('action', 'agregarusuariosweb');
  $("#add-user").show();

  $("#edit-user").hide();
})

function eliminarUser(){
  console.log($("#iduser").val())
  $.post(baseurl+'Home/delete_usuarios_web',
    {id_usuario_web:$("#iduser").val()},
    function(data){
      location.href ="usuarios_web";
    });
}

function eliminarUserApp(){
  console.log($("#iduser").val())
  $.post(baseurl+'Home/delete_usuarios_app',
    {id_usuario_app:$("#iduser").val()},
    function(data){
      location.href ="usuarios_app";
    });
}



function Actualizarloginapp(){
 $("#modal_app").modal();

}

function agreapp(){
  $("#modal_app").modal();
  $('#exampleModalLabel').html('Agregar usuario app');
}





function agrerol(){
  $('#exampleModalLabelrole').html('Agregar rol');
  $("#modal_role").modal();
  $("#add-rol").show();
  $("#edit-rol").hide();
}

function agrerole(){
  $('#form-role').attr('action','Registro/insert_rol');
  $.post(baseurl+'Registro/insert_rol',
    {id_usuario_app:usuario_rol,id_tiendas_usuario:tienda_rol},
    function(data){
      console.log(data);
    });
}


function update_rol(idrol) {
  $("#idrol").val(idrol);
  $('#exampleModalLabelrole').html('Editar rol');
  $('#form-role').attr('action', 'Registro/update_rol');
  $("#modal_role").modal();
  $("#add-rol").hide();
  $("#edit-rol").show();
  $("#tienda_rol").empty();
  $("#usuario_rol").empty();  
  $.post(baseurl+'Home/set_role',
        {idrol:idrol},
        function(data){
        var result=JSON.parse(data);
        $.each(result, function(i,item){ 
          $("#idrol").val(item.id_rol_usuario);
          idrole=item.id_rol_usuario;
          idtienda=item.id_tiendas_usuario;
          iduser=item.id_usuario_app;          
          
          $.post(baseurl+"Home/stores",
            {idrol:idrol},
            function(data){
              var result=JSON.parse(data);
              $.each(result, function(i,item){
               if(item.id_tiendas_usuario==idtienda){
                  $('#tienda_rol').append("<option value='"+item.id_tiendas_usuario+"' selected>"+item.nombre_tienda+" "+item.localidad+"</option>")
                  }else{
                    $('#tienda_rol').append("<option value='"+item.id_tiendas_usuario+"'>"+item.nombre_tienda+" "+item.localidad+"</option>")
                    }
              });
            });

          $.post(baseurl+"Home/users_app",
            function(data){
              var result=JSON.parse(data);
              $.each(result, function(i,item){
                if(item.id_usuario_app==iduser){
                     $('#usuario_rol').append("<option value='"+item.id_usuario_app+"' selected>"+item.nombre+" "+item.apellido+"</option>")
                  }else{
                    $('#usuario_rol').append("<option value='"+item.id_usuario_app+"'>"+item.nombre+" "+item.apellido+"</option>")
                   }
              });
            });

        });
    }
  );
}



function actustore(){
  $("#modal_store").modal();
}

function agrestore(){
  $("#modal_store").modal();
  $('#exampleModalLabel').html('Agregar tienda');
  $("#add-store").show();
  $("#edit-store").hide();
}

function addstores() {
  $.ajax({
      url: baseurl+"Registro/insert_store",
      type: "POST",
      dataType: 'json',
      data:{
        'estado': $("#estado").val(),
        'localidad': $("#localidad").val(),
        'tienda': $("#tienda").val(),
      }
    }).then(function(response) {
        location.reload();
    });
}

function update_store(idstore){
  $("#idstore").val(idstore);
  $('#exampleModalLabel').html('Editar usuario app');
   $('#type-from').attr('action', 'Registro/update_store');
  $("#modal_store").modal();
  $("#add-store").hide();
  $("#edit-store").show();
  $.post(baseurl+'Home/set_stores_user',
        {idstore:idstore},
        function(data){
        var result=JSON.parse(data);
        $.each(result, function(i,item){          
          $("#estado").val(item.estado);
          $("#localidad").val(item.localidad);
          $("#tienda").val(item.nombre_tienda);
        });
    }
  );
}

function update_product (idproduct) {
  $("#idproduct").val(idproduct);
  $("#modal_products").modal();
  $('#exampleModalLabel').html('Editar producto');
  $('#product-form').attr('action', 'Registro/update_product');
  $("#add-product").hide();
  $("#edit-product").show();
  $("#marca").empty();
  $("#modelo").empty();
  $.post(baseurl+'Home/set_products_user',
        {idproduct:idproduct},
        function(data){
        var result=JSON.parse(data);
        $.each(result, function(i,item){ 
          $("#sku").val(item.sku);
          $("#descripcion").val(item.descripcion);
          idmarca=item.id_marca_producto;
          idmodelo=item.id_modelo_producto;
           $.post(baseurl+"Home/marca",
            function(data){
              var result=JSON.parse(data);
              $.each(result, function(i,item){
                if(item.id_marca_producto==idmarca){
                  $('#marca').append("<option value='"+item.id_marca_producto+"' selected>"+item.marca_producto+"</option>")
                  }else{
                    $('#marca').append("<option value='"+item.id_marca_producto+"'>"+item.marca_producto+"</option>")
                    }
              });
            });
            $.post(baseurl+"Home/modelo",
            function(data){
              var result=JSON.parse(data);
              $.each(result, function(i,item){
                if(item.id_modelo_producto==idmodelo){
                  $('#modelo').append("<option value='"+item.id_modelo_producto+"' selected>"+item.modelo_producto+"</option>")
                  }else{
                    $('#modelo').append("<option value='"+item.id_modelo_producto+"'>"+item.modelo_producto+"</option>")
                    }
              });
            });

        });
    }
  );
}


function eliminarStore(idstore){
  $("#idstore").val(idstore);
    $.post(baseurl+'Home/set_stores_user',
          {idstore:idstore},
          function(data){
          var result=JSON.parse(data);
          $.each(result, function(i,item){
            $("#eliminar").modal();
            $("#nameuser").html("¿Estas seguro que quieres eliminar a tienda: "+item.nombre_tienda+" "+item.localidad+"?");
          });
        }
      );
}



function eliminarprod() {
  $.post(baseurl+'Home/delete_producto',
    {idproduct:$("#idproduct").val()},
    function(data){
      location.href ="productos";
    });
}

function eliminarproducto(idproduct){
  $("#idproduct").val(idproduct);
    $.post(baseurl+'Home/set_products_user',
          {idproduct:idproduct},
          function(data){
          var result=JSON.parse(data);
          $.each(result, function(i,item){
           $("#eliminar").modal();
           $("#nameuser").html("¿Estas seguro que quieres eliminar el producto? <br>sku:"
            +item.sku+"<br>Marca:"+item.marca_producto+"<br>Modelo:"+item.modelo_producto+"<br>Descripcion:"
            +item.descripcion);            
          });
        }
      );
}


function eliminarrole() {
  $.post(baseurl+'Home/delete_rol',
    {idrol:$("#idrol").val()},
    function(data){
      location.href ="roles";
    });
}

function eliminarrol(idrol){
  $("#idrol").val(idrol);
  console.log(idrol);
    $.post(baseurl+'Home/set_role',
          {idrol:idrol},
          function(data){
          var result=JSON.parse(data);
          $.each(result, function(i,item){
           $("#eliminar").modal();
           $("#nameuser").html("¿Estas seguro que quieres eliminar el siguiente rol? <br>Tienda:"
            +item.nombre_tienda+"<br>Localidad:"+item.localidad+"<br>Usuario:"+item.nombre+" "
            +item.apellido);
          });
        }
      );
}




function deleteStore() {
  $.post(baseurl+'Home/delete_store',
    {idstore:$("#idstore").val()},
    function(data){
      location.href ="tiendas";
    });
}




function eliminarUserApp(){
  console.log($("#iduser").val())
  $.post(baseurl+'Home/delete_usuarios_app',
    {id_usuario_app:$("#iduser").val()},
    function(data){
      location.href ="usuarios_app";
    });
}

function actualprodect(){
  $("#modal_products").modal();
}

function agreproduts(){
  $("#modal_products").modal();
  $('#exampleModalLabel').html('Agregar producto');
  $("#add-product").show();
  $("#edit-product").hide();
}

function update_user(){
   $.ajax({
      url: baseurl+"Home/update_usuario_web",
      type: "POST",
      dataType: 'json',
      data:{
          'iduser': $("#iduser").val(),
          'nombre': $("#nombre").val(),
          'apellido': $("#apellido").val(),
          'email': $("#email").val(),
          'usuario': $("#usuario").val(),
          'idpuesto':$("#puesto").val(),
      }
    }).then(function(response) {
        location.reload();
    });
}

$('#addUserApp').click(function() {
  $('#type-from').attr('action', 'agregarusuariosapp');
  $("#usuarioApp").modal();
  $('#titleApp').html('Agregar usuario app');
  $("#add-user-app").show();
  $("#edit-user-app").hide();
})
function actualizar_app(id_usuario_app){
  $("#iduser").val(id_usuario_app);
  $("#ocultarimg-app").hide();
  $('#titleApp').html('Editar usuario app');
  $('#type-from').attr('action', 'actualizarusuariosapp');
  $("#usuarioApp").modal();
  $("#edit-user-app").show();
  $("#add-user-app").hide();
  $.post(baseurl+'Home/set_user_app',
        {id_usuario_app:id_usuario_app},
        function(data){
        var result=JSON.parse(data);
        $.each(result, function(i,item){          
          console.log(item);
          $("#nombre-app").val(item.nombre);
          $("#apellido-app").val(item.apellido);
          $("#email-app").val(item.mail);
          $("#usuario-app").val(item.username);
          $("#password-app").val(item.password);
          $("#visualiz").show();
          $("#puesto").val(item.puesto);        
        });
    }
  );
}

function addmarca() {
  var $marca=$("#marcam").val().toUpperCase();
  $('#marca-form').attr('action', 'Registro/insert_marca');
  $.post(baseurl+'Registro/insert_marca',
    {marca:marca},
    function(data){
      location.href ="productos#modal_products";
    });
}
function addmodelo() {
  var $modelo=$("#modelo").val().toUpperCase();
  $('#form-modelo').attr('action', 'Registro/insert_modelo');
  $.post(baseurl+'Registro/insert_modelo',
    {modelo:modelo},
    function(data){
      location.href ="productos#modal_products";
    });
}

function addproduct() {
$('#exampleModalLabel').html('Agregar producto');
  $('#product-form').attr('action', 'Registro/insert_product');
  $.post(baseurl+'Registro/insert_product',
    {},
    function(data){
      location.href ="productos#modal_products";
    });
}



