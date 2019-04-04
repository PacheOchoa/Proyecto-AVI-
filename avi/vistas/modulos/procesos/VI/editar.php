<?php

require_once "../../../../clases/conexion.php";

$idcliente = $_POST['idclienteU'];
$stm = $conexion->prepare("UPDATE clientes SET Nombre=:nombre,ApellidoPaterno=:ApellidoP,ApellidoMaterno=:ApellidoM,telefono=:telU,correo=:correoU,edad=:edadU,observaciones=:observacionU,perfilacion=:perfilacionU WHERE id=:idcliente");


$stm->BindParam(":nombre",$_POST['nombreU']);
$stm->BindParam(":ApellidoP",$_POST['ApellidoPaternoU']);
$stm->BindParam(":ApellidoM",$_POST['ApellidoMaternoU']);
$stm->BindParam(":telU",$_POST['telefonoU']);
$stm->BindParam(":correoU",$_POST['correoU']);
$stm->BindParam(":edadU",$_POST['edadU']);
$stm->BindParam(":observacionU",$_POST['observacionU']);
$stm->BindParam(":perfilacionU",$_POST['perfilacionU']);
$stm->BindParam(":idcliente",$idcliente,PDO::PARAM_INT);

echo $stm->execute();


?>