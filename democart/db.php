<?php
$con = mysqli_connect("localhost:4306","root","","democart");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>