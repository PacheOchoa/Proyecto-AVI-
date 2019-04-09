<?php
/**
 * Description: ARCHIVO DE CONEXION PARA LA BASE DE DATOS DEL SISTEMA
 * ESTA CLASE DEFINE LA CONEXION A LA BASE DE DATOS AVI PARA EL USO DEL SISTEMA
 * 
 * @author OCHOA ZAMORA SERGIO 
 * @version 1.1
 */


try {
    $usuario = "g4d8p5g9_root";
    $contraseña = "avi02.";
    $conexion = new PDO('mysql:host=50.116.84.114;dbname=g4d8p5g9_AVI2;charset=UTF8', $usuario, $contraseña,$op=null);
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>

