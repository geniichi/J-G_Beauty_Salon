<?php

include("./connect.php");


$cart_ID = $_POST["cart_ID"];


if(isset($_POST["Update"])){
    $customer_ID = $_POST["customer_ID"];
    $selectedIDs = $_POST['selected_product_ids'];
    $updatedProductIds = explode(",", $selectedIDs);

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $contact = $_POST["contact_No"];
    $address = $_POST["address"];

    $sql = "UPDATE customer SET first_name = '$first_name', last_name = '$last_name', contact_No = '$contact', address = '$address' WHERE customer_ID = $customer_ID";
    mysqli_query($conn, $sql);

    if(!empty($_POST["custom_payment"])){
        $payment_method = $_POST["custom_payment"];
    } else if (isset($_POST["payment_method"])){
        $payment_method = $_POST["payment_method"];
    }
    $delivery_date = $_POST["delivery_date"];
    $total_price = $_POST["total_price"];

    $sql = "UPDATE cart SET payment_option = '$payment_method', delivery_date = '$delivery_date', price = '$total_price' WHERE cart_ID = $cart_ID";
    mysqli_query($conn, $sql);


    $sql = "SELECT product_ID FROM `order` WHERE cart_ID = $cart_ID";
    $result = mysqli_query($conn, $sql);
    $currentProduct_IDs = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $currentProduct_IDs[] = $row["product_ID"];
    }

    foreach ($currentProduct_IDs as $mainProduct_ID) {
        if(!in_array($mainProduct_ID, $updatedProductIds)){
            $sql = "DELETE FROM `order` WHERE cart_ID = $cart_ID AND product_ID = $mainProduct_ID";
            mysqli_query($conn, $sql);
        }
    }

    if(!empty($updatedProductIds)){
        foreach ($updatedProductIds as $product_id) { // from updated(array => single)
            echo $product_id;
            if(!in_array($product_id, $currentProduct_IDs)){
                echo $sql = "INSERT INTO `order` (cart_ID, product_ID) VALUES($cart_ID, $product_id)";
                mysqli_query($conn, $sql);
            }
        }
    }


    header("Location: ../frontend/pages/changeOrder.php?cart_ID=$cart_ID");

} else if(isset($_POST["Delete"])){

    $sql = "UPDATE cart SET status = 'done' WHERE cart_ID = $cart_ID";
    mysqli_query($conn, $sql);


    header("Location: ../frontend/pages/orders.php");
}
