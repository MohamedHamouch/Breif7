<?php
require '../../config_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['client_id'])) {

  $client_id = test_input($_POST['client_id']);
  $sql = "DELETE FROM clients WHERE ID = '$client_id'";

  if (mysqli_query($conn, $sql)) {
      // echo "The client was deleted successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  header("Location: ../clients.php");
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
