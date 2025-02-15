<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    html{
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      font-family: 'tahoma';
      height: 100vh;
      width: 100%;
      position: relative;
      top: 5px;
      text-align: left;
    }

    #nav {
      margin: 0 auto;
      width: 100%;
      height: auto;
      display: inline-block;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.9), inset 0 0 1px rgba(255, 255, 255, 0.6);
      background: white;
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


    #nav #login-space{
      position: relative;
      left: 600%;
    }

  </style>

</head>

<body>

  <div class="nav">
    <nav id="nav">
      <ul>
        <li><a href="home1.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#brandsection">Brand</a>
          <ul>
            <li><a href="/smit/brand/ray-ban.php">Ray ban</a></li>
            <li><a href="#">John&Jacob</a></li>
            <li><a href="#">Rio-Rabbit</a></li>
            <li><a href="#">Versace</a></li>
            <li><a href="#">GUCCI</a></li>
            <li><a href="#">D & G</a></li>
          </ul>
        </li>
        <li><a href="#categorysection">Category</a>
          <ul>
            <li><a href="#">Men</a></li>
            <li><a href="#">Women</a></li>
            <li><a href="#">Kids</a></li>
          </ul>
        </li>
        <li><a href="#shapesection">Shape</a>
          <ul>
            <li><a href="#">Square</a></li>
            <li><a href="#">Circle</a></li>
            <li><a href="#">Aviator</a></li>
            <li><a href="#">Oval</a></li>
          </ul>
        </li>
        <li><a href="#lensesection">Lense</a>
          <ul>
            <li><a href="#">Single Vision</a></li>
            <li><a href="#">Bifocals</a></li>
            <li><a href="#">Trifocals</a></li>
            <li><a href="#">Progressive</a></li>
          </ul>
        </li>
        <li><a href="#contactussection">Contact us</a></li>
        <li><a href="customer_panel.php" id="login-space">My Profile</a></li> 
      </ul>
    </nav>
  </div>
</body>
</html>

