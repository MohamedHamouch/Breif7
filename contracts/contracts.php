<?php
include '../config_db.php';
$sql = "SELECT * FROM contracts";
$contracts = mysqli_query($conn, $sql);
$sql = "SELECT Name, ID FROM clients";
$clients = mysqli_query($conn, $sql);
$sql = "SELECT * FROM cars";
$cars = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contracts - RentDrive</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>

<body>

  <header class="bg-blue-800 text-white p-4 h-[10vh] flex items-center justify-center">
    <div class="container mx-auto flex items-center justify-between">
      <a href="../index.php" class="font-bold">
        <img src="../assets/rentcar1.png" alt="RentDrive Logo" class="h-12">
      </a>
      </a>
      <nav class="space-x-6 hidden sm:flex">
        <a href="../index.php" class="hover:text-yellow-500">Home</a>
        <a href="../cars/cars.php" class="hover:text-yellow-500">Cars</a>
        <a href="../clients/clients.php" class="hover:text-yellow-500">Clients</a>
        <a href="#" class="text-yellow-500">Contracts</a>
      </nav>
    </div>
  </header>

  <section class="py-8 bg-blue-600 text-white text-center min-h-[75vh]">
    <div class="container mx-auto">
      <h1 class="text-5xl font-bold mb-4">Our Contracts</h1>
      <p class="text-xl mb-8">Explore the contracts we've established with our clients.</p>
      <button id="add-contract-btn"
        class="px-6 py-3 bg-yellow-500 text-black font-semibold rounded-lg hover:bg-yellow-400 p-5 xl:p-3 w-fit m-auto mb-8"><i
          class="fa-solid fa-file-circle-plus"></i> Start Contract</button>

      <div
        class="grid grid-cols-[5%,20%,20%,10%,20%,15%,5%,5%] items-center bg-gray-200 p-2 font-semibold text-gray-700 mx-auto w-[85%]">
        <div>Num</div>
        <div>Start</div>
        <div>End</div>
        <div>Duration</div>
        <div>Owner</div>
        <div>Car</div>
        <div>EDT</div>
        <div>DEL</div>
      </div>

      <?php
      if (mysqli_num_rows($contracts) > 0) {
        while ($contract = mysqli_fetch_assoc($contracts)) {

          $client_id = $contract['ID'];
          $sql_client = "SELECT Name FROM Clients WHERE ID = $client_id";
          $client_result = mysqli_query($conn, $sql_client);
          $client = mysqli_fetch_assoc($client_result);


          echo '<div class="grid grid-cols-[5%,20%,20%,10%,20%,15%,5%,5%] items-center border-b p-2 bg-white hover:bg-gray-100 mx-auto w-[85%] text-gray-900">';
          echo '<p>' . $contract['Cont_number'] . '</p>';
          echo '<p>' . $contract['Start_date'] . '</p>';
          echo '<p>' . $contract['End_date'] . '</p>';
          echo '<p>' . $contract['Duration'] . '</p>';
          echo '<p>' . $client['Name'] . '</p>';
          echo '<p>' . $contract['Reg_number'] . '</p>';

          echo '<button>
          <i class="fa-solid fa-pen-to-square text-yellow-500"></i>
        </button>
        <button>
          <i class="fa-solid fa-trash text-red-500"></i>
        </button>
        </div>';

        }

      } else {
        echo '<p class="text-yellow-400 text-2xl mt-16 font-bold">NO CLIENTS YET</p>';
      }
      mysqli_close($conn);
      ?>

    </div>
  </section>

  <section id="add-contract-popup"
    class="hidden fixed w-full h-full items-center justify-center top-0 backdrop-blur-md bg-black/70">
    <div class="items-center justify-center flex flex-col gap-4 bg-gray-200 py-8 px-12 rounded-lg">
      <button class="text-red-500 hover:text-red-700" id="close-add-popup">
        <i class="fa-solid fa-circle-xmark text-3xl"></i>
      </button>

      <form action="handel_forms/add_contract.php" method="POST" class="flex flex-col gap-6">
        <fieldset>
          <label for="start_date" class="block text-gray-800 font-semibold">Start Date</label>
          <input type="date" id="start_date" name="start_date" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <fieldset>
          <label for="end_date" class="block text-gray-800 font-semibold">End Date</label>
          <input type="date" id="end_date" name="end_date" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <fieldset>
          <label for="client" class="block text-gray-800 font-semibold">Select Client</label>
          <select id="client" name="client_id" class="w-96 p-2 border rounded-lg" required>
            <option value="" disabled selected>Select a client</option>
            <?php

            if (mysqli_num_rows($clients) > 0) {
              while ($client = mysqli_fetch_assoc($clients)) {
                echo "<option value='{$client['ID']}'>{$client['Name']} (ID: {$client['ID']})</option>";
              }
            }
            
            ?>
          </select>
        </fieldset>

        <fieldset>
          <label for="car" class="block text-gray-800 font-semibold">Select Car</label>
          <select id="car" name="car_id" class="w-96 p-2 border rounded-lg" required>
            <option value="" disabled selected>Select a car</option>

            <?php
            if (mysqli_num_rows($cars) > 0) {
              while ($car = mysqli_fetch_assoc($cars)) {
                echo "<option value='{$car['Reg_number']}'>{$car['Brand']}, {$car['Model']}. ({$car['Reg_number']})</option>";
              }
            }
            ?>

          </select>
        </fieldset>

        <button type="submit"
          class="bg-blue-500 text-white font-semibold py-2 px-4 w-1/3 rounded-lg hover:bg-blue-600">Confirm</button>
      </form>

    </div>
  </section>

  <footer class="bg-gray-800 text-white py-8 px-4 h-[15vh]">
    <div class="container mx-auto flex justify-between items-center">
      <a href="../index.php" class="font-bold">
        <img src="../assets/rentcar1.png" alt="RentDrive Logo" class="h-8">
      </a>
      <div class="space-x-6">
        <a href="../index.php" class="text-sm hover:text-yellow-500">Home</a>
        <a href="../cars/cars.php" class="text-sm hover:text-yellow-500">Cars</a>
        <a href="../clients/clients.php" class="text-sm hover:text-yellow-500">Clients</a>
        <a href="contracts.php" class="text-sm hover:text-yellow-500">Contracts</a>
      </div>
    </div>
    <div class="text-center pt-4">
      <p>&copy; 2024 RentDrive. All rights reserved.</p>
    </div>
  </footer>

  <script src="contracts.js"></script>
</body>

</html>