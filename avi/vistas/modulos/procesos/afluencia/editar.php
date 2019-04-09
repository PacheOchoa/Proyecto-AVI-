<?php

require_once "../../../../clases/conexion.php";

$idasesor = $_POST['idclienteA'];


function quitar_acentos($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    
    return utf8_encode(htmlentities(strtoupper($cadena)));
} 


$stm = $conexion->prepare("UPDATE afluencia SET id_desarrollo=:desarrolloU,id_asesor=:asesorU,Fecha=:FechaU,Hora=:HoraU,
Evento=:EventoU,comentarios=:comentariosU WHERE id=:idaflu");





$stm->bindValue(":desarrolloU",$_POST['desarrollo']);
$stm->bindValue(":asesorU",$_POST['asesor']);
$stm->bindValue(":FechaU",$_POST['fechaA']);
$stm->bindValue(":HoraU",$_POST['horaA']);
$stm->bindValue(":EventoU",$_POST['evento']);

$stm->bindValue(":comentariosU",quitar_acentos($_POST['comentarios']));
$stm->bindValue(":idaflu",$idasesor,PDO::PARAM_INT);

echo $stm->execute();








?>