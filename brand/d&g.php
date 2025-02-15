<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>brand-D & G</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
            margin: 0;
            padding: 0;
        }

        #intro .photo img {
            width: 100%;
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

        #start .start3 {
            text-align: center;
            font-family: Cinzel;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 10px;
            position: relative;
            top: 45px;
        }


        /* ----------------------------product section css----------------------------------------------- */

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
            width: 50%;
            height: 100%;
            background-color: #464646;
        }

        /* smooth uper letter on card */
        .info-inner {
            -webkit-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
            -moz-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
            -o-transition: all 400ms cubic-bezier(0, 0, 0.18, 1);
            transition: all 400ms cubic-bezier(0, 0, 0.18, 1);

            -webkit-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -moz-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            -o-transition-timing-function: cubic-bezier(0, 0, 0.18, 1);
            transition-timing-function: cubic-bezier(0, 0, 0.18, 1);

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

        /* --------------------------best sunglasees-------------------- */

        #product .el-wrapper img {
            width: 90%;
            top: 20px;
        }

        /* ----------------------------men sunglasses------------------------ */

        #men {
            width: 100%;
        }

        .mentitle h3 {
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

        .womentitle h3 {
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
        .notfound {
            text-align: center;
            text-transform: uppercase;
            font-family: optima;
            position: relative;
            /* top: 50px; */
            color: red;
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

        #intro img{
            height: 80vh;
        }

    </style>


</head>

<body>
    <!-- ----------------------------------------header section----------------------------------- -->
    <section id="nav">
        <?php
        include '../header.php';
        ?>
    </section>
    <!-- ----------------------------------------intro section------------------------------------- -->
    <section id="intro">
        <div class="photo">
            <img src="https://www.realmenrealstyle.com/wp-content/uploads/2022/03/Sunglasses-Christopher-Cloos-741x505.jpg" alt="">
        </div>
    </section>
    <!-- ---------------------------------------start section-------------------------------------- -->
    <section id="start">
        <div class="start">
            <p class="start1">To start, with D $ G</p>
            <h3 class="start2">D $ G sunglasses</h3>
            <p class="start3">Iconic sunglasses are a declaration of belonging, style and attitude</p>
        </div>
    </section>

    <!-- -----------------------------------ray ban men sunglasses----------------------------------- -->
    <section id="men" class="">
        <div class="mentitle">
            <!-- <h3>sunglasses</h3> -->
        </div>
        <?php
        $con = mysqli_connect("localhost", "root", "", "optical");
        $query = "SELECT * FROM `tbl_category_product` where `company` = 'd&g'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 0) {
            echo '<h2 class="notfound">Product is not available!</h2>';
        } else {
            echo '<form class="box reveal" method="get">';
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
                echo '<img class="img" src="../uploads_img/' . $row['photo'] . ' "alt="">';
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
        }
        ?>


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

<?php
// $show = "SELECT `photo` FROM `tbl_rayban_product_men` WHERE 1";

// if ($result = mysqli_query($con, $show)) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo $row['photo'];
//     }
// }
?>