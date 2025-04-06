<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/Form.css">
</head>

<body>
    <form class="box" method="post" action="otp_forget.php">
        <h2>FORGOT PASSWORD</h2>
        <!-- <input type="text" placeholder="username" class="usid" required> -->
        <input type="email" name="email" placeholder="email" class="usid" required>
        <input type="submit" value="SEND OTP" name="submit" class="button">
        <!-- <a href="cpanel_login.php" class="change" >customer panel</a> -->
        <a href="login.php" class="login">login</a>
    </form>
</body>

</html>