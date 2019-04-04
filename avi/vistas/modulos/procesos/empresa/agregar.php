<?php

require_once "../../../../clases/conexion.php";

$id_giro =  $_POST['giro'];



$stm = $conexion->prepare("INSERT INTO empresa(nombre,id_giro,tamano_empresa) values(:nombreI,:id_giroI,:tamanio_empresaI)");


//$stm = $conexion->prepare("CALL sp_insert_cliente(:Nombre,:ApellidoPaterno,:ApellidoMaterno,:telefono,:correo,:presupuesto,:autoridad,:necesidad,:tiempo,:edad,:observaciones,:perfilacion,:id_medio)");

$stm->BindParam(":nombreI",$_POST['nombre']);
$stm->BindParam(":id_giroI",$_POST['giro']);
$stm->BindParam(":tamanio_empresaI",$_POST['tamanio']);




echo $stm->execute();