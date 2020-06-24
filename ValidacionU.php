<?php
   include_once("utilerias/database_utilerias.php");
 $corr=$_POST["corr"];
 $contr=$_POST["pass"];
          
     $resul=valduser($corr);
    if(!$resul->EOF) 
    {
            $idu=$resul->fields['idUsuario'];
            $con=$resul->fields['Password'];
            $tip=$resul->fields['idRole'];
        
        //if(password_verify($contr, $con))
          //    {
                if(!isset($_SESSION))//regresa un verdadero 
                  session_start();
                    
           if($tip=="1")//si es  1 es administrador 
              {
              
                  $_SESSION["conect"]="969696969/969696969";
                   $_SESSION['Correo']=$corr;
                   $_SESSION['IdUsuario']=$idu; 
               echo "1";
              }
         else{// & si no
              
              $_SESSION["conect"]="4599695/65479";
              $_SESSION['Correo']=$corr;  
               $_SESSION['IdUsuario']=$idu; 
              echo "2";
              }
                        
       //       }
       // else{
       // echo"-100";
       //     }
    } 
    else{
       echo"-1000";
        }


?>