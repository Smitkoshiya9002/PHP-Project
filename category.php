<?php
session_start();
$con = mysqli_connect("localhost", "root", "root", "optical");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>category</title>
    <style>
        body {
            width: 100%;
            height: 100vh;
            margin: 0;
        }

        /*-------------------------- men product csss------------------------------------- */

        #menproduct {
            width: 100%;
            height: 90vh;
            margin: 0;
            padding: 0;
        }

        #menproduct .mens {
            position: relative;
            font-size: 70px;
            font-family: optima;
            top: 5%;
            color: white;
        }

        #menproduct img {
            width: 100%;
            height: 100%;
            text-align: center;
        }

        #menproduct .container {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.5) 100%), url("/smit/images/menpage3.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 20px;
            /* Add padding for spacing */
            /* position: relative; */
            width: 100%;
            height: 90vh;
            text-align: center;
            text-transform: uppercase;
        }

        /*-------------------------- women product csss------------------------------------- */

        #womenproduct {
            width: 100%;
            height: 90vh;
            margin: 0;
            padding: 0;
        }

        #womenproduct .womens {
            position: relative;
            font-size: 70px;
            font-family: optima;
            top: 75%;
            color: white;
        }

        #womenproduct .container {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 1) 100%), url("/smit/images/womenpage1.jpg");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 90vh;
            text-align: center;
            text-transform: uppercase;
        }

        /*-------------------------- kids product csss------------------------------------- */

        #kidsproduct {
            width: 100%;
            height: 90vh;
            margin: 0;
            padding: 0;
        }

        #kidsproduct .kids {
            position: relative;
            font-size: 80px;
            font-family: optima;
            top: 30%;
            left: 5%;
            color: white;
        }

        #kidsproduct .container {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.8) 100%), url("/smit/images/kidspage1.jpg");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 90vh;
        }

        /* ----------------------------------------best title------------------------------ */
        #product {
            width: 100%;
        }

        #product .container {
            width: 100%;
            background-color: green;
        }

        #product .producttitle p {
            text-align: center;
            text-transform: uppercase;
            font-family: optima;
            font-size: 50px;
            padding: 40px;
        }

        /* --------------product css---------------------- */
        .product {
            position: relative;
            text-align: center;
            width: 100%;
            display: flex;
            margin-top: 5%;
            justify-content: space-evenly;
            /* background-color: red; */
        }

        .el-wrapper {
            /* width: 360px; */
            width: 24%;
            padding: 15px;
            position: relative;
            display: inline-block;
        }

        .el-wrapper:hover {
            box-shadow: 0 0 1px rgba(128, 128, 128, 0.2),
                0 0 10px rgba(128, 128, 128, 0.2),
                0 0 20px rgba(128, 128, 128, 0.2);
        }

        .el-wrapper:hover .h-bg {
            left: 0px;
        }

        .el-wrapper:hover .price {
            left: 20px;
            color: #818181;
        }

        .el-wrapper:hover .add-to-cart {
            left: 50%;
        }

        .el-wrapper:hover .img {
            filter: blur(7px);
            filter: progid:DXImageTransform.Microsoft.Blur(pixelradius='7', shadowopacity='0.0');
            opacity: 0.4;
        }

        .el-wrapper:hover .info-inner {
            bottom: 155px;
        }

        .el-wrapper:hover .a-size {
            -webkit-transition-delay: 300ms;
            -o-transition-delay: 300ms;
            transition-delay: 300ms;
            bottom: 50px;
            opacity: 1;
        }

        .el-wrapper:hover .a-frame {
            -webkit-transition-delay: 300ms;
            -o-transition-delay: 300ms;
            transition-delay: 300ms;
            bottom: 25px;
            opacity: 1;
        }

        .el-wrapper .box-down {
            width: 100%;
            height: 60px;
            position: relative;
            overflow: hidden;
        }

        .el-wrapper .box-up {
            width: 100%;
            height: 300px;
            position: relative;
            /* overflow: hidden; */
            text-align: center;
            justify-content: center;
        }

        .el-wrapper .img {
            position: relative;
            top: 30%;
            width: 60%;
            -webkit-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            /* background: red; */
            /* ease-out */
        }

        .no_stock {
            filter: blur(0px);
            filter: progid:DXImageTransform.Microsoft.Blur(pixelradius='1', shadowopacity='0.9');
            opacity: 0.5;
        }

        .out_stock{
            opacity: 1;  
            font-weight: 700;
            font-size: 18px;    
        }

        /* blue panel  */
        .h-bg {
            -webkit-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 800ms cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            width: 660px;
            height: 100%;
            background-color: #3f96cd;
            position: absolute;
            left: -659px;
        }

        /* add to cart layout coor */
        .h-bg .h-bg-inner {
            width: 54%;
            height: 100%;
            background-color: #464646;
        }

        /* smooth uper letter on card */
        .info-inner {
            -webkit-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            position: absolute;
            width: 100%;
            bottom: 25px;
        }

        /* for contain on card */
        .info-inner .p-name,
        .info-inner .p-company {
            display: block;
        }

        .info-inner .p-name {
            font-family: Cinzel;
            font-size: 18px;
            color: #252525;
            text-transform: uppercase;
        }

        /* product comapny name */

        .info-inner .p-company {
            font-family: 'Lato', sans-serif;
            font-size: 12px;
            text-transform: uppercase;
            color: #8c8c8c;
        }

        .a-size {
            position: absolute;
            width: 100%;
            bottom: -20px;
            font-family: 'PT Sans', sans-serif;
            color: #828282;
            opacity: 0;
        }

        .a-frame {
            position: absolute;
            width: 100%;
            bottom: -35px;
            font-family: 'PT Sans', sans-serif;
            color: #828282;
            opacity: 0;

        }

        .a-frame .frame {
            color: black;
        }

        .a-size .size {
            color: #252525;
        }

        .cart {
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            font-family: 'Lato', sans-serif;
            font-weight: 700;
        }

        /* --------------------------price css-------------------- */
        .cart .price {
            -webkit-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-delay: 100ms;
            -o-transition-delay: 100ms;
            transition-delay: 100ms;
            display: block;
            position: absolute;
            top: 30%;
            left: 45%;
            font-size: 16px;
            color: #252525;
        }

        .cart .add-to-cart {
            -webkit-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 600ms cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            /* ease-out */
            -webkit-transition-delay: 100ms;
            -o-transition-delay: 100ms;
            transition-delay: 100ms;
            display: block;
            position: absolute;
            top: 30%;
            left: 110%;
            font-size: 16px;
            color: #252525;
        }

        .cart .add-to-cart .txt {
            font-size: 12px;
            color: #fff;
            letter-spacing: 0.045em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        #product .el-wrapper img {
            width: 90%;
            top: 20px;
        }


        /* javascript */
        .reveal {
            position: relative;
            transform: translatey(45px);
            opacity: 0;
            transition: all 1s ease;
        }

        .reveal.active {
            transform: translateY(0px);
            opacity: 1;
        }
    </style>
