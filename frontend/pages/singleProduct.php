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
        $image_path = $row["image_path"];
        $name = $row["product_name"];
        $supplier = $row["supplier_ID"];
        $class = $row["productClass_ID"];
        $quantity = $row["quantity"];
        $price = $row["price"];
        $description = $row["description"];

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
        <form action="../../backend/single_product.php" method="POST" enctype="multipart/form-data" id="ProductForm_main">
            <div>
                <p>Image Preview</p>
                <div id="img-uploader">
                    <input type="file" id="file-input" accept="image/*" name="image" onchange="changeImage(event)" <?php echo empty($image_path) ? 'required' : ''; ?>>
                    <label for="file-input">
                        <?php if (!empty($image_path)): ?>
                            <img src="../images/<?php echo $image_path; ?>" alt="Current Image" style="max-width: 100%; max-height: 100%;" id="img-showcase">
                        <?php else: ?>
                            <p id="empty-image">No Image</span>
                        <?php endif; ?>
                    </label>
                </div>
            </div>

            <div>
                <!-- Product Name -->
                <input type="text" name="product_name" placeholder="Enter Product Name" value="<?php echo $name; ?>">
                <!-- Supplier -->
                <div>
                    <select name="supplier" required>
                        <option value="" disabled>Select Supplier</option>
                        <?php
                            include("../../backend/connect.php");
                            $sql = "SELECT supplier_ID, name FROM supplier";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $selected = ($row["supplier_ID"] == $supplier) ? 'selected' : '';
                                echo '
                                    <option value="' . $row["supplier_ID"] . '" ' . $selected . '>' . $row["name"] . '</option>
                                ';
                            }
                            mysqli_close($conn);
                        ?>
                    </select>
                    <p onclick='open_supplierForm2(<?php echo $product_ID; ?>)'>
                        <span class="material-symbols-outlined">
                            add
                        </span>
                        Add Supplier
                    </p>
                </div>
                <!-- Product class -->
                <div>
                    <select name="productClass" required>
                        <option value="" disabled>Select Product Class</option>
                        <?php
                            include("../../backend/connect.php");
                            $sql = "SELECT * FROM productclass";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $selected = ($row["class_ID"] == $class) ? 'selected' : '';
                                echo '
                                    <option value="' . $row["class_ID"] . '" ' . $selected . '>' . $row["name"] . '</option>
                                ';
                            }
                            mysqli_close($conn);
                        ?>
                    </select>
                    <p onclick='open_productClass_form2(<?php echo $product_ID; ?>)'>
                        <span class="material-symbols-outlined">
                            add
                        </span>
                        Add Product Class
                    </p>
                </div>
                <!-- Others -->
                <div>
                    <input type="number" name="quantity" placeholder="Input quantity" value="<?php echo $quantity; ?>" required>
                    <input type="number" name="price" placeholder="Input price" value="<?php echo $price; ?>" required>
                </div>
                <textarea name="description" placeholder="Input description" required><?php echo $description; ?></textarea>
                <input type="hidden" name="product_ID" value="<?php echo $_GET['product_ID']; ?>">
                <div>
                    <input type="submit" name="update" value="Update">
                    <input type="submit" name="delete" value="Delete">
                </div>
            </div>
        </form>
        <?php
            include("./supplier.php");
            include("./productClass.php");
        ?>
        <div>
            <form action="../../backend/change_quantity.php" method="POST" id="Quantity_form">
                <input type="hidden" name="staff_ID" value="<?php echo $staff_ID ?>">
                <div>
                    <div>
                        <label for="quantity_amount">Quantity: </label>
                        <input type="number" name="quantity_amount" value="1" placeholder="Input Quantity">
                    </div>

                    <div>
                        <div>
                            <span class="material-symbols-outlined">add</span>
                            <p>Get</p>
                        </div>
                        <div>
                            <span class="material-symbols-outlined">remove</span>
                            <p>Add</p>
                        </div>
                    </div>
                </div>
                <textarea name="reason" placeholder="Input of reason of usage"></textarea>
                <input type="hidden" name="product_ID" value="<?php echo $product_ID ?>">
                <div>
                    <button type="submit" name="take">take</button>
                    <button type="submit" name="return">return</button>
                </div>
            </form>
            <div id="formProduct-shadow"></div>
            <div id="log-container">
                <?php include("./inventoryLog.php"); ?>
            </div>
        </div>
    </div>
</main>

<?php

include("../components/footer.php");

?>
