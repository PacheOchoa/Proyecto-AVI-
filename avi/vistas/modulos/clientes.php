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


  <style>
  .pac-container {
    z-index: 10000 !important;
}
</style>

<div class="content-wrapper">

<section class="content-header">
  
  <h1>
    
    Administrar cliente
  
  </h1>

  <ol class="breadcrumb">
    
    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar cliente</li>
  
  </ol>

</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
        
        Agregar cliente <span class="fa fa-plus-circle"></span>

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


<div id="modalAgregarAfluencia" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

   

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Afluencia</h4>

      </div>


      <div class="modal-body">

       <form id="frmAgregarAfluencia" method="post">
               <h2>Agregar Afluencia</h2>

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


              <label>Cliente <span style="color:red;"> * </span></label>
              
              <input type="text" id="idcliente" name="idcliente" class="form-control input-sm" readonly>
             

              <label for="">Evento <span style="color:red;"> * </span></label>

         
                <select class="form-control input-sm" id="evento" name="evento">
                    <option value="A">

                    <option value="LEAD">Lead</option> 
                    
                    <option value="LLAMADA">llamada</option> 
                    
                    <option value="WHATSAPP">WhatsApp</option>
                    <option value="VISITA">Visita</option>
                         
                  <select>

              

              <label for="">Comentarios</label>
              <input type="text" id="comentarios" name="comentarios" class="form-control input-sm">
            
                
           

       </form>
    </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" id="btnAgregarAfluencia" name="btnAgregarAfluencia">Guardar</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
    </div>

        

      </div>

      <!--=====================================
      PIE DEL MODAL
      ======================================-->

    

  </div>



</div>

