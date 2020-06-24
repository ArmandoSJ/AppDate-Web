<?php /* 
* El siguiente código muestra registros que se encuentran en la tabla de citas  
* ASJ    08/03/2018  
*/ 
$response = array(); // arreglo para JSON response 
 
$Cn = mysqli_connect("localhost","root","","appcita")or die ("server no encontrado"); 
mysqli_set_charset($Cn,"utf8");            //Para que permita acentos y ñ 
 
    $result = mysqli_query($Cn,"SELECT idCita,NomPersona,FechaCita,HoraCita,Status,idLocacion,idUsuario from cita where status = 1");         
if (!empty($result)) {         
    if (mysqli_num_rows($result) > 0) {             
        $cita = array();            
        $response["success"] = 200; //  success=200 is when a register in the students table was searched
        $response["message"]= "Citas Encontradas";
        $response["cita"] = array();             
        while ($ren = mysqli_fetch_array($result)){ 
            $cita["NomPersona"] = $ren["NomPersona"];
            $cita["FechaCita"] = $ren["FechaCita"]; 
            $cita["HoraCita"] = $ren["HoraCita"];         
            $cita["idLocacion"] = $ren["idLocacion"];             
            array_push($response["cita"], $cita); //agarra el arreglo y se lo asigna al elemento alumno de nuestro arreglo response.           
        } 
 
            // codifica la información en formato de JSON response             
        echo json_encode($response);         
    }    
    else {             // alumnos no encontrados             
        $response["success"] = 422;  //No encontro información y el success = 422 indica no exitoso             
        $response["message"] = "No se encontro informaicon de Alumnos";            
        echo json_encode($response);        
    }    
} 
else {         // alumnos no encontrados        
    $response["success"] = 422; //No encontro información y el success = 422 indica no exitoso        
    $response["message"] = "No se encontro informacion de Alumnos ";        
    echo json_encode($response);     
} 
mysqli_close($Cn);


?> 