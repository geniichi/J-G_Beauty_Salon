<?php
include("./connect.php");
$link = $_POST["link_redirect"];

if(isset($_POST["add_path"])){
    if(empty($_POST["addClass_name"])){
        if($link == 1){
            header("Location: ../frontend/pages/addProduct.php?productClass_active=1");
        } else if($link == 2){
            $product_ID = $_POST["product_ID"];
            header("Location: ../frontend/pages/singleProduct.php?product_ID=" . $product_ID . "&productClass_active=1");
        }
    } else {
        $name = $_POST["addClass_name"];

        $sql = "INSERT INTO productclass(name) VALUES ('$name')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);

        if($link == 1){
            header("Location: ../frontend/pages/addProduct.php?productClass_active=1");
        } else if($link == 2){
            $product_ID = $_POST["product_ID"];
            header("Location: ../frontend/pages/singleProduct.php?product_ID=" . $product_ID . "&productClass_active=1");
        }
    }
}
if(isset($_POST["update_path"])){
    $name = $_POST["updateProductClass"];
    $ID = $_POST["update_ID"];

    $sql = "UPDATE productclass SET name = '$name' WHERE class_ID = $ID";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    if($link == 1){
        header("Location: ../frontend/pages/addProduct.php?productClass_active=1");
    } else if($link == 2){
        $product_ID = $_POST["product_ID"];
        header("Location: ../frontend/pages/singleProduct.php?product_ID=" . $product_ID . "&productClass_active=1");
    }
}
if(isset($_POST["delete_path"])){
    $ID = $_POST["delete_ID"];

    echo $sql = "DELETE FROM productclass WHERE class_ID = $ID";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    if($link == 1){
        header("Location: ../frontend/pages/addProduct.php?productClass_active=1");
    } else if($link == 2){
        $product_ID = $_POST["product_ID"];
        header("Location: ../frontend/pages/singleProduct.php?product_ID=" . $product_ID . "&productClass_active=1");
    }
}
