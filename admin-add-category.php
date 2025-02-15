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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Admin Panel</title>
    <style>
        .admin-logo {
            width: 150px;
            margin-left: 80px;
            padding: 40px 40px;
        }

        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
            position: fixed;
            width: 22%;
            z-index: 1;
        }

        .col-sm-9 {
            margin: 0;
            margin-left: 25%;
            /* Create space for sidenav */
            width: 75%;
            /* Reduce width to fit alongside sidenav */
            padding: 0;
            justify-content: center;
            display: flex;
            position: relative;
        }

        #dash-details a {
            margin-top: 10px;
        }

        .form-group {
            /* width: 100%; */
            padding: 5px;
        }

        .form-group #submit {
            width: 30%;
            border-radius: 20px;
        }

        .form-group:hover input {
            background-color: gray;
            color: white;
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

        form {
            position: relative;
            background-color: lightgrey;
            width: 60%;
            border-radius: 20px;
            /* box-shadow: 0px 0px 0px 15px lightgrey; */
            box-shadow: 0 0 2px rgba(128, 128, 128, 10),
                0 0 20px rgba(128, 128, 128, 10),
                0 0 30px rgba(128, 128, 128, 10);
            margin-top: 10px;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin: 40px;
        }

        td,
        th {
            border-collapse: collapse;
            border: 1px solid black;
            padding: 10px;
        }

        table{
            justify-content: center;
            display: flex;
            margin: 40px;
        }

        .btn{
            justify-content: center;
            display: flex;
        }

        .container-fluid{
      background-color: rgb(205, 212, 215);
    }
    </style>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <img src="images/admin.png" alt="" class="admin-logo">
                <ul class="nav nav-pills nav-stacked" id="dash-details">
                    <li><a href="admin-panel.php">Dashboard</a></li>
                    <li><a href="admin-customerview.php">customer details</a></li>
                    <li><a href="admin_add_brand_category_product.php">Add product</a></li>
                    <li><a href="admin_update_product.php">update product</a></li>
                    <li><a href="admin-add-brand.php">Manage brand</a></li>
                    <li class="active"><a href="admin-add-category.php">Manage category</a></li>
                    <li><a href="admin-view-order.php">View Order</a></li>
                    <li><a href="admin-view-feedback.php">View Feedback</a></li>
                    <li><a href="admin-view-payment.php">View Payment</a></li>
                    <li><a href="admin-logout.php">logout</a></li>
                </ul>
                <br>
            </div>
            <br>
            <div class="col-sm-9">
                <form action="" method="post" enctype="multipart/form-data">
                    <?php
                    $con = mysqli_connect("localhost", "root", "root", "optical");

                    $category = "select * from `tbl_category`";
                    $result = mysqli_query($con, $category);
                    echo '<h2>Avaliable category</h2>';
                    echo '<table>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<td>' . $row['category_name'] . '</td>';
                    }
                    echo '</table>';
                    ?>
                    <h2>Update category</h2>
                    <div class="form-group">
                        <label for="add category">Category name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" required>
                    </div>
                    <div class="form-group btn">
                        <input type="submit" id="submit" class="form-control" name="Add" value="Add">
                    </div>
                    <div class="form-group btn">
                        <input type="submit" id="submit" class="form-control" name="Delete" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="bootstrap.min.js"></script>
    <?php
    $con = mysqli_connect("localhost", "root", "root", "optical");
    if (isset($_POST['Add'])) {
        $con = mysqli_connect("localhost", "root", "root", "optical");
        $category = $_POST['category_name'];
        $check = "select * from `tbl_category` where `category_name` = '$category'"; 
        $result = mysqli_query($con, $check);
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            echo "<script> alert('This category is alerady available!') </script>";
            exit();
        } else {
            $insert = "INSERT INTO `tbl_category`(`category_name`) values ('$category')";
            mysqli_query($con , $insert);
            echo "<script> alert('insert success!') </script>";
            echo '<script>location.href = "/smit/admin-add-category.php";</script>';
            exit();
        }
    }
    ?>

<?php
    $con = mysqli_connect("localhost", "root", "root", "optical");
    if (isset($_POST['Delete'])) {
        $con = mysqli_connect("localhost", "root", "root", "optical");
        $category = $_POST['category_name'];
        $check = "select * from `tbl_category` where `category_name` = '$category'"; 
        $result = mysqli_query($con, $check);
        $numrows = mysqli_num_rows($result);

        if ($numrows == 0) {
            echo "<script> alert('This category is not available!') </script>";
            exit();
        } else {
            $insert = "delete from `tbl_category` where `category_name` = '$category'";
            mysqli_query($con , $insert);
            echo "<script> alert('delete success!') </script>";
            echo '<script>location.href = "/smit/admin-add-category.php";</script>';
            exit();
        }
    }
    ?>
</body>

</html>