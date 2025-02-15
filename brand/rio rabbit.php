<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>rio rabbit</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            width: 100%;
            background-color: #f7f7f7;
        }

        /* ----------------------------intro css------------------------ -------- */

        #intro {
            width: 100%;
            height: 80vh;
            margin: 0;
            padding: 0;
            background-color: red;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.3) 100%), url("/smit/images/steptodown.com836342.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        #intro .photo img {
            width: 100%;
            height: 100%;
        }

        /* ---------------------start page css------------------------------ */

        #start {
            width: 100%;
            height: 25vh;
            margin: 0;
            padding: 0;
        }

        #start .start .start1 {
            text-align: center;
            font-size: 20px;
            font-family: Cinzel;
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 2px;
            position: relative;
            top: 35px;
            margin: 0;
        }

        #start .start2 {
            text-align: center;
            font-family: Cinzel;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            top: 40px;
            font-size: 30px;
            position: relative;
        }


        /* ----------------------------product section css----------------------------------------------- */

        .product {
            position: relative;
            text-align: center;
            width: 100%;
            display: flex;
            /* margin-top: 5%; */
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

        /* --------------------------best sunglasees-------------------- */

        #product .el-wrapper img {
            width: 90%;
            top: 20px;
        }

        #product h3 {
            text-align: center;
            font-family: Cinzel;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 30px;
            position: relative;
            /* margin-top: 5%; */
            margin-bottom: 5%;
        }

        /* ----------------------------men sunglasses------------------------ */

        #men {
            width: 100%;
        }

        #men h3 {
            text-align: center;
            font-family: Cinzel;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 30px;
            position: relative;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        #men .el-wrapper img {
            width: 90%;
            top: 20px;
        }


        /* ---------------------------------woemn sunglasses----------------------------- */

        #women {
            width: 100%;
        }

        #women h3 {
            text-align: center;
            font-family: Cinzel;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 30px;
            position: relative;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        #women .el-wrapper img {
            width: 90%;
            top: 20px;
        }

        /* ---------------------------------------------kids sunglasses------------------------------- */

        #kids {
            width: 100%;
        }

        .kidstitle h3 {
            text-align: center;
            font-family: Cinzel;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 30px;
            position: relative;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        #kids .el-wrapper img {
            width: 90%;
            top: 20px;
        }


        /* ----------------------not found ----------------------------- */
        .notfound{
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
    <!-- --------------------------------------------header section------------------------------------------------- -->

    <section id="header">
        <?php
        include '../header.php';
        ?>
    </section>

    <!-- --------------------------------------------intro section------------------------------------------------ -->

    <section id="intro">
        <div class="photo">
            <!-- <img src="../images/steptodown.com836342.jpg" alt="xcc"> -->
        </div>
    </section>

    <!-- --------------------------------------------start section----------------------------------------------- -->

    <section id="start">
        <div class="start">
            <p class="start1">To start, with rio rabbit</p>
            <h3 class="start2">rio rabbit sunglasses</h3>
        </div>
    </section>

    <!-- -----------------------------------------product--------------------------------------------- -->
    <section id="product">
        <h3>Bestseller Sunglasses</h3>
        <?php
        $con = mysqli_connect("localhost", "root", "", "optical");
        $query = "SELECT * FROM tbl_category_product where `category` = 'all' and `company` = 'rio rabbit'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
            echo '<h2 class="notfound">Product is not available!</h2>';
        } else {
            echo '<form class="box" method="get">';
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                if ($counter % 3 == 0) {
                    echo '</div>';
                    echo '<div class="product">';
                }

                echo '<div class="el-wrapper">';
                echo '<div class="box-up">';
                echo '<img class="img" src="../uploads_img/' . $row['photo'] . ' "alt="">';
                echo '<div class="img-info">';
                echo '<div class="info-inner">';
                echo '<span class="p-name">' . $row['product_name'] . '</span>';
                echo '<span class="p-company">' . $row['company'] . '</span>';
                echo '</div>';
                echo '<div class="a-size">Available size : <span class="size">' . $row['size'] . '</span></div>';
                echo '</div>';
                echo '</div>';

                echo '<div class="box-down">';
                echo '<div class="h-bg">';
                echo '<div class="h-bg-inner"></div>';
                echo '</div>';

                echo '<a class="cart" href="/smit/add_to_cart.php?product_id=' . urlencode($row['product_id']) . '">';
                echo '<span class="price">₹ ' . $row['prize'] . '</span>';
                echo '<span class="add-to-cart">';
                echo '<span class="txt">Add in cart</span>';
                echo '</span>';
                echo '</a>';
                echo '</div>';
                echo '</div>';

                $counter++;
            }
            echo '</form>';
        }
        ?>
    </section>
    <!-- -----------------------------------------men product--------------------------------------- -->
    <section id="men">
        <h3>Men Sunglasses</h3>
        <?php
        $con = mysqli_connect("localhost", "root", "", "optical");
        $query = "SELECT * FROM tbl_category_product where `category` = 'men' and `company` = 'rio rabbit'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 0) {
            echo '<h2 class="notfound">Product is not available!</h2>';
        } else {

            echo '<form class="box" method="get">';
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {


                if ($counter % 3 == 0) {
                    echo '</div>';
                    echo '<div class="product">';
                }

                echo '<div class="el-wrapper">';
                echo '<div class="box-up">';
                echo '<img class="img" src="../uploads_img/' . $row['photo'] . ' "alt="">';
                echo '<div class="img-info">';
                echo '<div class="info-inner">';
                echo '<span class="p-name">' . $row['product_name'] . '</span>';
                echo '<span class="p-company">' . $row['company'] . '</span>';
                echo '</div>';
                echo '<div class="a-size">Available size : <span class="size">' . $row['size'] . '</span></div>';
                echo '</div>';
                echo '</div>';

                echo '<div class="box-down">';
                echo '<div class="h-bg">';
                echo '<div class="h-bg-inner"></div>';
                echo '</div>';

                echo '<a class="cart" href="/smit/add_to_cart.php?product_id=' . urlencode($row['product_id']) . '">';
                echo '<span class="price">₹ ' . $row['prize'] . '</span>';
                echo '<span class="add-to-cart">';
                echo '<span class="txt">Add in cart</span>';
                echo '</span>';
                echo '</a>';
                echo '</div>';
                echo '</div>';

                $counter++;
            }
            echo '</form>';
        }
        ?>
    </section>
    <!-- -----------------------------------------women product--------------------------------------- -->
    <section id="women">
        <h3>woMen Sunglasses</h3>
        <?php
        $con = mysqli_connect("localhost", "root", "", "optical");
        $query = "SELECT * FROM tbl_category_product where `category` = 'women' and `company` = 'rio rabbit'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
            echo '<h2 class="notfound">Product is not available!</h2>';
        } else {

            echo '<form class="box" method="get">';
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                if ($counter % 3 == 0) {
                    echo '</div>';
                    echo '<div class="product">';
                }

                echo '<div class="el-wrapper">';
                echo '<div class="box-up">';
                echo '<img class="img" src="../uploads_img/' . $row['photo'] . ' "alt="">';
                echo '<div class="img-info">';
                echo '<div class="info-inner">';
                echo '<span class="p-name">' . $row['product_name'] . '</span>';
                echo '<span class="p-company">' . $row['company'] . '</span>';
                echo '</div>';
                echo '<div class="a-size">Available size : <span class="size">' . $row['size'] . '</span></div>';
                echo '</div>';
                echo '</div>';

                echo '<div class="box-down">';
                echo '<div class="h-bg">';
                echo '<div class="h-bg-inner"></div>';
                echo '</div>';

                echo '<a class="cart" href="/smit/add_to_cart.php?product_id=' . urlencode($row['product_id']) . '">';
                echo '<span class="price">₹ ' . $row['prize'] . '</span>';
                echo '<span class="add-to-cart">';
                echo '<span class="txt">Add in cart</span>';
                echo '</span>';
                echo '</a>';
                echo '</div>';
                echo '</div>';

                $counter++;
            }
            echo '</form>';
        }
        ?>
    </section>
    <!-- -------------------------------------kids sunglasses----------------------------------- -->
    <section id="kids">
        <div class="kidstitle">
            <h3>Kids sunglasses</h3>
        </div>
        <?php
        $con = mysqli_connect("localhost", "root", "", "optical");
        $query = "SELECT * FROM tbl_category_product where `category` = 'kids' and `company` = 'rio rabbit'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
            echo '<h2 class="notfound">Product is not available!</h2>';
        } else {

            echo '<form class="box" method="get">';
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                if ($counter % 3 == 0) {
                    echo '</div>';
                    echo '<div class="product">';
                }

                echo '<div class="el-wrapper">';
                echo '<div class="box-up">';
                echo '<img class="img" src="../uploads_img/' . $row['photo'] . ' "alt="">';
                echo '<div class="img-info">';
                echo '<div class="info-inner">';
                echo '<span class="p-name">' . $row['product_name'] . '</span>';
                echo '<span class="p-company">' . $row['company'] . '</span>';
                echo '</div>';
                echo '<div class="a-size">Available size : <span class="size">' . $row['size'] . '</span></div>';
                echo '</div>';
                echo '</div>';

                echo '<div class="box-down">';
                echo '<div class="h-bg">';
                echo '<div class="h-bg-inner"></div>';
                echo '</div>';

                echo '<a class="cart" href="/smit/add_to_cart.php?product_id=' . urlencode($row['product_id']) . '">';
                echo '<span class="price">₹ ' . $row['prize'] . '</span>';
                echo '<span class="add-to-cart">';
                echo '<span class="txt">Add in cart</span>';
                echo '</span>';
                echo '</a>';
                echo '</div>';
                echo '</div>';

                $counter++;
            }
            echo '</form>';
        }
        ?>
    </section>

</body>

</html>