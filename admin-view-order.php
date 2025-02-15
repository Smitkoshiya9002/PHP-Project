<?php
session_start();
if (isset($_SESSION['admin'])) {
  $con = mysqli_connect("localhost", "root", "root", "optical");
  error_reporting(E_ALL);
} else {
  echo '<script>location.href = "login.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        .row.content {
            height: 550px
        }

        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
            position: fixed;
            width: 22%;
            z-index: 1;
        }

        .col-sm-9 {
            margin-left: 22%;
        }

        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
        }

        .admin-logo {
            width: 150px;
            margin-left: 80px;
            padding: 40px 40px;
        }

        #dash-details a {
            margin-top: 10px;
        }

        #dash-details a:hover {
            background-color: black;
            color: white;
        }

        .row.content {
            height: 100vh;
        }

        #dash-details {
            text-transform: uppercase;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 14px;
            font-weight: 700px;
        }

        /* .container-fluid {
            background-color: rgb(205, 212, 215);
        } */

        .format {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.9), inset 0 0 10px rgba(255, 255, 255, 0.9);
        }

        .order1 {
            width: 100%;
            /* background-color: red; */
        }

        .orderdetails {
            width: 100%;
        }

        .orderdetails th {
            background-color: rgb(218, 230, 236);
        }

        table,
        tr,
        td,
        th {
            border-collapse: collapse;
            border: 2px solid black;
        }

        td,
        th {
            padding: 10px;
            text-align: center;
            padding: 20px 0px 20px 0px;
        }

        th {
            background-color: rgb(165, 199, 214);
        }

        img {
            width: 100px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <img src="images/admin.png" alt="" class="admin-logo">
                <ul class="nav nav-pills nav-stacked" id="dash-details">
                    <li><a href="admin-panel.php">Dashboard</a></li>
                    <li><a href="admin-customerview.php">customer details</a></li>
                    <li><a href="admin_add_brand_category_product.php">add product</a></li>
                    <li><a href="admin_update_product.php">update product</a></li>
                    <li><a href="admin-add-brand.php">Manage brand</a></li>
                    <li><a href="admin-add-category.php">Manage category</a></li>
                    <li class="active"><a href="admin-view-order.php">View Order</a></li>
                    <li><a href="admin-view-feedback.php">View Feedback</a></li>
                    <li><a href="admin-view-payment.php">View Payment</a></li>
                    <li><a href="admin-logout.php">logout</a></li>
                </ul><br>
            </div>
            <br>
            <div class="col-sm-9">
                <?php
                $con = mysqli_connect("localhost", "root", "root", "optical");
                $query = "SELECT * FROM `tbl_order`";
                $result = mysqli_query($con, $query);

                echo '<form class="box" method="post">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="format">';
                    echo '<table class="order1">';
                    echo '<tr>';
                    echo '<th>Order id</th>';
                    echo '<th>Customer name</th>';
                    echo '<th>Email</th>';
                    echo '<th>Mobile no</th>';
                    echo '<th>Amount</th>';
                    echo '<th>Order_date</th>';
                    echo '<th>Status</th>';
                    echo '<th>Place_order</th>';
                    echo '<th>Address</th>';
                    echo '<th>Action</th>';
                    echo '<th>Action</th>';
                    echo '</tr>';
                    echo "<tr>";
                    echo "<td>" . $row['OID'] . "</td>";
                    echo "<td>" . $row['cust_name'] . "</td>";
                    echo "<td>" . $row['cust_email'] . "</td>";
                    echo "<td>" . $row['cust_mobile'] . "</td>";
                    echo "<td>" . $row['amount'] . "</td>";
                    echo "<td>" . $row['order_date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['place_order'] . "</td>";
                    echo "<td>" . $row['order_address'] . "</td>";
                    echo '<td>
                    <form method="post">
                        <input type="hidden" name="print_name" value="' . $row['OID'] . '">
                        <input type="submit" value="Print" name="Print">
                    </form>
                    </td>';
                    echo '<td>
                    <form method="post">
                        <input type="hidden" name="delete_name" value="' . $row['OID'] . '">
                        <input type="submit" value="Delete" name="Delete">
                    </form>
                        </td>';
                    echo "</tr>";
                    echo "</table>";

                    $query = "select * from `tbl_order_details` where `order_id` = '$row[OID]'";
                    $result1 = mysqli_query($con, $query);
                    echo '<table class="orderdetails">';
                    echo '<tr>';
                    echo '<th>image</th>';
                    echo '<th>name</th>';
                    echo '<th>company</th>';
                    echo '<th>Quantity</th>';
                    echo '<th>size</th>';
                    echo '<th>price</th>';
                    echo '</tr>';

                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        echo '<tr>';
                        echo '<td><img class="img" src="uploads_img/' . $row1['photo'] . '" alt=""></td>';
                        echo '<td>' . $row1['product_name'] . '</td>';
                        echo '<td>' . $row1['company'] . '</td>';
                        echo '<td>' . $row1['quantity'] . '</td>';
                        echo '<td>' . $row1['size'] . '</td>';
                        echo '<td>' . $row1['price'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '</div>';
                    echo '<br><br>';
                }
                echo '</form>';
                ?>
            </div>
        </div>
    </div>

</body>
<?php
if (isset($_POST['Delete'])) {
    $con = mysqli_connect("localhost", "root", "root", "optical");

    $name_to_delete = $_POST['delete_name'];
    echo '<script>alert("delete success , " $name_to_delete);</script>';

    $sql = "DELETE FROM `tbl_order` WHERE `OID` = '$name_to_delete'";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("delete success");</script>';
        echo '<script>location.href = "admin-view-order.php";</script>';
    } else {
        echo '<script>alert("error");</script>';
    }
}
?>

<?php
if (isset($_POST['Print'])) {
    $name_to_delete = $_POST['print_name'];
    $_SESSION['order_id'] = $name_to_delete;
    echo '<script>location.href = "/smit/pdf/genrate_bill.php"</script>';
    $select = "select * from tbl_order where `order_id` = $name_to_delete";
    $result = mysqli_query($con, $select);

    $row = mysqli_fetch_assoc($result);

    $place_order = $row['place_order'];

    if ($place_order == 'placed') {

        if (mysqli_query($con, $sql)) {
            echo '<script>alert("delete success");</script>';
            echo '<script>location.href = "admin-view-order.php";</script>';
        } else {
            echo '<script>alert("error");</script>';
        }
    }
    else{
        echo '<script>alert("Print not avaliable!");</script>';
    }
}
?>

</html>