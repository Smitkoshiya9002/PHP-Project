<?php
$con = mysqli_connect("localhost", "root", "", "optical");
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];


    $usercheck = "select * from tbl_register where username = '$username'";
    $emailcheck = "select * from tbl_register where email = '$email'";

    $res = mysqli_query($con, $usercheck);
    $row = mysqli_fetch_assoc($res);

    $res1 = mysqli_query($con, $emailcheck);
    $row1 = mysqli_fetch_assoc($res1);

    if ($res->num_rows == 0 && $res1->num_rows == 0) {
        echo "<script>alert('Invalid user');</script>";
    } else {
        $sql = "delete from tbl_customer_details where name='$username'";

        if (mysqli_query($con, $sql)) {
            $delete = "delete from tbl_register where username='$username'";

            if (mysqli_query($con, $delete)) {
                echo "<script>alert('All profile is delete of customer');</script>";
                echo "<script> location.href='admin-panel.php' </script>";
            }
            // }
        } else {
            echo "<script>alert('Error deleting Profile and invalid detail of customer');</script>";
        }
    }
    unset($_POST['update']);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>customer delete</title>
    <style>

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
            margin-left: 37%;
            margin-top: 70px;
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

        .admin-logo {
            width: 150px;
            margin-left: 80px;
            padding: 40px 40px;
        }

        #dash-details a {
            margin-top: 15px;
        }

        #dash-details a:hover
    {
        background-color: black;
        color: white;
    }

    .row.content
    {
      height: 100vh;
    }

    #dash-details {
      text-transform: uppercase;
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-size: 14px;
      font-weight: 700px;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <img src="images/admin.png" alt="" class="admin-logo">
                <ul class="nav nav-pills nav-stacked" id="dash-details">
                    <li class="active"><a href="admin-panel.php">Dashboard</a></li>
                    <li><a href="admin-customerview.php">customer details</a></li>
                    <li><a href="customer-delete.php">customer delete</a></li>
                    <li><a href="admin_add_brand_category_product.php">add product</a></li>
                    <li><a href="admin-login.php">logout</a></li>
                </ul>
                <br>
            </div>
            <br>
            <div class="col-sm-9">
                <form class="box" action="" method="post">
                    <h2>delete customer</h2>
                    <input type="text" placeholder="name" name="name" class="usid" required>
                    <input type="email" placeholder="email" name="email" class="usid" required>
                    <input type="submit" value="delete" name="submit" class="button">
                </form>
            </div>
        </div>
    </div>
</body>
</html>