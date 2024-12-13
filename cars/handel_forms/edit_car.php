<?php
require '../../config_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['registration_number']) && isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['year'])) {

    $registration_number = test_input($_POST['registration_number']);
    $brand = test_input($_POST['brand']);
    $model = test_input($_POST['model']);
    $year = test_input($_POST['year']);

    $sql = "UPDATE cars SET Brand = '$brand', Model = '$model', Year = '$year' WHERE Reg_number = '$registration_number'";

    if (mysqli_query($conn, $sql)) {
      // echo "The car was edited successfully.";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
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

mysqli_close($conn);
