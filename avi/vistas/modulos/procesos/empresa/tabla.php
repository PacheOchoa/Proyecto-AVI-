<?php  require_once "../../../../clases/conexion.php";   
        $stm = $conexion->prepare("SELECT empresa.id,empresa.Nombre,giro.Nombre,tamano_empresa FROM empresa INNER JOIN giro ON empresa.id_giro = giro.id");
        $stm->execute();


?>


<table class="table table-bordered table-striped dt-responsive tablas"  id="tablaE">
       
      <thead class="thead-dark">
       
       <tr>
         
         <th style="width:10px;text-align:center">#</th>
         <th style="text-align:center;">Nombre de la Empresa</th>
         <th style="text-align:center;">Nombre del Giro</th>
         <th style="text-align:center;">Tamaño de la Empresa</th>
         <th style="text-align:center;">Eliminar</th>

       </tr> 

      </thead>

      <tbody>
<?php while($ver = $stm->fetch()): ?>
            <tr>
              <td style="text-align:center;"><?php echo  $ver[0]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[1]; ?></td>
              <td style="text-align:center;">  <?php echo $ver[2]; ?></td>
              <td style="text-align:center;">  <?php echo $ver[3]; ?></td>
              
              
              

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
    $('#tablaE').DataTable({
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