<div id="modalAgregarCliente" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

   

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Cliente</h4>

      </div>


      <div class="modal-body">

       <form id="frmAgregar" method="post">
               <h2>Agregar</h2>
               <h1> Datos generales del cliente </h1>
            <label for="Nombre">Nombre <span style="color:red;"> * OBLIGATORIO </span></label>
            <input type="text" name="nombre" id="nombre" class="form-control input-sm">
            <label for="ApellidoPaterno">Apellido paterno</label>
            <input type="text" name="ApellidoPaterno" id="ApellidoPaterno"  class="form-control input-sm">

            <label for="ApellidoMaterno">Apellido paterno</label>
            <input type="text" name="ApellidoMaterno" id="ApellidoMaterno"  class="form-control input-sm">

              <label>Medio <span style="color:red;"> * OBLIGATORIO </span></label>

            <select class="form-control input-sm" id="medio" name="medio">
                <option value="A">
                <?php
                while($ver=$ejecutar->fetch(PDO::FETCH_NUM)):  ?>
                <option value="<?php echo strtoupper($ver[0]); ?>">
                <?php echo strtoupper($ver[1]); ?>

                </option> 
            <?php endwhile; ?>
            <select> <br> <br>
             <br>

              <label for="">Presupuesto</label>
             <input type="number" name="presupuesto_dinero"  placeholder="1,000,000" id="presupuesto_dinero" class="form-control input-sm"> <br>

             <label for="">Sexo</label> <br>
             <label class="radio-inline"><input type="radio" name="sexo" id="sexo"  value="masculino" checked>Masculino</label> <br>
             <label class="radio-inline"><input type="radio" name="sexo" id="sexo"  value="femenino">Femenino</label> <br>

              <label for="">Dirección</label>
            <input type="text" value="" data-role="tagsinput" id="direccion" name="direccion" class="form-control input-sm"> <br>

            <label>Télefono</label>
            <input type="text" name="telefono" id="telefono"  class="form-control input-sm">


            <label>Correo</label>
            <input type="email" name="email" id="email"  class="form-control input-sm"> <br>

          
            
            <label>Edad</label>
            <select class="form-control input-sm" id="edad" name="edad">
            <option value="20 o menos"> 20 o menos </option>
            <option value="20 A 29"> 20 A 29 </option>
            <option value="30 A 39"> 30 A 39 </option>
            <option value="50 A 59"> 50 A 59 </option>
            <option value="60 o mas"> 60 o más </option>
            </select>

             <label for="">Estado civil</label> <br>
             
          <label class="radio-inline"><input type="radio" name="estadocivil" id="estadocivil" value="soltero" checked>Soltero</label>
          <label class="radio-inline"><input type="radio" name="estadocivil" id="estadocivil"  value="casado">Casado</label> 
          <label class="radio-inline"><input type="radio" name="estadocivil" id="estadocivil" value="divorciado" checked>Divorciado</label>
          <label class="radio-inline"><input type="radio" name="estadocivil" id="estadocivil"  value="viudo">Viudo</label> 
          <label class="radio-inline"><input type="radio" name="estadocivil" id="estadocivil"  value="unionlibre">Uinión Libre</label> <br>

           <label for="">Comentarios</label>
             <textarea id="comentarios" class="md-textarea form-control" name="comentarios" rows="3"></textarea>

             <h1> Información de cliente comprador </h1>
             
                 <label for="">Número de compras</label>

             <select class="form-control input-sm" id="numeroCompras" name="numeroCompras">
                <option value="A">
            
                <option value="0">0</option> 
                
                <option value="1">1</option> 
                
                <option value="2">2</option>
                
                <option value="3">3 o más</option>  
           
            <select>

                  <label for="">Intención de compra</label>

          <select class="form-control input-sm" id="intencionCompra" name="intencionCompra">
            <option value="A">

            <option value="vivir ahi">Vivir ahí</option> 
            
            <option value="renta">Renta</option> 
            
            <option value="venderla_mas_adenate">Venderla más adelante</option>
            
            <option value="uso_de_un_familiar">Uso de un familiar</option> 

            <option value="contruir_para_vivir">Construir para vivir ahí</option>  

            <option value="contruir_para_renta">Construir para renta</option>  

            <option value="contruir_para_revender">Construir para revender</option>  

          <select>

               <label for="">Mascotas</label>
          <select class="form-control input-sm" id="mascotas" name="mascotas">
            <option value="A">

            <option value="canes">Canes</option> 
            
            <option value="felinos">Felinos</option> 
            
            <option value="aves">Aves</option>
            
            <option value="roedores">Roedores</option> 

            <option value="peces">Peces</option>  

            <option value="Reptiles">Reptiles</option>  

            <option value="insectos">Insectos</option>  

            <option value="conejos_o_liebres">Conejos o liebres</option>  

            <option value="ninguno">Ninguno</option>  

            
          <select> <br> <br>

          <label for="">Empresa actual</label>
             <input type="text" name="empresaActual" id="empresaActual" class="form-control input-sm"> <br>

             <label for="">Ingreso familiar</label> <br>

         
        <select class="form-control input-sm" id="ingreso" name="ingreso">
            <option value="A">

            <option value="20,000 o menos">$20,000 o menos</option> 
            
            <option value="20,100 - 40,000">$20,100 - $40,000</option> 
            
            <option value="40,100 - 60,000">$40,100 - $60,000</option>
            
            <option value="60,100 - 80,000">$60,100 - $80,000</option> 

            <option value="80,100 - 100,000">$80,100 - $100,000</option>  

            <option value="100,000 o mas">$100,000 O MAS</option>  

            

            
          <select>

             
       

          <label for="">Club social o deportivo</label> <br>
          <label class="radio-inline"><input type="radio" name="club" id="club" value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="club" id="club"  value="si">Sí</label> <br>

          <label for="">Deportes</label> <br>
          <label class="radio-inline"><input type="radio" name="deportes" id="deportes" value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="deportes" id="deportes"  value="no">Sí</label> <br>

          <label for="">Centros comerciales</label> <br>
          <label class="radio-inline"><input type="radio" name="centro" id="centro"  value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="centro" id="centro"  value="si">Sí</label> <br>

          <label for="">parques</label> <br>
          <label class="radio-inline"><input type="radio" name="parques" id="parques"  value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="parques" id="parques"  value="si">Sí</label> <br>

          <label for="">Restaurantes</label> <br>
          <label class="radio-inline"><input type="radio" name="restaurantes" id="restaurantes"  value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="restaurantes" id="restaurantes"  value="si">Sí</label> <br>
           
          <label for="">Vida nocturna</label> <br>
          <label class="radio-inline"><input type="radio" name="vidanocturna" id="vidanocturna"  value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="vidanocturna" id="vidanocturna"  value="si">Sí</label> <br>

        <label for="">Actividades culturales</label> <br>
          <label class="radio-inline"><input type="radio" name="cultura" id="cultura"  value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="cultura" id="cultura"  value="si">Sí</label> <br>

        

          <label for="">Actividad económica</label>

         
        <select class="form-control input-sm" id="actividadeco" name="actividadeco">
            <option value="A">

            <option value="Empleado del sector publico">Empleado del sector público</option> 
            
            <option value="Empleado del sector privado">Empleado del sector privado</option> 
            
            <option value="ama de casa">Ama de casa</option>
            
            <option value="trabajador o profesionista">Trabajador o profesionista</option> 

            <option value="independiente">Independiente</option>  

            <option value="empresario o comerciante">Empresario o comerciante</option>  

            <option value="desempleado">Desempleado</option>  

            <option value="jubilado">Jubilado</option>


            

            
          <select>

          <label for="">Es Contact Center</label>
          <label class="radio-inline"><input type="radio" name="contact" id="contact" value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="contact" id="contact" value="si" checked>Sí</label> <br>
          
          <label for="">Perfila</label>
          <label class="radio-inline"><input type="radio" name="perfila" id="perfila" value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="perfila" id="perfila" value="si" checked>Sí</label> <br>

       </form>
    </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" id="btnAgregar" name="btnAgregar">Guardar</button>
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
               <h2>Agregar</h2>
               <input type="text" name="idclienteU" id="idclienteU" hidden="">
            <label for="Nombre">Nombre <span style="color:red;"> * OBLIGATORIO </span></label>
            <input type="text" name="nombreU" id="nombreU" class="form-control input-sm">
            <label for="ApellidoPaterno">Apellido paterno</label>
            <input type="text" name="ApellidoPaternoU" id="ApellidoPaternoU"  class="form-control input-sm">

            <label for="ApellidoMaterno">Apellido materno</label>
            <input type="text" name="ApellidoMaternoU" id="ApellidoMaternoU"  class="form-control input-sm">

             

              <label for="">Presupuesto</label>
             <input type="number" name="presupuesto_dineroU" placeholder="1,000,000" id="presupuesto_dineroU" class="form-control input-sm"> <br>

             <label for="">Sexo</label> <br>
             <label class="radio-inline"><input type="radio" name="sexoU" id="sexoU"  value="masculino" checked>Masculino</label> <br>
             <label class="radio-inline"><input type="radio" name="sexoU" id="sexoU"  value="femenino">Femenino</label> <br>

           

            <label>Télefono</label>
            <input type="text" name="telefonoU" id="telefonoU"  class="form-control input-sm">


            <label>Correo</label>
            <input type="email" name="emailU" id="emailU"  class="form-control input-sm"> <br>

          
            
            <label>Edad</label>
            <select class="form-control input-sm" id="edadU" name="edadU">
            <option value="20 o menos"> 20 o menos </option>
            <option value="20 A 29"> 20 A 29 </option>
            <option value="30 A 39"> 30 A 39 </option>
            <option value="50 A 59"> 50 A 59 </option>
            <option value="60 o mas"> 60 o más </option>
            </select>

             <label for="">Estado civil</label> <br>
             
          <label class="radio-inline"><input type="radio" name="estadocivilU" id="estadocivilU" value="soltero" checked>Soltero</label>
          <label class="radio-inline"><input type="radio" name="estadocivilU" id="estadocivilU"  value="casado">Casado</label> 
          <label class="radio-inline"><input type="radio" name="estadocivilU" id="estadocivilU" value="divorciado" checked>Divorciado</label>
          <label class="radio-inline"><input type="radio" name="estadocivilU" id="estadocivilU"  value="viudo">Viudo</label> 
          <label class="radio-inline"><input type="radio" name="estadocivilU" id="estadocivilU"  value="unionlibre">Uinión Libre</label> <br>

           <label for="">Comentarios</label>
             <textarea id="comentarios" class="md-textarea form-control" name="comentarios" rows="3"></textarea>
             
                 <label for="">Número de compras</label>

             <select class="form-control input-sm" id="numeroComprasU" name="numeroComprasU">
                <option value="A">
            
                <option value="0">0</option> 
                
                <option value="1">1</option> 
                
                <option value="2">2</option>
                
                <option value="3">3 o más</option>  
           
            <select>

                  <label for="">Intención de compra</label>

          <select class="form-control input-sm" id="intencionCompraU" name="intencionCompraU">
            <option value="A">

            <option value="vivir ahi">Vivir ahí</option> 
            
            <option value="renta">Renta</option> 
            
            <option value="venderla_mas_adenate">Venderla más adelante</option>
            
            <option value="uso_de_un_familiar">Uso de un familiar</option> 

            <option value="contruir_para_vivir">Construir para vivir ahí</option>  

            <option value="contruir_para_renta">Construir para renta</option>  

            <option value="contruir_para_revender">Construir para revender</option>  

          <select>

               <label for="">Mascotas</label>
          <select class="form-control input-sm" id="mascotasU" name="mascotasU">
            <option value="A">

            <option value="canes">Canes</option> 
            
            <option value="felinos">Felinos</option> 
            
            <option value="aves">Aves</option>
            
            <option value="roedores">Roedores</option> 

            <option value="peces">Peces</option>  

            <option value="Reptiles">Reptiles</option>  

            <option value="insectos">Insectos</option>  

            <option value="conejos_o_liebres">Conejos o liebres</option>  

            <option value="ninguno">Ninguno</option>  

            
          <select> <br> <br>

          <label for="">Empresa actual</label>
             <input type="text" name="empresaActualU" id="empresaActualU" class="form-control input-sm"> <br>

             <label for="">Ingreso familiar</label> <br>

         
        <select class="form-control input-sm" id="ingresoU" name="ingresoU">
            <option value="A">

            <option value="20,000 o menos">$20,000 o menos</option> 
            
            <option value="20,100 - 40,000">$20,100 - $40,000</option> 
            
            <option value="40,100 - 60,000">$40,100 - $60,000</option>
            
            <option value="60,100 - 80,000">$60,100 - $80,000</option> 

            <option value="80,100 - 100,000">$80,100 - $100,000</option>  

            <option value="100,000 o mas">$100,000 O MAS</option>  
            
          <select>

             
       

          <label for="">Club social o deportivo</label> <br>
          <label class="radio-inline"><input type="radio" name="clubU" id="clubU" value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="clubU" id="clubU"  value="si">Sí</label> <br>

          <label for="">Deportes</label> <br>
          <label class="radio-inline"><input type="radio" name="deportesU" id="deportesU" value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="deportesU" id="deportesU"  value="no">Sí</label> <br>

          <label for="">Centros comerciales</label> <br>
          <label class="radio-inline"><input type="radio" name="centroU" id="centroU"  value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="centroU" id="centroU"  value="si">Sí</label> <br>

          <label for="">Parques</label> <br>
          <label class="radio-inline"><input type="radio" name="parquesU" id="parquesU"  value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="parquesU" id="parquesU"  value="si">Sí</label> <br>

          <label for="">Restaurantes</label> <br>
          <label class="radio-inline"><input type="radio" name="restaurantesU" id="restaurantesU"  value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="restaurantesU" id="restaurantesU"  value="si">Sí</label> <br>
           
          <label for="">Vida nocturna</label> <br>
          <label class="radio-inline"><input type="radio" name="vidanocturnaU" id="vidanocturnaU"  value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="vidanocturnaU" id="vidanocturnaU"  value="si">Sí</label> <br>

          <label for="">Actividades culturales</label> <br>
          <label class="radio-inline"><input type="radio" name="culturaU" id="culturaU"  value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="culturaU" id="culturaU"  value="si">Sí</label> <br>

        

          <label for="">Actividad económica</label>

         
        <select class="form-control input-sm" id="actividadecoU" name="actividadecoU">
            <option value="A">

            <option value="Empleado del sector publico">Empleado del sector público</option> 
            
            <option value="Empleado del sector privado">Empleado del sector privado</option> 
            
            <option value="ama de casa">Ama de casa</option>
            
            <option value="trabajador o profesionista">Trabajador o profesionista</option> 

            <option value="independiente">Independiente</option>  

            <option value="empresario o comerciante">Empresario o comerciante</option>  

            <option value="desempleado">Desempleado</option>  

            <option value="jubilado">Jubilado</option>


            

            
          <select>

          <label for="">Es Contact Center</label>
          <label class="radio-inline"><input type="radio" name="contactU" id="contact" value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="contactU" id="contact" value="si" checked>Sí</label> <br>
          
          <label for="">Perfila</label>
          <label class="radio-inline"><input type="radio" name="perfilaU" id="perfilaU" value="no" checked>No</label>
          <label class="radio-inline"><input type="radio" name="perfilaU" id="perfilaU" value="si" checked>Sí</label> <br>

       </form>
    </div>

     <button type="submit" class="btn btn-warning" id="btnEditar" name="btnEditar">Editar</button>
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> <br> <br> <br>

