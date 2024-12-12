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

  <header class="bg-blue-800 text-white py-4 h-[10vh]">
    <div class="container mx-auto flex items-center justify-between">
      <a href="#" class="text-3xl font-bold">
        <img src="your-logo-path.png" alt="RentDrive Logo" class="h-10">
      </a>
      <nav class="space-x-6 hidden sm:flex">
        <a href="../index.php" class="hover:text-yellow-500">Home</a>
        <a href="cars.php" class="text-yellow-500">Cars</a>
        <a href="../clients/clients.php" class="hover:text-yellow-500">Clients</a>
        <a href="#contracts" class="hover:text-yellow-500">Contracts</a>
      </nav>
    </div>
  </header>

  <section class="py-8 bg-blue-600 text-white text-center min-h-[75vh]">
    <div class="container mx-auto">
      <h1 class="text-5xl font-bold mb-4">Our Cars</h1>
      <p class="text-xl mb-8">Explore our wide range of vehicles to suit your needs.</p>
      <?php

      if (mysqli_num_rows($cars) > 0) {
        echo '<div class="text-sm sm:text-base grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 w-[60%] sm:w-[90%] mx-auto">';

        while ($car = mysqli_fetch_assoc($cars)) {
          echo '<div class="bg-white text-black p-4 rounded-lg shadow-lg">';
          echo '<p><b>Registration Number:</b> ' . $car['Reg_number'] . '</p>';
          echo '<p><b>Brand:</b> ' . $car['Brand'] . '</p>';
          echo '<p><b>Model:</b> ' . $car['Model'] . '</p>';
          echo '<p><b>Year:</b> ' . $car['Year'] . '</p>';
          echo '<div class="mt-4 flex justify-between">';
          echo '<form action="edit_car.php" method="POST" class="inline-block">';
          echo '<button type="submit" name="car_id" value="' . $car['Reg_number'] . '" class="bg-yellow-500 text-black py-2 px-4 rounded hover:bg-yellow-600">';
          echo '<i class="fas fa-edit"></i> Edit';
          echo '</button>';
          echo '</form>';
          echo '<form action="delete_car.php" method="POST" class="inline-block">';
          echo '<button type="submit" name="car_id" value="' . $car['Reg_number'] . '" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">';
          echo '<i class="fas fa-trash-alt"></i> Delete';
          echo '</button>';
          echo '</form>';
          echo '</div>';
          echo '</div>';
        }
        echo '</div>';
      } else {
        echo '<p class="text-yellow-400 text-2xl mt-16 font-bold">NO CARS YET</p>';
      }
      ?>

    </div>
    </div>
  </section>

  <footer class="bg-gray-800 text-white py-8 h-[15vh]">
    <div class="container mx-auto flex justify-between items-center">
      <a href="#" class="text-3xl font-bold">
        <img src="your-logo-path.png" alt="RentDrive Logo" class="h-8">
      </a>
      <div class="space-x-6">
        <a href="../index.php" class="text-sm hover:text-yellow-500">Home</a>
        <a href="cars.php" class="text-sm hover:text-yellow-500">Cars</a>
        <a href="../clients/clients.php" class="text-sm hover:text-yellow-500">Clients</a>
        <a href="#contracts" class="text-sm hover:text-yellow-500">Contracts</a>
      </div>
    </div>
    <div class="text-center mt-4">
      <p>&copy; 2024 RentDrive. All rights reserved.</p>
    </div>
  </footer>

</body>

</html>