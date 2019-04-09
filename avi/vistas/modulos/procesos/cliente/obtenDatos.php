<?php

require_once "../../../../clases/conexion.php";

$idcliente = $_POST['idcliente'];
$stm = $conexion->prepare("SELECT clientes.id,clientes.Nombre,ApellidoPaterno,ApellidoMaterno,presupuesto_dinero,telefono,correo,comentarios,empresaActual FROM clientes WHERE clientes.id=:idcliente");

$stm->BindParam(":idcliente",$idcliente,PDO::PARAM_INT);

$stm->execute();


$datos = $stm->fetch(PDO::FETCH_NUM);


$cliente = array(
   'id' => $datos[0],
   'nombre' => $datos[1],
   'ApellidoPaterno' => $datos[2],
   'ApellidoMaterno' => $datos[3],
   'presupuesto_dinero' => $datos[4],
   'telefono' => $datos[5],
   'correo' => $datos[6],
   'Comentarios' => $datos[7],
   'empresaActual' => $datos[8]
  
   
   

);

echo json_encode($cliente);



?>