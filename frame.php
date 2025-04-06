<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>frame</title>
    <link rel="stylesheet" href="CSS/ProductCard.css" />
    <style>
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
            padding-top: 40px;
        }
    </style>
</head>

<body>
    <?php
    include 'header.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $_SESSION['frame'] = $_GET['product_frame'];
        $frame = $_GET['product_frame'];
        // echo $frame;
    } else {
        echo 'data not fetched';
    }
    ?>
    <section id="product">
        <div class="producttitle">
            <p class>Best Selling <?php echo $frame ?> frame</p>
        </div>
        <div class="container">
            <?php
            FrameProduct($pdo, $frame);
            ?>
        </div>
    </section>
    ?>
</body>

</html>