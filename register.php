
<?php

if(isset($_POST["submit"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $email = $_POST["email"];
    $phone = $_POST["mobile"];
    include("config.php");


    $sql = "insert into users(firstName,lastName,address,username,password,email,phoneNumber) values(?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $firstName, $lastName,$address,$username,$password,$email,$phone);
    $stmt->execute();

    echo "user inserted";

    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="container register">
        <div class="box form-box w-[700px]  shadow-xl mx-auto px-10 py-5 mt-10 ">
            <header class="text-3xl font-bold text-center mb-5 text-[#902c7e]">Register</header>
            <div class="wrapper">
                <form action="" method="post" class="grid grid-cols-2 gap-8">
                    <div class="field  input  space-y-3">
                        <label   for="firstName" class="text-[#902c7e]">First Name</label>
                        <input type="text" name="firstName" id="firstName" placeholder="First Name" required class="w-full px-3 py-2 border-2 rounded-lg">
                    </div>

                    <div class="field  input space-y-3 ">
                        <label class="text-[#902c7e]"  for="lastName">Last Name</label>
                        <input type="text" name="lastName" id="lastName" placeholder="Last Name" required class="w-full px-3 py-2 border-2 rounded-lg">
                    </div>

                    <div class="field  input space-y-3">
                        <label class="text-[#902c7e]"  for="address">Address</label>
                        <input type="text" name="address" id="address" placeholder="Address " required class="w-full px-3 py-2 border-2 rounded-lg">
                    </div>
                     <div class="field  input space-y-3">
                        <label class="text-[#902c7e]"  for="mobile">Phone Number</label>
                        <input type="number" name="mobile" id="mobile" placeholder="Phone Number" required class="w-full px-3 py-2 border-2 rounded-lg">
                    </div>

                    <div class="field  input space-y-3 col-span-full">
                        <label class="text-[#902c7e]"  for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" required class="w-full px-3 py-2 border-2 rounded-lg">
                    </div>
                    <div class="field  input space-y-3">
                        <label class="text-[#902c7e]"  for="email">Email</label>
                        <input type="username" name="username" id="email" placeholder="username" required class="w-full px-3 py-2 border-2 rounded-lg">
                    </div>


                    <div class="field  input space-y-3">
                        <label class="text-[#902c7e]"  for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required class="w-full px-3 py-2 border-2 rounded-lg">
                    </div>

                   

                    <div class="field col-span-full justify-self-end">
                        <input class="capitalize border-2 px-5 py-1 border-[#902c7e] text-[#902c7e] rounded-lg hover:text-white hover:bg-[#902c7e] duration-300 hover:shadow-xl cursor-pointer" type="submit" class="btn" name="submit" value="sign Up" autocomplete="off" required>
                    </div>

                    <div class="links col-span-full text-center">
                        Already a member? <a href="login.php" class="text-purple-900 hover:text-purple-700 hover:underline duration-300">Sign In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind SQL statement
    $sql = "INSERT INTO customer (firstname, lastname, address, mobile, email, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $fname, $lname, $address, $mobile, $email, $password);

    if ($stmt->execute()) {
        // Account creation successful
        echo '<script>alert("Account created successfully");</script>';
        echo '<script>window.location.href = "login.php";</script>';
        exit;
    } else {
        // Error handling
        echo '<script>alert("Error: ' . $conn->error . '");</script>';
    }

    $stmt->close();
}

$conn->close();
?>