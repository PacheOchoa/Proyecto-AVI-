<?php

require_once "../../../../clases/conexion.php";

$idasesor = $_POST['idclienteA'];

$stm = $conexion->prepare("UPDATE afluencia SET id_desarrollo=:desarrolloU,id_asesor=:asesorU,Fecha=:FechaU,Hora=:HoraU,
Evento=:EventoU,comentarios=:comentariosU WHERE id=:idaflu");





$stm->BindParam(":desarrolloU",$_POST['desarrollo']);
$stm->BindParam(":asesorU",$_POST['asesor']);
$stm->BindParam(":FechaU",$_POST['fechaA']);
$stm->BindParam(":HoraU",$_POST['horaA']);
$stm->BindParam(":EventoU",$_POST['evento']);

$stm->BindParam(":comentariosU",$_POST['comentarios']);
$stm->BindParam(":idaflu",$idasesor,PDO::PARAM_INT);

echo $stm->execute();








?>