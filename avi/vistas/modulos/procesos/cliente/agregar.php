<?php

require_once "../../../../clases/conexion.php";
$num =0;
$num1 =25;
  
  session_start();

$stm2 = $conexion->prepare("select id from usuarios where usuario=:idUsuario");

$stm2->bindValue(":idUsuario",$_SESSION['usuario']);

$stm2->execute();

$res = $stm2->fetch();



  




$fecha=date('m/d/Y g:ia');
$horamx = new DateTime("now", new DateTimeZone("America/Mexico_City"));
$hora = $horamx->format('g:ia');

function quitar_acentos($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    return utf8_encode(htmlentities($cadena));
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

/*$stm = $conexion->prepare("INSERT INTO `clientes` (nombre,ApellidoPaterno,ApellidoMaterno,id_medio,
presupuesto_dinero,sexo,direccion,telefono,correo,edad,estadoCivil,Comentarios,numeroCompras,intensionCompra,
mascotas,empresaActual,ingresoFamiliar,ClubSocial,deportes,centrosComerciales,parques,restaurantes,
vidaNocturna,actividadesCulturales,actividadEconomica,EsContactCenter,perfila,fecha,hora,id_usuario) 
VALUES (:nombreI,:ApellidoPaternoI,:ApellidoMaternoI,:id_medioI,:presupuesto_dineroI,:sexoI,:direccionI,:telefonoI,:correoI,:edadI,:estadocivilI,:comentariosI,:numeroComprasI,:intensionCompraI,:mascotasI,:empresaActualI,:ingresoFamiliarI,:ClubSocialI,:deportesI,:centrosComercialesI,:parquesI,:restaurantesI,
:vidaNocturnaI,:actividadesCulturalesI,:actividadEconomicaI,:EsContactCenterI,:perfila,:fechaI,:horaI,:id_usuarioI)");*/





$stm3 = $conexion->prepare("SELECT correo,telefono FROM `clientes` WHERE correo=:correoI OR telefono=:telI");

$stm3->bindValue(":correoI",$_POST['email']);
$stm3->bindValue(":telI",$_POST['telefono']);

$stm3->execute();

$res_c = $stm3->fetch();

if($res_c>0){
    echo "Este cliente ya se encuentra registrado";
    
}else{



$stm = $conexion->prepare("INSERT INTO `clientes` (nombre,ApellidoPaterno,ApellidoMaterno,id_medio,presupuesto_dinero,sexo,direccion,telefono,correo,edad,estadoCivil,comentarios,numeroCompras,intensionCompra,mascotas,empresaActual,ingresoFamiliar,ClubSocial,deportes,centrosComerciales,parques,restaurantes,vidaNocturna,actividadesCulturales,actividadEconomica,EsContactCenter,perfila,fecha,hora,id_usuario) 
VALUES (:nombreI,:ApellidoPaternoI,:ApellidoMaternoI,:id_medioI,:presupuesto_dineroI,:sexoI,:direccionI,:telefonoI,:correoI,:edadI,:estadocivilI,:comentariosI,:numeroComprasI,:intensionCompraI,:mascotasI,:empresaActualI,:ingresoFamiliarI,:ClubSocialI,:deportesI,:centrosComercialesI,:parquesI,:restaurantesI,:vidaNocturnaI,:actividadesCulturalesI,:actividadEconomicaI,:EsContactCenterI,:perfilaI,:fechaI,:horaI,:id_usuarioI)");
  
  
   
    $stm->bindValue(":nombreI",strtoupper(quitar_acentos($_POST['nombre'])));
    $stm->bindValue(":ApellidoPaternoI",strtoupper(quitar_acentos($_POST['ApellidoPaterno'])));
    $stm->bindValue(":ApellidoMaternoI",strtoupper(quitar_acentos($_POST['ApellidoMaterno'])));
    $stm->bindValue(":id_medioI",$_POST['medio'],PDO::PARAM_INT);
    $stm->bindValue(":presupuesto_dineroI",$_POST['presupuesto_dinero']);

    $stm->bindValue(":sexoI",strtoupper(quitar_acentos($_POST['sexo'])));
    $stm->bindValue(":direccionI",strtoupper(quitar_acentos($_POST['direccion'])));
    $stm->bindValue(":telefonoI",$_POST['telefono']);
    $stm->bindValue(":correoI",strtoupper( $_POST['email']));
    $stm->bindValue(":edadI",strtoupper($_POST['edad']));
    $stm->bindValue(":estadocivilI",strtoupper(quitar_acentos($_POST['estadocivil'])));
    $stm->bindValue(":comentariosI",strtoupper(quitar_acentos($_POST['comentarios'])));
    $stm->bindValue(":numeroComprasI",$_POST['numeroCompras']);
    $stm->bindValue(":intensionCompraI",$_POST['intencionCompra']);
    $stm->bindValue(":mascotasI",$_POST['mascotas']);
    $stm->bindValue(":empresaActualI",strtoupper(quitar_acentos($_POST['empresaActual'])));
    $stm->bindValue(":ingresoFamiliarI",$_POST['ingreso']);
    $stm->bindValue(":ClubSocialI",$_POST['club']);

    $stm->bindValue(":deportesI",$_POST['deportes']);
    $stm->bindValue(":centrosComercialesI",$_POST['centro']);
    $stm->bindValue(":parquesI",$_POST['parques']);
    $stm->bindValue(":restaurantesI",$_POST['restaurantes']);
    $stm->bindValue(":vidaNocturnaI",$_POST['vidanocturna']);
    $stm->bindValue(":actividadesCulturalesI",$_POST['cultura']);
    $stm->bindValue(":actividadEconomicaI",$_POST['actividadeco']);
    $stm->bindValue(":EsContactCenterI",$_POST['contact']);
    $stm->bindValue(":perfilaI",strtoupper($_POST['perfila']));
    $stm->bindValue(":fechaI",$fecha);
    $stm->bindValue(":horaI",$hora);
  
    $stm->bindValue(":id_usuarioI",$res[0]); 
   

    echo $stm->execute();

    


}









   
    
    
  
    
    //$stm->BindParam(":edadI",$_POST['edad']);
    

  
   
   
  
   
   
  
    
   
    
   
  
  
    



  
   

    /*
    
  

    
    $stm->bindValue(":vidaNocturnaI",$_POST['vidanocturna']);
   

   
    $stm->bindValue(":ingresoFamiliar",$_POST['ingreso']); */


    



    
     

     







?>