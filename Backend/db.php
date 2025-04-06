<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require('vendor/autoload.php');

require('/xampp1/htdocs/smit/PHPMailer.php');
require('/xampp1/htdocs/smit/Exception.php');
require('/xampp1/htdocs/smit/SMTP.php');


$db = 'optical';
$user = 'root';
$pass = 'root';

$dsn = "mysql:host=localhost;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
    echo "Connected Failed: " . $e->getMessage();
}

function getHeaderData($pdo, $tabledata)
{
    $stmt = $pdo->prepare("SELECT * FROM $tabledata");
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

function login($pdo, $username, $password)
{
    $stmt = $pdo->prepare("select * from tbl_admin where email = :a and password = :b");
    $stmt->bindParam(':a', $username);
    $stmt->bindParam(':b', $password);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_SESSION['admin'] = $username;
        echo "<script>alert('welcome admin!')</script>";
        echo "<script>location.href = '/smit/admin-panel.php';</script>";
    } else {
        $stmt = $pdo->prepare("select * from tbl_register where username = :a and password = :b");
        $stmt->bindParam(':a', $username);
        $stmt->bindParam(':b', $password);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            echo "<script>alert('welcome $username!')</script>";
            echo "<script>location.href = '/smit/home.php';</script>";
        } else {
            echo "<script>alert('Invalid username or password!!!')</script>";
        }
    }
}

function Registration($pdo)
{
    $name = $_POST['name'];
    $stmt = $pdo->prepare("SELECT * FROM tbl_register WHERE username = :a");
    $stmt->bindParam(':a', $name);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo "<script> alert('Usename Is Already Avaliable !') </script>";
        echo "<script> location.href = 'registration.php'; </script>";
    }

    if (empty($_POST["name"])) {
        echo "<script> alert('Userame required !') </script>";
        echo "<script> location.href = 'registration.php'; </script>";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo "<script> alert('Only alphabet allowed!') </script>";
            echo "<script> location.href = 'registration.php'; </script>";
        }
    }

    //Email Validation   
    if (empty($_POST["email"])) {
        echo "<script> alert('Email required!') </script>";
        echo "<script> location.href = 'registration.php'; </script>";
    } else {
        $email = ($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script> alert('wrong format !') </script>";
            echo "<script> location.href = 'registration.php'; </script>";
        }
    }

    //pass and cpass should match
    $password = $_POST['password'];
    $confirmPassword = $_POST['cpassword'];
    if (empty($password) || $password != $confirmPassword) {
        echo "<script> alert('Passwords do not match!') </script>";
        echo "<script> location.href = 'registration.php'; </script>";
        return;
    }

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 7) {
        echo "<script> alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
        echo "<script> location.href = 'registration.php'; </script>";
    }

    $_SESSION['uname'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['confirm_pass'] = $_POST['cpassword'];


    $stmt = $pdo->prepare("select * from tbl_register where email = :a");
    $stmt->bindParam(('a'), $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo "<script> alert('Email is already registered!') </script>";
        echo "<script> location.href = 'registration.php'; </script>";
    }

    $otp = rand(1000, 9999);
    $_SESSION['otp'] = $otp;
    $to = $_POST["email"];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP(); //Send using SMTP

        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'visionshop02062@gmail.com'; // enter your mail address
        $mail->Password = 'xjkxebfavwikhleq';   // enter your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('visionshop02062@gmail.com', 'Registration-Vision');

        $mail->addAddress($to);


        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Clear Your Vision';
        $mail->Body = 'otp is ' . $otp;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "<script> alert('otp sent successfully!'); </script>";
        echo "<script> location.href = 'otp.php'; </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "<script> alert('Wrong Otp Please Fill up Detailes again !'); </script>";
    }
}

function CustomerDetails($pdo, $name, $email, $contact_no, $address, $uname, $semail)
{
    //name validation
    if (empty($name)) {
        $nameErr = "Name is required";
        echo "<script> alert('name is required !'); </script>";
    } else {
        // check if name only contains letters and whitespace  
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only alphabets and white space are allowed";
        }
    }

    if ($nameErr == null) {
        if ($uname == $name) {
            if ($email == $semail) {
                $stmt = $pdo->prepare("insert into tbl_customer_details (name, email, contactno, city, address) values (:a, :b, :c, :d, :e)");
                $stmt->bindParam(':a', $name);
                $stmt->bindParam(':b', $email);
                $stmt->bindParam(':c', $contact_no);
                $stmt->bindParam(':d', 'surat');
                $stmt->bindParam(':e', $address);
                $stmt->execute();
                echo "<script> alert('Registration Successfully !'); </script>";
                echo "<script> location.href='login.php' </script>";
            } else {
                echo "<script> alert('please enter register email !'); </script>";
            }
        } else {
            echo "<script> alert('please enter register username !'); </script>";
        }
    }
}

