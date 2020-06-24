<?php
/*
* El siguiente código inserta un registros en la tabla de usuario, recibiendo los datos
* the next code insert a register in the user table , resive dates for the method post.
* por el método POST
* ASJ 08/02/2019
*/
$Cn = mysqli_connect("localhost","root","","appcita") or die ("Error al conectarse con servidor");
mysqli_set_charset($Cn,"utf8");
$response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
$body = json_decode(file_get_contents("php://input"),true);
$nameU = $body['NomUsuario'];
$Email = $body['Correo'];
$PhoneNumber = $body['Telefono'];
$Password = $body['Password'];

//$pwdEnc = password_hash($Password,PASSWORD_DEFAULT);

$result = mysqli_query($Cn,"INSERT INTO usuario (NomUsuario,Correo,Telefono,Password,Status,idRole) VALUES
('$nameU','$Email','$PhoneNumber','$pwdEnc','1','1')");
    

if($result){
$response["success"] = 202; // El success=200 es que inserto el registros y fue exitoso
$response["message"] = "Se inserto correctamente";
echo json_encode($response);
 }else{
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