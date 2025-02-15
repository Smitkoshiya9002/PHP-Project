<?php
session_start();

$con = mysqli_connect("localhost", "root", "root", "optical");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require('PHPMailer.php');
require('Exception.php');
require('SMTP.php');


if (isset($_POST['submit'])) {
    $email = $_POST['submit'];

    $query = mysqli_query($con, "SELECT * FROM tbl_register WHERE email='" . $_POST['email'] . "'");
    //$run=mysqli_query($conn,$sql) ;
    $numrows = mysqli_num_rows($query);

    if ($numrows == 0) {
        echo "<script> alert('Not USER !') </script>";
    } else {
        // Generate a random 6-digit OTP
        $otp = rand(1000, 9999);
        $_SESSION['otp'] = $otp;

        $mail = new PHPMailer(true);

        $mail->isSMTP(); //Send using SMTP

        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'visionshop02062@gmail.com'; // enter your mail address
        $mail->Password = 'xjkxebfavwikhleq';   // enter your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('visionshop02062@gmail.com', 'Registration-Vision');

        // Send the OTP to the user's email
        $to = $_POST["email"];
        $_SESSION['email'] = $to;

        $subject = "Your Login Code";
        $message = "<b>Your OTP $otp</b>";

        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;


        $mail->AltBody = 'Body in plain text for non-HTML mail clients';

        try {
            // Send the email
            $mail->send();
            echo "<script> alert(' Otp send !'); </script>";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            echo "<script> alert('Wrong Otp Please Fill up Detailes again !'); </script>";
        }
    }
}

if (isset($_POST['verify'])) {
    $otp = $_POST['otp'];
    $con_password = $_POST['con_password'];
    $new_password = $_POST['new_password'];
    $email = $_SESSION['email'];

    if ($_SESSION['otp'] == $_POST['otp']) {

        if ($new_password == $con_password) {
            $update = "UPDATE `tbl_register` SET `password`='$new_password'  WHERE email = $email";
            mysqli_query($con, $update);
            echo "<script> alert('Otp Veified Successfully !'); </script>";
            // session_unset();
            // session_destroy();
            echo "<script> location.href='login.php' </script>";
        } else {
            echo "<script> alert('confirm Password are not correct! Please Fill up Detailes again !'); </script>";
        }
    } else {
        echo "<script> alert('Wrong Otp Please Fill up Detailes again !'); </script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: white;
        }

        .box {
            width: 300px;
            height: 50vh;
            padding: 40px;
            background: lightgray;
            border: 0px solid rgb(44, 44, 43);
            border-radius: 5px;
            box-shadow: -5px -5px 5px #ffffff0d,
                5px 5px 5px #000000a6,
                10px 10px 10px #000000a6,
                15px 15px 15px #000000a6,
                20px 20px 20px #000000a6;
            margin-top: 10%;
            left: 40%;
            text-align: center;
            position: relative;
        }

        .box h2 {
            color: #000;
            font-weight: 400;
            text-transform: uppercase;
            margin-bottom: 40px;
            justify-content: center;
        }

        .usid {
            border: 2px solid #968d8d;
            display: block;
            margin: 20px auto;
            text-align: center;
            box-shadow: 0 2px 0 #000;
            color: #888;
            padding: 14px 10px;
            width: 200px;
            outline: none;
            font-size: 13px;
            font-weight: 400;
            text-shadow: 0 -1px 0 #000;
            border-radius: 5px;
            transition: 0.25;
            text-transform: uppercase;
        }

        .usid::-webkit-input-placeholder {
            color: #888;
        }

        .usid:-moz-placeholder {
            color: #888;
        }

        .usid:focus {
            width: 280px;
            animation: glow 800ms ease-out infinite alternate;
            background: rgb(22, 22, 22);
            /* background: linear-gradient(#333933, #222922); */
            border-color: #393;
            box-shadow: 0 0 5px #00ff0033, inset 0 0 5px #00ff001a, 0 2px 0 #000;
            color: #efe;
            outline: none;
        }

        .usid:focus::-webkit-input-placeholder {
            color: #efe;
            font-size: 14px;
        }

        .button {
            background: linear-gradient(#333, #222);
            box-sizing: border-box;
            border: 2px solid white;
            box-shadow: 0 2px 0 #000;
            color: #efe;
            display: block;
            margin: 20px auto;
            text-align: center;
            padding: 14px 40px;
            border-radius: 24px;
            cursor: pointer;
            text-transform: uppercase;
        }

        .button:hover,
        .button:focus {
            animation: glow 800ms ease-out infinite alternate;
            outline: none;
        }

        @keyframes glow {
            0% {
                border-color: white;
                box-shadow: 0 0 5px white, inset 0 0 5px white, 0 2px 0 #000;
            }

            100% {
                border-color: rgb(128, 113, 113);
                box-shadow: 0 0 20px rgb(121, 110, 110), inset 0 0 10px black, 0 2px 0 #000;
            }
        }

        .box a {
            color: black;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <?php
    // include 'header.php';
    ?>
    <form class="box" method="post">
        <h2>Verify OTP</h2>
        <!-- <input type="text" placeholder="username" class="usid" required> -->
        <input type="text" name="otp" placeholder="OTP" class="usid" required>
        <input type="password" name="new_password" placeholder="new password" class="usid" required>
        <input type="password" name="con_password" placeholder="confirm password" class="usid" required>
        <input type="submit" value="submit" name="verify" class="button">
    </form>
</body>

</html>