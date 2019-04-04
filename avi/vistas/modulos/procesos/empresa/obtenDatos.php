<?php

require_once "../../../../clases/conexion.php";

$idcliente = $_POST['idasesor'];
$stm = $conexion->prepare("SELECT clientes.id,desarrollo,asesores.Nombre,fecha,hora,clientes.Nombre AS 'Nombre del cliente', evento,registra,comentarios,tipo_contrato FROM clientes INNER JOIN asesores ON asesores.id = clientes.id where asesores.id=:idasesor");

$stm->BindParam(":idasesor",$idcliente,PDO::PARAM_INT);

$stm->execute();


$datos = $stm->fetch(PDO::FETCH_NUM);


$cliente = array(
   'clientes.id' => $datos[0],
   'desarrollo' => $datos[1],
   'asesores.Nombre' => $datos[2],
   'fecha' => $datos[3],
   'hora' => $datos[4],
   'clientes.Nombre' => $datos[5],
   'evento' => $datos[6],
   'registra' => $datos[7],
   'comentarios' => $datos[8],
   'tipo_contrato' => $datos[9]

);

echo json_encode($cliente);



?>