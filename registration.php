<?php
session_start();
include 'Backend/db.php';
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
    <form class="box" action="" method="post">
        <h1>registration</h1>
        <input type="text" placeholder="name" name="name" class="usid" required>
        <input type="email" placeholder="email" name="email" class="usid" required>
        <input type="password" placeholder="password" name="password" class="usid" required>
        <input type="password" placeholder="confirm password" name="cpassword" class="usid" required>
        <input type="submit" value="submit" name="submit" class="button">
        <a href="login.php" class="signup">log in</a>
    </form>

    <?php

    if (isset($_POST['submit'])) {
        Registration($pdo);
    }
    ?>

</body>

</html>