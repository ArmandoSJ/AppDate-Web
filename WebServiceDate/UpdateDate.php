<?php
/*
* El siguiente código actualiza los datos de las citas,
* recibiendo por el método POST el nomPersona, , FechaCita, HoraCita, idLocacion
* ASJ 08/03/2018
*/
$Cn = mysqli_connect("localhost","root","", "appcita")or die ("server no encontrado");
$response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$body = json_decode(file_get_contents("php://input"),true);
$id   = $body['idCita'];
$namP = $body['NomPersona'];
$dateD = $body['FechaCita'];
$timeD = $body['HoraCita'];
$idlo = $body['idLocacion'];

 $result = mysqli_query($Cn,"UPDATE cita SET NomPersona='$namP',FechaCita='$dateD',HoraCita='$timeD',idLocacion='$idlo' WHERE idCita='$id'");
 // checa si el registro fue actualizado
 if ($result)
 {
// Acualización exitosa
$response["success"] = 204;
$response["message"] = "La cita se actualizo correctamente.";
// echoing JSON response
echo json_encode($response);
}
else
{
$response["success"] = 422; // Terminación no exitosa
$response["message"] = "problema al aztualizar";
echo json_encode($response);
 }
}
else
{
 // requiere información de entrada por el método POST
 $response["success"] = 500; // Terminación no exitosa
     $response["message"] = "Faltaron datos";
 echo json_encode($response);
}
mysqli_close($Cn);
?>