<?php
require '../../config_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registration_number'])) {

  $registration_number = test_input($_POST['registration_number']);
  $sql = " FROM cars WHERE Reg_number = '$registration_number'";

  if (mysqli_query($conn, $sql)) {
      // echo "The car deleteded successfully.";

  } else {
    echo "Error: " . mysqli_error($conn);
  }
  header("Location: ../cars.php");
  exit();
}

function test_input($input)
{
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}
?>