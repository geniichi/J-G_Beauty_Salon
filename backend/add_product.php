<?php

include("./connect.php");

if(isset($_POST['Add'])){
    $name = $_POST["product_name"];
    $supplier = $_POST["supplier"];
    $productClass = $_POST["productClass"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $serial_number = $_POST["serial_number"];
    $location = $_POST["location"];

    $file_name = $_FILES['image']['name'];
    $file_name;
    $tempname = $_FILES['image']['tmp_name'];
    $folder = '../frontend/images/'.$file_name;

    $sql = "
        INSERT INTO inventoryItem(serial_Id, product_name, supplier_ID, productClass_ID, quantity, price, description, image_path, location)
        VALUES('$serial_number', '$name', $supplier, $productClass, $quantity, $price, '$description', '$file_name', '$location')
        ";

    mysqli_query($conn, $sql);

    if(move_uploaded_file($tempname, $folder)) {
        echo "<h2>File uploaded successfully</h2>";
    } else {
        echo "<h2>File not uploaded</h2>";
    }

    mysqli_close($conn);

    header("Location: ../frontend/pages/inventory.php");
}
