<?php

require_once "../../../../clases/conexion.php";

$idcliente = $_POST['idcliente'];
$stm = $conexion->prepare("SELECT clientes.id,clientes.Nombre,ApellidoPaterno,ApellidoMaterno,telefono,correo,edad,observaciones,perfilacion,medios.Nombre FROM clientes INNER JOIN medios ON clientes.id = medios.id WHERE clientes.id=:idcliente");

$stm->BindParam(":idcliente",$idcliente,PDO::PARAM_INT);

$stm->execute();


$datos = $stm->fetch(PDO::FETCH_NUM);


$cliente = array(
   'id' => $datos[0],
   'Nombre' => $datos[1],
   'ApellidoPaterno' => $datos[2],
   'ApellidoMaterno' => $datos[3],
   'telefono' => $datos[4],
   'correo' => $datos[5],
   'edad' => $datos[6],
   'observaciones' => $datos[7],
   'perfilacion' => $datos[8]

);

echo json_encode($cliente);



?>