</head>

<body>
    <section id="header">
        <?php
        include 'header.php';
        ?>
    </section>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $_SESSION['category'] = $_GET['category'];

        $category = $_SESSION['category'];
    }
    ?>
    <?php if ($category == 'Men') {
    ?>
        <section id="menproduct">
            <div class="container">
                <span class="mens"><?php echo $category ?> GLASSES</span>
            </div>
        </section>
    <?php
    } elseif ($category == 'Women') {
    ?>
        <section id="womenproduct">
            <div class="container">
                <span class="womens reveal"><?php echo $category ?> GLASSES</span>
            </div>
        </section>
    <?php
    } elseif ($category == 'Kids') {
    ?>
        <section id="kidsproduct">
            <div class="container">
                <span class="kids">KIDS</span><br>
                <span class="kids">GLASSES</span>
            </div>
        </section>
    <?php
    }
    ?>
    <section id="product">
        <div class="producttitle">
            <p class="reveal">Best Selling <?php echo $category ?> glasses</p>
        </div>
        <div class="container">
            <?php

            $query = "SELECT * FROM tbl_category_product where category = '$category'";
            $result = mysqli_query($con, $query);

            echo '<form class="box" method="get">';
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                if ($counter % 3 == 0) {
                    echo '</div>';
                    echo '<div class="product">';
                }

                echo '<div class="el-wrapper">';
                if ($row['quantity'] == 0) {
                    echo '<span class="no_stock">'; 
                }
                echo '<div class="box-up">';
                echo '<img class="img" src="/smit/uploads_img/' . $row['photo'] . ' "alt="">';
                echo '<div class="img-info">';
                echo '<div class="info-inner">';
                echo '<span class="p-name">' . $row['product_name'] . '</span>';
                echo '<span class="p-company">' . $row['company'] . '</span>';
                echo '</div>';
                echo '<div class="a-size">Available For : <span class="size">' . $row['size'] . '</span></div>';
                echo '<div class="a-frame">Frame shape : <span class="frame">' . $row['frame'] . '</span></div>';
                echo '</div>';
                echo '</div>';

                echo '<div class="box-down">';
                echo '<div class="h-bg">';
                echo '<div class="h-bg-inner"></div>';
                echo '</div>';
                if ($row['quantity'] > 0) {
                    echo '<a class="cart" href="/smit/add_to_cart.php?product_id=' . urlencode($row['product_id']) . '">';
                    echo '<span class="price">₹ ' . $row['prize'] . '</span>';
                    echo '<span class="add-to-cart">';
                    echo '<span class="txt">Add in cart</span>';
                    echo '</span>';
                    echo '</a>';
                } else {
                    echo '<span class="out_stock">product out of stock</span>';
                }
                echo '</span>';
                echo '</div>';
                echo '</div>';

                $counter++;
            }
            echo '</form>';

            ?>
        </div>
    </section>
</body>
<script>
    window.addEventListener('scroll', reveal);

    function reveal() {
        var reveals = document.querySelectorAll('.reveal');

        for (var i = 0; i < reveals.length; i++) {
            var windowheight = window.innerHeight;
            var revealtop = reveals[i].getBoundingClientRect().top;
            var revealpoint = 150;

            if (revealtop < windowheight - revealpoint) {
                reveals[i].classList.add('active');
            } else {
                reveals[i].classList.remove('active');
            }
        }
    }
</script>

</html>