<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body>

</body>

</html>
<?php
session_start();
$method = $_SESSION['payment_method'];
$con = mysqli_connect("localhost", "root", "root", "optical");
$order_id = $_SESSION['order_id'];

$update = "UPDATE `tbl_order` SET `status`='complete' WHERE `OID` = '$order_id'";

mysqli_query($con, $update);

$update = "select * from `tbl_order` WHERE `OID` = '$order_id'";

$result = mysqli_query($con, $update);

if ($row = mysqli_fetch_assoc($result)) {

    $name = $row['cust_name'];
    $email = $row['cust_email'];
    $contactno = $row['cust_mobile'];
    $amount = $row['amount'];

    if ($method == 'COD') {
        $payment = "INSERT INTO `tbl_payment`(`cust_name`, `cust_email`, `cust_contact`, `p_status`, `p_method`, `amount`,`order_id`) VALUES ('$name','$email','$contactno','incomplete','$method','$amount','$order_id')";
    } else {
        $payment = "INSERT INTO `tbl_payment`(`cust_name`, `cust_email`, `cust_contact`, `p_status`, `p_method`, `amount`,`order_id`) VALUES ('$name','$email','$contactno','complete','$method','$amount' ,'$order_id')";
    }
} else {
    echo '<script>alert("error in fetch data");</script>';
}

if (mysqli_query($con, $payment)) { ?>
    <script>
        Swal.fire(
            'success!',
            'payment successfully',
            'success'
        ).then(function() {
                    window.location.href = 'my_order.php';
                });
    </script>
<?php
    exit();
} else {
    echo '<script>alert("payment failed");</script>';
}
?>