<?php  require_once "../../../../clases/conexion.php";   
        $stm = $conexion->prepare("select vi.id,vi.precio_venta,vi.precio_renta,vi.superficie,vi.tipo_producto,vi.calle_propiedad,vi.numero_propiedad,vi.propiedad,proyecto.nombre AS 'Nombre del proyecto',vi.estatus,vi.venta,vi.renta,vi.fecha_cancelacion,vi.fecha_cierre,vi.porcentaje_cierre,asesores.Nombre AS 'Nombre del asesor',vi.tipo_operacion from vi inner join proyecto on vi.id_proyecto=proyecto.id inner join asesores on vi.id_asesor = asesores.id");
        $stm->execute();


?>


<table class="table table-bordered table-striped dt-responsive tablas"  id="tablaVI">
       
      <thead class="thead-dark">
       
       <tr>
         
         <th style="width:10px;text-align:center">#</th>
         <th style="text-align:center;">Precio de Venta</th>
         <th style="text-align:center;">Precio de Renta</th>
         <th style="text-align:center;">Superficie</th>
         <th style="text-align:center;">Tipo de producto</th>
         <th style="text-align:center;">Calle de la propiedad</th>
         <th style="text-align:center;"># de la propiedad</th>
         <th style="text-align:center;">Propiedad</th>
         <th style="text-align:center;">Nombre del proyecto</th>
         <th style="text-align:center;">Estatus de la propiedad</th>
         <th style="text-align:center;">Venta</th>
         <th style="text-align:center;">Renta</th>
         <th style="text-align:center;">Fecha de Cancelación</th>
         <th style="text-align:center;">Fecha de Cierre</th>

         <th style="text-align:center;">% de cierre</th>
         <th style="text-align:center;">Nombre del Asesor</th>
         <th style="text-align:center;">Tipo de operación</th>
         
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
              <td style="text-align:center;">  <?php echo $ver[10]; ?></td>
              <td style="text-align:center;"><?php echo $ver[11]; ?></td>
              <td style="text-align:center;"><?php echo $ver[12]; ?></td>
              <td style="text-align:center;"><?php echo $ver[13]; ?></td>
              <td style="text-align:center;"><?php echo $ver[14]; ?></td>
              <td style="text-align:center;"><?php echo $ver[15]; ?></td>
              <td style="text-align:center;"><?php echo $ver[16]; ?></td>
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
    $('#tablaVI').DataTable({
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