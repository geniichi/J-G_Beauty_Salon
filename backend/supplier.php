<?php
include("./connect.php");

$link = $_POST["link_redirect"];


if(isset($_POST["add_path"])){
    if(empty($_POST["addSupplier_name"])){
        if($link == 1){
            header("Location: ../frontend/pages/addProduct.php?supplier_active=1");
        } else if($link == 2){
            $product_ID = $_POST["product_ID"];
            header("Location: ../frontend/pages/singleProduct.php?product_ID=" . $product_ID . "&supplier_active=1");
        }
    } else {
        $name = $_POST["addSupplier_name"];
        $number = $_POST["contact"];

        $sql = "INSERT INTO supplier(name, contact) VALUES ('$name', '$number')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);

        if($link == 1){
            header("Location: ../frontend/pages/addProduct.php?supplier_active=1");
        } else if($link == 2){
            $product_ID = $_POST["product_ID"];
            header("Location: ../frontend/pages/singleProduct.php?product_ID=" . $product_ID . "&supplier_active=1");
        }
    }
}
if(isset($_POST["update_path"])){
    $name = $_POST["updateSupplier_name"];
    $number = $_POST["contact"];
    $ID = $_POST["update_ID"];

    $sql = "UPDATE supplier SET name = '$name', contact= '$number' WHERE supplier_ID = $ID";

    mysqli_query($conn, $sql);
    mysqli_close($conn);

    if($link == 1){
        header("Location: ../frontend/pages/addProduct.php?supplier_active=1");
    } else if($link == 2){
        $product_ID = $_POST["product_ID"];
        header("Location: ../frontend/pages/singleProduct.php?product_ID=" . $product_ID . "&supplier_active=1");
    }
}
if(isset($_POST["delete_path"])){
    $ID = $_POST["delete_ID"];

    echo $sql = "DELETE FROM supplier WHERE supplier_ID = $ID";

    mysqli_query($conn, $sql);
    mysqli_close($conn);

    if($link == 1){
        header("Location: ../frontend/pages/addProduct.php?supplier_active=1");
    } else if($link == 2){
        $product_ID = $_POST["product_ID"];
        header("Location: ../frontend/pages/singleProduct.php?product_ID=" . $product_ID . "&supplier_active=1");
    }
}
