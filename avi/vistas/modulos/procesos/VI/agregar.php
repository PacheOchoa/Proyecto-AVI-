<?php

require_once "../../../../clases/conexion.php";

$stm = $conexion->prepare("");


//$stm = $conexion->prepare("CALL sp_insert_cliente(:Nombre,:ApellidoPaterno,:ApellidoMaterno,:telefono,:correo,:presupuesto,:autoridad,:necesidad,:tiempo,:edad,:observaciones,:perfilacion,:id_medio)");

$stm->BindParam(":precio_ventaI",$_POST['precio_venta']);
$stm->BindParam(":precio_rentaI",$_POST['precio_renta']);
$stm->BindParam(":superficieI",$_POST['superficie']);
$stm->BindParam(":tipo_productoI",$_POST['tipo_producto']);
$stm->BindParam(":propiedadI",$_POST['propiedad']);
$stm->BindParam(":calleI",$_POST['calle']);
$stm->BindParam(":num_propiedadI",$_POST['num_propiedad']);
$stm->BindParam(":propiedadI",$_POST['propiedad']);
$stm->BindParam(":proyectoI",$_POST['proyecto'],PDO::PARAM_INT);
$stm->BindParam(":estatusI",$_POST['estatus']);
$stm->BindParam(":ventaI",$_POST['venta']);
$stm->BindParam(":rentaI",$_POST['renta']);
$stm->BindParam(":fecha_cancelacionI",$_POST['fecha_cancelacion']);
$stm->BindParam(":fecha_cierreI",$_POST['fecha_cierre']);
//$stm->BindParam(":porcentaje_cierreI",$_POST['porcentaje_cierre']);

$stm->BindParam(":asesorI",$_POST['asesor'],PDO::PARAM_INT);
$stm->BindParam(":Tipo_operacionI",$_POST['Tipo_operacion']);


echo $stm->execute();





?>