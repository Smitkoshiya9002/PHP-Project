<?php
session_start();
if (isset($_SESSION['admin'])) {
  $con = mysqli_connect("localhost", "root", "root", "optical");
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
            height: 110%;
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
            width: 100%;
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

        h1 {
            text-align: center;
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
                    <li class="active"><a href="admin_add_brand_category_product.php">Add product</a></li>
                    <li><a href="admin_update_product.php">update product</a></li>
                    <li><a href="admin-add-brand.php">Manage brand</a></li>
                    <li><a href="admin-add-category.php">Manage category</a></li>
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
                    <h1>Add Product</h1>
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Enter product prize" required>
                    </div>
                    <div class="form-group">
                        <label for="product_size">Product size</label>
                        <input type="text" class="form-control" id="product_size" name="product_size" placeholder="Enter product size" required>
                    </div>
                    <div class="form-group">
                        <label for="searchbrand">Brand</label><br>
                        <select name="searchbrand" id="searchbrand" class="form-control">
                            <option value="brand" disabled selected>Select Brand</option>
                            <?php
                            $brandfind = "SELECT DISTINCT brand_name FROM tbl_brand";
                            $brandresult = mysqli_query($con, $brandfind);
                            while ($row = mysqli_fetch_assoc($brandresult)) {
                                echo '<option value="' . $row['brand_name'] . '">' . $row['brand_name'] . '</option>';
                            }
                            ?>
                        </select>

                        <!-- <label for="product_description">Product brand</label>
                        <input type="text" class="form-control" id="product_company" name="product_company" placeholder="Enter product brand" required> -->
                    </div>

                    <div class="form-group">
                        <label for="searchbrand">Category</label><br>
                        <select name="searchcategory" id="searchcategory" class="form-control">
                            <option value="category" disabled>Select Category</option>
                            <?php
                            $brandfind = "SELECT DISTINCT category_name FROM tbl_category";
                            $brandresult = mysqli_query($con, $brandfind);
                            while ($row = mysqli_fetch_assoc($brandresult)) {
                                echo '<option value="' . $row['category_name'] . '">' . $row['category_name'] . '</option>';
                            }
                            ?>
                        </select>
                        <!-- <label for="product_photo">Product category</label>
                        <input type="text" class="form-control" id="product_category" name="product_category" placeholder="Enter category" required> -->
                    </div>
                    <div class="form-group">
                        <label for="product_glass">Product Glass</label>
                        <select name="product_glass" id="product_glass" class="form-control" require>
                        <option value="sunglasses" >sunglasses</option>
                        <option value="eyeglasses" >eyeglasses</option>
                        <option value="computerglasses" >computerglasses</option>
                        </select>
                        <!-- <input type="text" class="form-control" id="product_glass" name="product_glass" placeholder="Enter product glass" required> -->
                    </div>
                    <div class="form-group">
                        <label for="product_stock">Product stock</label>
                        <input type="text" class="form-control" id="product_stock" name="product_stock" placeholder="Enter product stock" required>
                    </div>
                    <div class="form-group">
                        <label for="product_stock">Product frame</label>
                        <input type="text" class="form-control" id="product_frame" name="product_frame" placeholder="Enter frame shape" required>
                    </div>
                    <div class="form-group">
                        <label for="product_photo">Product photo</label>
                        <input type="file" class="form-control" id="product_photo" name="p_img" accept=".jpg, .jpeg, .png" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="submit" class="form-control" name="submit" value="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="bootstrap.min.js"></script>
    <?php
    $con = mysqli_connect("localhost", "root", "root", "optical");
    if (isset($_POST['submit'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_size = $_POST['product_size'];
        $product_glass = $_POST['product_glass'];
        $product_frame = $_POST['product_frame'];
        $product_stock = $_POST['product_stock'];

        // Handle file upload
        $photo = $_FILES['p_img']['name'];
        $p_img_temp_name = $_FILES['p_img']['tmp_name'];
        $p_img_folder = 'uploads_img/' . $photo;

        if (isset($_POST['searchbrand'])) {
            $product_company = $_POST['searchbrand'];
        }

        if (isset($_POST['searchcategory'])) {
            $product_category = $_POST['searchcategory'];
        }

        $check = "select * from `tbl_category_product` where `product_name` = '$product_name'";
        $result = mysqli_query($con , $check);
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            echo "<script> alert('This product name is alerady available!') </script>";
            exit();
        } else {

            $insert = "INSERT INTO `tbl_category_product`(`product_name`, `prize`, `size`, `company`, `photo`, `glasses`,`frame`, `category`, `quantity`) VALUES
             ('$product_name','$product_price','$product_size','$product_company','$photo','$product_glass','$product_frame','$product_category','$product_stock')";

            if (mysqli_query($con, $insert)) {
                move_uploaded_file($p_img_temp_name, $p_img_folder);

                echo '<script>alert("Insert successfully");</script>';
            }
            else {
                echo '<script>alert("Insert error: ' . mysqli_error($con) . '");</script>';
            }
        }
    }
    ?>
</body>

</html>