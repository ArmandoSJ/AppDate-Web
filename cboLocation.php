<?php
include_once("./Utilerias/database_utilerias.php");
$rest= QueryLocation();

//print($rest);
print"<div class='input-field col s12'><select name='IdR' id='IdR' class='browser-default'>";
while(!$rest->EOF)
{
    $idL=$rest->fields['idLocacion'];
    $Nomlocacion=$rest->fields['Nomlocacion'];
    //$lat=$rest->fields['Latitud'];
    //$long=$rest->fields['Longitud'];
print"<option value='$idL'>$Nomlocacion</option>";
$rest->MoveNext();    
}

print"</select></div>";
?>