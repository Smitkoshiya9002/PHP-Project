<?php
session_start();
include "Backend/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/Form.css">
    <style>
        .box {
            width: 400px;
            padding: 40px;
        }

        .usid {
            width: 270px;
        }
    </style>
</head>

<body>

    <form class="box" action="" method="post">
        <h1>Customer details</h1>
        <input type="text" placeholder="username" name="name" class="usid" required>
        <input type="email" placeholder="email" name="email" class="usid" required>
        <input type="number" placeholder="contact number" name="contact_no" class="usid" required>
        <input type="city" placeholder="city" value="surat" name="city" class="usid" required disabled>
        <input type="text" placeholder="Address" name="address" class="usid" required>
        <input type="submit" value="submit" name="submit" class="button">
    </form>
    <?php
    $con = mysqli_connect("localhost", "root", "root", "optical");
    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact_no = $_POST['contact_no'];
        $address = $_POST['address'];
        $uname = $_SESSION['uname'];
        $semail = $_SESSION['email'];

        CustomerDetails($pdo, $name, $email, $contact_no, $address, $uname, $semail);
    }
    ?>

</body>

</html>