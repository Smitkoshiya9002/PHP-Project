<?php
session_start();
if (isset($_SESSION['admin'])) {
  $con = mysqli_connect("localhost", "root", "", "optical");
} else {
  echo '<script>location.href = "home.php";</script>';
}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
      body {
        background-color: rgb(205, 212, 215);
        height: auto;
      }

      .sidenav {
        background-color: #f1f1f1;
        height: 105%;
        width: 22%;
        z-index: 1;

      }

      .col-sm-9 {
        margin: 0;
        margin-left: 12%;
        width: 75%;
        padding: 0;
        height: auto;
      }

      @media screen and (max-width: 767px) {
        .row.content {
          height: auto;
        }
      }

      .admin-logo {
        width: 150px;
        margin-left: 80px;
        padding: 40px 40px;
      }

      #dash-details a {
        margin-top: 10px;
      }

      #dash-details a:hover {
        background-color: black;
        color: white;
      }

      .row.content {
        height: 100vh;
      }

      #dash-details {
        text-transform: uppercase;
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-size: 14px;
        font-weight: 700px;
      }

      .container {
        width: 78%;
        position: relative;
        top: 5%;
        height: 25%;
        /* background-color: red; */
        display: flex;
        justify-content: space-evenly;
      }

      .container .part {
        position: relative;
        height: 100%;
        width: 20%;
        background-color: rgb(186, 209, 214);
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.4), inset 0 0 10px rgba(255, 255, 255, 0.5);
      }

      .container .part:hover {
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.9), inset 0 0 10px rgba(255, 255, 255, 0.7);
        transition: all ease 0.5s;
      }

      .part h3 {
        text-align: center;
        font-family: optima;
        position: relative;
        font-weight: 600;
      }

      i {
        position: relative;
        /* display: flex; */
        text-align: center;
        align-items: center;
        font-size: 24px;
      }

      .container .part a {
        text-decoration: none;
        color: inherit;
      }

      .container .part {
        cursor: pointer;
      }

      .container .part:hover {
        cursor: pointer;
      }
    </style>
  </head>

  <body>

    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-3 sidenav hidden-xs">
          <img src="images/admin.png" alt="" class="admin-logo">
          <ul class="nav nav-pills nav-stacked" id="dash-details">
            <li class="active"><a href="admin-panel.php">Dashboard</a></li>
            <li><a href="admin-customerview.php">customer details</a></li>
            <li><a href="admin_add_brand_category_product.php">add product</a></li>
            <li><a href="admin_update_product.php">update product</a></li>
            <li><a href="admin-add-brand.php">Manage brand</a></li>
            <li><a href="admin-add-category.php">Manage category</a></li>
            <li><a href="admin-view-order.php">View Order</a></li>
            <li><a href="admin-view-feedback.php">View Feedback</a></li>
            <li><a href="admin-view-payment.php">View Payment</a></li>
            <li><a href="admin-logout.php">logout</a></li>
          </ul><br>
        </div>
        <br>
        <div class="container">
          <div class="part">
            <a href="/smit/admin-customerview.php">
              <center><i class="glyphicon glyphicon-user"></i></center>
              <h3>Total Customer</h3>
              <?php
              $count = 0;
              $query = "select * from `tbl_register`";
              $result = mysqli_query($con, $query);
              $count = mysqli_num_rows($result);
              ?>
              <h3 class="display"><?php echo $count; ?></h3>
            </a>
          </div>

          <div class="part">
            <a href="/smit/admin_update_product.php">
              <center><i class="glyphicon glyphicon-stats"></i></center>
              <h3>Total Product</h3>
              <?php
              $count = 0;
              $query = "select * from `tbl_category_product`";
              $result = mysqli_query($con, $query);

              $count = mysqli_num_rows($result);
              ?>
              <h3 class="display"><?php echo $count; ?></h3>
            </a>
          </div>

          <div class="part">
            <a href="/smit/admin-view-order.php">
              <center><i class="glyphicon glyphicon-briefcase"></i></center>
              <h3>Total Order</h3>
              <?php
              $count = 0;
              $query = "select * from `tbl_order`";
              $result = mysqli_query($con, $query);

              $count = mysqli_num_rows($result);
              ?>
              <h3 class="display"><?php echo $count; ?></h3>
            </a>
          </div>
        </div>
        <br><br>

        <div class="container">
          <div class="part">
            <a href="/smit/admin-view-payment.php">
              <center><i class=" glyphicon glyphicon-usd"></i></center>
              <h3>Completed Payment</h3>
              <?php
              $price = 0;
              $query = "select * from `tbl_payment` where `p_status` = 'complete'";
              $result = mysqli_query($con, $query);

              while ($row1 = mysqli_fetch_assoc($result)) {
                $price += $row1['amount'];
              }

              ?>
              <h3 class="display">₹<?php echo $price; ?>/-</h3>
            </a>
          </div>

          <div class="part">
            <a href="/smit/admin-view-payment.php">
              <center><i class=" glyphicon glyphicon-usd"></i></center>
              <h3>Pending Payment</h3>
              <?php
              $price = 0;
              $query = "select * from `tbl_payment` where `p_status` = 'incomplete'";
              $result = mysqli_query($con, $query);

              while ($row1 = mysqli_fetch_assoc($result)) {
                $price += $row1['amount'];
              }
              ?>
              <h3 class="display">₹<?php echo $price; ?>/-</h3>
            </a>
          </div>

          <div class="part">
            <a href="/smit/admin-out-of-stock-product.php">
              <center><i class="glyphicon glyphicon-remove-sign"></i></center>
              <h3>Out of Stock Product</h3>
              <?php
              $count = 0;
              $query = "select * from `tbl_category_product` where `quantity` = 0";
              $result = mysqli_query($con, $query);

              $count = mysqli_num_rows($result);
              ?>
              <h3 class="display"><?php echo $count; ?></h3>
            </a>
          </div>
        </div><br><br>

        <div class="container">

          <div class="part">
            <a href="admin-add-brand.php">
              <center><i class="glyphicon glyphicon-list-alt"></i></center>
              <h3>Total Brand</h3>
              <?php
              $count = 0;
              $query = "select * from `tbl_brand`";
              $result = mysqli_query($con, $query);

              $count = mysqli_num_rows($result);
              ?>
              <h3 class="display"><?php echo $count; ?></h3>
            </a>
          </div>

          <div class="part">
            <a href="admin-add-category.php">
              <center><i class="glyphicon glyphicon-list-alt"></i></center>
              <h3>Total Category</h3>
              <?php
              $count = 0;
              $query = "select * from `tbl_category`";
              $result = mysqli_query($con, $query);

              $count = mysqli_num_rows($result);
              ?>
              <h3 class="display"><?php echo $count; ?></h3>
            </a>
          </div>

          <div class="part">
            <a href="admin-view-feedback.php">
              <center><i class="glyphicon glyphicon-envelope"></i></center>
              <h3>Total Feedback</h3>
              <?php
              $count = 0;
              $query = "select * from `tbl_feedback`";
              $result = mysqli_query($con, $query);

              $count = mysqli_num_rows($result);
              ?>
              <h3 class="display"><?php echo $count; ?></h3>
            </a>
          </div>
        </div>

      </div>
    </div>

  </body>

  </html>
