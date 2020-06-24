<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

        <link type="text/css" rel="stylesheet" href="cssm/materialize.min.css" />
        <link type="text/css" rel="stylesheet" href="cssm/dataTables.materialize.css"/>
        <link type="text/css" rel="stylesheet" href="cssm/default.css" />
         <!--  <link rel="stylesheet" href="css/bootstrap.min.css"> -->
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
        
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/p.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-53">
						Ingresar
					</span>
					
					<div class="input-field col s12" data-validate = "Username is required">
                        <input name="corrA" type="email" id="corrA" class="input100">
                        <label for="email">Email</label>
                        <span class="focus-input100"></span>
                    </div>
					
					<div class="input-field col s12" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" id="pass">
                        <label for="password">password</label>
						<span class="focus-input100"></span>
					</div>
                    
                    

					
                   <div id="msg" align="center"></div>
					<div class="w-full text-center p-t-55">
						

						
					</div>
                    <div class="input-field col s12">
                        <a id="aceptar" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">✔</i></a>
                        
                    </div>
                    <div class="input-field col s12" >
                        <a href="index.php" class="btn-floating btn-large waves-effect waves-light blue right"><i class="material-icons">↩</i></a>
                    </div>
				</form>
			</div>
		</div>
	</div>
	


                
                 
             </div>
         </div>
     </div>
             </div>
         </div>
     </div>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
 <script type="text/javascript" src="jsm/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="jsm/materialize.min.js"></script>
    <script type="text/javascript" src="jsm/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="jsm/dataTables.materialize.js"></script>
    <script>
    $("#aceptar").click(function(){
         var parametros = 'corr='+$("#corrA").val()+
            '&pass='+$("#pass").val();
       alert(parametros);
         $.ajax({
             url:"ValidacionU.php",
             type:"post",
             data:parametros,
             success:function(respuesta){
                    alert(respuesta);
                 if($.trim(respuesta)=='1')
                     {
                       document.location.href="MenuAdm.php";
                       
                     }
                 if($.trim(respuesta)=='2')
                     {
                       document.location.href="Index.php";
                       
                     }
                 if($.trim(respuesta)=='-100')
                     {
                       $("#msg").html("Contraseña o Usuario incorrecta");
                       $("#corr").focus();
                       
                     }
             }//fin del success
         });//fin del ajax
    });
       
 </script>
</body>
</html>