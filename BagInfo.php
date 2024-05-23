<?php
include ("config.php");
// Check if a specific parameter exists
if (isset($_GET['id'])) {
    // Retrieve the value of the parameter
    $id = $_GET['id'];
    $result = $conn->query("select * from products where id=$id");
    $row = mysqli_fetch_assoc($result);
    ?>

    <div>
        <img src="<?php
        if (strncmp($row["image"], "http", 4) === 0) {
            echo $row["image"];
        } else
            echo "http://localhost:80/bags_store/" . $row["image"];
        ?>" style="width:500px;height:500px;" />
        <h1> <?= $row["name"] ?></h1>
        <h1> <?= $row["price"] ?></h1>

        <form action="/bags_store/addToCart.php" method="post">
            <input type="" name="id" value="<?= $id ?>" hidden />
            <div>
                <span id="rangeValue"></span> <br />
                <input type="range" id="myRange" min="1" value="1" max="100" name="quantity" />
            </div>
            <button name="submit">
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

    <?php
} else {
    echo "Parameter id not found in the URL.";
}
?>