<?php
/*
* El siguiente código inserta un registros en la tabla de citas, recibiendo los datos
* por el método POST
* ASJ 08/02/2019
*/
$Cn = mysqli_connect("localhost","root","","appcita") or die ("Error al conectarse con servidor");
mysqli_set_charset($Cn,"utf8");
$response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
$body = json_decode(file_get_contents("php://input"),true);
$namP = $body['NomPersona'];
$fecha = $body['FechaCita'];
$timeC = $body['HoraCita'];
$idlo = $body['idLocacion'];
$idUC = $body['idUsuario'];
$result = mysqli_query($Cn,"INSERT INTO cita(NomPersona,FechaCita,HoraCita,Status,idLocacion,idUsuario) VALUES
('$namP','$fecha','$timeC','0','$idlo','$idUC')");

   
if($result){
$response["success"] = 202; // El success=200 es que inserto el registros y fue exitoso
$response["message"] = "Se inserto correctamente";
echo json_encode($response);
 }else{
 	echo $result;
$response["success"] = 500; //No encontro información y el success = 500  indica no exitoso
$response["message"] = "No se inserto la cita.";
echo json_encode($response);
 }
    
}else{
 $response["success"] = 422; //No encontro información y el success = 422 indica no exitoso
$response["message"] = "Se necesitan datos para la insercion  json";
echo json_encode($response);
}
mysqli_close($Cn);
?>