<?php
include 'Backend/db.php';

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<head>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    html {
      scroll-behavior: smooth;
      margin: 0;
      padding: 0;
    }

    body {
      margin: 0 auto;
      font-family: 'tahoma';
      height: 100vh;
      width: 100%;
      position: relative;
    }

    #nav {
      margin: 0 auto;
      width: 100%;
      height: auto;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.9), inset 0 0 1px rgba(255, 255, 255, 0.6);
      background-color: white;
    }

    #nav ul {
      margin: 0;
      padding: 0;
      list-style-type: none;
      display: flex;
      width: auto;
    }

    #nav ul li {
      position: relative;
      display: inline-block;
      align-items: center;
      text-align: center;
    }


    #nav ul li a {
      padding: 20px;
      display: inline-block;
      color: black;
      text-decoration: none;
      text-align: left;
      opacity: 1;
      margin: 0px 15px 0px 15px;
    }

    #nav ul li a:hover {
      opacity: 0.5;
    }

    #nav ul li ul {
      display: none;
      position: absolute;
      width: 100%;
      z-index: 1;
    }

    #nav ul li ul li {
      border-bottom: 2px solid rgba(255, 255, 255, .3);
      width: 100%;
    }

    #nav ul li ul li a {
      margin: 0px;
      display: block;
    }

    #nav ul li:hover ul {
      display: block;
      background: white;
      opacity: 0.8;
      color: white;
      width: auto;
      border: none;
      margin: 0;
      padding: 0;
    }

    #nav img {
      width: 60px;
      position: relative;
      padding: 15px;
      cursor: pointer;
    }

    .right-align {
      position: relative;
      left: 48%;
    }

    .cart-icon {
      position: relative;
      font-size: 22px;
      color: black;
      left: 37%;
      top: 20px;
    }

    .cart-icon span {
      position: absolute;
      height: 20px;
      width: 20px;
      background-color: #000;
      line-height: 22px;
      text-align: center;
      top: -20%;
      font-size: 15px;
      font-weight: 600;
      border-radius: 50%;
      color: #fff;
    }

    .order {
      position: relative;
      /* left: 530%; */
      color: #000;
    }

    .order:hover {
      opacity: 0.8;
      color: #000;
      border: none;
    }

    .login-space {
      position: relative;
      left: 450%;
    }
  </style>
</head>

<body>
  <div class="nav">
    <nav id="nav">
      <ul>
        <!-- <li class="menu-icon">&#9776;</li> -->
        <li><a href="/smit/home.php">Home</a></li>
        <li><a href="/smit/home.php/#brandsection">Brand</a>
          <ul>
            <?php
            $row = getHeaderData($pdo, "tbl_brand");

            foreach ($row as $r) {
              echo '<li><a href="/smit/brand/' . $r['brand_name'] . '.php">' . $r['brand_name'] . '</a></li>';
            }
            ?>
          </ul>
        </li>
        <li><a href="/smit/home.php#categorysection">Category</a>
          <ul>
            <?php
            $row = getHeaderData($pdo, "tbl_category");
            foreach ($row as $r) {
              echo '<li><a href="/smit/category.php?category=' . $r['category_name'] . '.php">' . $r['category_name'] . '</a></li>';
            }
            ?>
          </ul>
        </li>
        <li><a href="/smit/home.php#shapesection">Shape</a>
          <ul>
            <li><a href="/smit/frame.php?product_frame=square">Square</a></li>
            <li><a href="/smit/frame.php?product_frame=circle">Circle</a></li>
            <li><a href="/smit/frame.php?product_frame=aviator">Aviator</a></li>
            <li><a href="/smit/frame.php?product_frame=oval">Oval</a></li>
          </ul>
        </li>
        <li><a href="/smit/home.php#lensesection">Lense</a>
          <ul>
            <li><a href="#">SingleVision</a></li>
            <li><a href="#">Bifocals</a></li>
            <li><a href="#">Trifocals</a></li>
            <li><a href="#">Progressive</a></li>
          </ul>
        </li>
        <li><a href="/smit/#contact-form">Contact us</a></li>
        <?php
        if (isset($_SESSION['username'])) {
          $stmt = $pdo->prepare("SELECT * FROM `tbl_add_to_cart` WHERE `customer_name` = :a");
          $stmt->bindParam((':a'), $_SESSION['username']);
          $stmt->execute();
          $row_count = $stmt->rowCount();
          echo '<li><a href="/smit/my_order.php" class="order">Order</a></li>
                <a href="/smit/add_to_cart.php" class="cart-icon"><i class="glyphicon glyphicon-shopping-cart"></i><span>' . $row_count . '</span></a>';
          echo '<li><a href="/smit/customer_panel.php" class="login-space">My Profile</a></li>';
        } else {
          echo '<li class="right-align">
                <img src="/smit/images/admin.png" alt="signup">
                <ul>
                    <li><a href="/smit/login.php">Login</a></li>
                    <li><a href="/smit/registration.php">Registration</a></li>
                </ul>
              </li>';
        }
        ?>
      </ul>
    </nav>
  </div>
</body>

</html>