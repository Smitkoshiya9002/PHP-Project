<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Home</title>
  <link rel="stylesheet" href="CSS/Home.css" />
</head>

<body>
  <!-- -----first page----- -->
  <div class="header">
    <!-- ----------------navbar--------------------- -->
    <?php
    include 'header.php';
    ?>
  </div>
  <section id="intro" class="img-fluid">
    <h1>clear vision</h1>
    <p>Always see the correct and clear view of life</p>
  </section>

  <!-- -----brand page----- -->

  <section id="brandsection">
    <div class="brandtitle">
      <h3>BRAND</h3>

    </div>

    <div class="brandslider reveal">
      <div class="photo">
        <img src="https://i.pinimg.com/474x/d6/f6/ab/d6f6abfca480a15292332152323f2aa5.jpg" alt="">
        <!-- <button onclick="clickevent" class="btn">Ray Ban</button> -->
        <button onclick="window.location='/smit/brand/ray ban.php';" value="click here" class="btn">Ray ban</button>
      </div>

      <div class="photo">
        <img src="https://i.pinimg.com/474x/ef/b8/93/efb893df4e3df64338950a39c9cbbc46.jpg" alt="">
        <button class="btn" onclick="window.location='/smit/brand/john jacob.php';" value="click here">John Jacob</button>
      </div>

      <div class="photo">
        <img src="https://i.pinimg.com/474x/12/1b/fe/121bfe71b7de6c8d0441e8dfb8d51af0.jpg" alt="">
        <button class="btn" onclick="window.location='/smit/brand/rio rabbit.php';" value="click here">Rio-Rabbit</button>
      </div>
    </div>
    <div class="space">

    </div>
    <div class="brandslider reveal">
      <div class="photo">
        <img src="https://i.pinimg.com/474x/48/fd/ea/48fdeafc6b1f570f42b91b08379b55bf.jpg" alt="">
        <button class="btn" onclick="window.location='/smit/brand/versace.php';" value="click here">Vercase</button>
      </div>

      <div class="photo">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS393OiL9_2N-D8es2yyF3-j1YSj9zVmeJ-dA&usqp=CAU" alt="">
        <button class="btn" onclick="window.location='/smit/brand/gucci.php';" value="click here">gucci</button>
      </div>

      <div class="photo">
        <img src="https://i.pinimg.com/474x/20/1a/2c/201a2cc016b9018c66408b91c007b5bd.jpg" alt="">
        <button class="btn" onclick="window.location='/smit/brand/d&g.php';" value="click here">D & G</button>
      </div>
    </div>
  </section>

  <!-- -----Men , women , kid glasses page----- -->

  <section id="categorysection">
    <div class="categorytitle">
      <h3>category</h3>
    </div>

    <div class="categoryslider reveal">
      <div class="photo">
        <img src="/smit/images/steptodown.com458687.jpg" alt="" width=" 100%">
        <button class="btn" onclick="window.location='/smit/category.php?category=Men';">Men</button>
      </div>

      <div class="photo">
        <img src="/smit/images/women.jpg" alt="" width="100%">
        <button class="btn" onclick="window.location='/smit/category.php?category=Women';">Women</button>
      </div>

      <div class="photo">
        <img src="/smit/images/kid.jpg" alt="" width="100%">
        <button class="btn" onclick="window.location='/smit/category.php?category=Kids';">Kids</button>
      </div>
    </div>
  </section>

  <!-- -----glasses page----- -->
  <section id="glasses">
    <div class="sunglasses reveal">
      <div class="container">
        <h1>SUNGLASSES</h1>
        <p>Equipped with 100% UV protection, JJ Tints
          <span> are built for the long run. Take a peek for</span>
          high-impact looks.
        </p>
        <form action="/smit/glasses.php" method="post" id="myform">
          <input type="hidden" value="sunglasses" name="glasses">
          <button class="btn">Shop sunglasses</button>
        </form>
      </div>
      <div class="container">
        <img src="https://cdn.shopify.com/s/files/1/1276/5299/files/sunglasses_banner_new.png" alt="" width="100%" height="100%">
      </div>
    </div>

    <div class="eyeglasses reveal">
      <div class="container">
        <img src="https://cdn.shopify.com/s/files/1/1276/5299/files/Untitled-Session1045_1.png" alt="" width="100%" height="100%">
      </div>
      <div class="container">
        <h1>EYEGLASSES</h1>
        <p>Elegance meets high-performance lenses.<span> Browse skillfully crafted and thoughtfully</span>
          designed
          eyeglasses.</p>
        <div class="homepage_banner_button">
          <form action="/smit/glasses.php" method="post" id="myform">
            <input type="hidden" value="eyeglasses" name="glasses">
            <button class="btn">Shop Eyeglasses</button>
          </form>
        </div>
      </div>
    </div>

    <div class="computerglasses reveal">
      <div class="container">
        <h1>BLU COMPUTER GLASSES</h1>
        <p>Give your eyes a digital detox with BLU lenses. <span>Block harmful blue rays emitted by digital
            screens.</span></p>
        <form action="/smit/glasses.php" method="post" id="myform">
          <input type="hidden" value="computerglasses" name="glasses">
          <button class="btn">Shop Now</button>
        </form>
      </div>
      <div class="container">
        <img src="https://cdn.shopify.com/s/files/1/1276/5299/files/blucomputer_banner_new.png" alt="" height="100%" width="100%">
      </div>

    </div>
  </section>

  <!-- -----shape page----- -->
  <section id="shapesection">
    <div class="shapetitle">
      <h2>shape</h2>
    </div>
    <div class="shape reveal">
      <div class="container">
        <div class="photo">
          <img src="https://i.pinimg.com/474x/37/1d/1e/371d1ec8241fe190a1c4140d84056e70.jpg" alt="" width="100%" height="100%">
          <button class="btn" onclick="window.location='/smit/frame.php?product_frame=square';">Square</button>
        </div>
        <div class="photo">
          <img src="https://i.pinimg.com/474x/85/29/22/85292282577676133ca3ff26c1f4cee7.jpg" alt="" width="100%" height="100%">
          <button class="btn" onclick="window.location='/smit/frame.php?product_frame=circle';">Circle</button>
        </div>
        <div class="photo">
          <img src="/smit/images/shape-aviator.jpeg" alt="" height="100%" width="100%">
          <button class="btn" onclick="window.location='/smit/frame.php?product_frame=Aviator';">Aviator</button>
        </div>
        <div class="photo">
          <img src="https://i.pinimg.com/474x/f5/5d/35/f55d3566bdb7124db44f545f0694eacd.jpg" alt="" height="100%" width="100%">
          <button class="btn" onclick="window.location='/smit/frame.php?product_frame=Oval';">Oval</button>
        </div>
      </div>
    </div>
  </section>

  <!-- -----lense page----- -->

  <section id="lensesection">
    <div class="lensetitle">
      <h2>Lense</h2>
    </div>
    <div class="lense reveal">
      <div class="container">
        <div class="photo">
          <img src="https://www.visioncenter.org/wp-content/uploads/2020/07/Single-Vision-Lens-Vision-Center-300x300.jpg" alt="">

        </div>
        <div class="photo">
          <img src="https://www.visioncenter.org/wp-content/uploads/2020/07/Bifocal-Lens-Vision-Center-300x300.jpg" alt="">

        </div>
        <div class="photo">
          <img src="https://www.visioncenter.org/wp-content/uploads/2020/07/Trifocal-Lens-Vision-Center-300x300.jpg" alt="">

        </div>
        <div class="photo">
          <img src="https://www.visioncenter.org/wp-content/uploads/2020/07/Progressive-Lens-Vision-Center-300x300.jpg" alt="">

        </div>
      </div>
    </div>
  </section>

  <!-- best sell product -->

  <section id="bestsection">
    <div class="besttitle">
      <h2>exclusive offer</h2>
    </div>
    <div class="best reveal">
      <div class="container">
        <div class="photo">
          <h2>modern and classic </h2><br>
          <p>flat 30% off</p>
          <p>8787</p>
          <button>shop now</button>
        </div>
        <div class="photo bestkeyframe">
          <img src="https://images.unsplash.com/photo-1572635196237-14b3f281503f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c3VuZ2xhc3Nlc3xlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=600&q=60" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- your favoraite brand collboration -->

  <section id="collaboration">
    <div class="collaborationtitle">
      <h3>Your favoraite brands</h3>
    </div>
    <div class="container reveal">
      <div class="photo">
        <img src="https://theme678-sunglasses.myshopify.com/cdn/shop/files/Logo-1_241x100_crop_center.png?v=1614729088" alt="">
      </div>
      <div class="photo">
        <img src="https://th.bing.com/th/id/OIP.43akm7HS4eGYs6L2ItR37gAAAA?w=144&h=150&c=7&r=0&o=5&pid=1.7" alt="">
      </div>
      <div class="photo">
        <img src="data:image/jpeg;base64,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" alt="">
      </div>
      <div class="photo">
        <img src="data:image/jpeg;base64,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" alt="">
      </div>
      <div class="photo">
        <img src="data:image/jpeg;base64,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" alt="">
      </div>
      <div class="photo">
        <img src="data:image/jpeg;base64,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" alt="">
      </div>
    </div>
  </section>

  <!-- contact us section -->
  <section id="contactussection">
    <div class="title">
      <h3>contact us</h3>
    </div>
    <div class="container reveal">
      <div class="part">
        <img src="https://ww1.freelogovectors.net/wp-content/uploads/2023/04/googlemaps-logo-freelogovectors.net_.png" alt="">
        <p class="bigfont">our office address</p>
        <p class="smallfont">B-206 , western plaza , simada gam<br>surat , gujrat</p>

        <img src="https://ww1.freelogovectors.net/wp-content/uploads/2023/04/gmail_logo_icon-freelogovectors.net_.png?lossy=1&resize=640%2C480&ssl=1" alt="">
        <p class="bigfont">general enquiries</p>
        <p class="smallfont">visionshop02062@gmail.com</p>

        <img src="https://ww1.freelogovectors.net/svg07/google-voice-logo.svg" alt="">
        <p class="bigfont">contact us</p>
        <p class="smallfont">8799513---</p>

        <img src="https://ww1.freelogovectors.net/wp-content/uploads/2013/02/clock1.png?lossy=1&ssl=1" alt="">
        <p class="bigfont">our timing</p>
        <p class="smallfont">mon-sun 10:00 am - 07:00 pm</p>
      </div>
      <div class="part">
        <form id="contact-form" method="post">

          <input type="text" placeholder="name" name="name" class="contact">
          <input type="email" placeholder="your email" name="email" class="contact">
          <input type="number" placeholder="your number" name="number" class="contact">
          <input type="text" placeholder="Enter message or feedback" name="message" class="contact">
          <input type="submit" name="send" value="submit" class="btn">
        </form>
      </div>
    </div>
  </section>

  <?php
  if (isset($_SESSION['username'])) {
    if (isset($_POST['send'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $number = $_POST['number'];
      $message = $_POST['message'];

      $stmt = $pdo->prepare("INSERT INTO `tbl_feedback`(`name`, `email`, `number`, `message`) VALUES (:a,:b,:c,:d)");
      $stmt->bindParam((':a'), $name);
      $stmt->bindParam((':b'), $email);
      $stmt->bindParam((':c'), $number);
      $stmt->bindParam((':d'), $message);
      if ($stmt->execute()) {
  ?>
        <script>
          Swal.fire(
            'success!',
            'send feedback',
            'success'
          ).then(function() {
            window.location.href = '/smit/home.php';
          });
        </script>
  <?php
        exit();
      } else {
        echo '<script>alert("message send failed");</script>';
      }
    }
  }
  ?>

  <script type="text/javascript">
    //--------------------------- whole form animation script-------------------------------------------
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

    // -----------------------------best section animation script--------------------------------------
    window.addEventListener('scroll', bestkeyframe);

    function bestkeyframe() {
      var reveals = document.querySelectorAll('.bestkeyframe');

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
  <script>
    function submitForm() {
      document.getElementById('myform').submit();
    }
  </script>

</body>

</html>