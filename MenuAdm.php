<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AppDate Administrador</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" />
        <link type="text/css" rel="stylesheet" href="css/dataTables.materialize.css"/>
        <link type="text/css" rel="stylesheet" href="css/default.css" />
</head>
<body>
     <!--BEGINNING OF SESSION VARIABLES -->
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
     <!--END OF SESSION VARIABLES -->   

    <!--BEGINNING OF TYPE OF LOGIN -->
    <div class="" >

         <?php if($_SESSION["conect"]=="969696969/969696969")include_once("NavAdm.php");
         else{
            include_once("NavUsr.php");
         } ?>  
    </div>
    <!--END OF TYPE OF LOGIN -->

<div class="container" >

     <div class="carousel">
    <a class="carousel-item" href="#one!"><img src="./img/img1.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="img/img2.jpg"></a>
    <a class="carousel-item" href="#three!"><img src="img/img3.jpg"></a>
    <a class="carousel-item" href="#four!"><img src="img/img4.jpg"></a>
 </div>

 </div>

    


     <!--BEGINNING OF DIVS OF MESSAGE AND TABLE -->
     <div id="msj" align="center"></div>
     <div id="table" align="center"></div> 
     <!--END OF DIVS OF MESSAGE AND TABLE -->

    <!--BEGINNING OF THE  LIBRERIES OF JAVASCRIPT  -->
    <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.materialize.js"></script>
    <!--END OF THE  LIBRERIES OF JAVASCRIPT  -->

    <script>
        
        $(document).ready(function(){
      $('.carousel').carousel();
    });
    </script>
</body>
</html>