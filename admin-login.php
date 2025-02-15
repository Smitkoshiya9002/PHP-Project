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
            background: #968d8d;
        }   

        .box {
            width: 300px;
            padding: 40px;
            background: #222222;
            border: 1px solid rgb(44, 44, 43);
            border-radius: 5px;
            box-shadow: -5px -5px 5px #ffffff0d,
                5px 5px 5px #000000a6,
                10px 10px 10px #000000a6,
                15px 15px 15px #000000a6,
                20px 20px 20px #000000a6;
            margin-left: 39%;
            margin-top: 120px;
            text-align: center;
            position: relative;
        }

        .box h2 {
            color: #fff;
            font-weight: 400;
            text-transform: uppercase;
            margin-bottom: 40px;
        }

        .usid {
            border: 4px solid #968d8d;
            background: linear-gradient(#333, #222);
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
            border-radius: 24px;
            transition: 0.25;
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
            border: 4px solid white;
            box-shadow: 0 2px 0 #000;
            color: #efe;
            display: block;
            margin: 20px auto;
            text-align: center;
            padding: 14px 40px;
            border-radius: 24px;
            cursor: pointer;
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
            color: white;
        }

        .links {
            display: flex;
            position: relative;
            justify-content: space-between;
            top: 12px;
        }
    </style>
</head>

<body>
    <form class="box" method="POST">
        <h2>Admin login</h2>
        <input type="text" placeholder="username" class="usid" name="username" required>
        <input type="password" placeholder="password" class="usid" name="password" required>
        <input type="submit" value="login" class="button" name="submit">
    </form>
</body>
<?php
$con = mysqli_connect("localhost", "root", "root", "optical");

if (isset($_REQUEST['submit'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    // $sel = "select * from tbl_admin where username = '$username' AND password = '$password' ";
    // $res = mysqli_query($con, $sel);
    //header("location:Home_page.php");

    if ($username == 'visionshop197@gmail.com' && $password == 'Vision@1234') {
        echo "<script>alert('welcome admin')</script>";
        header("location:admin-panel.php");
    } else {
        echo "<script>alert('Invalid username or password!!!')</script>";
    }
}

?>
</html>