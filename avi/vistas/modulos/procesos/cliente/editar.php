<?php

require_once "../../../../clases/conexion.php";

$num =0;
$num1 =25;


$idcliente = $_POST['idclienteU'];

$fecha=date('m/d/Y g:ia');
$horamx = new DateTime("now", new DateTimeZone("America/Mexico_City"));
$hora = $horamx->format('g:ia');

function quitar_acentos($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    return utf8_encode($cadena);
} 


//echo json_encode($idcliente);

//die();


$stm = $conexion->prepare("UPDATE clientes
 SET Nombre=:nombre,ApellidoPaterno=:ApellidoP,ApellidoMaterno=:ApellidoM,telefono=:telefonoU,
correo=:emailU,edad=:edadU,fecha=:fechaU,hora=:horaU,empresaActual=:empresaActualU,colonia=:coloniaU,direccion=:direccionU,presupuesto_dinero=:presupuesto_dineroU,estadocivil=:estadocivilU,comentarios=:comentariosU,ingresoFamiliar=:ingresoU WHERE id=:idcliente");




        $stm->BindParam(":nombre",$_POST['nombreU'],PDO::PARAM_STR);
        $stm->BindParam(":ApellidoP",$_POST['ApellidoPaternoU'],PDO::PARAM_STR);
        $stm->BindParam(":ApellidoM",$_POST['ApellidoMaternoU'],PDO::PARAM_STR);
        $stm->BindParam(":telefonoU",$_POST['telefonoU'],PDO::PARAM_STR);
        $stm->BindParam(":emailU",$_POST['emailU'],PDO::PARAM_STR);
        $stm->BindParam(":edadU",$_POST['edadU']);
        $stm->BindParam(":fechaU",$_POST['fechaU']);
        $stm->BindParam(":horaU",$_POST['horaU']);
        $stm->BindParam(":empresaActualU",$_POST['empresaActualU'],PDO::PARAM_STR);
        $stm->BindParam(":coloniaU",$_POST['coloniaU'],PDO::PARAM_STR);
        $stm->BindParam(":direccionU",$_POST['direccionU'],PDO::PARAM_STR);
        $stm->BindParam(":presupuesto_dineroU",$_POST['presupuesto_dineroU'],PDO::PARAM_STR);
        $stm->BindParam(":estadocivilU",$_POST['estadocivilU']);
        $stm->BindParam(":comentariosU",$_POST['comentariosU'],PDO::PARAM_STR);
       
        $stm->BindParam(":ingresoU",$_POST['ingresoU'],PDO::PARAM_STR);

        $stm->BindParam(":idcliente",$idcliente);

        echo $stm->execute();
        
   

 





?>