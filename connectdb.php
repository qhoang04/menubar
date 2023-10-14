<?php 
    $conn = new mysqli("localhost","root","", "multilevelnav");
    if ($conn -> connect_error)  {
        die("Ket noi that bai". $conn ->connect_error);
    }
?>