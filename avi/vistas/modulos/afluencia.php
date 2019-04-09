<?php 
	require_once "clases/conexion.php";
	
	$sql = "SELECT id,Nombre from medios";
	$ejecutar = $conexion->prepare($sql);
  $ejecutar->execute();
  

  $sql1 = "SELECT id,Nombre from desarrollo";
	$ejec1 = $conexion->prepare($sql1);
  $ejec1->execute();

  $sql2 = "SELECT id,Nombre from asesores";
	$ejec2 = $conexion->prepare($sql2);
  $ejec2->execute();
  
  	
	$sql3 = "SELECT id,correo from clientes";
	$ejec3 = $conexion->prepare($sql3);
  $ejec3->execute();

 ?>

<?php  require_once "./clases/conexion.php";   
$stm = $conexion->prepare("SELECT id_cliente,nombre,ApellidoPaterno,ApellidoMaterno FROM cliente");
$stm->execute();


?>



<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    Administrar afluencia
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar afluencia</li>
  
  </ol>

</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

     

    </div>

    <div class="box-body">
    <div id="tabla">
             
             </div>
  

    </div>

  </div>

</section>

</div>




<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarAfluencia" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

   

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar afluencia</h4>


      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">

     <form id="frmEditar" method="post">
        <h2>Editar</h2>
         <input type="text" id="idclienteA" name="idclienteA" hidden="">
        <label>Desarrollo <span style="color:red;"> * </span> </label>

<select class="form-control input-sm" id="desarrollo" name="desarrollo">
    <option value="A">
    <?php
    while($ver=$ejec1->fetch(PDO::FETCH_NUM)):  ?>
    <option value="<?php echo $ver[0]; ?>">
    <?php echo $ver[1]; ?>

    </option> 
<?php endwhile; ?>
<select> <br>

<label>Asesor <span style="color:red;"> * </span></label>

<select class="form-control input-sm" id="asesor" name="asesor">
    <option value="A">
    <?php
    while($ver=$ejec2->fetch(PDO::FETCH_NUM)):  ?>
    <option value="<?php echo $ver[0]; ?>">
    <?php echo $ver[1]; ?>

    </option> 
<?php endwhile; ?>
<select> <br>

<label>Fecha</label>
<input type="date" name="fechaA" id="fechaU"  class="form-control input-sm"> <br>
<label>Hora</label>
<input type="time" name="horaA" id="horaU"  class="form-control input-sm"> <br>




<label for="">Evento <span style="color:red;"> * </span></label>


  <select class="form-control input-sm" id="evento" name="evento">
      <option value="A">

      <option value="lead">Lead</option> 
      
      <option value="llamada">Llamada</option> 
      
      <option value="whatsapp">WhatsApp</option>
      <option value="visita">Visita</option>
           
    <select>



<label for="">Comentarios</label>
<textarea id="comentarios" class="md-textarea form-control" name="comentarios" rows="3"></textarea>
            
        
     

    

</form>
</div>

<div class="modal-footer">
<button type="submit" class="btn btn-warning" id="btnEditar" name="btnEditar">Editar</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
    </div>
      <!--=====================================
      PIE DEL MODAL
      ======================================-->

     


  

  </div>

</div>

</div>

   

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
   $(document).ready(function() {
    $('#tabla').load('vistas/modulos/procesos/afluencia/tabla.php');
} );

</script>

<script>
      function Eliminar(idafluencia){
        $.ajax({
              type :"POST",
              data :"idafluencia=" +idafluencia,
              url :"vistas/modulos/procesos/afluencia/eliminar.php",
              success: function(r){
                 if(r==1){
                  $('#tabla').load('vistas/modulos/procesos/afluencia/tabla.php');
                    alert("Eliminado");
                 }else{
                  console.log(r);
                 }
              }
          });
      }
  </script>


<script>
   $(document).ready(function(){
      
       $('#btnEditar').click(function(){
       
             
        datos = $('#frmEditar').serialize();
        
      
        $.ajax({
          type:"POST",
          data:datos,
          url:"vistas/modulos/procesos/afluencia/editar.php",
          success: function(r){
             if(r==1){
             
               alert("Afluencia actualizada");
               $('#tabla').load('vistas/modulos/procesos/afluencia/tabla.php');
               window.location = "afluencia";

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
      
        

        $.ajax({
            type : "POST",
            data : "idcliente=" + idcliente,
            url : "vistas/modulos/procesos/afluencia/obtenDatos.php",
            success : function(r){
              
              //return false;
                 
                 
                
              datos = jQuery.parseJSON(r);

                

                $('#idclienteA').val(datos['id']);
              
            }
        });
     }
  </script>













  






