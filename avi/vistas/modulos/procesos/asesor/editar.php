<?php

require_once "../../../../clases/conexion.php";

$idasesor = $_POST['idasesor'];

$stm = $conexion->prepare("UPDATE asesores SET desarrollo=:desarrolloU,Nombre=:NombreU,Fecha=:FechaU,Hora=:HoraU,
Evento=:EventoU,Registra=:RegistraU,comentarios=:comentariosU,tipo_contrato=:tipo_contratoU WHERE id=:idasesor");





$stm->BindParam(":desarrolloU",$_POST['desarrolloU']);
$stm->BindParam(":NombreU",$_POST['nombreU']);
$stm->BindParam(":FechaU",$_POST['fechaU']);
$stm->BindParam(":HoraU",$_POST['horaU']);
$stm->BindParam(":EventoU",$_POST['eventoU']);
$stm->BindParam(":RegistraU",$_POST['registraU']);
$stm->BindParam(":comentariosU",$_POST['comentariosU']);
$stm->BindParam(":tipo_contratoU",$_POST['tipo_contratoU']);
$stm->BindParam(":idasesor",$idasesor,PDO::PARAM_INT);

echo $stm->execute();








?>