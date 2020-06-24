<?php
$conn = new mysqli("localhost","root","","appcita");

//$sql = "UPDATE cita SET Status = 1 WHERE Status = 0";	
//$result = mysqli_query($conn, $sql);

//$sql = "SELECT * FROM cita ORDER BY idCita DESC limit 5";
$sql = "SELECT * FROM cita WHERE Status = 0  LIMIT 5";
$result = mysqli_query($conn, $sql);

$response='';

while($row=mysqli_fetch_array($result)) {

	/* Formate fecha */
	//$fechaOriginal = $row["fecha"];
	//$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<div class='notification-item'>" .
	"<a href='Citas.php'><div class='notification-subject'>". $row["NomPersona"] . "</div></a>" . 
	"<div class='notification-comment'>" . $row["FechaCita"]  . "</div>" .
	"</div>";
}
if(!empty($response)) {
	print $response;
}

?>