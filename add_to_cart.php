<?php
session_start();
$con = mysqli_connect("localhost", "root", "root", "optical");

?>

<?php

if (isset($_SESSION['username'])) {
    if (isset($_GET['product_id'])) {
        $productid = $_GET['product_id'];

        // $insert = "INSERT INTO `tbl_add_to_cart`(`product_id`) VALUES ('$productid')";

        $query = "select * from `tbl_add_to_cart` where `product_id` = '$productid'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 0) {
            $insert = "INSERT INTO `tbl_add_to_cart` (`product_name`,`product_prize`, `product_photo`, `product_company`, `product_size`,`product_category`,`product_id`)
            SELECT `product_name` , `prize` , `photo` , `company` , `size`, `category` , `product_id`
            FROM `tbl_category_product` where `product_id` = '$productid';";

            if (mysqli_query($con, $insert)) {

                $query = "select * from `tbl_add_to_cart` where `product_id` = '$productid'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);

                $customer_name = $_SESSION['username'];
                $insert = "update `tbl_add_to_cart` set `customer_name` = '$customer_name',`product_quantity`=1,`total_prize` = $row[product_prize] where `product_id` = '$productid';";
                mysqli_query($con, $insert);
                echo '<script>alert("insert data successfully");</script>';
                echo '<script>location.href = "add_to_cart.php";</script>';
            } else {
                echo '<script>alert("error to insert query");</script>';
            }
        } else {
            echo '<script>alert("this product is already avaliable in ypur cart");</script>';
            echo '<script>location.href = "add_to_cart.php";</script>';
        }
    }
} else {
    echo '<script>
    if(confirm("you want to login!") == true){
        location.href = "/smit/login.php";
    }
    else{
        location.href = "/smit/home.php";
    }
    ;</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add_to_cart</title>
    <style>
        /* ------------------------------------ Shopping - Cart (Section) --------------------------------------- */
        #shopping-cart {
            position: relative;
            width: 100%;
            height: auto;
            padding: 32px;
            justify-content: center;
            background-color: white;
            /* background-color: lightgrey; */
        }

        /* ------------- h1(shopping cart text) -------------- */
        #shopping-cart h1 {
            position: relative;
            font-weight: 600;
            font-size: 28px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* #shopping-cart .all-product{
            display: grid;
            grid-template-columns: repeat(auto-fit, -5rem);
            gap: 0.9rem;
            padding: 10px;
            justify-content: space-between;
            width: 95%;
            height: 75vh;
            position: absolute;
            background-color: red;
        } */
        /* ----------------------------- All cart items display here ------------------------- */
        .all-cart-item {
            width: 100%;
            height: auto;
            position: relative;
            display: flex;
            flex-direction: column;
            /* background-color: lightgrey; */
        }

        .all-cart-item .all-product {
            padding: 10px;
            justify-content: left;
            width: 65%;
            height: 40vh;
            position: relative;
            /* background-color: red; */
        }

        /* --------------------------- products card (items card) --------------------- */
        .all-product .products-card {
            border-radius: .5rem;
            box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.4);
            width: 100%;
            height: 90%;
            font-family: arial;
            padding: 17px;
            background-color: white;
            text-align: left;
            /* background-color: green; */
            position: relative;
            top: 5%;
        }

        /* ------------------- Product Image ---------------- */
        .products-card .image {
            position: relative;
            width: 35%;
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /* top: 10px; */
            padding: 10px;
        }

        /* ---------- product Quantity / Update-btn ---------- */
        .qty-btn {
            position: relative;
            top: 44px;
            color: #000;
            font-size: 15px;
        }

        .qtyy {
            position: relative;
            margin-left: 12%;
        }

        /* --------------- Qty -------------- */
        .products-card .qty {
            margin-top: 10px;
            border: 1px solid grey;
            padding: 3px 6px;
            font-size: 18px;
            color: #000;
            width: 6.5rem;
            height: 3.3rem;
            border-radius: 3px;
        }

        /* ----------- product Update-btn ----------- */
        .products-card .btn.btn-warning {
            position: relative;
            /* padding: 4px 10px; */
            cursor: pointer;
            font-size: 14px;
            letter-spacing: 0.7px;
            top: -2px;
            background-color: #189A18;
        }

        /* --------------------- For product Details ---------------- */
        .product-details {
            display: block;
            position: relative;
            padding: 10px;
            width: 70%;
            top: -260px;
            left: 30%;
            /* background-color: yellow; */
        }

        /* ---------- product Brand and category (h2) -------- */
        .product-details h2 {
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 600;
            color: grey;
            position: relative;
            margin-left: 12%;
        }

        .product-details h5 {
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 600;
            color: black;
            position: relative;
            margin-left: 12%;
        }


        /* ----------- For product Description --------- */
        .product-details .description {
            font-size: 14px;
            letter-spacing: 0.4px;
            position: relative;
            margin-left: 12%;
        }

        /* -------- new price -------- */
        .product-details .price {
            color: #000;
            font-size: 17px;
            font-weight: 600;
            position: relative;
            margin-left: 12%;
        }

        /* -------- Old price -------- */
        .line {
            position: relative;
            color: black;
            /* left: 1%; */
            font-size: 14px;
            font-weight: 500;
            text-decoration: line-through;
        }

        /* --------- Size --------- */
        .product-details .size {
            font-size: 14px;
            color: #000;
            letter-spacing: 0.5px;
            position: relative;
            margin-left: 12%;
        }

        /* ------------- Remove - Button ------------ */
        .product-details .btn.btn-danger {
            position: absolute;
            width: 92px;
            font-size: 14px;
            font-weight: 600;
            bottom: 20px;
            right: 1px;
        }

        .btn.btn-danger:hover {
            background-color: red;
            color: #fff;
        }

        /* ----------- h4 (free delivery) ----------- */
        .product-details h4 {
            position: absolute;
            color: #189A18;
            font-size: 16px;
            top: 18px;
            opacity: 0.9;
            right: 1px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 600;
            text-align: right;
        }


        /* -------------------------------------------- price-detail ------------------------------------ */
        .price-detail {
            border-radius: .5rem;
            box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.08);
            border: 1.4px solid lightgrey;
            width: 435px;
            height: 70%;
            font-family: Arial;
            padding: 15px;
            background-color: white;
            justify-content: space-between;
            letter-spacing: 0.4px;
            position: fixed;
            margin-top: 9px;
            right: 20px;
            padding-top: 50px;
        }

        /* --------------------- price details text(h3) ---------------- */
        .price-detail h3 {
            display: block;
            position: relative;
            width: 100%;
            font-weight: 600;
            font-size: 16px;
            color: #000;
            padding: 11px;
            border-bottom: 1px solid lightgrey;
            text-transform: uppercase;
            top: -26px;
            /* background-color: lightblue; */
        }

        /* ---------------- P tag for price / discount & All ------------- */
        .price-detail p {
            display: flex;
            position: relative;
            font-size: 15.5px;
            line-height: 12px;
            color: #000;
            padding: 11px;
            justify-content: space-between;
        }

        .price-detail .discount-txt {
            color: #189A18;
        }

        /* --------------------- Total Payable amount -------------------- */
        .price-detail .total-amt {
            position: relative;
            font-size: 17.9px;
            font-weight: 600;
        }

        /* ------------------- Save-text ------------------------*/
        .price-detail .save-text {
            position: relative;
            color: #189A18;
            font-weight: 600;
            font-size: 16px;
            top: -14px;
        }

        /* ------------------------place order button----------------------------------- */

        .place_order {
            padding: 5px 15px 5px 15px;
            border: 2px solid black;
            position: relative;
            left: 35%;
            top: 5%;
            text-transform: uppercase;
            border-radius: 5px;
            font-size: 13px;
            font-family: optima;
            font-weight: 600;
            /* right: 50%; */
        }

        .place_order:hover {
            background-color: rgb(47, 46, 44);
            transition: all ease 0.5s;
            color: white;
        }

        .notfound {
            text-align: center;
            text-transform: uppercase;
            font-family: optima;
            position: relative;
            /* top: 50px; */
            color: red;
        }
    </style>
