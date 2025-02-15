<?php
session_start();
if (isset($_SESSION['admin'])) {
  $con = mysqli_connect("localhost", "root", "", "optical");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .row.content {
            height: 550px
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
            margin-left: 23%;
            margin-top: 1%;
            /* width: 76%; */
            /* background-color: red; */
            padding: 0;
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

        td,
        th {
            padding: 10px 0px 10px 0px;
            /* padding: 10px; */
        }

        th {
            border-collapse: collapse;
            border: 2px solid black;
            text-align: center;
            padding: 10px;
        }

        td {
            border-collapse: collapse;
            border: 2px solid black;

        }


        th {
            text-transform: uppercase;
        }

        .usid {
            border: none;
            width: 99%;
            padding: 10px;
            text-align: center;
        }

        .btnproductform {
            margin: 5px;
            padding: 5px;
            margin-left: 10%;
        }

        table {
            width: 150%;
            border-radius: 5px;
        }

        /* .imgclass {
            padding: 0;
            margin: 0;
            width: 10%;
            height: 15vh;
        }*/

        .image-container {
            position: relative;
            /* display: inline-block; */
            cursor: pointer;
            /* height: 40%; */
            width: 100%;
            padding: 10px;
            /* height: 20vh; */
        }

        .img {
            height: 10vh;
        }

        .image-label {
            display: block;
            width: 50%;
            height: 100%;
            text-align: center;
            /* background-color: #f0f0f0; */
            border-radius: 5px;
        }

        .image-label img {
            width: 150%;
            /* Make the image cover the label */
        }

        .photo-input {
            display: none;
            /* Hide the file input */
        }

        .product_heading {
            width: 10%;
        }

        .drop-down {
            background-color: white;
            text-align: center;
            padding: 50px;
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
                    <li><a href="admin_add_brand_category_product.php">Add product</a></li>
                    <li class="active"><a href="admin_add_brand_category_product.php">update product</a></li>
                    <li><a href="admin-add-brand.php">Manage brand</a></li>
                    <li><a href="admin-add-category.php">Manage category</a></li>
                    <li><a href="admin-view-order.php">View Order</a></li>
                    <li><a href="admin-view-feedback.php">View Feedback</a></li>
                    <li><a href="admin-view-payment.php">View Payment</a></li>
                    <li><a href="admin-logout.php">logout</a></li>
                </ul><br>
            </div>

            <div class="col-sm-9">
                <?php
                $con = mysqli_connect("localhost", "root", "", "optical");
                ?>

                <form action="" method="post">
                    <label for="searchbrand">Brand :</label>
                    <select name="searchbrand" id="searchbrand">
                        <option value="brand" disabled selected>All Brand</option>
                        <?php
                        $brandfind = "SELECT DISTINCT brand_name FROM tbl_brand";
                        $brandresult = mysqli_query($con, $brandfind);
                        while ($row = mysqli_fetch_assoc($brandresult)) {
                            echo '<option value="' . $row['brand_name'] . '">' . $row['brand_name'] . '</option>';
                        }
                        ?>
                    </select>

                    <label for="searchType">Category :</label>
                    <select name="searchcategory" id="searchcategory">
                        <option value="brand" disabled selected>All Category</option>
                        <?php
                        $categoryfind = "SELECT DISTINCT category_name FROM tbl_category";
                        $categoryresult = mysqli_query($con, $categoryfind);
                        while ($row = mysqli_fetch_assoc($categoryresult)) {
                            echo '<option value="' . $row['category_name'] . '">' . $row['category_name'] . '</option>';
                        }
                        ?>
                    </select>

                    <input type="submit" name="Find" value="Find">
                </form>

                <?php

                if (isset($_POST['Find'])) {
                    if (isset($_POST['searchbrand'])) {
                        $brand = $_POST['searchbrand'];
                    } else {
                        $brand = "";
                    }


                    if (isset($_POST['searchcategory'])) {
                        $category = $_POST['searchcategory'];
                    } else {
                        $category = "";
                    }


                    $query = "SELECT * FROM tbl_category_product WHERE 1";

                    if (!empty($brand) && !empty($category)) {
                        $query = "SELECT * FROM tbl_category_product WHERE company = '$brand' AND category = '$category'";
                    }
                    if (empty($brand) && empty($category)) {
                        $query = "SELECT * FROM tbl_category_product WHERE 1";
                    } elseif (!empty($brand)) {
                        $query .= " AND company = '$brand'";
                    } elseif (!empty($category)) {
                        $query .= " AND category = '$category'";
                    }

                    // $query = "SELECT * FROM tbl_category_product";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) == 0) {
                        echo '<h2>Product not found</h2>';
                    } else {

                        echo '<table>';
                        echo '<tr>';
                        echo '<th class="product_heading">photo</th>';
                        echo '<th>product_name</th>';
                        echo '<th>prize</th>';
                        echo '<th>size</th>';
                        echo '<th>brand</th>';
                        echo '<th>category</th>';
                        echo '<th>Frame</th>';
                        echo '<th>Glasses</th>';
                        echo '<th>stock</th>';
                        echo '<th>delete</th>';
                        echo '<th>update</th>';
                        echo '</tr>';
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<form class="box" method="post" id="productform" enctype="multipart/form-data">';

                            echo "<tr>";
                            echo '<td>';
                            echo '<div class="image-container">';
                            echo '<label for="photo_' . $row['product_name'] . '" class="image-label">';
                            echo '<img class="img" src="uploads_img/' . $row['photo'] . '" alt="">';
                            echo '</label>';
                            echo '<input type="file" name="new_photo" accept="image/png, image/jpeg, image/jpg">';
                            echo '</div>';
                            echo '</td>';
                            echo '<td><input type="text" name="new_product_name" class="usid" value="' . $row['product_name'] . '"></td>';
                            echo '<td><input type="text" name="new_prize" class="usid" value="' . $row['prize'] . '"></td>';
                            echo '<td><input type="text" name="new_size" class="usid" value="' . $row['size'] . '"></td>';
                            // echo '<td><input type="text" name="new_company" class="usid" value="' . $row['company'] . '"></td>';
                            // echo '<td><input type="text" name="new_category" class="usid" value="' . $row['category'] . '"></td>';
                ?>
                            <td>
                                <select name="new_company" id="searchbrand" class="usid drop-down">
                                    <option value="<?php echo $row['company'] ?>"><?php echo $row['company'] ?></option>
                                    <?php
                                    $con = mysqli_connect("localhost", "root", "", "optical");
                                    $brandfind = "SELECT DISTINCT brand_name FROM tbl_brand";
                                    $brandresult = mysqli_query($con, $brandfind);
                                    while ($rowbrand = mysqli_fetch_assoc($brandresult)) {
                                        echo '<option value="' . $rowbrand['brand_name'] . '">' . $rowbrand['brand_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="new_category" id="searchcategory" class="usid drop-down">
                                    <option value="<?php echo $row['category'] ?> "><?php echo $row['category'] ?></option>
                                    <?php
                                    $con = mysqli_connect("localhost", "root", "", "optical");
                                    $brandfind = "SELECT DISTINCT category_name FROM tbl_category";
                                    $brandresult = mysqli_query($con, $brandfind);
                                    while ($rowcategory = mysqli_fetch_assoc($brandresult)) {
                                        echo '<option value="' . $rowcategory['category_name'] . '">' . $rowcategory['category_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="new_frame" id="product_frame" class="usid drop-down" require>
                                    <option value="<?php echo $row['frame'] ?>"><?php echo $row['frame'] ?></option>
                                    <option value="Square">Square</option>
                                    <option value="Circle">Circle</option>
                                    <option value="Aviator">Aviator</option>
                                    <option value="Oval">Oval</option>
                                </select>
                            </td>
                            <td>
                                <select name="new_glass" id="product_glass" class="usid drop-down" value="<?php echo $row['glasses'] ?>" require>
                                    <option value="<?php echo $row['glasses'] ?>"><?php echo $row['glasses'] ?></option>
                                    <option value="sunglasses">sunglasses</option>
                                    <option value="eyeglasses">eyeglasses</option>
                                    <option value="computerglasses">computerglasses</option>
                                </select>
                            </td>
                            <!-- // echo '<td><input type="text" name="new_frame" class="usid" value="' . $row['frame'] . '"></td>';
                            // echo '<td><input type="text" name="new_glass" class="usid" value="' . $row['glasses'] . '"></td>'; -->
                <?php
                            echo '<td><input type="number" name="new_quantity" class="usid" value="' . $row['quantity'] . '"></td>';
                            // echo '<td><button type="button" class="btnproductform" onclick="deleteRecord(this, \'' . $row['product_name'] . '\')">Delete</button></td>';
                            echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                            echo '<td><input type="submit" class="btnproductform" name="delete_product" value="Delete"></td>';
                            echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                            echo '<td><input type="submit" class="btnproductform" name="update_product" value="Update"></td>';
                            echo '</tr>';
                            echo '</form>';
                        }
                        echo '</table>';
                    }
                }
                ?>


                <?php
                if (isset($_POST['delete_product'])) {
                    $product_name = $_POST['product_name'];

                    // Perform the SQL DELETE operation here
                    $query = "DELETE FROM tbl_category_product WHERE product_name = '$product_name'";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        echo "success";
                    } else {
                        echo "error";
                    }
                }
                ?>


                <?php
                if (isset($_POST['update_product'])) {
                    $new_product_name = $_POST['new_product_name'];
                    $new_prize = $_POST['new_prize'];
                    $new_size = $_POST['new_size'];
                    $new_company = $_POST['new_company'];
                    $new_category = $_POST['new_category'];
                    $new_frame = $_POST['new_frame'];
                    $new_glass = $_POST['new_glass'];
                    $new_quantity = $_POST['new_quantity'];

                    // Handle the product photo update
                    if (!empty($_FILES['new_photo']['name'])) {
                        $new_photo_name = $_FILES['new_photo']['name'];
                        $new_photo_temp_name = $_FILES['new_photo']['tmp_name'];
                        $new_photo_folder = 'uploads_img/' . $new_photo_name;
                        move_uploaded_file($new_photo_temp_name, $new_photo_folder);

                        // Update the photo in the database
                        $updateQuery = "UPDATE tbl_category_product SET 
                            product_name = '$new_product_name',
                            prize = '$new_prize',
                            size = '$new_size',
                            company = '$new_company',
                            category = '$new_category',
                            frame = '$new_frame',
                            glasses = '$new_glass',
                            quantity = '$new_quantity',
                            photo = '$new_photo_name'
                            WHERE product_name = '$new_product_name'";
                    } else {
                        // Update the product details without changing the photo
                        $updateQuery = "UPDATE tbl_category_product SET 
                            product_name = '$new_product_name',
                            prize = '$new_prize',
                            size = '$new_size',
                            company = '$new_company',
                            category = '$new_category',
                            frame = '$new_frame',
                            glasses = '$new_glass',
                            quantity = '$new_quantity'
                            WHERE product_name = '$new_product_name'";
                    }

                    $result = mysqli_query($con, $updateQuery);

                    if ($result) {
                        echo "Product updated successfully.";
                    } else {
                        echo "Error updating product.";
                    }
                }

                ?>
            </div>
        </div>
    </div>

</body>

</html>