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
    
    return utf8_encode(htmlentities(strtoupper($cadena)));
} 


//echo json_encode($idcliente);

//die();


$stm = $conexion->prepare("UPDATE clientes
 SET nombre=:nombreU,ApellidoPaterno=:ApellidoPaternoU,ApellidoMaterno=:ApellidoMaternoU,presupuesto_dinero=:presupuesto_dineroU,sexo=:sexoU,telefono=:telefonoU,correo=:emailU,edad=:edadU,estadocivil=:estadocivilU,comentarios=:comentariosU,numeroCompras=:numeroComprasU,intensionCompra=:intencionCompraU,mascotas=:mascotasU,empresaActual=:empresaActualU,ingresoFamiliar=:ingresoU,clubSocial=:clubU,deportes=:deportesU,centrosComerciales=:centroU,parques=:parquesU,restaurantes=:restaurantesU,vidaNocturna=:vidanocturnaU,actividadesCulturales=:culturaU,actividadEconomica=:actividadecoU,EsContactCenter=:contactU,
 perfila=:perfilaU WHERE id=:idcliente");




        $stm->bindValue(":nombreU",quitar_acentos($_POST['nombreU']),PDO::PARAM_STR);
        $stm->bindValue(":ApellidoPaternoU",quitar_acentos($_POST['ApellidoPaternoU']),PDO::PARAM_STR);
        $stm->bindValue(":ApellidoMaternoU",quitar_acentos($_POST['ApellidoMaternoU']),PDO::PARAM_STR);
        $stm->bindValue(":presupuesto_dineroU",$_POST['presupuesto_dineroU']);
        $stm->bindValue(":sexoU",$_POST['sexoU']);
       

        $stm->bindValue(":telefonoU",$_POST['telefonoU']);
        $stm->bindValue(":emailU",$_POST['emailU']);
        $stm->bindValue(":edadU",$_POST['edadU']);
        $stm->bindValue(":estadocivilU",$_POST['estadocivilU']);
        $stm->bindValue(":comentariosU",$_POST['comentarios']);
        $stm->bindValue(":numeroComprasU",$_POST['numeroComprasU']);
        $stm->bindValue(":intencionCompraU",$_POST['telefonoU']);


        $stm->bindValue(":mascotasU",$_POST['mascotasU']);
        $stm->bindValue(":empresaActualU",$_POST['empresaActualU']);
        $stm->bindValue(":ingresoU",@$_POST['ingresoU']);

        $stm->bindValue(":clubU",$_POST['clubU']);
        $stm->bindValue(":deportesU",$_POST['deportesU']);
        $stm->bindValue(":centroU",$_POST['centroU']);

        $stm->bindValue(":parquesU",$_POST['parquesU']);
        $stm->bindValue(":restaurantesU",$_POST['restaurantesU']);
        $stm->bindValue(":vidanocturnaU",$_POST['vidanocturnaU']);

        $stm->bindValue(":culturaU",$_POST['culturaU']);
        $stm->bindValue(":actividadecoU",$_POST['actividadecoU']);
        $stm->bindValue(":contactU",$_POST['contactU']);

        $stm->bindValue(":perfilaU",$_POST['perfilaU']);

        
       

        $stm->bindValue(":idcliente",$idcliente);

        echo $stm->execute();
        
   

 





?>