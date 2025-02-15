<?php
if (isset($_POST['product_name'])) {
    $con = mysqli_connect("localhost", "root", "root", "optical");

    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);

    $delete = "DELETE FROM tbl_category_product WHERE product_name = '$product_name'";

    if (mysqli_query($con, $delete)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request";
}
?>
