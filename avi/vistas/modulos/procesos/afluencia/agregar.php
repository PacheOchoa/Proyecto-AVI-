<?php


/*$horamx = new DateTime("now", new DateTimeZone("America/Mexico_City"));

$hora = $horamx->format('g:ia');

$fecha=date('Y-m-d'); */

 
require_once "../../../../clases/conexion.php";


  session_start();

$stm2 = $conexion->prepare("select id from usuarios where usuario=:idUsuario");

$stm2->bindValue(":idUsuario",$_SESSION['usuario']);

$stm2->execute();

$res = $stm2->fetch();





function quitar_acentos($cadena){
  $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
  $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
  $cadena = utf8_decode($cadena);
  $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
  return utf8_encode(htmlentities(strtoupper($cadena)));
}



$stm = $conexion->prepare("INSERT INTO `afluencia` (`id_desarrollo`, `id_asesor`, `fecha`, `hora`, `id_cliente`, `evento`, `comentarios`,`id_usuario`) 
VALUES (:id_desarrolloI,:id_asesorI,:fechaI,:horaI,:id_clienteI,:eventoI,:comentariosI,:id_usuarioI)");


//$stm = $conexion->prepare("CALL sp_insert_cliente(:Nombre,:ApellidoPaterno,:ApellidoMaterno,:telefono,:correo,:presupuesto,:autoridad,:necesidad,:tiempo,:edad,:observaciones,:perfilacion,:id_medio)");

$stm->bindValue(":id_desarrolloI",$_POST['desarrollo'],PDO::PARAM_INT);
$stm->bindValue(":id_asesorI",$_POST['asesor'],PDO::PARAM_INT);
$stm->bindValue(":fechaI",$_POST['fechaA']);
$stm->bindValue(":horaI",$_POST['horaA']);
$stm->bindValue(":id_clienteI",$_POST['idcliente'],PDO::PARAM_INT);
$stm->bindValue(":eventoI",$_POST['evento']);

$stm->bindValue(":comentariosI",quitar_acentos($_POST['comentarios']));
$stm->bindValue(":id_usuarioI",$res[0]);



echo $stm->execute();