<?php

include("./connect.php");

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$contact = $_POST["contact_No"];
$address = $_POST["address"];

$sql = "INSERT INTO customer (first_name, last_name, contact_No, address) VALUES ('$first_name', '$last_name', $contact, '$address')";
$result = mysqli_query($conn, $sql);

$sql = "SELECT customer_ID FROM customer WHERE first_name = '$first_name' AND last_name = '$last_name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$customer_ID = $row["customer_ID"];

if(isset($_POST["payment_method"])){
    $payment_method = $_POST["payment_method"];
} else if(isset($_POST["custom_payment"])){
    $payment_method = $_POST["custom_payment"];
}
$order_date = $_POST["order_date"];
$delivery_date = $_POST["delivery_date"];
$total_price = $_POST["total_price"];

$sql = "INSERT INTO cart (customer_ID, payment_option, order_date, delivery_date, price) VALUES ('$customer_ID', '$payment_method', '$order_date', '$delivery_date', '$total_price')";
$result = mysqli_query($conn, $sql);

$sql = "SELECT cart_ID FROM cart WHERE customer_ID = '$customer_ID' AND order_date = '$order_date'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$cart_ID = $row["cart_ID"];



if (isset($_POST['product']) && is_array($_POST['product'])) {
    $selectedProducts = $_POST['product']; // This will be an array of selected product IDs

    foreach ($selectedProducts as $productId) {
        $sql = "INSERT INTO `order` (cart_ID, product_ID) VALUES ('$cart_ID', '$productId')";
        $result = mysqli_query($conn, $sql);
    }
} else {
    echo "No products selected.";
}

header("Location: ../frontend/pages/orders.php");
