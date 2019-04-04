<?php  require_once "../../../../clases/conexion.php";   
        $stm = $conexion->prepare("SELECT asesores.id,desarrollo,asesores.Nombre,fecha,hora,clientes.Nombre AS 'Nombre del cliente', evento,registra,comentarios,tipo_contrato FROM asesores INNER JOIN clientes ON asesores.id_cliente = clientes.id");
        $stm->execute();


?>


<table class="table table-bordered table-striped dt-responsive tablas"  id="tablaA">
       
      <thead class="thead-dark">
       
       <tr>
         
         <th style="width:10px;text-align:center">#</th>
         <th style="text-align:center;">Desarrollo</th>
         <th style="text-align:center;">Nombre del asesor</th>
         <th style="text-align:center;">Fecha</th>
         <th style="text-align:center;">Hora</th>
         <th style="text-align:center;">Nombre del cliente</th>
         <th style="text-align:center;">Evento</th>
         <th style="text-align:center;">Registra</th>
         <th style="text-align:center;">Comentarios</th>
         <th style="text-align:center;">Tipo de contrato</th>
         <th style="text-align:center;">Editar</th>
         <th style="text-align:center;">Eliminar</th>

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
              <td style="text-align:center;"><?php echo $ver[7]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[8]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[9]; ?></td>
              
              <td style="text-align:center;">
              <span class="btn btn-warning btn-sm" 
              data-toggle="modal" data-target="#modalEditarCliente" onclick="AgregarDatos('<?php echo $ver[0];?>')">
               
               <span class="fa fa-pencil-square-o"></span> 
              </span>
               </td>

               <td style="text-align:center;">
              <span class="btn btn-danger btn-sm" onclick="Eliminar('<?php echo $ver[0];?>')">
                 <span class="fa fa-eraser"></span> 
              </span>
               </td>
            </tr>
<?php endwhile; ?>
        
 
      </tbody>

     </table>

     <script>
   $(document).ready(function() {
    $('#tablaA').DataTable({
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