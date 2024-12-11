<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "0000";
    $db_name = "rentcar";
    $conn = "";

    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