</head>

<body>

    <section id="header">
        <?php
        include 'header.php';
        ?>
    </section>

    <!-- <section id="cart_product">
        <div class="container">
            <form action="" method="post">
                <?php
                $con = mysqli_connect("localhost", "root", "", "optical");
                $customer_name = $_SESSION['username'];

                $select = "select * from `tbl_add_to_cart` where `customer_name` = '$customer_name'";
                $result = mysqli_query($con, $select);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <td><?php echo '<img class="img" src="uploads_img/' . $row['product_photo'] . ' "alt="">'; ?></td>
                    <td>
                        <span class="product_name"><?php echo $row['product_name'] ?></span>
                        <span class="product_size"><?php echo $row['product_size'] ?></span>
                    </td>
                <?php
                }

                ?>
            </form>
        </div>

    </section> -->

    <section id="shopping-cart">
        <h1><i class="glyphicon glyphicon-shopping-cart"></i> Shopping Cart</h1>

        <div class="all-cart-item">
            <?php
            $select = "select * from tbl_add_to_cart";
            $result = mysqli_query($con, $select);

            if (mysqli_num_rows($result) == 0) {
                echo '<h2 class="notfound">Cart is Empty!</h2>';
            }
            $select_cart = mysqli_query($con, "select * from `tbl_add_to_cart` where `customer_name`='$customer_name'");


            $total = 0.0;
            $grand_total = 0.0;
            $total_discount = 0.0;

            while ($row = mysqli_fetch_assoc($select_cart)) {
                $product_name = $row['product_name']; // Assuming this is how you identify the product
                $get_product_quantity_query = mysqli_query($con, "SELECT `quantity` FROM `tbl_category_product` WHERE `product_name`='$product_name'");
                $quantity_row = mysqli_fetch_assoc($get_product_quantity_query);
                $max_quantity = $quantity_row['quantity'];
                if ($max_quantity <= 0) {
                    $query = "delete from `tbl_add_to_cart` where `product_name` = '$row[product_name]'";
                    if (mysqli_query($con, $query)) {
                        echo "<script>alert('Remove from cart out of stock item $row[product_name]');</script>";
                        echo "<script> location.href = 'add_to_cart.php'; </script>";
                    }
                }

            ?>
                <div class="all-product">
                    <div class="products-card">
                        <img src="uploads_img/<?php echo $row['product_photo']; ?>" alt="" class="image">

                        <form action="" method="post" class="qty-btn">
                            <div class="product-details">
                                <h2><?php echo $row['product_name']; ?></h2>
                                <h5><?php echo $row['product_company']; ?> - <?php echo $row['product_category']; ?></h5>
                                <p class="price"><span class="line">₹<?php echo $old_price = ($row['product_prize'] * $row['product_quantity']) + 200; ?></span>&nbsp;&nbsp;₹<?php echo $new_price =  $row['product_prize'] * $row['product_quantity']; ?> </p>
                                <h5 class="size"> Size : <?php echo $row['product_size']; ?></h5>
                                <input type="hidden" name="update_qty_id" value="<?php echo $row['cart_id']; ?>">
                                <span class="qtyy">QTY : </span><input type="number" class="qty" name="update_quantity" min="1" max="<?php echo $max_quantity ?>" value="<?php echo $row['product_quantity']; ?>">
                                <input type="submit" class="btn btn-warning" value="Update" name="update_btn">

                                <h4>| Free Delivery</h4>
                                <input type="hidden" name="delete"><a href="add_to_cart.php?remove=<?php echo $row['cart_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Remove</a>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="price-detail">
                    <h3>Price Details</h3>
                    <!----------------------------------------- Total ----------------------------------------->
                    <!-- <p><?php echo $sub_total = $old_price; ?></p> -->
                    <p>Price : <span>₹<?php echo $total += $sub_total; ?></span></p>

                    <!---------------------------------------- Discount --------------------------------------->
                    <!-- <p><?php echo $discount_amt = ($row['product_prize'] + 200 - $row['product_prize']) * $row['product_quantity']; ?></p> -->
                    <p>Discount : <span class="discount-txt">- ₹<?php echo $total_discount += $discount_amt ?></span></p>

                    <!------------------------------------- Delivery Charges ---------------------------------------->
                    <p>Delivery Charges * <span class="discount-txt">Free</span></p>
                    <hr style="border-bottom: 1px solid lightgrey;">

                    <!----------------------------------- Total payable Amount --------------------------------->
                    <?php $total_amt = $new_price; ?>
                    <p class="total-amt">Total Amount : <span>₹<?php echo  $grand_total += $total_amt ?>/-</span></p>
                    <hr style="border-bottom: 1px solid lightgrey;">

                    <!------------------------------- Some text After Price details ---------------------------->
                    <p class="save-text">You will save ₹<?php echo $total_discount; ?> on this order</p>
                    <form action="" method="post">
                        <input type="submit" name="place_order" value="place order" class="place_order">
                    </form>
                </div>

            <?php
            };
            ?>
        </div>
        <!-------------------------------------- Upadte Quantity --------------------------------->
        <?php
        if (isset($_POST['update_btn'])) {
            $update_id = $_POST['update_qty_id'];
            $update_value = $_POST['update_quantity'];

            $query = "select * from `tbl_add_to_cart` where `cart_id` = '$update_id'";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $update_qty_query = mysqli_query($con, "update `tbl_add_to_cart` set `product_quantity` = '$update_value', `total_prize` = ('$row[product_prize]' * '$update_value') where `cart_id` = '$update_id'");

                if ($update_qty_query) {
                    echo "<script> location.href = 'add_to_cart.php'; x</script>";
                    exit();
                } else {
                    echo '<script>alert("error in update query");</script>';
                };
            }
        };
        ?>
        <!-------------------------------------- Remove Items --------------------------------->
        <?php
        if (isset($_GET['remove'])) {


            $remove_id = $_GET['remove'];
            $remove_query = mysqli_query($con, "delete from `tbl_add_to_cart` where `cart_id` = '$remove_id'");

            if ($remove_query) {
                echo '<script> alert("Remove item from cart!") </script>';
                echo "<script> location.href = 'add_to_cart.php'; </script>";
            }
        }
        ?>
        <!-- ----------------------------------place order-------------------------------------------- -->

        <?php
        if (isset($_POST['place_order'])) {
            echo '<script>location.href = "order_address.php";</script>';
        }
        ?>
    </section>

</body>

</html>