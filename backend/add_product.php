<?php

include("./connect.php");

if(isset($_POST['Add'])){
    $name = $_POST["product_name"];
    $supplier = $_POST["supplier"];
    $productClass = $_POST["productClass"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    $file_name = $_FILES['image']['name'];
    $file_name;
    $tempname = $_FILES['image']['tmp_name'];
    $folder = '../frontend/images/'.$file_name;

    $sql = "
        INSERT INTO inventoryItem(product_name, supplier_ID, productClass_ID, quantity, price, description, image_path)
        VALUES('$name', $supplier, $productClass, $quantity, $price, '$description', '$file_name')
        ";

    mysqli_query($conn, $sql);

    if(move_uploaded_file($tempname, $folder)) {
        echo "<h2>File uploaded successfully</h2>";
    } else {
        echo "<h2>File not uploaded</h2>";
    }

    mysqli_close($conn);
}
