<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AppDate</title>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" />
        <link type="text/css" rel="stylesheet" href="css/dataTables.materialize.css"/>
        <link type="text/css" rel="stylesheet" href="css/default.css" />
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
   
    
</body>
</html>