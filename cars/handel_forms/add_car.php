<?php
require '../../config_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['registration_number']) && isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['year'])) {

    $registration_number = test_input($_POST['registration_number']);
    $brand = test_input($_POST['brand']);
    $model = test_input($_POST['model']);
    $year = test_input($_POST['year']);

    $sql = "INSERT INTO cars (Reg_number, Brand, Model, Year) VALUES ('$registration_number', '$brand', '$model', '$year')";

    if (mysqli_query($conn, $sql)) {
      // echo "New car record created successfully.";
    } else {
      echo "Error: " . mysqli_error($conn);
    }

    header("Location: ../cars.php");
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
