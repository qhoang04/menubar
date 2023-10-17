<?php 
    $conn = new mysqli("localhost:4306","root","", "websitebacty");
    if ($conn -> connect_error)  {
        die("Ket noi that bai". $conn ->connect_error);
    }
?>