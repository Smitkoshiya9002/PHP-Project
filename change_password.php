<?php
session_start(); {
    $con = mysqli_connect("localhost", "root", "", "optical");
}


if (isset($_POST['submit'])) {
    $oldpass = $_POST['old_password'];
    $npw = $_POST['new_password'];
    $cpw = $_POST['con_password'];

    // $select = "select * from tbl_admin";
    // $result = mysqli_query($con, $select);
    // $row = mysqli_fetch_assoc($result);
    // $pass = $row['password'];
    // if ($uname = "visionshop197@gmail.com" && $oldpass = $pass) {
    //     $admin = $_SESSION['admin'];
    //     $update = "UPDATE `tbl_admin` SET `password`='$npw' WHERE `email` = '$admin'";
    //     if ($npw == $cpw) {
    //         if (mysqli_query($con, $update)) {
    //             echo "<script>location.href='admin-login.php';</script>";
    //         }
    //     }
    // } else {
    $uname = $_SESSION['username'];
    $uppercase = preg_match('@[A-Z]@', $npw);
    $lowercase = preg_match('@[a-z]@', $npw);
    $number    = preg_match('@[0-9]@', $npw);
    $specialChars = preg_match('@[^\w]@', $npw);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($npw) < 7) {
        echo "<script> alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
        echo "<script> location.href = 'change_password.php'; </script>";
    }

    $sql = "select * from tbl_register where username = '$uname'";

    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);


    if ($oldpass != $row['password']) {
        echo "<script>alert('Invalid Old Password');</script>";
    } else {
        if ($npw == $cpw) {
            $sql = "update tbl_register set password = '$npw' where username = '$uname' AND password = '$oldpass' ";

            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Password Updated.')</script>";
                echo "<script>location.href='login.php';</script>";
            } else {
                echo "<script>alert('Error Updating Password')</script>";
            }
        } else {
            echo "<script>alert('Password does not matched.')</script>";
        }
    }
}
unset($_POST['submit']);
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            height: 100vh;
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
            top: 15%;
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
        <h2>CHANGE PASSWORD</h2>
        <input type="password" placeholder="old password" name="old_password" class="usid" required>
        <input type="password" placeholder="new password" name="new_password" class="usid" required>
        <input type="password" placeholder="confirm password" name="con_password" class="usid" required>
        <input type="submit" value="submit" name="submit" class="button">
        <a href="forgot_password.php" class="forgot">forgot password</a>
    </form>

</body>

</html>