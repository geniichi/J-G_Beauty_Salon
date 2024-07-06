<?php
    if(!isset($_COOKIE["username"])){
        header("Location: ../pages/login.php");
    }

    include("../components/header.php");
    include("../../backend/connect.php");

    if(isset($_GET['product_ID'])){
        $product_ID = $_GET['product_ID'];
        $sql = "SELECT * FROM inventoryItem WHERE product_ID = $product_ID";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $staff_ID = $_COOKIE["staff_ID"];
    } else {
        header("Location: ../pages/inventory.php");
    }

?>

<style>
    <?php include("../CSS/singleProduct.css")?>
</style>


<main>
    <?php include("../components/side_navbar.php");?>
    <div>
        <div id="product_overview_shadow">

        </div>
        <div id="product_overview">
            <div id="product-img-holder">
                <img src="<?php echo "../images/" .$row["image_path"]; ?>" alt="<?php echo $row["product_name"]; ?>">
            </div>
            <div>
                <div>
                    <h2>ID#<?php echo $row["product_ID"]; ?></h2>
                    <h1><?php echo $row["product_name"] ?></h1>
                </div>
                <p><strong>Quantity: </strong><?php echo $row["quantity"]; ?></p>
                <p><strong>Price: </strong><?php echo $row["price"]; ?></p>
                <p><strong>Description: </strong></p>
                <p><?php echo $row["description"]; ?></p>

                <div>
                    <form action="../../backend/dec_quantity.php" method="POST" id="dec_form" class="ProductForm">
                        <input type="hidden" name="staff_ID" value="<?php echo $staff_ID ?>">
                        <div>
                            <label for="quantity_amount">Amount of quantity</label>
                            <input type="number" name="quantity_amount" value="1">
                        </div>
                        <div>
                            <label for="reason">Reason</label>
                            <textarea name="reason"></textarea>
                        </div>
                        <button type="submit" name="product_ID" value="<?php echo $product_ID ?>">take</button>
                    </form>

                    <form action="../../backend/inc_quantity.php" method="POST" id="inc_form" class="ProductForm">
                        <input type="hidden" name="staff_ID" value="<?php echo $staff_ID ?>">
                        <div>
                            <label for="quantity_amount">Amount of quantity</label>
                            <input type="number" name="quantity_amount" value="1">
                        </div>
                        <div>
                            <label for="reason">Reason</label>
                            <textarea name="reason"></textarea>
                        </div>
                        <button type="submit" name="product_ID" value="<?php echo $product_ID ?>">return</button>
                    </form>
                </div>
            </div>
        </div>
        <?php include("./inventoryLog.php"); ?>
    </div>
</main>

<?php

include("../components/footer.php");

?>
