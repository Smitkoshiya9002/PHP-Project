<?php
session_start();
$brand = $_GET['brand'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/ProductCard.css" />
    <style>
        .html {
            margin: 0;
            padding: 0;
        }

        .body {
            width: 100%;
            background-color: #f7f7f7;
        }

        /* ----------------------------intro css-------------------------------- */


        #intro {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        #intro .photo img {
            width: 100%;
        }

        /* ---------------start section css------------------------ */

        #start {
            height: 25vh;
            width: 100%;
        }

        #start .start2 {
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

        #start .start1 {
            text-align: center;
            font-family: Cinzel;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            top: 40px;
            font-size: 30px;
            position: relative;
        }

        /* ------------------------------men product section css------------------------------------- */

        #men h3 {
            text-align: center;
            font-family: Cinzel;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 30px;
            margin-top: 100px;
        }

        #men img {
            width: 80%;
            position: relative;
            top: 15%;
        }

        /* ------------------------------women product section css------------------------------------- */

        #women h3 {
            text-align: center;
            font-family: Cinzel;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 30px;
            margin-top: 100px;
        }

        #women img {
            width: 85%;
            position: relative;
            top: 15%;
        }

        /* ------------------------------kids product section css------------------------------------- */

        #kids h3 {
            text-align: center;
            font-family: Cinzel;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 30px;
            margin-top: 8%;
        }

        #kids img {
            width: 90%;
            position: relative;
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
    </style>
</head>

<body>
    <!-- -----------------------------------------header------------------------------------------- -->
    <section id="header">
        <?php
        include 'header.php';
        ?>
    </section>
    <!-- ------------------------------------------image-------------------------------------------- -->
    <section id="intro">
        <div class="photo">
            <img src="/smit/images/ray-ban-banner.jpg" alt="error">
        </div>
    </section>
    <!-- -----------------------------------------start--------------------------------------------- -->
    <section id="start">
        <div class="start reveal">
            <h3 class="start1"><?php echo $brand ?> sunglasses</h3>
            <p class="start2">To start, with <?php echo $brand ?></p>
        </div>
    </section>
    <!-- -----------------------------------------product--------------------------------------------- -->
    <section id="product" class="reveal">
        <h3>Bestseller Sunglasses</h3>
        <?php
        BrandProduct($pdo, "all", $brand);
        ?>
    </section>
    <!-- -----------------------------------------men product--------------------------------------- -->
    <section id="men" class="reveal">
        <h3>Men Sunglasses</h3>
        <?php
        BrandProduct($pdo, "men", $brand);
        ?>
    </section>
    <!-- -----------------------------------------women product--------------------------------------- -->
    <section id="women" class="reveal">
        <h3>woMen Sunglasses</h3>
        <?php
        BrandProduct($pdo, "women", $brand);
        ?>
    </section>
    <!-- -------------------------------------kids sunglasses----------------------------------- -->
    <section id="kids" class="reveal">
        <div class="kidstitle">
            <h3>Kids sunglasses</h3>
        </div>
        <?php
        BrandProduct($pdo, "kids", $brand);
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