<?php
    $mysqli = new mysqli('localhost:4306', 'root', '', 'shopbacty');

    if ($mysqli->connect_errno) {
        echo 'Ket noi that bai'. $mysqli->connect_error;
        exit();
    }
?>