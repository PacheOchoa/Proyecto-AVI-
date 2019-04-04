<?php 
	require_once "clases/conexion.php";
	
	$sql = "SELECT id,Nombre from clientes";
	$ejecutar = $conexion->prepare($sql);
	$ejecutar->execute();

 ?>


<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    Administrar Asesor
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Asesor</li>
  
  </ol>

</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAsesor">
        
        Agregar Asesor <span class="fa fa-plus-circle"></span>

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
MODAL AGREGAR ASESOR
======================================-->

<div id="modalAgregarAsesor" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

   

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Asesor</h4>

      </div>


      <div class="modal-body">

       <form id="frmAgregar" method="post">
               <h2>Agregar</h2>
                 <label for="">Desarrollo</label>
                 <input type="text" id="desarrollo" name="desarrollo" class="form-control input-sm">
                 <label for="">Nombre</label>
                 <input type="text" id="nombre" name="nombre" class="form-control input-sm">
                 <label for="">Fecha</label>
                 <input type="date" id="fecha" name="fecha" class="form-control input-sm">
                 <label for="">Hora</label>
                 <input type="time" id="hora" name="hora" class="form-control input-sm">
                 <label>Cliente</label>

                    <select class="form-control input-sm" id="cliente" name="cliente">
                        <option value="A">
                        <?php
                        while($ver=$ejecutar->fetch(PDO::FETCH_NUM)):  ?>
                        <option value="<?php echo $ver[0]; ?>">
                        <?php echo $ver[1]; ?>

                        </option> 
                    <?php endwhile; ?>
                    <select> <br> <br>

                    <label for="">Evento</label>
                 <input type="text" id="evento" name="evento" class="form-control input-sm">
                 <label for="">¿Quién registra?</label>
                 <input type="text" id="registra" name="registra" class="form-control input-sm">
                 <label for="">Comentarios</label>
                 <textarea type="text"  id="comentarios" name="comentarios" class="sm-textarea form-control" rows="3"></textarea>
                 <label for="">Tipo de Contrato</label>
                 <input type="text" id="tipo_contrato" name="tipo_contrato" class="form-control input-sm">
                 


             <br>
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
MODAL EDITAR ASESOR
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

   

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar Asesor</h4>

      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">

     <form id="frmEditar" method="post">
        <h2>Editar</h2>
                  <input type="text" hidden="" id="idasesor" name="idasesor" class="form-control input-sm">
                <label for="">Desarrollo</label>
                 <input type="text" id="desarrolloU" name="desarrolloU" class="form-control input-sm">
                 <label for="">Nombre</label>
                 <input type="text" id="nombreU" name="nombreU" class="form-control input-sm">
                 <label for="">Fecha</label>
                 <input type="date" id="fechaU" name="fechaU" class="form-control input-sm">
                 <label for="">Hora</label>
                 <input type="time" id="horaU" name="horaU" class="form-control input-sm">
                

                    <label for="">Evento</label>
                 <input type="text" id="eventoU" name="eventoU" class="form-control input-sm">
                 <label for="">¿Quién registra?</label>
                 <input type="text" id="registraU" name="registraU" class="form-control input-sm">
                 <label for="">Comentarios</label>
                 <textarea type="text"  id="comentariosU" name="comentariosU" class="sm-textarea form-control" rows="3"></textarea>
                 <label for="">Tipo de Contrato</label>
                 <input type="text" id="tipo_contratoU" name="tipo_contratoU" class="form-control input-sm">
          

     

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
    $('#tabla').load('vistas/modulos/procesos/asesor/tabla.php');
      
       $('#btnAgregar').click(function(){

        if(validarFormVacio('frmAgregar') > 0){
              swal({type:"warning",title:"Debes llenar todos los campos"});
              return false;
           }
             
        datos = $('#frmAgregar').serialize();

    
        $.ajax({
          type:"POST",
          data:datos,
          url:"vistas/modulos/procesos/asesor/agregar.php",
          success: function(r){
             if(r==1){
              $('#tabla').load('vistas/modulos/procesos/asesor/tabla.php');
               alert("Asesor registrado");
              
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
          url:"vistas/modulos/procesos/asesor/editar.php",
          success: function(r){
             if(r==1){
              $('#tabla').load('vistas/modulos/procesos/asesor/tabla.php');
               alert("asesor actualizado");

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
     function AgregarDatos(idasesor){
        //alert("Hola " + idcliente);
        //return false;

        $.ajax({
            type : "POST",
            data : "idasesor=" + idasesor,
            url : "vistas/modulos/procesos/asesor/obtenDatos.php",
            success : function(r){
              //alert(r);
              //return false;
                 
                 
                datos = jQuery.parseJSON(r);

                $('#idasesor').val(datos['clientes.id']);
                $('#desarrolloU').val(datos['desarrollo']);
                $('#nombreU').val(datos['asesores.Nombre']);
                $('#fechaU').val(datos['fecha']);
                $('#horaU').val(datos['hora']);
                $('#eventoU').val(datos['evento']);
                $('#registraU').val(datos['registra']);
                $('#comentariosU').val(datos['comentarios']);
                $('#tipo_contratoU').val(datos['tipo_contrato']);
               
            }
        });
     }
  </script>

<script>
      function Eliminar(idasesor){
            
          $.ajax({
              type :"POST",
              data :"idasesor=" +idasesor,
              url :"vistas/modulos/procesos/asesor/eliminar.php",
              success: function(r){
                 if(r==1){
                  $('#tabla').load('vistas/modulos/procesos/asesor/tabla.php');
                    alert("Eliminado");
                 }else{
                  console.log(r);
                 }
              }
          });
        }
        
  </script>