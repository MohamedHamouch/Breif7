<?php include '../config_db.php';
$sql = "SELECT * FROM clients";
$clients = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clients - RentDrive</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

  <header class="bg-blue-800 text-white p-4 h-[10vh] flex items-center justify-center">
    <div class="container mx-auto flex items-center justify-between">
      <a href="../index.php" class="font-bold">
        <img src="../assets/rentcar1.png" alt="RentDrive Logo" class="h-12">
      </a>
      <nav class="space-x-6 hidden sm:flex">
        <a href="../index.php" class="hover:text-yellow-500">Home</a>
        <a href="../cars/cars.php" class="hover:text-yellow-500">Cars</a>
        <a href="#" class="text-yellow-500">Clients</a>
        <a href="../contracts/contracts.php" class="hover:text-yellow-500">Contracts</a>
      </nav>
    </div>
  </header>

  <section class="py-8 bg-blue-600 text-white text-center min-h-[75vh]">
    <div class="container mx-auto">
      <h1 class="text-5xl font-bold mb-4">Our Clients</h1>
      <p class="text-xl mb-8">Discover the diverse clientele we serve.</p>
      <button id="add-client-btn"
        class="px-6 py-3 bg-yellow-500 text-black font-semibold rounded-lg hover:bg-yellow-400 p-5 xl:p-3 w-fit m-auto mb-8"><i
          class="fa-solid fa-user-plus"></i> Add New Client</button>

      <div
        class="grid grid-cols-[5%,25%,30%,30%,5%,5%] items-center bg-gray-200 p-2 font-semibold text-gray-700 mx-auto w-[85%]">
        <div>ID</div>
        <div>Name</div>
        <div>ADDRESS</div>
        <div>PHONE</div>
        <div>EDIT</div>
        <div>DEL</div>
      </div>

      <?php
      if (mysqli_num_rows($clients) > 0) {
        while ($client = mysqli_fetch_assoc($clients)) {
          echo '<div class="grid grid-cols-[5%,25%,30%,30%,5%,5%] items-center border-b p-2 bg-white hover:bg-gray-100 mx-auto w-[85%] text-gray-900">';
          echo '<p>' . $client['ID'] . '</p>';
          echo '<p>' . $client['Name'] . '</p>';
          echo '<p>' . $client['Address'] . '</p>';
          echo '<p>' . $client['Phone'] . '</p>';
          echo '<button name="client_id"  value="' . $client['ID'] . '" 
                data-cname="' . $client['Name'] . '" 
                data-caddress="' . $client['Address'] . '" 
                data-cphone="' . $client['Phone'] . '" 
                class="edit-client-btn bg-transparent border-0 p-0">';
          echo '<i class="fa-solid fa-pen-to-square text-yellow-500"></i>';
          echo '</button>';
          echo '<form action="handel_forms/delete_client.php" method="POST" class="inline-block">';
          echo '<button type="submit" name="client_id" value="' . $client['ID'] . '" class="bg-transparent border-0 p-0">';
          echo '<i class="fa-solid fa-trash text-red-500"></i></button>';
          echo '</form></div>';
        }

      } else {
        echo '<p class="text-yellow-400 text-2xl mt-16 font-bold">NO CLIENTS YET</p>';
      }
      mysqli_close($conn);
      ?>

    </div>
  </section>

  <!-- add clien form -->
  <section id="add-client-popup"
    class="hidden fixed w-full h-full items-center justify-center top-0 backdrop-blur-md bg-black/70">
    <div class="items-center justify-center flex flex-col gap-4 bg-gray-200 py-8 px-12 rounded-lg">
      <button class="text-red-500 hover:text-red-700" id="close-add-popup">
        <i class="fa-solid fa-circle-xmark text-3xl"></i>
      </button>

      <form action="handel_forms/add_client.php" method="POST" class="flex flex-col gap-6">
        <fieldset>
          <label for="name" class="block text-gray-800 font-semibold">Name</label>
          <input type="text" id="name" name="name" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <fieldset>
          <label for="address" class="block text-gray-800 font-semibold">Address</label>
          <input type="text" id="address" name="address" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <fieldset>
          <label for="phone" class="block text-gray-800 font-semibold">Phone</label>
          <input type="tel" id="phone" name="phone" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <button type="submit"
          class="bg-blue-500 text-white font-semibold py-2 px-4 w-1/3 rounded-lg hover:bg-blue-600">Confirm</button>
      </form>
    </div>
  </section>

  <!-- edit client form -->
  <section id="edit-client-popup"
    class="hidden fixed w-full h-full items-center justify-center top-0 backdrop-blur-md bg-black/70">
    <div class="items-center justify-center flex flex-col gap-4 bg-gray-200 py-8 px-12 rounded-lg">
      <button class="text-red-500 hover:text-red-700" id="close-edit-popup">
        <i class="fa-solid fa-circle-xmark text-3xl"></i>
      </button>

      <form action="handel_forms/edit_client.php" method="POST" class="flex flex-col gap-6" id="edit-Form">
        <fieldset>
          <label for="name" class="block text-gray-800 font-semibold">Name</label>
          <input type="text" id="name" name="name" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <fieldset>
          <label for="address" class="block text-gray-800 font-semibold">Address</label>
          <input type="text" id="address" name="address" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <fieldset>
          <label for="phone" class="block text-gray-800 font-semibold">Phone</label>
          <input type="tel" id="phone" name="phone" class="w-96 p-2 border rounded-lg" required>
        </fieldset>

        <button type="submit" id="submit-edit"
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
        <a href="clients.php" class="text-sm hover:text-yellow-500">Clients</a>
        <a href="../contracts/contracts.php" class="text-sm hover:text-yellow-500">Contracts</a>
      </div>
    </div>
    <div class="text-center pt-4">
      <p>&copy; 2024 RentDrive. All rights reserved.</p>
    </div>
  </footer>

  <script src="clients.js"></script>
</body>

</html>