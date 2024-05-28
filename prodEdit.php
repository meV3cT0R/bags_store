<?php
include("config.php");
include("util.php");
if(isset($_POST["submit"])) {
    $price = $_POST["price"];
    $id = $_POST["id"];
    $name = $_POST["name"];
    $query = "";
    if($_FILES["image"]) {
        $target_file = upload_image($_FILES);
        $query = "update products set name='$name',price=$price,image='$target_file' where id=$id";


    }else {
        $query = "update products set name='$name',price=$price where id=$id";

    }

    $conn->query($query);

    header("location: viewProducts.php");
}else {
    echo "something went wrong";
}   