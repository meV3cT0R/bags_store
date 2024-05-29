<?php
include("config.php");
include("util.php");
if(isset($_POST["submit"])) {
    $price = $_POST["price"];
    $id = $_POST["id"];
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $brand = $_POST["brand"];
    $query = "";
    if($_FILES["image"]) {
        $target_file = upload_image($_FILES);
        $query = "update products set name='$name',price=$price,image='$target_file',brand='$brand',quantity='$quantity' where id=$id";


    }else {
        $query = "update products set name='$name',price=$price,quantity='$quantity' where id=$id";

    }

    $conn->query($query);

    header("location: viewProducts.php");
}else {
    echo "something went wrong";
}   