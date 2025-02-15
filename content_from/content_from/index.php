<?php
use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require './PHPMailer/src/Exception.php';
  require './PHPMailer/src/PHPMailer.php';
  require './PHPMailer/src/SMTP.php';

  if (isset($_POST['send'])) {
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['number']);
    $message = htmlentities($_POST['message']);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'visionshop02062@gmail.com';
    $mail->Password = 'xjkxebfavwikhleq';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress('visionshop02062@gmail.com');
    $mail->Subject = (" [$email] === ($name)");
    $mail->Body = $message;
    $mail->send();

    header("Location: ./index.php?=email_sent!");
  }
 

?>
<html>
<head>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/allencasul/lonica@d9dbccfa5b0a4666760e4f72b28effa775c56857/css/cdn/lonica.css" integrity="sha256-E1S8yAbnRZ6uM4sA6NMSgTyoDsdK1ZCjBYF3lqXqv6Q=" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/1e8d61f212.js"></script>-->
  <link rel="stylesheet" type="text/css" href="fo.css"> 

    </head>
<body class="center-absolute">
  <!-- <form class="display-grid row-gap-1-rem" method="post">
    <input class="box-shadow-primary" name="name" type="text" placeholder="Name" autocomplete="off" required />
    <input class="box-shadow-primary" name="email" type="email" placeholder="Email" autocomplete="off" required />
    <input class="box-shadow-primary" name="subject" type="text" placeholder="Subject" autocomplete="off" required />
    <textarea class="box-shadow-primary" name="message" placeholder="Message..." required></textarea>
    <button type="submit" name="send">
      Send <i class="fa-solid fa-paper-plane color-white margin-left-1-rem"></i>
    </button>
  </form> -->

       <div class="title reveal">
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
  
      <!-- CONTACT FORM -->
		<div class="contact">
			<h3>E-mail Us</h3>

			<form id="contact-form"  method="post">
            
			<input type="text" placeholder="name" name="name" class="contact" require>
        <input type="email" placeholder="your email" name="email" class="contact" require>
        <input type="number" placeholder="your number" name="number" class="contact" require>
        <input type="text" placeholder="message" name="message" class="contact" require>
        <input type="submit" name="send" value="submit" class="btn">
    
			</form>	
      
			<!-- End #contact-form -->
		</div>
		<!-- End .contact -->

	</div>
	<!-- End .wrapper -->
</div>
<!-- End .container -->
</body>
</html>
