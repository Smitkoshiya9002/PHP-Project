<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "optical");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .box {
            width: 300px;
            padding: 40px;
            /* background: transparent; */
            background: lightgray;
            border: 0px solid rgb(44, 44, 43);
            border-radius: 15px;
            box-shadow: -5px -5px 5px #ffffff0d,
                5px 5px 5px #000000a6,
                10px 10px 10px #000000a6,
                15px 15px 15px #000000a6,
                20px 20px 20px #000000a6;
            /* margin-left: 57%; */
            /* left: 37%; */
            /* top: 10%; */
            text-align: center;
            position: relative;
        }

        .box h1 {
            color: #000;
            font-weight: 400;
            text-transform: uppercase;
            margin-bottom: 40px;
            justify-content: center;
        }

        .usid {
            border: 2px solid #968d8d;
            /* background: linear-gradient(#333, #222); */
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
                border-color: black;
                box-shadow: 0 0 20px rgb(121, 110, 110), inset 0 0 10px black, 0 2px 0 #000;
            }
        }

        a {
            color: black;
            text-transform: uppercase;
        }

        .signup {
            display: flex;
            position: relative;
            top: 7px;
            margin-left: 42%;
        }

        @media screen and (max-width: 450px) {


            .box {
                padding: 10px;
            }

            .signup {
                display: flex;
                position: relative;
                justify-content: space-between;
                top: -10px;
            }
        }
    </style>
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

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    require('PHPMailer.php');
    require('Exception.php');
    require('SMTP.php');

    if (isset($_POST['submit'])) {
        function input_data($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $name = $_POST['name'];
        $query = "select * from `tbl_register` where `username` = '$name'";

        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script> alert('use diifernt name !') </script>";
            echo "<script> location.href = 'registration.php'; </script>";
        }

        //name validation
        if (empty($_POST["name"])) {
            echo "<script> alert('name required !') </script>";
            echo "<script> location.href = 'registration.php'; </script>";
        } else {
            $name = input_data($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                echo "<script> alert('only alphabet allowed!') </script>";
                echo "<script> location.href = 'registration.php'; </script>";
            }
        }

        //Email Validation   
        if (empty($_POST["email"])) {
            echo "<script> alert('email reuired!') </script>";
            echo "<script> location.href = 'registration.php'; </script>";
        } else {
            $email = input_data($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script> alert('wrong format !') </script>";
                echo "<script> location.href = 'registration.php'; </script>";
            }
        }

        // Validate password strength
        $password = $_POST['password'];
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

        if ($password == $_POST['cpassword']) {
            $password = $_POST['password'];
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 7) {
                echo "<script> alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
                echo "<script> location.href = 'registration.php'; </script>";
            } else {
                $email = $_POST['email'];
                $query = "SELECT * FROM `tbl_register` WHERE `email`='$email'";
                $result = mysqli_query($con, $query);
                $numrows = mysqli_num_rows($result);
                if ($numrows != 0) {
                    echo "<script> alert('Alredy Used !') </script>";
                } else {
                    $otp = rand(1000, 9999);
                    $_SESSION['otp'] = $otp;
                    $to = $_POST["email"];
                    //Create an instance; passing `true` enables exceptions
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
            }
        } else {
            echo "<script> alert('Please Enter same password') </script>";
        }
    }
    ?>

</body>

</html>