function ProductCard($result)
{
    echo '<form class="box" method="get">';
    $counter = 0;
    foreach ($result as $row) {

        if ($counter % 3 == 0) {
            echo '</div>';
            echo '<div class="product">';
        }

        echo '<div class="el-wrapper">';
        if ($row['quantity'] == 0) {
            echo '<span class="no_stock">';
        }
        echo '<div class="box-up">';
        echo '<img class="img" src="uploads_img/' . $row['photo'] . ' "alt="">';
        echo '<div class="img-info">';
        echo '<div class="info-inner">';
        echo '<span class="p-name">' . $row['product_name'] . '</span>';
        echo '<span class="p-company">' . $row['company'] . '</span>';
        echo '</div>';
        echo '<div class="a-size">Available For : <span class="size">' . $row['size'] . '</span></div>';
        echo '<div class="a-frame">Frame shape : <span class="frame">' . $row['frame'] . '</span></div>';
        echo '</div>';
        echo '</div>';

        echo '<div class="box-down">';
        echo '<div class="h-bg">';
        echo '<div class="h-bg-inner"></div>';
        echo '</div>';
        if ($row['quantity'] > 0) {
            echo '<a class="cart" href="/smit/add_to_cart.php?product_id=' . urlencode($row['product_id']) . '">';
            echo '<span class="price">₹ ' . $row['prize'] . '</span>';
            echo '<span class="add-to-cart">';
            echo '<span class="txt">Add in cart</span>';
            echo '</span>';
            echo '</a>';
        } else {
            echo '<span class="out_stock">product out of stock</span>';
        }
        echo '</span>';
        echo '</div>';
        echo '</div>';

        $counter++;
    }
    echo '</form>';
}

function BrandProduct($pdo, $category, $brandname)
{
    $stmt = $pdo->prepare("select * from tbl_category_product where category = :a and company = :b");
    $stmt->bindParam(':a', $category);
    $stmt->bindParam(':b', $brandname);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (empty($result)) {
        echo '<h2 class="notfound">Product is not available!</h2>';
    } else {
        ProductCard($result);
    }
    return $result;
}

function CategoryProduct($pdo, $category)
{
    $stmt = $pdo->prepare("select * from tbl_category_product where category = :a");
    $stmt->bindParam(':a', $category);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (empty($result)) {
        echo '<h2 class="notfound">Product is not available!</h2>';
    } else {
        ProductCard($result);
    }
    return $result;
}

function FrameProduct($pdo, $frame)
{
    $stmt = $pdo->prepare("select * from tbl_category_product where frame = :a");
    $stmt->bindParam(':a', $frame);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (empty($result)) {
        echo '<h2 class="notfound">Product is not available!</h2>';
    } else {
        ProductCard($result);
    }
    return $result;
}

function GlassProduct($pdo, $glass)
{
    $stmt = $pdo->prepare("select * from tbl_category_product where glasses = :a");
    $stmt->bindParam(':a', $glass);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (empty($result)) {
        echo '<h2 class="notfound">Product is not available!</h2>';
    } else {
        ProductCard($result);
    }
    return $result;
}

function AddItemInCart($pdo, $pid)
{
    $customer_name = $_SESSION['username'];

    if (!$customer_name) {
        echo '<script>
    if(confirm("you want to login!") == true){
        location.href = "/smit/login.php";
    }
    else{
        location.href = "/smit/home.php";
    }
    ;</script>';
        exit;
    }

    $stmt = $pdo->prepare("select * from tbl_add_to_cart where product_id = :a and customer_name = :b");
    $stmt->bindParam(':a', $pid);
    $stmt->bindParam(':b', $customer_name);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo "<script> alert('Product is already in cart!') </script>";
        echo "<script> location.href = 'home.php'; </script>";
    }

    $stmt = $pdo->prepare("INSERT INTO tbl_add_to_cart (product_name, product_prize, product_photo, product_company, product_size, product_category, product_id, customer_name, product_quantity, total_prize)
                       SELECT product_name, prize, photo, company, size, category, product_id, '$customer_name', 1, prize
                       FROM tbl_category_product WHERE product_id = '$pid'");
    $stmt->execute();
    echo "<script> alert('Product added in cart!') </script>";
    echo '<script>location.href = "add_to_cart.php";</script>';
}

function DisplayCartItem($pdo, $customer_name)
{
    $stmt = $pdo->prepare("select * from tbl_add_to_cart where customer_name = :a");
    $stmt->bindParam(':a', $customer_name);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (empty($result)) {
        echo '<h2 class="notfound">Cart is Empty!</h2>';
    }
    return $result;
}

function RemoveOutOfStockItemFromCart($pdo, $row)
{
    $stmt = $pdo->prepare("SELECT `quantity` FROM `tbl_category_product` WHERE `product_name` = :a");
    $stmt->bindParam(':a', $row['product_name']);
    $stmt->execute();
    $quantity = $stmt->fetch(PDO::FETCH_ASSOC);
    $max_quantity = $quantity['quantity'];

    if ($max_quantity <= 0) {
        $stmt = $pdo->prepare("DELETE FROM `tbl_add_to_cart` WHERE `product_name` = :a");
        $stmt->bindParam(':a', $row['product_name']);
        $stmt->execute();
        echo "<script> alert('Remove from cart out of stock item {$row['product_name']}');</script>";
        echo "<script> location.href = 'add_to_cart.php'; </script>";
    }
}

