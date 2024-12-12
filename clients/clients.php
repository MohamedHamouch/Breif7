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

  <header class="bg-blue-800 text-white p-4 h-[10vh]">
    <div class="container mx-auto flex items-center justify-between">
      <a href="#" class="text-3xl font-bold">
        <img src="your-logo-path.png" alt="RentDrive Logo" class="h-10">
      </a>
      <nav class="space-x-6 hidden sm:flex">
        <a href="../index.php" class="hover:text-yellow-500">Home</a>
        <a href="../cars/cars.php" class="hover:text-yellow-500">Cars</a>
        <a href="clients.php" class="text-yellow-500">Clients</a>
        <a href="../contracts/contracts.php" class="hover:text-yellow-500">Contracts</a>
      </nav>
    </div>
  </header>

  <section class="py-8 bg-blue-600 text-white text-center min-h-[75vh]">
    <div class="container mx-auto">
      <h1 class="text-5xl font-bold mb-4">Our Clients</h1>
      <p class="text-xl mb-8">Discover the diverse clientele we serve.</p>

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
          echo  '<div class="grid grid-cols-[5%,25%,30%,30%,5%,5%] items-center border-b p-2 bg-white hover:bg-gray-100 mx-auto w-[85%] text-gray-900">';
          echo '<p>'.$client['ID'].'</p>';
          echo '<p>'.$client['Name'].'</p>';
          echo '<p>'.$client['Address'].'</p>';
          echo '<p>'.$client['Phone'].'</p>';
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
      ?>

    </div>
  </section>

  <footer class="bg-gray-800 text-white py-8 h-[15vh]">
    <div class="container mx-auto flex justify-between items-center">
      <a href="#" class="text-3xl font-bold">
        <img src="your-logo-path.png" alt="RentDrive Logo" class="h-8">
      </a>
      <div class="space-x-6">
        <a href="../index.php" class="text-sm hover:text-yellow-500">Home</a>
        <a href="../cars/cars.php" class="text-sm hover:text-yellow-500">Cars</a>
        <a href="clients.php" class="text-sm hover:text-yellow-500">Clients</a>
        <a href="../contracts/contracts.php" class="text-sm hover:text-yellow-500">Contracts</a>
      </div>
    </div>
    <div class="text-center mt-4">
      <p>&copy; 2024 RentDrive. All rights reserved.</p>
    </div>
  </footer>
</body>

</html>