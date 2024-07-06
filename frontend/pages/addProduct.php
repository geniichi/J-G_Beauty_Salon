<?php

include("../components/header.php");

?>

<style>
    <?php include("../CSS/addProduct.css")?>
</style>


<main>
    <?php include("../components/side_navbar.php");?>
    <div>
        <form action="../../backend/add_product.php" method="POST" enctype="multipart/form-data" id="addForm_main">
            <div>
                <div id="img-uploader">
                    <input type="file" id="file-input" accept="image/*" name="image" required onchange="previewImage(event)">
                    <label for="file-input">
                        <span class="material-symbols-outlined">add</span>
                    </label>
                </div>
                <div id="img-showcase-container">
                    <h1>Image Preview</h1>
                    <img src="" alt="image preview" id="img-showcase">
                </div>
            </div>

            <div>
                <!-- Product Name -->
                <input type="text" name="product_name" placeholder="Enter Product Name">
                <!-- Supplier -->
                <div>
                    <select name="supplier" required>
                        <option value="" selected disabled>Supplier</option>
                        <?php
                            include("../../backend/connect.php");
                            $sql = "SELECT supplier_ID, name FROM supplier";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                                    <option value="' . $row["supplier_ID"] . '">' . $row["name"] . '</option>
                                ';
                            }
                            mysqli_close($conn);
                        ?>
                    </select>
                    <p onclick="open_supplierForm()">
                        <span class="material-symbols-outlined">
                            add
                        </span>
                        Add Supplier
                    </p>
                </div>
                <!-- Product class -->
                <div>
                    <select name="productClass" required>
                        <option value="" selected disabled>Product Class</option>
                        <?php
                            include("../../backend/connect.php");
                            $sql = "SELECT * FROM productclass";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                                    <option value="' . $row["class_ID"] . '">' . $row["name"] . '</option>
                                ';
                            }
                            mysqli_close($conn);
                        ?>
                    </select>
                    <p onclick="open_productClass_form()">
                        <span class="material-symbols-outlined">
                            add
                        </span>
                        Add Product Class
                    </p>
                </div>
                <!-- Quantity -->
                <input type="number" name="quantity" placeholder="Input quantity" required>
                <input type="number" name="price" placeholder="Input price" required>
                <textarea name="description" placeholder="Input description" required></textarea>
                <input type="submit" name="Add" value="Add">
            </div>
        </form>
        <?php
            include("./supplier.php");
            include("./productClass.php");
        ?>
    </div>
</main>

<?php

include("../components/footer.php");

?>
