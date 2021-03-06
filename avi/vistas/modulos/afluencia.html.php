<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar clientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar clientes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar Afluencia

        </button>

      </div>
      </div>

      <div class="modal-body">

         <form id="frmAgregar" method="post" action="agregar">

              <label for="Nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control input-sm">
              <label for="ApellidoPaterno">Apellido Paterno</label>
              <input type="text" name="ApellidoPaterno" id="ApellidoPaterno"  class="form-control input-sm">

              <label for="ApellidoMaterno">Apellido Materno</label>
              <input type="text" name="ApellidoMaterno" id="ApellidoMaterno"  class="form-control input-sm">

              

              <label for="Edad">Edad</label>
              <input type="text" name="Edad" id="Edad"  class="form-control input-sm">

         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnAgregar">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal update -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <form id="frmUpdate" method="post">
              <input type="hidden" name="idpersona" id="idpersona" class="form-control input-sm">
              <label for="Nombre">Nombre</label>
              <input type="text" name="nombreU" id="nombreU" class="form-control input-sm">
              <label for="ApellidoPaterno">Apellido Paterno</label>
              <input type="text" name="ApellidoPaternoU" id="ApellidoPaternoU"  class="form-control input-sm">

              

              <label for="ApellidoMaterno">Apellido Materno</label>
              <input type="text" name="ApellidoMaternoU" id="ApellidoMaternoU"  class="form-control input-sm">

              <label for="Edad">Edad</label>
              <input type="text" name="EdadU" id="EdadU"  class="form-control input-sm">

         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnUpdate">Actualizar</button>
      </div>
    </div>
  </div>
</div>


 <!--<script>
   $(document).ready(function(){
      
       $('#btnAgregar').onclick(function(){
           if(validarFormVacio('#frmAgregar') > 0){
              alertify.alert("Debes llenar los campos");
              return false;
           }
           
          
        datos =$('#frmAgregar').serialize();

        alert(datos);

        return false;
        
       
        $.ajax({
            type : "POST",
            data : datos,
            url : "php/insertar.php",
            success : function(r){
                if(r==1){
                    $('#frmAgregar')[0].reset();
                    $('#tablastores').load('tabla.php');
                    alertify.success("Insertado con exito :)");
                    
                }else{
                  alertify.error("No se pudo insertar :/");
                }
            }
        });
    });
        });
       
   function validarFormVacio(formulario){
    datos=$('#' + formulario).serialize();
    d=datos.split('&');
    vacios=0;
    for(i=0;i< d.length;i++){
      controles=d[i].split("=");
      if(controles[1]=="A" || controles[1]==""){
        vacios++;
      }
    }
    return vacios;
  }
 </script>


  <script> 
     function AgregarDatos(idpersona){
      
        $.ajax({
            type : "POST",
            data : "idpersona=" + idpersona,
            url : "php/obtenDatos.php",
            success : function(r){
                 
                 
                datos = jQuery.parseJSON(r);
                $('#idpersona').val(datos['id']);
                $('#nombreU').val(datos['Nombre']);
                $('#ApellidoPaternoU').val(datos['ApellidoPaterno']);
                $('#ApellidoMaternoU').val(datos['ApellidoMaterno']);
                $('#EdadU').val(datos['Edad']);
            }
        });
     }
  </script>

  <script>
      $(document).ready(function(){
        $('#btnUpdate').click(function(){
           datos = $('#frmUpdate').serialize();
           $.ajax({
              type :"POST",
              data:datos,
              url :"php/actualizar.php",
              success:function(r){
                 if(r==1){
                   $('#frmUpdate')[0].reset();
                   $('#tablastores').load('tabla.php');
                   alertify.success("se actualizó con exito");
                 }else{
                    alertify.success("NO se pudo actualizar :/");
                 }
              }
           });
        });
      });
  </script>

  <script>
      function Eliminar(idpersona){
        alertify.confirm("¿Deseas eliminar? ",
        function(){
          $.ajax({
              type :"POST",
              data :"idpersona=" +idpersona,
              url :"php/eliminar.php",
              success: function(r){
                 if(r==1){
                  $('#tablastores').load('tabla.php');
                    alertify.success("Eliminado");
                 }else{
                  alertify.error("NO SE PUDO ELIMINAR :/");
                 }
              }
          });
        }
        ,function(){
          alertify.error('cancelo');
        });
      }
  </script> !-->

</body>
</html>