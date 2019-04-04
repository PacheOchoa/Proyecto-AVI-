


<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    Administrar VI
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar VI</li>
  
  </ol>

</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
        
        Agregar Propiedad <span class="fa fa-plus-circle"></span>

      </button>

    </div>

    <div class="box-body">
    <div id="tabla">
                
             </div>
     

    </div>

  </div>

</section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

   

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Propiedad</h4>

      </div>


      <div class="modal-body">

       <form id="frmAgregar" method="post">
               <h2>Agregar</h2>
                <label for="">Precio de venta</label>
                <input type="text" name="precio_venta" id="precio_venta" class="form-control input-sm">

          
            <button type="submit" class="btn btn-primary" id="btnAgregar" name="btnAgregar">Guardar</button>

       </form>
    </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
    </div>

        

      </div>

      <!--=====================================
      PIE DEL MODAL
      ======================================-->

    

  </div>



</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

   

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar cliente</h4>

      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">

     <form id="frmEditar" method="post">
        <h2>Editar</h2>
        <input type="text" name="idclienteU" id="idclienteU" hidden="">
     <label for="NombreU">Nombre</label>
     <input type="text" name="nombreU" id="nombreU" class="form-control input-sm">
     <label for="ApellidoPaternoU">Apellido Paterno</label>
     <input type="text" name="ApellidoPaternoU" id="ApellidoPaternoU"  class="form-control input-sm">

     <label for="ApellidoMaternoU">Apellido Materno</label>
     <input type="text" name="ApellidoMaternoU" id="ApellidoMaternoU"  class="form-control input-sm">

     <label>Telefono</label>
     <input type="text" name="telefonoU" id="telefonoU"  class="form-control input-sm">

     <label>Correo</label>
     <input type="text" name="correoU" id="correoU"  class="form-control input-sm">
     <label>Edad</label>
     <input type="text" name="edadU" id="edadU"  class="form-control input-sm">
     <label>Observación</label>
     <input type="text" name="observacionU" id="observacionU"  class="form-control input-sm">
     <label>Perfilación</label>
     <input type="text" name="perfilacionU" id="perfilacionU"  class="form-control input-sm">
    <h2>Hola</h2>
     

     <button type="submit" class="btn btn-warning" id="btnEditar" name="btnEditar">Editar</button>

</form>
</div>

<div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
    </div>
      <!--=====================================
      PIE DEL MODAL
      ======================================-->

     


  

  </div>

</div>

</div>

<script>
   $(document).ready(function(){
    $('#tabla').load('vistas/modulos/procesos/VI/tabla.php');
      
       $('#btnAgregar').click(function(){

        /*if(validarFormVacio('frmAgregar') > 0){
              swal({type:"warning",title:"Debes llenar todos los campos"});
              return false;
           } */
             
        datos = $('#frmAgregar').serialize();

        alert("hola");

        return false;

        

        

        $.ajax({
          type:"POST",
          data:datos,
          url:"vistas/modulos/procesos/cliente/agregar.php",
          success: function(r){
             if(r==1){
              $('#tabla').load('vistas/modulos/procesos/cliente/tabla.php');
               alert("Cliente agregado");
              
             }else{
              alert(r);
             }
          }
        });  
        
    });
   
        });


</script>    

<script>
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
   $(document).ready(function(){
      
       $('#btnEditar').click(function(){
        
             
        datos = $('#frmEditar').serialize();

        /*alert(datos);
        return false; */


        $.ajax({
          type:"POST",
          data:datos,
          url:"vistas/modulos/procesos/cliente/editar.php",
          success: function(r){
             if(r==1){
              $('#tabla').load('vistas/modulos/procesos/cliente/tabla.php');
               alert("Cliente actualizado");

             }else{
              //alert("NO SE PUDO ACTUALIZAR EL CLIENTE :(");
              alert(r);
             }
          }
        });   
        
    });
   
        });


</script>


<script> 
     function AgregarDatos(idcliente){
        //alert("Hola " + idcliente);
        //return false;

        $.ajax({
            type : "POST",
            data : "idcliente=" + idcliente,
            url : "vistas/modulos/procesos/cliente/obtenDatos.php",
            success : function(r){
              alert(r);
              //return false;
                 
                 
                datos = jQuery.parseJSON(r);

                $('#idclienteU').val(datos['id']);
                $('#nombreU').val(datos['Nombre']);
                $('#ApellidoPaternoU').val(datos['ApellidoPaterno']);
                $('#ApellidoMaternoU').val(datos['ApellidoMaterno']);
                $('#telefonoU').val(datos['telefono']);
                $('#correoU').val(datos['correo']);
                $('#edadU').val(datos['edad']);
                $('#observacionU').val(datos['observaciones']);
                $('#perfilacionU').val(datos['perfilacion']);
               
            }
        });
     }
  </script>

<script>
      function Eliminar(idcliente){
            
          $.ajax({
              type :"POST",
              data :"idcliente=" +idcliente,
              url :"vistas/modulos/procesos/cliente/eliminar.php",
              success: function(r){
                 if(r==1){
                  $('#tabla').load('vistas/modulos/procesos/cliente/tabla.php');
                    alert("Eliminado");
                 }else{
                  console.log(r);
                 }
              }
          });
        }
        
  </script>