
<?php
    session_start();

    if(!isset($_SESSION["username"]) || !isset($_SESSION["uid"]) || !isset($_SESSION["role"]))
        header("location: index.php");

    if($_SESSION["role"]!=="admin") header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="px-32 py-10 space-y-5">
        <div>

            <h1 class="font-bold text-3xl "> Welcome to admin page </h1>
            <form>

                <button class="border-2 border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white px-3 py-1 duration-300">
                    Log out
                </button>
            </form>
        </div>
        <div>

            <a href="addProduct.php"
                class="bg-black text-white px-5 py-2 border-2 border-black hover:bg-white hover:text-black duration-300 rounded-lg capitalize">
                add product</a>
        </div>
        <div>

            <a
             href="viewProducts.php"
            class="bg-black text-white px-5 py-2 border-2 border-black hover:bg-white hover:text-black duration-300 rounded-lg capitalize"
            > view products </a>
        </div>
    </div>
</body>

</html>