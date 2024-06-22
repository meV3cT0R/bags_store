<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://fontawesome.com/" crossorigin="anonymous"></script>
    <link href="https://fontawesome.com/icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container">
        <?php include("./components/navbar.php"); ?>

        <div class="main">
            <div class="mainText">
                <h2 class="text-5xl font-bold">Carry</h2>
                <h1 class="top text-3xl ">Bags For Life</h1>
                <h1 class="text-3xl ">Get Yours Now</h1>
                <h1 class="text-3xl ">Only On Carry</h1>
            </div>
            <img src="http://localhost/img/background1.jpg" alt="">
        </div>

        <div class="Carry">
            <div class="head">
                <h1 class="text-3xl font-bold text-[#902c7e]"> Recently Added Bags </h1>
            </div>
            <div class="card">
                <?php

                include ("config.php");

                $sql = "SELECT * FROM products ps join product_name_price pnp on ps.pnp=pnp.id ORDER BY createdDate DESC LIMIT 10;";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>



                    <a class="px-3 py-1 mx-1" href="BagInfo.php/?id=<?= $row['id'] ?>">


                        <div class="crd flex flex-col space-y-5 rounded-xl shadow-xl">
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

        <!-- about -->

        <div id="abouts">
            <div class="aboutus">
                <h1>#KnowUs</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae voluptatum illo aspernatur
                    incidunt, culpa dolorem perspiciatis voluptas recusandae, quia iusto repellat nam architecto sed
                    totam consequatur ratione minus, voluptatem veniam.</p>
            </div>

            <div class="us">
                <img src="c:\xampp\htdocs\img\main.png" alt="">
                <div class="aboutText">
                    <h1>Who we are?</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod fugit ipsa soluta omnis delectus
                        iste voluptatem neque nobis incidunt tempore, animi quisquam eius est itaque nihil. Totam soluta
                        non assumenda.</p>
                </div>
            </div>
        </div>

        <!-- contact -->>

        <ooter -->

            <div class="footer">
                copyright &copy; 2024. Carry All Right Reserved

            </div>
    </div>
    <script src="./index.js"></script>
</body>

</html>