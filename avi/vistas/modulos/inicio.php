<?php
  
    require_once "./clases/conexion.php";

$stm2 = $conexion->prepare("select id from usuarios where usuario=:idUsuario");

$stm2->bindValue(":idUsuario",$_SESSION['usuario']);

$stm2->execute();

$res = $stm2->fetch();



$stm3 = $conexion->prepare("select id from usuarios where usuario=:idUsuario");

$stm3->bindValue(":idUsuario",$_SESSION['usuario']);

$stm3->execute();

$rs =  $stm3->fetch();


   $stm = $conexion->prepare("SELECT COUNT(*) AS total FROM clientes");
   $stm->bindValue(":idU",$res[0]);
   $stm->execute();

   $res = $stm->fetch(PDO::FETCH_ASSOC);


   //afluencias

    $stmA = $conexion->prepare("SELECT COUNT(*) AS total FROM afluencia where afluencia.id_usuario=:idUA");
   $stmA->bindValue(":idUA",$rs[0]);
   $stmA->execute();

   $aflu = $stmA->fetch(PDO::FETCH_ASSOC);

  

  



?>

<?php

 


?>



<link rel="stylesheet" href="vistas/modulos/icomoon/style.css"/>
<!--<link rel="stylesheet" href="vistas/modulos/empresa/stylesE.css"/> -->
<style>
  @media (max-width: 200px) and (max-heigth: 160px) {
    .mifuente {
        font-size: 20px;
    }
}

</style>

<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    Tablero del avi
    <small>Panel de control</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      

    </ol>

  </section>
  <!-- content-header -->

  <!-- content -->
  <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $res['total']; ?></h3>
                  <p>Clientes</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-circle" aria-hidden="true" style="color:black;"></i>
                </div>
                <a href="clientes" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
              </div>
             </div>

            <div class="col-lg-3 col-xs-6">
              <!-- small box  -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $aflu['total']; ?></h3>
                  <p>Afluencias</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true" style="color:black;"></i>
                </div>
                <a href="afluencia" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
              </div>
              </div>

              <!--<div class="col-lg-3 col-xs-6">
              
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $ase['total']; ?></h3>
                  <p>Asesores</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users" aria-hidden="true" style="color:black;"></i>
                </div>
                <a href="asesor" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>-->

            <!--<div class="col-lg-3 col-xs-6">
              
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>0</h3>
                  <p>Pipeline</p>
                  <h1 style="color: red;font-size: 20px;" class="mifuente">PRÓXIMAMENTE</h1>
                </div>
                <div class="icon">
                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                </div>
                <a href="pipeline" class="small-box-footer">Ver más <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div> -->

            <!--<div class="col-lg-3 col-xs-6">
              
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php //echo $empresa['total']; ?></h3>
                  <p>Empresas</p>
                </div>
                <div class="icon">
                  <i class="fa-building-o" style="color:red;"></i>
                </div>
                <a href="empresa" class="small-box-footer"><span style="color:black;"><b>Ver más </b></span> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>-->


            <!--<div class="col-lg-3 col-xs-6">
               small box 
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php //echo $empresa['total']; ?>0</h3>
                  <p>VI</p>
                  <span style="color: red;font-size: 20px;" class="mifuente">PRÓXIMAMENTE</span>
                </div>
                <div class="icon">
                <i class="fa fa-money" aria-hidden="true"></i>
                </div>
                <a href="VI" class="small-box-footer"><span style="color:black;"><b>Ver más </b></span> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>-->

              <!--<div class="col-lg-3 col-xs-6">
              
              <div class="small-box bg-black">
                <div class="inner">
                  <h3><?php //echo $empresa['total']; ?></h3>
                  <p>Seguimiento</p>
                  <span style="color: red;font-size: 20px;" class="mifuente">PRÓXIMAMENTE</span>
                </div>
                <div class="icon">
                <i class="" aria-hidden="true"></i>
                </div>
                <a href="seguimiento" class="small-box-footer"><span style="color:white;">Ver más </span> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div> <!-- ./col -->
            
          
              

            <!--</section>
  <!-- content -->

</div>
<!-- content-wrapper -->

  