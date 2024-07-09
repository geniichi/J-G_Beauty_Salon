<?php
    include("./connect.php");

    $ID = $_POST["product_ID"];

    if(isset($_POST["update"])){

        $file_name = $_FILES['image']['name'];
        $file_name;
        $tempname = $_FILES['image']['tmp_name'];
        $folder = '../frontend/images/'.$file_name;

        $name = $_POST["product_name"];
        $supplier = $_POST["supplier"];
        $class = $_POST["productClass"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $description = $_POST["description"];

        $sql = "UPDATE inventoryItem SET product_name = '$name', supplier_ID = $supplier, productClass_ID = $class, quantity = $quantity, price = $price, description = '$description',
        image_path = '$file_name' WHERE product_ID = $ID";

        mysqli_query($conn, $sql);

        mysqli_close($conn);

        header("Location: ../frontend/pages/singleProduct.php?product_ID=" . $ID);


    } else if(isset($_POST["delete"])){
        $sql = "DELETE FROM inventoryItem WHERE product_ID = $ID";

        mysqli_query($conn, $sql);

        mysqli_close($conn);

        header("Location: ../frontend/pages/inventory.php");
    }

    // echo $sql;
    mysqli_query($conn, $sql);

    mysqli_close($conn);

    header("Location: ../frontend/pages/singleProduct.php?product_ID=" . $ID);

?>
