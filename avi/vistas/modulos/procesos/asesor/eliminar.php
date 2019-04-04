<?php

require_once "../../../../clases/conexion.php";

$idasesor = $_POST['idasesor'];
$stm = $conexion->prepare("DELETE FROM asesores WHERE id=:idasesor");

$stm->BindParam(":idasesor",$idasesor,PDO::PARAM_INT);

echo $stm->execute();


?>