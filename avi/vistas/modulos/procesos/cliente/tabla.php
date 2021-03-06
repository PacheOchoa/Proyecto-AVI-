
<?php  require_once "../../../../clases/conexion.php";   

session_start();

$stm2 = $conexion->prepare("select id from usuarios where usuario=:idUsuario");

$stm2->bindValue(":idUsuario",$_SESSION['usuario']);

$stm2->execute();

$res = $stm2->fetch();



        $stm = $conexion->prepare("SELECT clientes.id,clientes.Nombre,ApellidoPaterno,ApellidoMaterno,telefono,correo,medios.Nombre FROM clientes INNER JOIN medios ON clientes.id_medio = medios.id GROUP BY clientes.id");

        $stm->bindValue(":idU",$res[0]);
        $stm->execute();


?>


<table class="table table-bordered table-striped dt-responsive tablas"  id="tablaC">
       
      <thead class="thead-dark">
       
       <tr>
         
         <th style="width:10px;text-align:center">#</th>
         <th style="text-align:center;">Nombre</th>
         <th style="text-align:center;">Apellido paterno</th>
         <th style="text-align:center;">Apellido materno</th>
         <th style="text-align:center;">Télefono</th>
         <th style="text-align:center;">Correo</th>
         <th style="text-align:center;">Nombre del medio</th>
         <th style="text-align:center;">Editar</th>
         <!--<th style="text-align:center;">Eliminar</th> -->
         <th style="text-align:center;">Agregar la afluencia</th>

       </tr> 

      </thead>

      <tbody>
<?php while($ver = $stm->fetch()): ?>
            <tr>
              <td style="text-align:center;"><?php echo  $ver[0]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[1]; ?></td>
              <td style="text-align:center;">  <?php echo $ver[2]; ?></td>
              <td style="text-align:center;"><?php echo $ver[3]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[4]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[5]; ?></td>
              <td style="text-align:center;">  <?php echo $ver[6]; ?></td>
             
              
              <td style="text-align:center;">
              <span class="btn btn-warning btn-sm" 
              data-toggle="modal" data-target="#modalEditarCliente" onclick="AgregarDatos('<?php echo $ver[0];?>')">
               
               <span class="fa fa-pencil-square-o"></span> 
              </span>
               </td>

               <!--<td style="text-align:center;"> -->
              <!--<span class="btn btn-danger btn-sm" onclick="Eliminar('<?php echo $ver[0];?>')"> -->
                <!-- <span class="fa fa-eraser"></span>  -->
             <!-- </span> -->
               </td>

               <td style="text-align:center;">
              <span  class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalAgregarAfluencia" onclick="AgregarDatosAfluencia('<?php echo $ver[0];?>')">
                 <span>Agregar la afluencia</span> 
              </span>
               </td>
            </tr>
<?php endwhile; ?>
        
 
      </tbody>

     </table>

     <script>
   $(document).ready(function() {
    $('#tablaC').DataTable({
      /*dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ], */

        "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
    
        
    });
    

});

</script>  