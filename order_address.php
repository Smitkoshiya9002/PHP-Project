<?php
session_start();
include '../smit/Backend/db.php';
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Order Address</title>
    <style>
        .container {
            width: 100%;
            position: fixed;
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

        a {
            color: black;
            border: none;
        }

        .active {
            font-size: 16px;
            font-weight: 600;
        }

        .customerdetails {
            width: 60%;
            /* background-color: cyan; */
        }

        .customername {
            font-size: 25px;
            text-transform: uppercase;
            margin: 25px 0px 25px 0px;
            font-family: optima;
        }

        .customerdetails .cclass {
            padding: 15px;
            margin-right: 25px;
            border-radius: 10px;
            text-transform: uppercase;
            font-size: 10px;
            width: 29%;
        }

        .customeraddress {
            width: 60%;
            /* background-color: green; */
        }

        .customeraddress .cclass {
            padding: 15px;
            margin: 20px 20px 20px 0px;
            border-radius: 10px;
            text-transform: uppercase;
            font-size: 10px;
            width: 46%;
        }

        .customeraddress .feildnanme {
            width: 49%;
            /* background-color: red; */
            font-size: 12px;
            color: black;
            font-weight: 600;
            text-align: left;
        }

        .address_save {
            padding: 5px 15px 5px 15px;
            border: 2px solid black;
            position: relative;
            margin-top: 2%;
            border-radius: 5px;
            font-size: 13px;
            font-family: optima;
            font-weight: 600;
        }

        .address_save:hover {
            background-color: rgb(47, 46, 44);
            transition: all ease 0.5s;
            color: white;
        }

        /* --------------------------------billform------------------------------------------ */

        .billform {
            width: 40%;
            height: auto;
            /* background-color: brown; */
            position: relative;
            left: 60%;
            bottom: 77vh;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="format">
            <div class="process">
                <span><a href="/smit/login.php">login/sign up</a></span>>
                <span class="active"><a href="order_address.php">Shipping Address</a></span>>
                <span><a href="order_payment.php">Payment</a></span>>
                <span>Summary</span>
            </div>

            <form action="" method="post">
                <div class="customerdetails">

                    <label class="customername">Details</label><br>
                    <?php
                    $row = OrderAddressData($pdo, $username);
                    if ($row != null) {
                    ?>
                        <input type="text" class="cclass" name="name" placeholder="Name" value="<?php echo $row['name']; ?>">
                        <input type="number" class="cclass" name="contactno" placeholder="Contact no" value="<?php echo $row['contactno']; ?>">
                        <input type="email" class="cclass" name="email" placeholder="email" value="<?php echo $row['email']; ?>">
                </div>
                <div class="customeraddress">
                    <label class="customername">Address</label><br>

                    <label for="" class="feildnanme">Address</label>
                    <label for="" class="feildnanme">City</label>

                    <input type="text" class="cclass" name="address" placeholder="Address" value="<?php echo $row['address']; ?>" require>
                    <input type="text" class="cclass" name="city" placeholder="City" value="<?php echo $row['city']; ?>" require>

                    <label for="" class="feildnanme">state</label>
                    <label for="" class="feildnanme">Country</label>

                    <input type="text" class="cclass" name="state" placeholder="State" value="Gujrat" require>
                    <input type="text" class="cclass" name="country" placeholder="Country" value="Bharat" require>

                </div>
                <input type="submit" name="Adresssave" value="Save & continue" class="address_save">
            <?php
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }
            ?>
            </form>

            <div class="billform">
                <center>
                    <p class="billtitle">Bill details</p>

                    <?php
                    $total = $quantity = $count = $discount = $payable_amount = 0;
                    $SideData = DisplayCartItem($pdo, $username);
                    foreach ($SideData as $row) {
                        $count += 1;
                        $total += $row['total_prize'];
                        $quantity += $row['product_quantity'];
                    }
                    $total = $total + ($quantity * 200);
                    $discount = $quantity * 200;
                    $payable_amount = $total - $discount;
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
    </div>
    <?php
    if (isset($_POST['Adresssave'])) {
        ConfirmOrder($pdo, $payable_amount);
        UpdateStockAfterOrder($pdo);
    }
    ?>
</body>
<?php
?>

</html>