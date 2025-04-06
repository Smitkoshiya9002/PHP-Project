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
    <form class="box" method="post">
        <h1>OTP</h1>
        <input type="text" name="otp" placeholder="ENTER OTP" class="usid">
        <input type="submit" value="login" name="submit" class="button">
        <a href="forgot_password.php" class="forgot">RESEND OTP</a>
    </form>

</body>
<?php

$otp = $_POST['otp'];
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];

if (isset($_POST['submit'])) {
    if ($_SESSION['otp'] == $otp) {
        $stmt = $pdo->prepare("insrt into tbl_register (username, email, password) values (:a, :b, :c)");
        $stmt->bindParam(':a', $uname);
        $stmt->bindParam(':b', $email);
        $stmt->bindParam(':c', $password);
        $stmt->execute();
        echo "<script> alert('Otp Veified Successfully !'); </script>";
        echo "<script> location.href='customer_details.php' </script>";
    } else {
        echo "<script> alert('Wrong Otp Please Fill up Detailes again !'); </script>";
    }
}
?>


</html>