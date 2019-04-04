<?php

require_once "../../../../clases/conexion.php";

$idafluencia = $_POST['idafluencia'];
$stm = $conexion->prepare("DELETE FROM afluencia WHERE id=:idafluencia");

$stm->BindParam(":idafluencia",$idafluencia,PDO::PARAM_INT);

echo $stm->execute();


?>