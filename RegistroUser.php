<?php
   include_once("utilerias/database_utilerias.php");
 $nom=$_POST["nom"];  
 $corr=$_POST["corr"];
 $cont=$_POST["contr"];
 $dom=$_POST["dom"];           
 $telf=$_POST["telef"];           
 $telm=$_POST["telm"];
 $curp=$_POST["cur"];
$res=agregaruser($nom,$corr,$cont,$dom,$telf,$telm,$curp);
print  $res;

?>