function OrderAddressData($pdo, $username)
{
    $stmt = $pdo->prepare("select * from `tbl_customer_details` where `name` = :a");
    $stmt->bindParam(':a', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function ConfirmOrder($pdo, $payable_amount)
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state =  $_POST['state'];
    $country = $_POST['country'];
    $order_address = $address . ',' . $city . ',' . $state . ',' . $country;

    $stmt = $pdo->prepare("INSERT INTO `tbl_order`(`amount`, `cust_name`, `cust_email`, `cust_mobile`, `status` ,`place_order`, `order_date` , `order_address` ) VALUES (:a,:b,:c,:d,'incomplete','placed',:g, :h)");
    $stmt->bindParam(':a', $payable_amount);
    $stmt->bindParam(':b', $name);
    $stmt->bindParam(':c', $email);
    $stmt->bindParam(':d', $contactno);
    $stmt->bindParam(':g', date('Y-m-d'));
    $stmt->bindParam(':h', $order_address);
    $stmt->execute();
    $order_id = $pdo->lastInsertId();
    $_SESSION['order_id'] = $order_id;

    $stmt = $pdo->prepare("SELECT product_name, product_quantity, product_prize , product_photo , product_company , product_size FROM tbl_add_to_cart WHERE customer_name = :a");
    $stmt->bindParam(':a', $name);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $product) {

        while ($product['product_quantity'] <= 0) {
            echo "<script> alert('Product is out of stock!') </script>";
            exit();
            echo '<script>location.href = "add_to_cart.php";</script>';
        }

        $stmt = $pdo->prepare("INSERT INTO `tbl_order_details` (`order_id`, `product_name`, `quantity`, `price`, `size` ,`company`, `photo`) VALUES (:a, :b, :c, :d ,:e , :f , :g)");
        $stmt->bindParam(':a', $order_id);
        $stmt->bindParam(':b', $product['product_name']);
        $stmt->bindParam(':c', $product['product_quantity']);
        $stmt->bindParam(':d', $product['product_prize']);
        $stmt->bindParam(':e', $product['product_size']);
        $stmt->bindParam(':f', $product['product_company']);
        $stmt->bindParam(':g', $product['product_photo']);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo '<script>alert("Insert error: ' . mysqli_error($pdo) . '");</script>';
            exit();
        }
    }
}

function UpdateStockAfterOrder($pdo)
{
    $order_id = $_SESSION['order_id'];
    $stmt = $pdo->prepare("select * from `tbl_order_details` where `order_id` = :a");
    $stmt->bindParam(':a', $order_id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $minus_quantity = $row['quantity'];
        $pname = $row['product_name'];

        $stmt = $pdo->prepare("update `tbl_category_product` set `quantity` = `quantity` - :a where `product_name` = :b");
        $stmt->bindParam(':a', $minus_quantity);
        $stmt->bindParam(':b', $pname);
        if ($stmt->execute()) {
            echo '<script>alert("success");</script>';
            echo '<script>location.href = "order_payment.php";</script>';
        }
    }
}

function PaymentSuccess($pdo)
{
    $method = $_SESSION['payment_method'];
    $order_id = $_SESSION['order_id'];

    $stmt = $pdo->prepare("UPDATE `tbl_order` SET `status`='complete' WHERE `OID` = :a");
    $stmt->bindParam(':a', $order_id);
    $stmt->execute();

    $stmt = $pdo->prepare("select * from `tbl_order` WHERE `OID` = :a");
    $stmt->bindParam(':a', $order_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $name = $result['cust_name'];
    $email = $result['cust_email'];
    $contactno = $result['cust_mobile'];
    $amount = $result['amount'];

    if ($method == 'COD') {
        $query = "INSERT INTO `tbl_payment`(`cust_name`, `cust_email`, `cust_contact`, `p_status`, `p_method`, `amount`,`order_id`) VALUES (:a,:b,:c,'incomplete',:e,:f,:g)";
    } else {
        $query = "INSERT INTO `tbl_payment`(`cust_name`, `cust_email`, `cust_contact`, `p_status`, `p_method`, `amount`,`order_id`) VALUES (:a,:b,:c,'complete',:e,:f,:g)";
    }

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':a', $name);
    $stmt->bindParam(':b', $email);
    $stmt->bindParam(':c', $contactno);
    $stmt->bindParam(':e', $method);
    $stmt->bindParam(':f', $amount);
    $stmt->bindParam(':g', $order_id);
    if ($stmt->execute()) {
?>
        <script>
            Swal.fire(
                'success!',
                'payment successfully',
                'success'
            ).then(function() {
                window.location.href = 'my_order.php';
            });
        </script>
<?php
        exit();
    } else {
        echo '<script>alert("payment failed");</script>';
    }
}

?>