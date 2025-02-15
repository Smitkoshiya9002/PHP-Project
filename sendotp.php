<?php

session_start();

// include 'config.php';
include 'mail_config.php';

$email = $_POST["email"];

//     $qry = "SELECT * FROM users WHERE email = '$email'";
//     $num = mysqli_num_rows(mysqli_query($con , $qry));

//     if ($num != 1) {
//       echo "10";
//       exit();
//   }
  
  // Generate a random 6-digit OTP
  $otp = rand(100000, 999999);
  
  // Send the OTP to the user's email
  $to = $_POST["email"];
  $subject = "Sign Up Verification";
  $message = "<b>Your OTP $otp</b>";
  
  $mail->addAddress($to);
  $mail->isHTML(true);
  $mail->Subject = $subject;
//   $mail->Body = "$message";
  $mail->Body = "
      <html>
      <head>
          <style>
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding-top: 5px;
            background-color: #000;
            border-radius: 5px;
            box-shadow: 0px 5px 8px rgba(0, 0, 0, 0.7);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1{
            color: white;
        }
        hr{
          background-color: #fff;
          border: none;
          width: 100%;
          height: 1px;
        }
        .otp-code {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            color: #f00028;
            margin-bottom: 40px;
        }
        .instructions {
            text-align: center;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
        }
        .footer {
            background-color: #faec2f;
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 12px;
            margin-top: 40px;
            

        }
          </style>
      </head>
      <body>
          <div class='container'>
              <div class='header'>
                  <h1>OTP Verification</h1>
                </div>
                <hr>
                <div class='instructions'>
                    <p>Please Use The OTP To Register</p>
                </div>
              <div class='otp-code'>
                  $message
              </div>
              <div class='footer'>
                &copy; 2023 Shoes Shop Management System. All rights reserved
              </div>
          </div>
      </body>
      </html>
  ";
  $mail->AltBody = 'Body in plain text for non-HTML mail clients';
  
  try {
      // Send the email
      $mail->send();
  
    //   $user_mail = mysqli_real_escape_string($con, $to);
  
    //   // Store the OTP in the database
    //   $qry = "DELETE FROM otps WHERE email = '$user_mail'";
    //   mysqli_query($con, $qry);
  
    //   $qry = "INSERT INTO otps (email, otp) VALUES ('$user_mail', $otp)";
    //   mysqli_query($con, $qry);
  } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
  }
  
  // Store the email in session for further processing
  $_SESSION['temp_mail'] = $to;
  ?>