<?php
session_start();
$order_id = $_SESSION['order_id'];
$con = mysqli_connect("localhost", "root", "root", "optical");
require("fpdf.php");
$pdf = new FPDF();

$pdf->AddPage();

//header
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0, 10, 'Vision shop', 0, 1, 'C');
$pdf->Ln(20);

$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'Invoice', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Order ID: ' . $order_id, 0, 1, 'R');
$pdf->Ln(5);

$pdf->SetFillColor(173, 216, 230);  // Background color (Light Blue)
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(70, 10, 'Product Name', 1, 0, 'C', true);
$pdf->Cell(27, 10, 'Quantity', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Company', 1, 0, 'C', true);
$pdf->Cell(35, 10, 'Size', 1, 0, 'C', true);
$pdf->Cell(28, 10, 'Price', 1, 0, 'C', true);
$pdf->Ln();

//data
$pdf->SetFillColor(255, 255, 255);  // Reset background color to white

$pdf->SetFont('Arial', '', 8);

$query = "SELECT `order_id`, `product_name`, `quantity`, `price`, `size`, `company`, `photo` FROM `tbl_order_details` WHERE `order_id` = '$order_id'";
$result = mysqli_query($con, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cart[] = array(
            'orderid' => $row['order_id'],
            'name' => $row['product_name'],
            'quantity' => $row['quantity'],
            'price' => $row['price'],
            'company' => $row['company'],
            'size' => $row['size']
        );
    }
} else {
    echo "Error: " . mysqli_error($con);
}

foreach ($cart as $row) {
    $productTotal = $row['price'] * $row['quantity'];
    $pdf->Cell(70, 10, $row['name'], 1, 0, 'C');
    $pdf->Cell(27, 10, $row['quantity'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['company'], 1, 0, 'C');
    $pdf->Cell(35, 10, $row['size'], 1, 0, 'C');
    $pdf->Cell(28, 10, $row['price'], 1, 0, 'C');
    // $pdf->Cell(10, 10, $productTotal, 1, 0, 'C'); // Add the total price column
    $pdf->Ln();
}

// $total = array_sum(array_column($cart, $productTotal));

// $pdf->SetFont('Arial', 'B', 10);
// $pdf->Cell(162, 10, 'Total amount', 1, 0, 'C');
// $pdf->Cell(28, 10, $total, 1 , 0, 'C');
// $pdf->Ln(60);

$totalProductTotal = array_sum(array_map(function ($row) {
    return $row['price'] * $row['quantity'];
}, $cart));

$pdf->Cell(162, 10, 'Total Product Price : ', 1, 0, 'C');
$pdf->Cell(28, 10, $totalProductTotal, 1, 0, 'C');
$pdf->Ln(60); // Adjust the line spacing

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Thanks For Shopping', 0, 1, 'C');


$pdf->Output();
