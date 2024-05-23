<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-4">

    <h2 class="text-2xl font-semibold mb-4">Products</h2>

    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">price</th>
                    <th class="px-4 py-2 text-left">image</th>
                    <th class="px-4 py-2 text-left">action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php
                include ("config.php");
                $result = $conn->query("SELECT * FROM products;");
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr class="bg-gray-50">
                        <td class="border px-4 py-2"><?= $row["name"] ?></td>
                        <td class="border px-4 py-2"><?= $row["price"] ?></td>
                        <td class="border px-4 py-2"><img src="<?php
                        if (strncmp($row["image"], "http", 4) === 0) {
                            echo $row["image"];
                        } else
                            echo "http://localhost:80/bags_store/" . $row["image"];
                        ?>" style="width:100px;height:100px;" /></td>
                        <td class="text-center">
                            <div class="flex  space-x-5">
                                <form action="editProduct.php" method="post">
                                    <input type="number" name="id" hidden value="<?=$row["id"]?>"/>
                                    <input type="number" name="name" hidden value="<?=$row["name"]?>"/>
                                    <input type="number" name="price" hidden value="<?=$row["price"]?>"/>

                                    
                                    <button class=" px-2 py-1 bg-green-500 text-white">edit</button>
                                </form>

                                <form action="deleteProduct.php" method="post">
                                    <input type="number" name="id" hidden value="<?=$row["id"]?>"/>
                                    <button class="px-2 py-1 bg-red-500 text-white" type="submit" name="submit"> delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>


                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

</body>

</html>