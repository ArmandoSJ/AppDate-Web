<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Citas</title>
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
        
    <div class="" >

         <?php 
            include_once("NavUsr.php");
          ?>  
    </div>
<!--Comienzo de las cajas de texto de registro -->
<div class="container" align="center">
  <form name="frm" id ="frm">
     <!--Beginning of identificator -->
       <div class="form-group">
              <label for="idC" class="control-label col-md-4"></label>
                   <div class="col-md-8">
                     <input type="hidden" name="idC" id="idC" class="form-control"/>
                   </div>
        </div>
      <!--Close of identificator -->

      <!--Beginning of class name -->
        <div class="form-group">
            <div class="row">
              <div class="input-field col s12">
                <div class="col-md-8">
                    <input id="name" type="text" class="validate">
                <label for="name">Nombre del Citado</label>
                </div>
                
              </div>
            </div>
        </div>
      <!--Close of class name -->

        <div class="form-group">
            <div class="row">
              <div class="input-field col s12">
                <div class="col-md-8">
                  <input type="date" class="datepicker">
                 </div>
             </div>
            </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="input-field col s12">
              <div class="col-md-8">
                <input type="time" class="timepicker"/>
              </div>
            </div>  
          </div>
        </div>

          <div class="form-group">
             <label for="IdR" class="control-label col-md-4">Locacion</label>
              <div class="col-md-8">
                <?php include_once("cboLocation.php"); ?>
              </div>  
          </div>            
         
  </form>
</div><!-- Cierre del conteiner -->

<div id="msj" align="center"></div>
<div id="table" align="center"></div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="jsm/jquery.validate.min.js"> </script>
    <script type="text/javascript" src="jsm/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="jsm/materialize.min.js"></script>
    <script type="text/javascript" src="jsm/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="jsm/dataTables.materialize.js"></script>
    <script type="text/javascript" src="jsm/Dates.js"></script>
    <script>
     
$('.datepicker').pickadate({
  selectMonths:true , 
  selectYears:15
});

$('.timepicker').pickatime({
    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: false, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button
    cleartext: 'Clear', // text for clear-button
    canceltext: 'Cancel', // Text for cancel-button,
    container: undefined, // ex. 'body' will append picker to body
    autoclose: false, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function(){} //Function for after opening timepicker
  });

$(document).ready(function() {
    $('select').material_select();
  });

</script>
<script>
        $("#table").load("TableDates.php");
        $("#table").on("click","#add-record",function()
        {

           $("#idC").val($(this).attr("data-id")); 
           

           var parametros='idD='+$("#idC").val();
        //alert(parametros);
                    $.ajax({

                    url:"UpdateStatus.php",
                    type:"get",
                    data:parametros,
                    success: function(respuesta)
                        {
                          //alert(respuesta);
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