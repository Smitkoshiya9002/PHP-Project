<?php
session_start();
if (isset($_SESSION['username'])) {
$con = mysqli_connect("localhost", "root", "", "optical");
$username = $_SESSION['username'];
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            height: auto;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin-bottom: 1%;
        }


        .design {
            /* background-color: red; */
            box-shadow: 0 0 20px rgba(0, 0, 0, 1), inset 0 0 1px rgba(255, 255, 255, 0.9);
            height: auto;
            width: 90%;
            position: relative;
            left: 5%;
            margin-top: 2%;
            padding: 10px;
        }

        .format {
            width: 90%;
            position: relative;
            left: 5%;
            /* top: 55px; */
            height: 25vh;
            margin: 25px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2), inset 0 0 1px rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            /* background-color: green; */
        }

        .image {
            height: 95%;
            width: 25%;
            transition: all ease 0.5s;
        }

        .format:hover .image {
            height: 100%;
            width: 27%;
            position: relative;
        }

        .details {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: 10px;
            position: relative;
        }


        .name {
            font-family: optima;
            font-size: 20px;
            margin: 5px;
        }

        .qlabel {
            font-size: 15px;
            font-weight: 600;
            margin: 5px;
        }

        .quantity {
            font-weight: 600;
            margin: 5px;
        }

        .company {
            text-transform: uppercase;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 600;
            margin: 5px;
        }

        .size {
            text-transform: uppercase;
            font-family: 'Times New Roman', Times, serif;
            margin: 5px;
        }


        .right-details {
            display: flex;
            flex-direction: column;
            /* align-items: flex-end; */
            margin: 20px;
        }

        .price,
        .status {
            margin: 10px;
            /* Adjust the margin as needed */
        }

        .cancel_order {
            margin: 10px;
            text-transform: uppercase;
            padding: 5px;
            font-size: 12px;
            background-color: red;
            opacity: 0.8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 108px;
            position: relative;
        }

        .cancel_order:hover {
            background-color: red;
            opacity: 1;
            transition: all ease 0.5s;
        }

        .print_order {
            margin: 10px;
            text-transform: uppercase;
            padding: 5px;
            font-size: 12px;
            background-color: lightblue;
            opacity: 0.8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 108px;
            position: relative;
            color: black;
            font-weight: 600;
        }

        .print_order:hover {
            background-color: lightblue;
            opacity: 1;
            color: black;
            transition: all ease 0.5s;
        }

        .no_order {
            text-transform: uppercase;
            text-align: center;
            margin: 70px;
        }

        .pay_now {
            margin: 10px;
            text-transform: uppercase;
            padding: 5px;
            font-size: 12px;
            background-color: green;
            opacity: 0.8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100px;
            position: relative;
        }

        .pay_now:hover {
            background-color: green;
            opacity: 1;
            transition: all ease 0.5s;
        }

        .total_details {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }

        .total_details span {
            font-family: optima;
            font-size: 18px;
            font-weight: 600;
            position: relative;
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $select = "SELECT * FROM tbl_order WHERE cust_name = '$username' and place_order = 'placed'";
        $result = mysqli_query($con, $select);

        if (mysqli_num_rows($result) == 0) {
            echo '<h3 class="no_order">no order available</h3>';
        } else {

            while ($row = mysqli_fetch_assoc($result)) {
                $orderID = $row['OID'];
        ?>
                <div class="design">
                    <?php
                    $query = "SELECT
                    d.product_name AS product_name, 
                    d.photo AS product_photo,
                    d.quantity AS product_quantity,
                    d.company AS product_company,
                    d.size AS product_size,
                    d.price AS product_prize,
                    o.status AS order_status,
                    o.OID AS order_id
                    FROM 
                    tbl_order_details AS d
                    JOIN 
                    tbl_order AS o ON d.order_id = o.OID
                    WHERE 
                    o.cust_name = '$username' AND o.OID = $orderID";

                    $orderDetailsResult = mysqli_query($con, $query);


                    while ($orderRow = mysqli_fetch_assoc($orderDetailsResult)) {
                    ?>
                        <div class="format">
                            <img src="/smit/uploads_img/<?php echo $orderRow['product_photo']; ?>" alt="no" class="image">
                            <div class="details">
                                <span class="name"><?php echo $orderRow['product_name']; ?></span>
                                <span class="company"><?php echo $orderRow['product_company']; ?></span>
                                <span class="size">Size: <?php echo $orderRow['product_size']; ?></span>
                                <span class="quantity">Quantity: <?php echo $orderRow['product_quantity']; ?></span>
                            </div>
                            <div class="right-details">
                                <span class="price">Price: ₹<?php echo $orderRow['product_prize'] * $orderRow['product_quantity']; ?>/-</span>
                                <span class="status" style="color: <?php echo ($orderRow['order_status'] == 'incomplete') ? 'red' : 'green'; ?>">Status: <?php echo $orderRow['order_status']; ?></span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="total_details">
                        <span>Total amount : ₹<?php echo $row['amount']; ?>/-</span>
                        <span>Order date : <?php echo $row['order_date']; ?></span>
                        <!-- </div> -->
                        <!-- <div class="total_details"> -->
                        <?php if ($row['status'] == 'incomplete') {
                        ?>
                            <form action="" method="post">
                                <input type="hidden" name="payment" value="<?php echo $orderID; ?>">
                                <input type="submit" value="pay_now" name="pay_now" class="pay_now">
                            </form>
                        <?php
                        } else {
                            $date = $row['order_date'];
                            $newDate = date("Y-m-d", strtotime($date . " + 10 days"));
                        ?>
                            <span>Shipping date : <?php echo $newDate ?></span>
                            <form action="" method="post">
                                <input type="hidden" name="print_id" value="<?php echo $orderID; ?>">
                                <input type="submit" value="print" name="print" class="print_order">
                            </form>
                        <?php
                        }
                        ?>
                        <form action="" method="post">
                            <input type="hidden" name="d_id" value="<?php echo $orderID; ?>">
                            <input type="submit" value="Cancel Order" name="cancel" class="cancel_order">
                        </form>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</body>
<?php
// -------------------------- order cancel button------------------------------------------ 
if (isset($_POST['cancel'])) {
    $delete_id = $_POST['d_id'];

    $query = "select * from `tbl_order_details` where `order_id` = '$delete_id'";
        $result = mysqli_query($con , $query);

        while($row = mysqli_fetch_assoc($result)){
            $plus_quantity = $row['quantity'];
            $name = $row['product_name'];

            $query = "select * from `tbl_category_product` where `product_name` = '$name'";

            $result1 = mysqli_query($con , $query);

            $row1 = mysqli_fetch_assoc($result1);
            $original_quantity = $row1['quantity'];


            $update_quantity = $original_quantity + $plus_quantity;
            $update = "UPDATE `tbl_category_product` SET `quantity`='$update_quantity' WHERE `product_name` ='$name'";

            mysqli_query($con , $update);
            
        }

    $delete = "UPDATE `tbl_order` SET `place_order`='canceled' where `OID` = '$delete_id'";
    $delete1 = "delete from `tbl_order_details` where `order_id` = '$delete_id'";
    $delete2 = "delete from `tbl_payment` where `order_id` = '$delete_id'";
    if (mysqli_query($con, $delete)) {
        if (mysqli_query($con, $delete1)) {
            if(mysqli_query($con , $delete2)){
?>
            <script>
                Swal.fire(
                    'delete!',
                    'cancel order done',
                    'error'
                ).then(function() {
                    window.location.href = 'my_order.php';
                });
            </script>
<?php
            }
        }
        else{
            echo '<script>alert("Insert error: ' . mysqli_error($con) . '");</script>';
            exit();
        }
    }
}
?>

<?php
//-----------------------------------payment button---------------------------------------------

if (isset($_POST['pay_now'])) {
    $_SESSION['order_id'] = $_POST['payment'];
    echo '<script>location.href = "order_payment.php";</script>';
}
?>

<?php
//-----------------------------------print button---------------------------------------------

if (isset($_POST['print'])) {
    $_SESSION['order_id'] = $_POST['print_id'];
    echo '<script>location.href = "/smit/pdf/genrate_bill.php";</script>';
}
?>

</html>
<?php
}
else{
  echo '<script>location.href = "home.php";</script>';
}
?>