<?php
try {
    $usuario = "root";
    $contraseña = "";
    $conexion = new PDO('mysql:host=localhost;dbname=avi;charset=UTF8', $usuario, $contraseña,$op=null);
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>

