
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<form action="prodAdd.php" method="POST" enctype="multipart/form-data" class="space-y-8 flex flex-col w-[500px] px-20 py-10">
<div>
    <label class=""> Name </label> <br/>
    <input type="text" name="name" class="w-full border-2 rounded-lg py-2 px-1 " required/>
</div>

<div>
    <label> price </label>
    <input type="number" name="price" class="w-full border-2 rounded-lg py-2 px-1 " required/>

</div>
    <input type="file" name="image"  class="text-white" required/>
<button type="submit" name="submit" class="w-full py-3 border-2 border-green-500 rounded-lg text-green-500 hover:bg-green-500 hover:text-white duration-300"> add </button>
</form>
</body>
</html>
