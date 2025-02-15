<?php
session_start();
if (isset($_SESSION['username'])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>customer panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
      .row.content {
        height: 550px
      }

      /* Set gray background color and 100% height */
      .sidenav {
        background-color: #f1f1f1;
        height: 100%;
      }

      /* On small screens, set height to 'auto' for the grid */
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
        margin-top: 15px;
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
    </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse visible-xs">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="cus_data_view.php">customer details</a></li>
            <li><a href="add_to_cart.php">order</a></li>
            <li><a href="#">stock</a></li>
            <li><a href="cus_edit_profile.php">edit profile</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-3 sidenav hidden-xs">
          <img src="images/admin.png" alt="" class="admin-logo">
          <ul class="nav nav-pills nav-stacked" id="dash-details">
            <li class="active"><a href="customer_panel.php">Dashboard</a></li>
            <!-- <li><a href="customer_update.php">update details</a></li> -->
            <li><a href="customer-dataview.php">update details </a></li>
            <li><a href="change_password.php">change password</a></li>
            <li><a href="add_to_cart.php">Wish List</a></li>
            <li><a href="home.php">home</a></li>
            <li><a href="logout.php">log out</a></li>
          </ul><br>
        </div>
        <br>

        <div class="col-sm-9">
          <div class="well">
            <h4>Vision</h4>
            <p>Shop..</p>
          </div>

        </div>
      </div>
      <?php

      ?>
  </body>

  </html>
<?php
}
else{
  echo '<script>location.href = "home.php";</script>';
}
?>