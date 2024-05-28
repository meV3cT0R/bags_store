<?php
session_start();

include ("config.php");
if (isset($_SESSION["uid"]))
    header("location:index.php");
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $sql = "SELECT * FROM users where username='$username' and password='$password'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION["uid"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["role"] = $row["role"];
        header("Location: index.php");
    } else {
        echo "invalid username/password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container login">
        <div class="box form-box">
            <h1 class="head">Login</h1>
            <div class="wrapper">
                <form action="" method="post">
                    <div class="field  input">
                        <label for="uname">Email/Username</label>
                        <input type="text" name="username" id="uname" placeholder="Username" required>
                    </div>

                    <div class="field  input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>

                    <div class="field ">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>

                    <div class="links">
                        Don't have account? <a href="register.php">Sign Up Now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>