<?php

require_once "../../../../clases/conexion.php";

$idempresa = $_POST['idempresa'];
$stm = $conexion->prepare("DELETE FROM empresa WHERE id=:idempresa");

$stm->BindParam(":idempresa",$idempresa,PDO::PARAM_INT);

echo $stm->execute();


?>