
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

</head>

<body>
    <div class="container register">
        <div class="box form-box">
            <header>Sign Up</header>
            <div class="wrapper">
                <form action="" method="post">
                    <div class="field  input">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" id="firstName" placeholder="First Name" required>
                    </div>

                    <div class="field  input">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" id="lastName" placeholder="Last Name" required>
                    </div>

                    <div class="field  input">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" placeholder="Address " required>
                    </div>

                    <div class="field  input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="field  input">
                        <label for="email">Email</label>
                        <input type="username" name="username" id="email" placeholder="username" required>
                    </div>


                    <div class="field  input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>

                    <div class="field  input">
                        <label for="mobile">Phone Number</label>
                        <input type="number" name="mobile" id="mobile" placeholder="Phone Number" required>
                    </div>

                    <div class="field ">
                        <input type="submit" class="btn" name="submit" value="Singn Up" autocomplete="off" required>
                    </div>

                    <div class="links">
                        Already a member? <a href="login.php">Sign In</a>
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