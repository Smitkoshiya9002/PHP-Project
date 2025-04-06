<?php
session_start();
include '../smit/Backend/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Order Payment</title>
    <style>
        .container {
            width: 100%;
            /* position: fixed; */
        }

        .format {
            width: 80%;
            /* background-color: gray; */
            height: 100vh;
            position: relative;
            left: 10%;
        }

        .process {
            width: 60%;
            position: relative;
            justify-content: space-between;
            display: flex;
            /* background: yellow; */
            padding-top: 4%;
            padding-bottom: 4%;
        }

        .process span {
            font-size: 15px;
            text-transform: uppercase;
        }

        .process a {
            color: black;
            border: none;
        }

        .process .active {
            font-size: 16px;
            font-weight: 600;
        }

        .payment {
            width: 60%;
            height: 80vh;
            /* background-color: green; */
        }

        .payment p {
            font-size: 30px;
            font-family: optima;
        }

        .payment .paymentname {
            margin: 15px;
        }

        .form-group {
            margin: 10px;
            padding: 20px;
            box-shadow: 0 0 5px rgba(128, 128, 128, 10),
                0 0 5px rgba(0, 0, 0, 10),
                0 0 5px rgba(0, 0, 0, 10);
        }

        .form-group img {
            /* height: 25px; */
            width: 25px;
            margin: 0px 10px 0px 10px;
        }

        /* --------------------------------billform------------------------------------------ */

        .billform {
            width: 40%;
            height: auto;
            /* background-color: brown; */
            position: relative;
            left: 60%;
            bottom: 87vh;
        }

        .billform .billtitle {
            font-size: 30px;
            font-weight: 600;
            font-family: optima;
            text-transform: uppercase;
            padding: 20px;
            padding-top: 90px;
        }

        .billform .sidebillform {
            width: 80%;
            height: auto;
            /* background-color: yellow; */
            box-shadow: 0 0 5px rgba(128, 128, 128, 10),
                0 0 10px rgba(0, 0, 0, 10),
                0 0 10px rgba(0, 0, 0, 10);
        }

        .billform .sidebill {
            text-transform: uppercase;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 500;
            margin: 10px;
            padding: 20px;
            font-size: 15px;
            letter-spacing: 1px;
        }

        .billform .sidebill_amount {
            font-weight: 600;
        }

        .address_save {
            padding: 5px 15px 5px 15px;
            border: 2px solid black;
            position: relative;
            left: 7px;
            top: 20px;
            /* margin-bottom: 100px; */
            border-radius: 5px;
            font-size: 15px;
            font-family: optima;
            font-weight: 600;
        }

        .address_save:hover {
            background-color: rgb(47, 46, 44);
            transition: all ease 0.5s;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="format">
            <div class="process">
                <span><a href="/smit/login.php">login/sign up</a></span>>
                <span><a href="order_address.php">Shipping Address</a></span>>
                <span class="active"><a href="order_payment.php">Payment</a></span>>
                <span>Summary</span>
            </div>
            <div class="payment">
                <form action="" method="post">
                    <p>Payment methods</p>
                    <label class="paymentname">UPI QR code</label>
                    <div class="form-group">
                        <input type="radio" name="option" value="UPI">
                        <img src="/smit/images/qr_code.png" alt="Qr code image">
                        <span>UPI</span>
                    </div>

                    <label class="paymentname">Cash on delivery</label>
                    <div class="form-group">
                        <input type="radio" name="option" value="COD">
                        <!-- <img src="/smit/images/gpay.png" alt="Qr code image"> -->
                        <span>Cash on delivery</span>
                    </div>

                    <input type="submit" name="Paymentbtn" value="continue" class="address_save" onclick="getSelectedOption()">
                </form>
                <?php
                if (isset($_POST['Paymentbtn'])) {
                    if (isset($_POST['option'])) {
                        $selectedoption = $_POST['option'];
                        $_SESSION['payment_method'] = $_POST['option'];
                        echo "<script>alert('you select $selectedoption');</script>";

                        if ($selectedoption == "UPI") {
                            echo '<script>location.href = "razorpay.php";</script>';
                        } elseif ($selectedoption == "COD") {
                            echo '<script>location.href = "payment_success.php";</script>';
                        }
                    } else {
                        echo '<script>alert("not select");</script>';
                        exit();
                    }
                }
                ?>
            </div>
            <div class="billform">
                <center>
                    <p class="billtitle">Bill details</p>

                    <?php

                    if (isset($_SESSION['order_id'])) {
                        $total = $quantity = $count = $discount = $payable_amount = 0;
                        $stmt = $pdo->prepare("select * from `tbl_order_details` where `order_id` = :order_id");
                        $stmt->bindParam(':order_id', $_SESSION['order_id']);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            $count += 1;
                            $total += $row['price'] * $row['quantity'];
                            $quantity += $row['quantity'];
                        }
                        $total = $total + ($quantity * 200);
                        $discount = $quantity * 200;
                        $payable_amount = $total - $discount;
                    }
                    ?>
                    <div class="sidebillform">
                        <p class="sidebill">total product : <span class="sidebill_amount"><?php echo $count; ?></span></p>
                        <p class="sidebill">total quantity : <span class="sidebill_amount"><?php echo $quantity; ?></span></p>
                        <p class="sidebill">total prize : <span class="sidebill_amount"><?php echo $total; ?></span></p>
                        <p class="sidebill">Bonus Discount : <span class="sidebill_amount"><?php echo $discount; ?></span></p>
                        <p class="sidebill">total payable amount : <span class="sidebill_amount"><?php echo $payable_amount; ?></span></p>
                    </div>
                </center>
            </div>
        </div>
</body>

</html>