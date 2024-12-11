<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "0000";
    $db_name = "rentcar";
    $conn = "";

    $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);

    // if($conn){
    //     echo "you are connected";

    // }else {
    //     echo "coudnt connect";
    // }
    
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>