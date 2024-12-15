<?php
include '../config_db.php';
$sql = "SELECT * FROM cars";
$cars = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cars - RentDrive</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100">

  <header class="bg-blue-800 text-white p-4 h-[10vh] flex items-center justify-center">
    <div class="container mx-auto flex items-center justify-between">
      <a href="../index.php" class="font-bold">
        <img src="../assets/rentcar1.png" alt="RentDrive Logo" class="h-12">
      </a>
      <nav class="space-x-6 hidden sm:flex">
        <a href="../index.php" class="hover:text-yellow-500">Home</a>
        <a href="#" class="text-yellow-500">Cars</a>
        <a href="../clients/clients.php" class="hover:text-yellow-500">Clients</a>
        <a href="../contracts/contracts.php" class="hover:text-yellow-500">Contracts</a>
      </nav>
    </div>
  </header>

  <section class="py-8 bg-blue-600 text-white text-center min-h-[75vh]">
    <div class="container mx-auto">
      <h1 class="text-5xl font-bold mb-4">Our Cars</h1>
      <p class="text-xl mb-8">Explore our wide range of vehicles to suit your needs.</p>

      <button id="add-car-btn"
        class="px-6 py-3 bg-yellow-500 text-black font-semibold rounded-lg hover:bg-yellow-400 p-5 xl:p-3 w-fit m-auto mb-8"><i
          class="fa-solid fa-plus"></i><i class="fa-solid fa-car"></i> Add New Car</button>
      <?php

      if (mysqli_num_rows($cars) > 0) {
        echo '<div class="text-sm sm:text-base grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 w-[60%] sm:w-[85%] mx-auto">';

        while ($car = mysqli_fetch_assoc($cars)) {
          echo '<div class="bg-white text-black p-2 py-3 flex flex-col gap-1 rounded-lg shadow-lg">';
          echo '<p><b>Registration Number:</b> ' . $car['Reg_number'] . '</p>';
          echo '<p><b>Brand:</b> ' . $car['Brand'] . '</p>';
          echo '<p><b>Model:</b> ' . $car['Model'] . '</p>';
          echo '<p><b>Year:</b> ' . $car['Year'] . '</p>';
          echo '<div class="mt-4 flex justify-between">';
          echo '<button name="car_id" value="' . $car['Reg_number'] . '" 
                  data-cbrand="' . $car['Brand'] . '" 
                  data-cmodel="' . $car['Model'] . '" 
                  data-cyear="' . $car['Year'] . '" 
                  class="edit-car-btn bg-yellow-500 text-black text-sm py-2 px-3 rounded hover:bg-yellow-600">';
          echo '<i class="fas fa-edit"></i> Edit</button>';
          echo '<form action="handel_forms/delete_car.php" method="POST" class="deleteForm">';
          echo '<button type="submit" name="registration_number" value="' . $car['Reg_number'] . '" class="bg-red-500 text-white text-sm py-2 px-3 rounded hover:bg-red-600">';
          echo '<i class="fa-solid fa-trash"></i> Delete</button></form>';
          echo '</div></div>';
        }
        echo '</div>';
      } else {
        echo '<p class="text-yellow-400 text-2xl mt-16 font-bold">NO CARS YET</p>';
      }
      mysqli_close($conn);
      ?>

    </div>
    </div>
  </section>

  <!-- add car form -->
  <section id="add-car-popup"
    class="hidden fixed w-full h-full items-center justify-center top-0 backdrop-blur-md bg-black/70">
    <div class="items-center justify-center flex flex-col gap-4 bg-gray-200 py-8 px-12 rounded-lg">
      <button class="text-red-500 hover:text-red-700" id="close-add-popup">
        <i class="fa-solid fa-circle-xmark text-3xl"></i>
      </button>

      <form action="handel_forms/add_car.php" method="POST" class="flex flex-col gap-6">
        <fieldset>
          <label for="registration_number" class="block text-gray-800 font-semibold">Registration Number</label>
          <input type="text" id="registration_number" name="registration_number" class="w-96 p-2 border rounded-lg"
            required>
        </fieldset>

        <fieldset>
          <label for="brand" class="block text-gray-800 font-semibold">Brand</label>
          <input type="text" id="brand" name="brand" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <fieldset>
          <label for="model" class="block text-gray-800 font-semibold">Model</label>
          <input type="text" id="model" name="model" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <fieldset>
          <label for="year" class="block text-gray-800 font-semibold">Year</label>
          <input type="number" id="year" name="year" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <button type="submit"
          class="bg-blue-500 text-white font-semibold py-2 px-4 w-1/3 rounded-lg hover:bg-blue-600">Confirm</button>
      </form>

    </div>
  </section>

  <!-- edit car form -->
  <section id="edit-car-popup"
    class="hidden fixed w-full h-full items-center justify-center top-0 backdrop-blur-md bg-black/70">
    <div class="items-center justify-center flex flex-col gap-4 bg-gray-200 py-8 px-12 rounded-lg">
      <button class="text-red-500 hover:text-red-700" id="close-edit-car-popup">
        <i class="fa-solid fa-circle-xmark text-3xl"></i>
      </button>

      <form action="handel_forms/edit_car.php" method="POST" class="flex flex-col gap-6" id="edit-car-form">
        <fieldset>
          <label for="registration_number" class="block text-gray-800 font-semibold">Registration Number</label>
          <input type="text" id="edit-registration_number" name="registration_number" class="w-96 p-2 border rounded-lg"
            readonly>
        </fieldset>

        <fieldset>
          <label for="brand" class="block text-gray-800 font-semibold">Brand</label>
          <input type="text" id="edit-brand" name="brand" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <fieldset>
          <label for="model" class="block text-gray-800 font-semibold">Model</label>
          <input type="text" id="edit-model" name="model" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <fieldset>
          <label for="year" class="block text-gray-800 font-semibold">Year</label>
          <input type="number" id="edit-year" name="year" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <button type="submit" id="submit-edit-car"
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
        <a href="cars.php" class="text-sm hover:text-yellow-500">Cars</a>
        <a href="../clients/clients.php" class="text-sm hover:text-yellow-500">Clients</a>
        <a href="../contracts/contracts.php" class="text-sm hover:text-yellow-500">Contracts</a>
      </div>
    </div>
    <div class="text-center mt-4">
      <p>&copy; 2024 RentDrive. All rights reserved.</p>
    </div>
  </footer>
  <script src="cars.js"></script>
</body>

</html>