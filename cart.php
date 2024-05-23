<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <script src="https://cdn.tailwindcss.com"></script>
   <title>Document</title>
</head>

<body>
   <div class=" space-y-5">
      <h1 class="text-center font-bold text-3xl"> Shopping Cart </h1>

      <div class="shadow-lg mx-auto max-w-[800px] px-5 py-10">
         <table class="table-auto w-full">
            <thead>
               <tr>
                  <th class="px-4 py-2"> Images</th>
                  <th class="px-4 py-2">Description</th>
                  <th class="px-4 py-2">quantity</th>
                  <th class="px-4 py-2">price</th>
               </tr>
            </thead>
            <tbody>



               <?php
               session_start();
               include ("config.php");
               $total = 0;
               if (!isset($_SESSION["uid"])) {
                  header("location:login.php");
               } else {
                  $uid = $_SESSION["uid"];

                  $bids = $conn->query("SELECT * from cart where uid=$uid");

                  while ($cart = mysqli_fetch_assoc($bids)) {
                     $bagId = $cart["bid"];
                     $bags = $conn->query("SELECT * FROM products where id=$bagId");

                     $row = mysqli_fetch_assoc($bags);
                        $total += $cart["quantity"] *$row["price"];
                     ?>
                     <tr>
                        <td class="border px-4 py-2 text-center"><img src="<?= $row["image"]?>" class="w-[150px] h-[150px]"/></td>
                        <td class="border px-4 py-2 text-center"><?= $row["name"]?></td>
                        <td class="border px-4 py-2 text-center"><?= $cart["quantity"]?></td>
                        <td class="border px-4 py-2 text-center"><?= $row["price"]?></td>
                     </tr>
                     <?php

                  }

               }

               ?>


            </tbody>
         </table>

         <div class="flex flex-col items-end mt-8 space-y-5">
               <div class="w-[200px] border-2 flex justify-between px-5">
                     <div class="capitalize text-gray-500">
                        price
                     </div>
                     <div class="font-bold">
                        <?= $total ?>
                     </div>
               </div>
               
               <a class="w-[200px] capitalize border-2 rounded text-center" href="index.php">
                     buy more bags
               </a>
               <button class="w-[200px] capitalize border-2 rounded ">
                     checkout
               </button>
         </div>
      </div>
   </div>
</body>

</html>