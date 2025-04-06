<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>category</title>
    <link rel="stylesheet" href="CSS/ProductCard.css" />
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

        $category = $_GET['category'];
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
            <p class="<?php echo ($category == 'All' ? ' ' : 'reveal') ?>">Best Selling <?php echo $category ?> glasses</p>
        </div>
        <div class="container">
            <?php
            CategoryProduct($pdo, $category);
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