<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Men category</title>
    <link rel="stylesheet" href="CSS/ProductCard.css" />
</head>

<body>
    <section id="header">
        <?php
        include 'header.php';
        ?>
    </section>

    <section id="product">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['glasses'] = $_POST['glasses'];
        }
        $sglasses = $_SESSION['glasses'];

        GlassProduct($pdo, $sglasses);
        ?>
    </section>
</body>

</html>