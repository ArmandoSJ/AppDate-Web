<?php
	
    $conn = new mysqli("localhost","root","","appcita");
    $count = 0;
    $sql2 = "SELECT * FROM cita WHERE Status = 0";
    $result = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result);


    ?>
