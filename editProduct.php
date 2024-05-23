<?php
include("config.php");
if(isset($_POST["submit"])) {
    $price = $_POST["price"];
    $id = $_POST["id"];
    $name = $_POST["name"];
    if($_FILES["image"]) {
        $query = "update products set name=$name,price=$price,image=$target_file where id=$id";
    }

    header("location: viewProducts.php");
}else {
    echo "something went wrong";
}   