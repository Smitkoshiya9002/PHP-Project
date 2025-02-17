<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require('vendor/autoload.php');

require('PHPMailer.php');
require('Exception.php');
require('SMTP.php');


$db = 'optical';
$user = 'root';
$pass = 'root';

$dsn = "mysql:host=localhost;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
    echo "Connected Failed: " . $e->getMessage();
}

function getHeaderData($pdo, $tabledata)
{
    $stmt = $pdo->prepare("SELECT * FROM $tabledata");
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function login($pdo, $username, $password)
{
    $stmt = $pdo->prepare("select * from tbl_admin where email = :a and password = :b");
    $stmt->bindParam(':a', $username);
    $stmt->bindParam(':b', $password);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_SESSION['admin'] = $username;
        echo "<script>alert('welcome admin!')</script>";
        echo "<script>location.href = '/smit/admin-panel.php';</script>";
    } else {
        $stmt = $pdo->prepare("select * from tbl_register where username = :a and password = :b");
        $stmt->bindParam(':a', $username);
        $stmt->bindParam(':b', $password);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            echo "<script>alert('welcome $username!')</script>";
            echo "<script>location.href = '/smit/home.php';</script>";
        } else {
            echo "<script>alert('Invalid username or password!!!')</script>";
        }
    }
}

function Registration($pdo)
{
    $name = $_POST['name'];
    $stmt = $pdo->prepare("SELECT * FROM tbl_register WHERE username = :a");
    $stmt->bindParam(':a', $name);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo "<script> alert('Usename Is Already Avaliable !') </script>";
        echo "<script> location.href = 'registration.php'; </script>";
    }

    if (empty($_POST["name"])) {
        echo "<script> alert('Userame required !') </script>";
        echo "<script> location.href = 'registration.php'; </script>";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo "<script> alert('Only alphabet allowed!') </script>";
            echo "<script> location.href = 'registration.php'; </script>";
        }
    }

    //Email Validation   
    if (empty($_POST["email"])) {
        echo "<script> alert('Email required!') </script>";
        echo "<script> location.href = 'registration.php'; </script>";
    } else {
        $email = ($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script> alert('wrong format !') </script>";
            echo "<script> location.href = 'registration.php'; </script>";
        }
    }

    //pass and cpass should match
    $password = $_POST['password'];
    $confirmPassword = $_POST['cpassword'];
    if (empty($password) || $password != $confirmPassword) {
        echo "<script> alert('Passwords do not match!') </script>";
        echo "<script> location.href = 'registration.php'; </script>";
        return;
    }

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 7) {
        echo "<script> alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
        echo "<script> location.href = 'registration.php'; </script>";
    }

    $_SESSION['uname'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['confirm_pass'] = $_POST['cpassword'];


    $stmt = $pdo->prepare("select * from tbl_register where email = :a");
    $stmt->bindParam(('a'), $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo "<script> alert('Email is already registered!') </script>";
        echo "<script> location.href = 'registration.php'; </script>";
    }

    $otp = rand(1000, 9999);
    $_SESSION['otp'] = $otp;
    $to = $_POST["email"];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP(); //Send using SMTP

        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'visionshop02062@gmail.com'; // enter your mail address
        $mail->Password = 'xjkxebfavwikhleq';   // enter your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('visionshop02062@gmail.com', 'Registration-Vision');

        $mail->addAddress($to);


        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Clear Your Vision';
        $mail->Body = 'otp is ' . $otp;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "<script> alert('otp sent successfully!'); </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "<script> alert('Wrong Otp Please Fill up Detailes again !'); </script>";
    }

    echo "<script> location.href = 'otp.php'; </script>";
}
