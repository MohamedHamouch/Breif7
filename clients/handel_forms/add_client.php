<?php
require '../../config_db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone'])) {

    $name = test_input($_POST['name']);
    $phone = test_input($_POST['phone']);
    $address = test_input($_POST['address']);
    // var_dump($_POST);
    $sql = "INSERT INTO clients (Name, Address, Phone) VALUES ('$name', '$address', '$phone')";

    if (mysqli_query($conn, $sql)) {
      // echo "New record created successfully.";
    } else {
      echo "Error: " . mysqli_error($conn);
    }
    header("Location: ../clients.php");
    exit(); 
  }
}

function test_input($input)
{
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}