
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AVI | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  
  <body class="hold-transition login-page" style="background-color:white;">
    <div class="login-box">
      <div class="login-logo">
        <!-- -->
        
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <img src="../../avi_oficial/vistas/img/plantilla/logo_guia.jpg" width="330" height="160"> <br>
        <!--<p class="login-box-msg">Iniciar Sesión</p> -->
        

         <form id="frmlogin" method="POST">
             
         
            <input type="text" class="form-control" placeholder="Email" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         
          
            <input type="password" class="form-control" placeholder="Password" name="pass"> <br>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            <span>
              <button class="btn btn-primary" id="btnIngreso">Iniciar Sesión</button>
              
              </span>

              </form>
              <?php

        
        
      ?>
         
          
            </div><!-- /.col -->
        
          </div>


       

        

   
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

    <script>
      $(document).ready(function(){
         $("#btnIngreso").click(function(){
               //alert("hola");
               datos = $("#frmlogin").serialize();
                //alert(datos);
                
               $.ajax({
                   type: "POST",
                   data : datos,
                   url: "vistas/modulos/procesos/usuario/login.php",
                   success : function(r){
                        if(r==1){
                            window.location="inicio";
                            
                        }else{
                            alert("usuario y/o password incorrectos");
                        }
                   }
               });
               
         });
      });
    </script>


<!--<script src="././vistas/plugins/sweetalert2/sweetalert2.all.js"></script> -->
  </body>
</html>