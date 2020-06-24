<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AppDate</title>
     <link href="css/estilos.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
       <link type="text/css" rel="stylesheet" href="cssm/materialize.min.css" />
        <link type="text/css" rel="stylesheet" href="cssm/dataTables.materialize.css"/>
        <link type="text/css" rel="stylesheet" href="cssm/default.css" />
</head>
<body>
    <?php   
    if(!isset($_SESSION))  session_start();              
    if(!isset($_SESSION["conect"])) $_SESSION["conect"]="";
    if($_SESSION["conect"]=="969696969/969696969")
    {
       $bandera= true;
       $corr=$_SESSION["Correo"];  
    }  
    if($_SESSION["conect"]=="4599695/65479"){
        $bandera= true;
       $corr=$_SESSION["Correo"];
    }
     ?> 

    <div class="">
      <header>
    <nav>
        
         <?php if($_SESSION["conect"]=="969696969/969696969"){ 
        print"<div class='nav-wrapper'>
        <a href='http://localhost/AppDate/MenuAdm.php' class='brand-logo'>AppDate</a>
        <ul id='nav-mobile' class='right hide-on-med-and-down'>";
    }else{
        print"<div class='nav-wrapper'>
        <a href='http://localhost/AppDate/Index.php' class='brand-logo'>AppDate</a>
        <ul id='nav-mobile' class='right hide-on-med-and-down'>";
    }
    ?>
          

                     <li><a href='Role.php'>Roles</a></li>
                     <li><a href='Usuario.php'>Usuarios</a></li>
                     <li class='divider'></li>
                     <li><a href='Citas.php'>Citas</a></li>
                      <li><a href='TableViewDates.php'>Citas Aceptadas</a></li>
             <?php
                 $bandera=isset($bandera)?$bandera:false;
                    if($bandera)
                        {
                         print "<li><label color='black' class='control-label mr-sm-2'>Bienvenido: $corr</label></li>";
                         print "<li><a href='http://localhost/AppDate/Destruir.php'>Cerrar Sesion</a></li>";  
                        }
                        else
                         {
                            print "<li><a  href='http://localhost/AppDate/IndexL.php'>Inicar Sesion</a></li>";
                         }
                        ?>




            </ul>
         </div>
    </nav>
</header>
</div>
        <?php
         include("conexion.php");
        ?>  

                  <div class="demo-content">
                        <div id="notification-header">
                          <div style='position:relative'>
                            <button id='notification-icon' name='button' onclick='myFunction()' class='dropbtn'><span id='notification-count'>
                            <?php if($count>0) { echo $count; } ?>
                            </span><img src='img/icono1.png' /></button>
                            <div id='notification-latest'></div>
                          </div>          
                        </div>
                      </div>
             
            
   <?php if(isset($message)) { ?> <div class="error">  <?php echo $message; ?></div> <?php  } ?>
   <?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>
            
            
                     
                     
                
          

<script type="text/javascript" src="jsm/jquery.validate.min.js"> </script>
    <script type="text/javascript" src="jsm/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="jsm/materialize.min.js"></script>
    <script type="text/javascript" src="jsm/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="jsm/dataTables.materialize.js"></script>
    <script type="text/javascript" src="jsm/Dates.js"></script>

          

       

  <script type="text/javascript">
      function myFunction() {
        $.ajax({
          url: "notificaciones.php",
          type: "POST",
          processData:false,
          success: function(data){
            $("#notification-count").remove();                  
            $("#notification-latest").show();$("#notification-latest").html(data);
          },
          error: function(){}           
        });
      }
                                 
      $(document).ready(function() {
        $('body').click(function(e){
          if ( e.target.id != 'notification-icon'){
            $("#notification-latest").hide();
          }
        });
      });                                     
    </script> 
    
</body>
</html>