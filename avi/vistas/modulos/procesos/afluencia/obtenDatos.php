<?php

require_once "../../../../clases/conexion.php";

$idcliente = $_POST['idcliente'];
$stm = $conexion->prepare("SELECT id,id_desarrollo FROM afluencia WHERE ID=:idcliente");

$stm->BindParam(":idcliente",$idcliente,PDO::PARAM_INT);

$stm->execute();


$datos = $stm->fetch(PDO::FETCH_NUM);


$cliente = array(
   'id' => $datos[0],
   'id_desarrollo' => $datos[1]

);

echo json_encode($cliente);



?>