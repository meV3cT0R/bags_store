<?php
include ("config.php");
// Check if a specific parameter exists
if (isset($_GET['id'])) {
    // Retrieve the value of the parameter
    $id = $_GET['id'];
    $result = $conn->query("select * from products where id=$id");
    $row = mysqli_fetch_assoc($result);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
    </head>

    <body>
        <div class="w-[500px] flex flex-col space-y-8 items-start mx-auto border-2 px-20 py-10">
            <img class="object-cover w-full" src="<?php
            if (strncmp($row["image"], "http", 4) === 0) {
                echo $row["image"];
            } else
                echo "http://localhost:80/bags_store/" . $row["image"];
            ?>" style="width:500px;height:500px;" />
            <h1 class="text-3xl font-bold  capitalize"> <?= $row["name"] ?></h1>
            <h1 class="text-xl text-gray-500"> Rs.<?= $row["price"] ?></h1>

            <form action="/bags_store/addToCart.php" method="post">
                <input type="" name="id" value="<?= $id ?>" hidden />
                <div>
                    <span id="rangeValue"></span> <br />
                    <input type="range" id="myRange" min="1" value="1" max="100" name="quantity" />
                </div>
                <button name="submit" class="bg-black text-white px-5 py-2 border-2 border-black hover:bg-white hover:text-black duration-300 rounded-lg capitalize" >
                    add to cart
                </button>
            </form>

            <script>
                const rangeSlider = document.getElementById("myRange");
                const rangeValue = document.getElementById("rangeValue");

                rangeValue.textContent = rangeSlider.value;

                rangeSlider.addEventListener("input", function () {
                    rangeValue.textContent = this.value;
                });
            </script>

        </div>
    </body>

    </html>


    <?php
} else {
    echo "Parameter id not found in the URL.";
}
?>