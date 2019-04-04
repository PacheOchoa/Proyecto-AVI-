<?php

require_once "../../../../clases/conexion.php";

$idcliente = $_POST['idcliente'];
$stm = $conexion->prepare("DELETE FROM clientes WHERE id=:idcliente");

$stm->BindParam(":idcliente",$idcliente,PDO::PARAM_INT);

echo $stm->execute();


?>