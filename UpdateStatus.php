<?php
   include_once("./Utilerias/database_utilerias.php");
   $idDate = isset($_REQUEST['idD'])?$_REQUEST['idD']:0;
   $res=0;
   $res= Status($idDate);
   print $res;
   //echo $res;
?>