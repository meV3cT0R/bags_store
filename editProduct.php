<?php
    include("adminCheck.php");
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="prodEdit.php" method="POST" enctype="multipart/form-data">
<input type="number" name="id" hidden value="<?=$id ?>"/>
<input type="text" name="name" value="<?=$name ?>"/>
<input type="number" name="price"  value="<?=$price ?>"/>
<input type="file" name="image"  value="<?=$image ?>"/>
<button type="submit" name="submit"> update </button>
</form>
</body>
</html>
