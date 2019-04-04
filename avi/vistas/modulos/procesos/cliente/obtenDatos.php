<?php

require_once "../../../../clases/conexion.php";

$idcliente = $_POST['idcliente'];
$stm = $conexion->prepare("SELECT clientes.id,clientes.Nombre,ApellidoPaterno,
ApellidoMaterno,telefono,correo,empresaActual,colonia,direccion,presupuesto_dinero,Comentarios,ingresoFamiliar FROM clientes WHERE clientes.id=:idcliente");

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
   'empresaActual' => $datos[6],
   'colonia' => $datos[7],
   'direccion' => $datos[8],
   'presupuesto_dinero' => $datos[9],
   'Comentarios' => $datos[10],
   'ingresoFamiliar' => $datos[11],
   

);

echo json_encode($cliente);



?>