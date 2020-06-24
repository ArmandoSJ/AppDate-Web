<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Citas Aceptadas</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="cssm/materialize.min.css" />
        <link type="text/css" rel="stylesheet" href="cssm/dataTables.materialize.css"/>
        <link type="text/css" rel="stylesheet" href="cssm/default.css"/>
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
        
    <!--BEGINNING OF TYPE OF LOGIN -->
    <div class="" >

         <?php if($_SESSION["conect"]=="969696969/969696969")include_once("NavAdm.php");
         else{
            include_once("NavUsr.php");
         } ?>  
    </div>
    <!--END OF TYPE OF LOGIN -->

<!--BEGINNING CONTAINER OF IDENTIFICATION-->
    <div class="container" >
       <div class="form-group">
              <label for="idC" class="control-label col-md-4"></label>
                   <div class="col-md-8">
                     <input type="text" name="idC" id="idC" class="form-control"/>
                   </div>
        </div>
    </div> 
    <!--END CONTAINER OF IDENTIFICATION-->



<div id="msj" align="center"></div>
<div id="table" align="center"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="jsm/jquery.validate.min.js"> </script>
    <script type="text/javascript" src="jsm/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="jsm/materialize.min.js"></script>
    <script type="text/javascript" src="jsm/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="jsm/dataTables.materialize.js"></script>
    <script type="text/javascript" src="jsm/Dates.js"></script>
    
<script>
        $("#table").load("TableDates.php");
        $("#table").on("click","#add-record",function()
        {
           $("#idC").val($(this).attr("data-id")); 
           

           var parametros='idD='+$("#idC").val();
        alert(parametros);
                    $.ajax({

                    url:"UpdateStatus.php",
                    type:"get",
                    data:parametros,
                    success: function(respuesta)
                        {
                         alert(respuesta);
                            if($.trim(respuesta)==1)
                                {
                                    $("#msj").html('<h3>Cita Finalizada</h3>');
                                    setTimeout(function()
                                    {
                                     $("#msj").fadeOut(2000);
                                    },2000);
                                    $("#idC").val("");
                $("#table").load("TableDates.php");
                                }
                            else
                            {
                                   $("#msj").html('<h3>Cita No Finalizada</h3>');
                                    setTimeout(function()
                                    {
                                     $("#msj").fadeOut(2000);
                                    },2000);
                                
                            }
                            
                        }
                    });



        });




</script>

 </body>
</html>