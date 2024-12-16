<?php
require '../../config_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cont_id'])) {

  $cont_num = $_POST['cont_id'];
  $sql = "DELETE FROM contracts WHERE Cont_number = $cont_num";

  if (mysqli_query($conn, $sql)) {
    // echo "The client was deleted successfully.";
  } else {
    echo "Error :" . mysqli_error($conn);
  }

  header("Location: ../contracts.php");
  exit();
}