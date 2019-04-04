<?php

require_once "../../../../clases/conexion.php";

$id_c =  $_POST['cliente'];



$stm = $conexion->prepare("INSERT INTO asesores(Desarrollo,Nombre,Fecha,Hora,id_cliente,Evento,Registra,comentarios,tipo_contrato) 
VALUES(:desarrolloI,:NombreI,:FechaI,:HoraI,:id_clienteI,:EventoI,:RegistraI,:ComentariosI,:Tipo_contratoI)");


//$stm = $conexion->prepare("CALL sp_insert_cliente(:Nombre,:ApellidoPaterno,:ApellidoMaterno,:telefono,:correo,:presupuesto,:autoridad,:necesidad,:tiempo,:edad,:observaciones,:perfilacion,:id_medio)");

$stm->BindParam(":desarrolloI",$_POST['desarrollo']);
$stm->BindParam(":NombreI",$_POST['nombre']);
$stm->BindParam(":FechaI",$_POST['fecha']);
$stm->BindParam(":HoraI",$_POST['hora']);
$stm->BindParam(":id_clienteI",$_POST['cliente'],PDO::PARAM_INT);
$stm->BindParam(":EventoI",$_POST['evento']);
$stm->BindParam(":RegistraI",$_POST['registra']);
$stm->BindParam(":ComentariosI",$_POST['comentarios']);
$stm->BindParam(":Tipo_contratoI",$_POST['tipo_contrato']);



echo $stm->execute();