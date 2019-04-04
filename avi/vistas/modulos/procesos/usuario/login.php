<?php

  session_start();

 require_once "../../../../clases/conexion.php";

 


  $pass = sha1($_POST['pass']);
  $sql = "SELECT * FROM usuarios where usuario=:usuarioI AND pass=:passI";
  $stm = $conexion->prepare($sql);

  $stm->BindParam(":usuarioI",$_POST['email']);
  $stm->BindParam(":passI",$pass);

  $stm->execute();
  $conteo = $stm->rowCount();

  $data =$stm->fetch(PDO::FETCH_OBJ);
  

  

  if($conteo){

     //
         $_SESSION['usuario'] =$data->usuario;
        echo 1;
          
  }else{
      echo 0;
  }
 


  





?>