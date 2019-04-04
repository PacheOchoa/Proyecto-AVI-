<?php

require_once "../../../../clases/conexion.php";
$num =0;
$num1 =25;




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

/*function traeID($user,$pass){
    require_once "../../../../clases/conexion.php";

    $password=sha1($pass);
    $sql="SELECT id
            from usuarios 
            where usuario='$user'
            and pass='$password'"; 
    $result=mysqli_query($conexion,$sql);
    return mysqli_fetch_row($result)[0];
} */

/*$stm = $conexion->prepare("INSERT INTO `clientes` (nombre,ApellidoPaterno,ApellidoMaterno,telefono,correo,edad,id_medio,
fecha,hora,empresaActual,sexo,colonia,direccion,presupuesto_dinero,estadocivil,comentarios,perfila,numeroCompras,intensionCompra,mascotas,ClubSocial,
deportesI,centrosComerciales,parques,restaurantesI,vidaNocturna,actividadesCulturales,ingresoFamiliar) 
VALUES (:nombreI,:ApellidoPaternoI,:ApellidoMaternoI,:telefonoI,:correoI,:edadI,:id_medioI,:fechaI,:horaI,:empresaActualI,:sexoI,:coloniaI,
:direccionI,:presupuesto_dineroI,:estadocivilI,:comentariosI,:perfilaI,:numeroComprasI,
:intensionCompraI,:mascotasI,:ClubSocialI,:deportesI,
:centrosComercialesI,:parquesI,:restaurantesI,:vidaNocturnaI,:actividadesCulturales,:ingresoFamiliar)"); */

$stm = $conexion->prepare("INSERT INTO `clientes` (nombre,ApellidoPaterno,ApellidoMaterno,telefono,correo,edad,id_medio,
fecha,hora,empresaActual,sexo,colonia,direccion,presupuesto_dinero,estadocivil,comentarios,perfila,numeroCompras,intensionCompra,mascotas,ClubSocial,deportes,centrosComerciales,parques,restaurantes,vidaNocturna,actividadesCulturales,ingresoFamiliar,actividadEconomica,EsContactCenter) 
VALUES (:nombreI,:ApellidoPaternoI,:ApellidoMaternoI,:telefonoI,:correoI,:edadI,:id_medioI,:fechaI,:horaI,:empresaActualI,:sexoI,:coloniaI,
:direccionI,:presupuesto_dineroI,:estadocivilI,:comentariosI,:perfilaI,:numeroComprasI,:intensionCompraI,:mascotasI,:ClubSocialI,:deportesI,:centrosComercialesI,:parquesI,:restaurantesI,:vidaNocturnaI,:actividadesCulturalesI,:ingresoFamiliarI,:actividadEconomicaI,:EsContactCenterI)");




   
    $stm->bindValue(":nombreI",strtoupper(quitar_acentos($_POST['nombre'])));
    $stm->bindValue(":ApellidoPaternoI",strtoupper(quitar_acentos($_POST['ApellidoPaterno'])));
    $stm->bindValue(":ApellidoMaternoI",strtoupper(quitar_acentos($_POST['ApellidoMaterno'])));
    $stm->bindValue(":telefonoI",$_POST['telefono']);
    $stm->bindValue(":correoI",strtoupper($_POST['email']));
    $stm->bindValue(":edadI",strtoupper($_POST['edad']));
    //$stm->BindParam(":edadI",$_POST['edad']);
    
    $stm->bindValue(":id_medioI",$_POST['medio'],PDO::PARAM_INT);
    $stm->bindValue(":fechaI",$fecha);
    $stm->bindValue(":horaI",$hora);
    $stm->bindValue(":empresaActualI",strtoupper(quitar_acentos($_POST['empresaActual'])));
    $stm->bindValue(":sexoI",strtoupper(quitar_acentos($_POST['sexo'])));
    $stm->bindValue(":coloniaI",strtoupper(quitar_acentos($_POST['colonia'])));
    $stm->bindValue(":direccionI",strtoupper(quitar_acentos($_POST['direccion'])));
    $stm->bindValue(":presupuesto_dineroI",$_POST['presupuesto_dinero']);
    $stm->bindValue(":estadocivilI",strtoupper(quitar_acentos($_POST['estadocivil'])));
    $stm->bindValue(":comentariosI",strtoupper(quitar_acentos($_POST['comentarios'])));
    $stm->bindValue(":perfilaI",strtoupper(quitar_acentos($_POST['perfila'])));
    $stm->bindValue(":numeroComprasI",strtoupper(quitar_acentos($_POST['numeroCompras'])));
    $stm->bindValue(":intensionCompraI",$_POST['intencionCompra']);
    $stm->bindValue(":mascotasI",$_POST['mascotas']);
    $stm->bindValue(":ClubSocialI",$_POST['club']);
    $stm->bindValue(":deportesI",$_POST['deportes']);
    $stm->bindValue(":centrosComercialesI",$_POST['centro']);
    $stm->bindValue(":parquesI",$_POST['parques']);
    $stm->bindValue(":restaurantesI",$_POST['restaurantes']);
    $stm->bindValue(":vidaNocturnaI",$_POST['vidanocturna']);
    
    $stm->bindValue(":actividadesCulturalesI",$_POST['cultura']);
    $stm->bindValue(":ingresoFamiliarI",$_POST['ingreso']);
    $stm->bindValue(":actividadEconomicaI",$_POST['actividadeco']);
    $stm->bindValue(":EsContactCenterI",$_POST['contact']);



  
   

    /*
    
  

    
    $stm->bindValue(":vidaNocturnaI",$_POST['vidanocturna']);
   

   
    $stm->bindValue(":ingresoFamiliar",$_POST['ingreso']); */


    



    echo $stm->execute();
     

     







?>