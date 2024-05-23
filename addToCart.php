<?php
if (isset($_POST["submit"])) {
    session_start();
    include ("config.php");

    if (!isset($_SESSION["uid"])) {
        header("location: /bags_store/login.php");
    } else {
        $bid = $_POST["id"];
        $result = $conn->query("select * from cart where bid=$bid");

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $quantity = $row["quantity"]+$_POST["quantity"];
            $conn->query("update cart set quantity=$quantity where bid=$bid;");
        } else {

            $sql = "INSERT INTO cart (bid,uid,quantity) values(?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iii", $_POST["id"], $_SESSION["uid"],$_POST["quantity"]);

            $stmt->execute();
        }
        header("location: cart.php");
    }
}
?>