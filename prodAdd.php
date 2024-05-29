<?php
include ("config.php");
include ("util.php");
if (isset($_POST["submit"])) {

   $target_file = upload_image($_FILES);

    $stmt = $conn->prepare("insert into products(name,price,image,brand,quantity) values(?,?,?,?,?)");
    $stmt->bind_param("sissi",$_POST["name"],$_POST["price"],$target_file,$_POST["brand"],$_POST["quantity"]);

    $stmt->execute();
    header("location: viewProducts.php");
}else {
    echo "something went wrong";
}
?>