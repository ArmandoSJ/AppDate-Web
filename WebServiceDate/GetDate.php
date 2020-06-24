<?php
/*
* El siguiente código localiza un alumno
* ASJ 08/02/2018
*/
$response = array();
$Cn = mysqli_connect("localhost","root","","appcita")or die ("server no encontrado");
mysqli_set_charset($Cn,"utf8");
// Checa que le este llegando por el método GET el nocontrol
if (isset($_GET["idCita"])) {
    
 $idcita = $_GET['idCita'];
 $result = mysqli_query($Cn,"SELECT NomPersona,FechaCita,HoraCita,Status,idLocacion,idUsuario from cita where status = 1 and idCita=$idcita");
 if (!empty($result)) {
 if (mysqli_num_rows($result) > 0) {
 $result = mysqli_fetch_array($result);
 $cita = array();
            $cita["NomPersona"] = $result["NomPersona"];
            $cita["FechaCita"] = $result["FechaCita"]; 
            $cita["HoraCita"] = $result["HoraCita"];         
            $cita["idLocacion"] = $result["idLocacion"]; 
     $response["success"] = 201; // El success=201 es que encontro al alumno y fue exitoso
     $response["message"] = "Cita Encontrado";
 $response["cita"] = array();
 array_push($response["cita"], $cita);
 // codifica la información en formato de JSON response
 echo json_encode($response);
 } else {
 // No Encontro al alumno
 $response["success"] = 422; //No encontro información y el success = 0 indica no exitoso
 $response["message"] = "No se encontro informacion del Alumno ";
 echo json_encode($response);
 }
 } else {
 $response["success"] = 422; //No encontro información y el success = 0 indica no exitoso
 $response["message"] = "No se encontro informacion del Alumno";
 echo json_encode($response);
 }
} else {
 // required field is missing
 $response["success"] = 422;
 $response["message"] = "Faltan Datos de entrada";
 // echoing JSON response
 echo json_encode($response);
}
mysqli_close($Cn);
?>