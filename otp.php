<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            /* background-color: #968d8d; */
            height: 100vh;
            width: 100%;
        }

        .box {
            width: 300px;
            padding: 40px;
            background: lightgray;
            border: 0px solid rgb(44, 44, 43);
            border-radius: 5px;
            box-shadow: -5px -5px 5px #ffffff0d,
                5px 5px 5px #000000a6,
                10px 10px 10px #000000a6,
                15px 15px 15px #000000a6,
                20px 20px 20px #000000a6;
            left: 40%;
            top: 30%;
            text-align: center;
            position: absolute;
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
                border-color: rgb(128, 113, 113);
                box-shadow: 0 0 20px rgb(121, 110, 110), inset 0 0 10px black, 0 2px 0 #000;
            }
        }

        .box a {
            color: black;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 13px;
        }

        .links {
            display: flex;
            position: relative;
            justify-content: space-between;
            top: 12px;
        }

        h1 {
            justify-content: center;
        }
    </style>
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


$con = mysqli_connect("localhost", "root", "", "optical");


// $otp = $_POST['otp'];
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];
$confirm_password = $_SESSION['confirm_pass'];
$password = $_SESSION['password'];


if (mysqli_connect_errno()) 
{
    echo "Connection Failed :" . mysqli_connect_error();
    exit();
} 

if(isset($_POST['submit'])) 
    {
        $otp = $_POST['otp'];
        if ($_SESSION['otp'] == $_POST['otp']) 
        {
            $insert = "INSERT INTO `tbl_register` (`username`, `email`, `password`, `otp`) VALUES ('$uname', '$email', '$password', '$otp');";
            mysqli_query($con, $insert);
            echo "<script> alert('Otp Veified Successfully !'); </script>";
            echo "<script> location.href='customer_details.php' </script>";
        } 
        else 
        {
            echo "<script> alert('Wrong Otp Please Fill up Detailes again !'); </script>";
        }   
    } 
?>


</html>