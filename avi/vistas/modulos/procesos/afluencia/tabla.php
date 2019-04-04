<?php  require_once "../../../../clases/conexion.php";   
        $stm = $conexion->prepare("SELECT afluencia.id,afluencia.fecha,afluencia.hora,afluencia.evento, afluencia.comentarios,desarrollo.nombre AS 'Nombre del desarrollo',asesores.Nombre as 'nombre del asesor',clientes.nombre AS 'Nombre del cliente' FROM afluencia INNER JOIN asesores ON afluencia.id_asesor=asesores.id INNER JOIN desarrollo on afluencia.id_desarrollo = desarrollo.id INNER JOIN clientes ON afluencia.id_cliente = clientes.id");
        $stm->execute(); 


?>

<script src="plugins/buttons.html5.min.js"></script>
<script src="plugins/dataTables.buttons.min.js"></script>
<script src="plugins/jquery.dataTables.min.js"></script>

<script src="plugins/jquery-3.3.1.js"></script>
<script src="plugins/jszip.min.js"></script>
<script src="plugins/pdfmake.min.js"></script>
<script src="plugins/vfs_fonts.js"></script>


<table class="table table-bordered table-striped dt-responsive tablas" id="tablaAf">
       
       <thead>
        
        <tr>
          
          <th style="width:10px">#</th>
          <th style="text-align:center;">Fecha de la afluencia</th>
          <th style="text-align:center;">Hora de la afluencia</th>
          <th style="text-align:center">Evento</th>
          <th style="text-align:center;">Comentarios</th>
          <th style="text-align:center">Nombre del desarrollo</th>
          <th style="text-align:center">Nombre del asesor</th>
          <th style="text-align:center">Nombre del Cliente</th>
          <th style="text-align:center;">Editar</th>
          <th style="text-align:center;">Eliminar</th>
 
        </tr> 
 
       </thead>
 
       <tbody>
        
       <?php while($ver = $stm->fetch()): ?>
            <tr>
              <td style="text-align:center;"><?php echo  $ver[0]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[1]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[2]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[3]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[4]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[5]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[6]; ?></td>
              <td style="text-align:center;"><?php echo  $ver[7]; ?></td>
              
            
             
              
              
              
              
              
              
              
              <td style="text-align:center;">
              <span class="btn btn-warning btn-sm" 
              data-toggle="modal" data-target="#modalEditarAfluencia" onclick="AgregarDatos('<?php echo $ver[0];?>')">
               
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
    $('#tablaAf').DataTable({
      dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],

        "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
        
    });
    

});

</script> 

