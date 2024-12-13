<?php
require '../../config_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['client_id']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone'])) {

		$client_id = test_input($_POST['client_id']);
		$name = test_input($_POST['name']);
		$address = test_input($_POST['address']);
		$phone = test_input($_POST['phone']);

		$sql = "UPDATE clients SET Name = '$name', Address = '$address', Phone = '$phone' WHERE ID = $client_id";

		if (mysqli_query($conn, $sql)) {
			// echo "The client was edited successfully.";

		} else {
			echo "Error updating record: " . mysqli_error($conn);
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

mysqli_close($conn);
