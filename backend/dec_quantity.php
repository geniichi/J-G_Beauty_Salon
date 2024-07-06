<?php
include("./connect.php");

$staff_ID = $_POST['staff_ID'];
$quantity_deduc = $_POST['quantity_amount'];
$product_ID = $_POST['product_ID'];
$reason = $_POST["reason"];

echo $staff_ID . "<br>";
echo $quantity_deduc . "<br>";
echo $product_ID . "<br>";
echo $reason . "<br>";


$sql = "UPDATE inventoryItem
        SET quantity = (SELECT quantity FROM inventoryItem WHERE product_ID = $product_ID) - $quantity_deduc
        WHERE product_ID = $product_ID
        ";

mysqli_query($conn, $sql);

$sql = "INSERT INTO inventoryitemlog(product_ID, staff_ID, reason_of_usage, amount_changed, status)
        VALUES ($product_ID, $staff_ID, '$reason', $quantity_deduc, 'Deducted')";

mysqli_query($conn, $sql);

header("Location: ../frontend/pages/singleProduct.php?product_ID=" . $product_ID);
