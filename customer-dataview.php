<?php
session_start();
if (isset($_SESSION['username'])) {
$con = mysqli_connect("localhost", "root", "", "optical");
?>

<?php

$uname = $_SESSION['username'];
$query = "select email from `tbl_register` where `username` = '$uname'";
$semail = mysqli_query($con, $query);

if ($semail) {
  if (mysqli_num_rows($semail) > 0) {
    $row = mysqli_fetch_assoc($semail);
    $uemail = $row['email'];
  } else {
    echo "Email not found.";
  }
} else {
  echo "Query execution failed: " . mysqli_error($con);
}
?>
<?php

if (isset($_POST['submit'])) {
  $username = $_POST['name'];
  $email = $_POST['email'];
  $cno = $_POST['contact_no'];
  $city = $_POST['city'];
  $address = $_POST['address'];

  $uname = $_SESSION['username'];



  $sql = "select * from tbl_customer_details where name = '$uname'";

  $res = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($res);

  if ($res->num_rows == 0) {
    echo "<script>alert('Invalid user');</script>";
  } else {
    if ($username == $uname) {
      if ($email == $uemail) {
        $sql = "update tbl_customer_details set name = '$username',`email` = '$email' ,contactno = '$cno', city = '$city' , address = '$address' where name = '$uname'";

        if (mysqli_query($con, $sql)) 
        {
          echo "<script>alert('Profile Updated.');</script>";
          echo "<script> location.href='customer_panel.php' </script>";
        } 
        else 
        {
          echo "<script>alert('Error in query');</script>";
        }
      } 
      else 
      {
        echo "<script>alert('please enter register email');</script>";
      }
    } 
    else 
    {
      echo "<script>alert('please enter register username');</script>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
      height: 100vh;
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

    .usid {
      position: relative;
      border: 2px solid black;
      background: white;
      display: block;
      margin: 23px auto;
      text-align: center;
      box-shadow: 0 2px 0 #000;
      color: #000;
      padding: 15px 20px;
      width: 300px;
      outline: none;
      font-size: 15px;
      font-weight: 400;
      text-shadow: 0 -1px 0 #000;
      border-radius: 24px;
      transition: 0.25;
      top: 30px;
      font-family: optima;
      text-transform: uppercase;
    }

    .usid::-webkit-input-placeholder {
      color: #888;
    }

    .usid:-moz-placeholder {
      color: #888;
    }

    .usid:focus {
      width: 330px;
      animation: glow 800ms ease-out infinite alternate;
      background: rgb(22, 22, 22);
      border-color: #393;
      box-shadow: 0 0 5px #00ff0033, inset 0 0 5px #00ff001a, 0 2px 0 #000;
      color: #efe;
      outline: none;
    }

    .usid:focus::-webkit-input-placeholder {
      color: #efe;
      font-size: 14px;
    }

    .button {
      background: linear-gradient(#333, #222);
      box-sizing: border-box;
      border: 2px solid #000;
      box-shadow: 0 2px 0 #000;
      color: #efe;
      display: block;
      margin: 10px auto;
      text-align: center;
      padding: 14px 40px;
      border-radius: 24px;
      cursor: pointer;
      position: relative;
      top: 50px;
      text-transform: uppercase;
    }

    .button:hover,
    .button:focus {
      animation: glow 800ms ease-out infinite alternate;
      outline: none;
    }

    @keyframes glow {
      0% {
        border-color: white;
        box-shadow: 0 0 5px white, inset 0 0 5px white, 0 2px 0 #000;
      }

      100% {
        border-color: #000;
        box-shadow: 0 0 20px rgb(121, 110, 110), inset 0 0 10px black, 0 2px 0 #000;
      }
    }


    .box {
      width: 450px;
      height: 80vh;
      background: lightgray;
      border: 1px solid rgb(44, 44, 43);
      border-radius: 5px;
      box-shadow: -2px -2px 2px #ffffff0d,
        5px 5px 5px #000000a6,
        5px 5px 5px #000000a6,
        15px 15px 15px #000000a6,
        10px 10px 10px #000000a6;
      margin-left: 27%;
      margin-top: 50px;
      text-align: center;
      position: relative;
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

  <!-- <nav class="navbar navbar-inverse visible-xs">
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
          <li class="active"><a href="customer_panel.php">Dashboard</a></li>
          <li><a href="customer_dataview.php">customer details</a></li>
          <li><a href="#">order</a></li>
          <li><a href="#">stock</a></li>
          <li><a href="customer_update.php">edit profile</a></li>
        </ul>
      </div>
    </div>
  </nav> -->

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav hidden-xs">
        <img src="images/admin.png" alt="" class="admin-logo">
        <ul class="nav nav-pills nav-stacked" id="dash-details">
          <li class="active"><a href="customer_panel.php">Dashboard</a></li>
          <li><a href="customer-dataview.php">update details </a></li>
          <li><a href="change_password.php">change password</a></li>
          <li><a href="add_to_cart.php">Wish List</a></li>
          <li><a href="home.php">home</a></li>
          <li><a href="logout.php">log out</a></li>
        </ul><br>
      </div>
      <br>

      <div class="col-sm-9">
        <?php
        $username = $_SESSION['username'];
        $con = mysqli_connect("localhost", "root", "", "optical");
        $query = "SELECT * FROM tbl_customer_details where name='$username'";
        $result = mysqli_query($con, $query);

        echo '<form class="box" method="post">';
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<input type="text" name="name" class="usid" value="' . $row['name'] . '">';
          echo '<input type="text" name="email" class="usid" value="' . $row['email'] . '">';
          echo '<input type="number" name="contact_no" class="usid" value="' . $row['contactno'] . '">';
          echo '<input type="text" name="city"  class="usid" value="surat">';
          echo '<input type="text" name="address" class="usid" value="' . $row['address'] . '">';
          echo '<input type = "submit" value="update" name="submit" class="button">';
        }
        echo '</form>';
        ?>

      </div>
    </div>
  </div>

</body>

</html>
<?php
}
else{
  echo '<script>location.href = "home.php";</script>';
}
?>