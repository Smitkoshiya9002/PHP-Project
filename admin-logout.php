<?php
session_start();
unset($_SESSION['admin']);

echo '<script>alert("logout admin!");</script>';
echo "<script> location.href='login.php' </script>";
?>