</form>
</div>

<div class="modal-footer">
     
      
    </div>
      <!--=====================================
      PIE DEL MODAL
      ======================================-->

     


  

  </div>

</div>

</div>

<script>
   $(document).ready(function(){
    
      
       $('#btnAgregar').click(function(){
   
        

      
             
        datos = $('#frmAgregar').serialize();

     

      
       
      

        $.ajax({
          type:"POST",
          data:datos,
          url:"vistas/modulos/procesos/cliente/agregar.php",
          success: function(r){
             if(r==1){
              //$('#tabla').load('vistas/modulos/procesos/cliente/tabla.php');
              alert("cliente agregado");
              window.location = "clientes";
              //$('#tabla').load('vistas/modulos/procesos/cliente/tabla.php');
              
               
              
             }else{
              alert(r);

              
             }
          }
        });  
        
    });
   
        });


</script>    



<script>
   $(document).ready(function(){
    $('#tabla').load('vistas/modulos/procesos/cliente/tabla.php');
      
       $('#btnAgregarAfluencia').click(function(){

      
             
        datos = $('#frmAgregarAfluencia').serialize();

        
      

        $.ajax({
          type:"POST",
          data:datos,
          url:"vistas/modulos/procesos/afluencia/agregar.php",
          success: function(r){
             if(r==1){
              //$('#tabla').load('vistas/modulos/procesos/cliente/tabla.php');
              alert("Afluencia registrada");
               window.location = "afluencia";
              
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

        console.log(datos);

        
        


        $.ajax({
          type:"POST",
          data:datos,
          url:"vistas/modulos/procesos/cliente/editar.php",
          success: function(r){
             if(r==1){
             
               alert("Cliente actualizado");
               window.location = "clientes";
               $('#tabla').load('vistas/modulos/procesos/cliente/tabla.php');

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
              
              //return false;
               

                 
             
                datos = jQuery.parseJSON(r);
                

                $('#idclienteU').val(datos['id']);
                $('#nombreU').val(datos['nombre']);
                $('#ApellidoPaternoU').val(datos['ApellidoPaterno']);
                $('#ApellidoMaternoU').val(datos['ApellidoMaterno']);
                $('#telefonoU').val(datos['telefono']);
                $('#emailU').val(datos['correo']);
                $('#empresaActualU').val(datos['empresaActual']);
                $('#direccionU').val(datos['direccion']);
                $('#presupuesto_dineroU').val(datos['presupuesto_dinero']);
                $('#ComentariosU').val(datos['Comentarios']);
                $('#ingresoU').val(datos['ingresoFamiliar']);

                
               

               
               
            }
        });
     }
  </script>


<script> 
     function AgregarDatosAfluencia(idcliente){
     

      

        $.ajax({
            type : "POST",
            data : "idcliente=" + idcliente,
            url : "vistas/modulos/procesos/cliente/obtenId.php",
            success : function(r){
              
              //return false;
                 
                 
                datos = jQuery.parseJSON(r);

                $('#idcliente').val(datos['id']);
                
               

               
               
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
<script>
  $("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});

</script>

<script>
    function initAutocomplete() {
        var autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('direccion')),
            {types: ['geocode']});
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4zaKCffCXs2sJwgHIz_vAmPR6E-BW870&libraries=places&callback=initAutocomplete" async defer></script>





























