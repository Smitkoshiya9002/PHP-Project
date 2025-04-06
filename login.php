<?php
include "Backend/db.php";
session_start();

$check = "";
if (isset($_SESSION['username'])) {
    $check = $_SESSION['username'];
}

if (isset($_REQUEST['submit'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    if ($check == $username) {
        echo "<script>alert('already login!')</script>";
        echo "<script>location.href = '/smit/login.php';</script>";
    } else {
        login($pdo, $username, $password);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/Form.css">
</head>

<body>
    <?php
    // include 'header.php';
    ?>
    <form class="box" method="post">
        <h1>login</h1>
        <input type="text" placeholder="username" class="usid" name="username" required>
        <input type="password" placeholder="password" class="usid" name="password" required>
        <input type="submit" name="submit" value="login" class="button">
        <div class="links">
            <a href="forgot_password.php" class="forgot">forgot password</a>
            <a href="registration.php" class="register">registration</a>
        </div>
    </form>
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
</body>

</html>