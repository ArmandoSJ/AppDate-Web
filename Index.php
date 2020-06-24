<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>AppDate</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <!-- Materalize -->
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
        
    <div class="" >

         <?php if($_SESSION["conect"]=="969696969/969696969")include_once("NavAdm.php");
         else{
            include_once("NavUsr.php");
         } ?>  
    </div>
<div class="container" >

     <div class="carousel">
    <a class="carousel-item" href="#one!"><img src="./img/img1.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="img/img2.jpg"></a>
    <a class="carousel-item" href="#three!"><img src="img/img3.jpg"></a>
    <a class="carousel-item" href="#four!"><img src="img/img4.jpg"></a>
 </div>

 </div>
  
    
      
     
       
      <!--Close of identificator -->




    <div class="" >
         <?php include_once("Footer.php"); ?> 
    </div>

                      

          

    
     
    <script type="text/javascript" src="jsm/jquery.validate.min.js"> </script>
    <script type="text/javascript" src="jsm/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="jsm/materialize.min.js"></script>
    <script type="text/javascript" src="jsm/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="jsm/dataTables.materialize.js"></script>
    <script type="text/javascript" src="js/Dates.js"></script>

<script >
    $(document).ready(function(){
      $('.carousel').carousel();
    });
     
</script>
    

</body>
</html>