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
        .box {
            width: 400px;
            padding: 40px;
            background: lightgray;
            border: 0px solid rgb(44, 44, 43);
            border-radius: 10px;
            box-shadow: -5px -5px 5px #ffffff0d,
                5px 5px 5px #000000a6,
                10px 10px 10px #000000a6,
                15px 15px 15px #000000a6,
                20px 20px 20px #000000a6;
            left: 35%;
            top: 12%;
            text-align: center;
            position: absolute;
        }

        .box h1 {
            color: #000;
            font-weight: 400;
            text-transform: uppercase;
            margin-bottom: 40px;
            justify-content: center;
            /* width: 100%; */
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
            width: 270px;
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
            width: 320px;
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

        a {
            color: white;
        }

        .signup {
            display: flex;
            position: relative;
            top: 7px;
            margin-left: 42%;
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
    $con = mysqli_connect("localhost", "root", "", "optical");
    if (isset($_POST['submit'])) {
        //name validation
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            echo "<script> alert('name is required !'); </script>";
        } else {
            $name = ($_POST["name"]);
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only alphabets and white space are allowed";
            }
        }


        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact_no = $_POST['contact_no'];
        $address = $_POST['address'];
        $uname = $_SESSION['uname'];
        $semail = $_SESSION['email'];

        // $insert = "INSERT INTO `tbl_register` (`username` , `email`) VALUES ('$name','$email');";
        // mysqli_query($con , $insert);

        $insert = "INSERT INTO `tbl_customer_details` (`name`, `email`, `contactno`, `city`, `address`) VALUES ('$name', '$email', '$contact_no', 'surat', '$address');";
        if ($uname == $name) {
            if ($email == $semail) {
                if (mysqli_query($con, $insert)) {
                    echo "<script> alert('Registration Successfully !'); </script>";
                    echo "<script> location.href='login.php' </script>";
                } else {
                    echo "<script> alert('problem in enter data !'); </script>";
                }
            } else {
                echo "<script> alert('please enter register email !'); </script>";
            }
        } else {
            echo "<script> alert('please enter register username !'); </script>";
        }
    }
    ?>
    
</body>

</html>