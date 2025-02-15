<!DOCTYPE html>
<html lang="en">

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
      text-align: left;
    }

    #nav {
      margin: 0 auto;
      width: 100%;
      height: auto;
      display: inline-block;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.9), inset 0 0 1px rgba(255, 255, 255, 0.6);
      background-color: white;
      /* margin-top: 1%; */
    }

    #nav ul {
      margin: 0;
      padding: 0;
      list-style-type: none;
      display: inline-block;
      width: 100%;

    }

    #nav ul li {
      position: relative;
      margin: 0 20px 0 0;
      display: inline-block;
    }

    #nav ul li a {
      padding: 20px;
      display: inline-block;
      color: black;
      text-decoration: none;
    }

    #nav ul li a:hover {
      opacity: 0.5;
    }

    #nav ul li ul {
      display: none;
      position: absolute;
      left: 0;
      background: black;
      /* float: left; */
      color: white;
    }

    #nav ul li ul li {
      width: auto;
      border-bottom: 1px solid rgba(255, 255, 255, .3);
    }

    #nav ul li ul li a {
      width: auto;
      border-bottom: 1px solid rgba(255, 255, 255, .3);
    }

    #nav ul li:hover ul {
      display: block;
      background-color: white;
      color: white;
      width: auto;
    }

    #nav img {
      width: 60px;
      position: relative;
      padding: 15px;
      /* top: -5px; */
    }

    #nav #user {
      position: relative;
      left: 42%;
      /* top: 15px; */
    }
  </style>

</head>

<body>

  <div class="nav">
    <nav id="nav">
      <ul>
        <li><a href="../home.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="../home.php#brandsection">Brand</a>
          <ul>
            <li><a href="/brand/ray-ban.php">Ray ban</a></li>
            <li><a href="/brand/john-jacob.php">John&Jacob</a></li>
            <li><a href="/brand/rio-rabbit.php">Rio-Rabbit</a></li>
            <li><a href="/brand/versace.php">Versace</a></li>
            <li><a href="/brand/gucci.php">GUCCI</a></li>
            <li><a href="/brand/d&g.php">D & G</a></li>
          </ul>
        </li>
        <li><a href="#categorysection">Category</a>
          <ul>
            <?php
            $con = mysqli_connect("localhost", "root", "root", "optical");

            $category = "select * from `tbl_category`";
            $result = mysqli_query($con, $category);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <li><a href="/smit/<?php echo $row['category_name'] ?>.php"><?php echo $row['category_name'] ?></a></li>
            <?php
            }
            ?>
          </ul>
        </li>
        <li><a href="../home.php#shapesection">Shape</a>
          <ul>
            <li><a href="#">Square</a></li>
            <li><a href="#">Circle</a></li>
            <li><a href="#">Aviator</a></li>
            <li><a href="#">Oval</a></li>
          </ul>
        </li>
        <li><a href="../home.php#lensesection">Lense</a>
          <ul>
            <li><a href="#">Single Vision</a></li>
            <li><a href="#">Bifocals</a></li>
            <li><a href="#">Trifocals</a></li>
            <li><a href="#">Progressive</a></li>
          </ul>
        </li>
        <li><a href="../home.php#contactussection">Contact us</a></li>
        <li id="user"><img src="../images/admin.png" alt="">
          <ul>
            <li><a href="../login.php">login</a></li>
            <li><a href="../registration.php">registration</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</body>

</html>