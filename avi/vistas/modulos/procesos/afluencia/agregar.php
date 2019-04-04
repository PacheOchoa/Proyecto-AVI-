<?php


/*$horamx = new DateTime("now", new DateTimeZone("America/Mexico_City"));

$hora = $horamx->format('g:ia');

$fecha=date('Y-m-d'); */


require_once "../../../../clases/conexion.php";







$stm = $conexion->prepare("INSERT INTO `afluencia` (`id_desarrollo`, `id_asesor`, `fecha`, `hora`, `id_cliente`, `evento`, `comentarios`) 
VALUES (:id_desarrolloI,:id_asesorI,:fechaI,:horaI,:id_clienteI,:eventoI,:comentariosI)");


//$stm = $conexion->prepare("CALL sp_insert_cliente(:Nombre,:ApellidoPaterno,:ApellidoMaterno,:telefono,:correo,:presupuesto,:autoridad,:necesidad,:tiempo,:edad,:observaciones,:perfilacion,:id_medio)");

$stm->BindParam(":id_desarrolloI",$_POST['desarrollo'],PDO::PARAM_INT);
$stm->BindParam(":id_asesorI",$_POST['asesor'],PDO::PARAM_INT);
$stm->BindParam(":fechaI",$_POST['fechaA']);
$stm->BindParam(":horaI",$_POST['horaA']);
$stm->BindParam(":id_clienteI",$_POST['idcliente'],PDO::PARAM_INT);
$stm->BindParam(":eventoI",$_POST['evento']);

$stm->BindParam(":comentariosI",$_POST['comentarios']);
//$stm->BindParam(":tipo_contratoI",$_POST['tipo']);



echo $stm->execute();