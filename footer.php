
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <title>footer</title>
  <style>
    .footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #302f49;
        padding: 40px 80px;
        }

        .footer .copy {
        color: #fff;
        }

        .bottom-links {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 40px 0;
        }

        .bottom-links .links {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 0 40px;
        }

        .bottom-links .links span {
        font-size: 20px;
        color: #fff;
        text-transform: uppercase;
        margin: 10px 0;
        }

        .bottom-links .links a {
        text-decoration: none;
        color: #a1a1a1;
        padding: 10px 20px;
        }
  </style>
</head>
<body>
    <footer class="footer">
        <div class="copy">&copy; online optical</div>
        <div class="bottom-links">
            <div class="links">
            <span>More Info</span>
            <a href="home.php">Home</a>
            <a href="#">About</a>
            <a href="contact.php">Contact</a>
            </div>
            <div class="links">
            <span>Social Links</span>
            <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>