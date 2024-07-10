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
        $product_name = $row["product_name"];
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
        <?php
            include("./supplier.php");
            include("./productClass.php");

            if($_COOKIE["position"] == "admin"){
                echo '
                    <form action="../../backend/single_product.php" method="POST" enctype="multipart/form-data" id="ProductForm_main">
                        <div>
                            <p>Image Preview</p>
                            <div id="img-uploader">
                                <input type="file" id="file-input" accept="image/*" name="image" onchange="changeImage(event)"';
                                echo empty($image_path) ? 'required' : '';
                                echo '>
                                <label for="file-input">';
                                    if (!empty($image_path)){
                                        echo '<img src="../images/';
                                        echo $image_path;
                                        echo '" alt="Current Image" id="img-showcase">';
                                    } else {
                                        echo '<p id="empty-image">No Image</p>';
                                    }
                                    echo '
                                </label>
                            </div>
                        </div>

                        <div>
                            <!-- Product Name -->
                            <input type="text" name="product_name" placeholder="Enter Product Name" value="';
                            echo $product_name;
                            echo '">
                            <!-- Supplier -->
                            <div>
                                <select name="supplier" required>
                                    <option value="" disabled>Select Supplier</option>';

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
                                echo '
                                </select>
                                <p onclick="open_supplierForm2(';
                                echo $product_ID;
                                echo ')">
                                    <span class="material-symbols-outlined">
                                        add
                                    </span>
                                    Add Supplier
                                </p>
                            </div>
                            <!-- Product class -->
                            <div>
                                <select name="productClass" required>
                                    <option value="" disabled>Select Product Class</option>';

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

                                echo '</select>
                                <p onclick="open_productClass_form2(';
                                echo $product_ID;
                                echo ')">
                                    <span class="material-symbols-outlined">
                                        add
                                    </span>
                                    Add Product Class
                                </p>
                            </div>
                            <!-- Others -->
                            <div>
                                <input type="number" name="quantity" placeholder="Input quantity" value="';
                                echo $quantity;
                                echo '" required>
                                <input type="number" name="price" placeholder="Input price" value="';
                                echo $price;
                                echo '" required>
                            </div>
                            <textarea name="description" placeholder="Input description" required>';
                            echo $description;
                            echo '</textarea>
                            <input type="hidden" name="product_ID" value="';
                            echo $_GET['product_ID'];
                            echo '">
                            <div>
                                <input type="submit" name="update" value="Update">
                                <input type="submit" name="delete" value="Delete">
                            </div>
                        </div>
                    </form>
                ';
            } else {
                echo'
                    <div id="item-showcase">
                        <div>
                            <div>
                                <div>
                                    <p>ID: ';
                                    echo $product_ID;
                                    echo '</p>
                                    <h1>';
                                    echo $product_name;
                                    echo '</h1>
                                </div>

                                <div>
                                    <p><span>Class: </span>';
                                    include("../../backend/connect.php");
                                    $sql = "SELECT * FROM productclass WHERE class_ID = $class";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row["name"];
                                    echo '</p>
                                    <p><span>Supplier: </span>';
                                    include("../../backend/connect.php");
                                    $sql = "SELECT * FROM supplier WHERE supplier_ID = $supplier";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row["name"];
                                    echo '</p>
                                    <p><span>Quantity: </span>';
                                    echo $quantity;
                                    echo '</p>
                                    <p><span>Price: </span>&#8369; ';
                                    echo $price;
                                    echo '</p>
                                </div>
                            </div>
                            <div>
                                <img src="';
                                echo "../images/" . $image_path;
                                echo '" alt="';
                                echo $product_name;
                                echo'">
                            </div>
                        </div>
                        <div>
                            <p>';
                            echo $description;
                        echo '</div>
                    </div>
                ';
            }

        ?>



        <div>
            <form action="../../backend/change_quantity.php" method="POST" id="Quantity_form">
                <input type="hidden" name="staff_ID" value="<?php echo $staff_ID ?>">
                <div>
                    <div>
                        <label for="quantity_amount">Quantity: </label>
                        <input type="number" name="quantity_amount" id="quantity_amount" value="1" min="1">
                    </div>

                    <div>
                        <div onclick="increase_quantity()">
                            <span class="material-symbols-outlined">add</span>
                            <p>Add</p>
                        </div>
                        <div onclick="decrease_quantity()">
                            <span class="material-symbols-outlined">remove</span>
                            <p>Subtract</p>
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
