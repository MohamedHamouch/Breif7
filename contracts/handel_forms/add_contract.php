<?php
require '../../config_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['client_id']) && isset($_POST['registration_number'])) {
    $client_id = test_input($_POST['client_id']);
    $registration_number = test_input($_POST['registration_number']);
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];


    $start = new DateTime($start_date);
    $end = new DateTime($end_date);
    $difference = $start->diff($end);
    $duration = ($difference->y * 365) + ($difference->m * 30) + $difference->d;

    $sql = "INSERT INTO contracts (Start_date, End_date, Duration, ID, Reg_number)
      VALUES ('$start_date', '$end_date', '$duration', '$client_id', '$registration_number')";

    if (mysqli_query($conn, $sql)) {
      // echo "New contract record created successfully.";
    } else {
      echo "Error: " . mysqli_error($conn);
    }

    header("Location: ../contracts.php");
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