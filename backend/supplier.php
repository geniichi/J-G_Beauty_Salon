<?php
include("./connect.php");


if(isset($_POST["add_path"])){
    if(empty($_POST["addSupplier_name"])){
        header("Location: ../frontend/pages/addProduct.php");
    } else {
        $name = $_POST["addSupplier_name"];
        $number = $_POST["contact"];

        $sql = "INSERT INTO supplier(name, contact) VALUES ('$name', '$number')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location: ../frontend/pages/addProduct.php?supplier_active=1");
    }
}
if(isset($_POST["update_path"])){
    $name = $_POST["updateSupplier_name"];
    $number = $_POST["contact"];
    $ID = $_POST["update_ID"];

    $sql = "UPDATE supplier SET name = '$name', contact= '$number' WHERE supplier_ID = $ID";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: ../frontend/pages/addProduct.php?supplier_active=1");
}
if(isset($_POST["delete_path"])){
    $ID = $_POST["delete_ID"];

    echo $sql = "DELETE FROM supplier WHERE supplier_ID = $ID";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: ../frontend/pages/addProduct.php?supplier_active=1");
}
