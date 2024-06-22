<?php
include ("../config.php");

$brand_result = $conn->query("SELECT distinct brand from products;");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $brand = $_POST["brand"];
    $price = $_POST["price"];

    $sql = "SELECT * FROM products ps join product_name_price pnp on ps.pnp=pnp.id ";

    if (trim($brand) != "all" && trim($price) != "") {
        $sql .= "where brand='$brand' and price <$price";
    }

    if (trim($brand) != "all" && trim($price) == "") {
        $sql .= "where brand='$brand'";

    }

    if (trim($brand) == "all" && trim($price) != "") {
        $sql .= "where price <$price";
    }

    $product_result = $conn->query($sql);

} else {
    $product_result = $conn->query("SELECT * FROM products ps join product_name_price pnp on ps.pnp=pnp.id where price <= 1000;");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../index.css">
    <script src="https://fontawesome.com/" crossorigin="anonymous"></script>
    <link href="https://fontawesome.com/icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container">
        <?php include ("../components/navbar.php"); ?>

        <div class="flex mt-10 px-10">
            <div class="w-[200px]">
                <form method="post" action="" class="space-y-5">
                    <!-- <div class="">
                        <input type="text" name="keyword" placeholder="Search..." class="border-2 px-2 rounded-lg w-full"/>
                    </div> -->

                    <div class="w-full">
                        <label class="text-gray-500 font-bold"> Brand Name </label>
                        <select class="w-full border-2 rounded-lg px-2" name="brand">
                            <option value="all"> all </option>
                            <?php
                            while ($row = mysqli_fetch_assoc($brand_result)) {
                                ?>
                                <option value="<?= $row['brand'] ?>"> <?= $row["brand"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label class="text-gray-500 font-bold"> Max Price </label>
                        <input class="w-full border-2 rounded-lg px-2" name="price" type="number" value="1000" />

                    </div>
                    <button type="submit" name="search"
                        class="px-2 w-full border-2 rounded-lg border-green-500 text-green-500 hover:text-white hover:bg-green-500 duration-300">
                        Search </button>
                </form>
            </div>
            <div class="Carry">

                <div class="card">
                    <?php



                    while ($row = mysqli_fetch_assoc($product_result)) {
                        ?>



                        <a class="px-3 py-1 mx-1" href="/bags_store/BagInfo.php/?id=<?= $row['id'] ?>">


                            <div class="crd flex-col space-y-5 rounded-xl shadow-xl">
                                <img src="<?php
                                if (strncmp($row["image"], "http", 4) === 0) {
                                    echo $row["image"];
                                } else
                                    echo "http://localhost:80/bags_store/" . $row["image"];
                                ?>" alt="">
                                <h2 class="text-3xl font-bold capitalize text-[#902c7e] "><?= $row["name"] ?></h2>
                                <h3 class="text-lg text-gray-900"> Rs. <?= $row["price"] ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                    ?>

                </div>


            </div>
        </div>
    </div>
</body>

</html>