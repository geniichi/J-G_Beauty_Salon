<?php
    include("../components/header.php");
    include("../../backend/connect.php");
?>

<style>
    <?php include("../CSS/inventory.css")?>
</style>


<main>
    <?php
        include("../components/side_navbar.php");
        if(!isset($_COOKIE["username"])){
            header("Location: ./login.php");
        }
    ?>
    <div>
        <div>
            <div>
                <form action="./inventory.php" method="GET" id="search-form">
                    <div>
                        <span class="material-symbols-outlined">search</span>
                        <input type="search" name="search" placeholder="Search">
                    </div>
                    <div>
                        <select name="supplier">
                            <option value="" disabled selected class="placeholder">Supplier</option>
                            <option value="1">Beauty Supplies PH</option>
                            <option value="2">Salon Essentials</option>
                            <option value="3">Glamour Products</option>
                            <option value="4">Elegance Inc.</option>
                            <option value="5">Luxury Beauty</option>
                        </select>
                        <select name="productClass">
                            <option value="" disabled selected class="placeholder">Product Class</option>
                            <option value="1">Hair-care product</option>
                            <option value="2">Nail-care product</option>
                            <option value="3">Skin-care product</option>
                            <option value="4">Makeup essentials</option>
                            <option value="5">Spa supplementaries</option>
                        </select>
                        <select name="sortOn">
                            <option value="" disabled selected class="placeholder">Sort on</option>
                            <option value="1">name</option>
                            <option value="2">price</option>
                        </select>
                        <select name="sortBy">
                            <option value="" disabled selected class="placeholder">Sort by</option>
                            <option value="1">Ascending</option>
                            <option value="2">Descending</option>
                        </select>
                        <input type="submit" value="submit" name="submit">
                    </div>

                </form>
                <?php
                    if($_COOKIE["username"] == 'admin'){
                        echo'
                            <a href="../pages/addProduct.php">
                                <button>
                                    <span class="material-symbols-outlined">
                                        add
                                    </span>
                                    Add Product
                                </button>
                            </a>
                        ';
                    }
                ?>
            </div>

            <?php
                $sql = "SELECT * FROM inventoryitem";
                $conditions = array();

                if(isset($_GET["submit"])){
                    // Search
                    if(!empty($_GET["search"])){
                        $prod_name = strtolower($_GET["search"]);
                        $conditions[] = "LOWER(product_name) LIKE '%$prod_name%'";
                    }

                    // Supplier
                    if(isset($_GET["supplier"])){
                        $supplier = (int)$_GET["supplier"];
                        $conditions[] = "supplier_ID = $supplier";
                    }

                    // Product Class
                    if(isset($_GET["productClass"])){
                        $productClass = (int)$_GET["productClass"];
                        $conditions[] = "productClass_ID = $productClass";
                    }

                    // Add conditions to the SQL query
                    if (count($conditions) > 0) {
                        $sql .= " WHERE " . implode(' AND ', $conditions);
                    }

                    // Sort On
                    if(isset($_GET["sortOn"])){
                        if($_GET["sortOn"] == 1){
                            $sql .= " ORDER BY product_name";
                        } else if($_GET["sortOn"] == 2){
                            $sql .= " ORDER BY price";
                        }
                        if(isset($_GET["sortBy"])){
                            if($_GET["sortBy"] == 1){
                                $sql .= " ASC";
                            } else if($_GET["sortBy"] == 2){
                                $sql .= " DESC";
                            }
                        }
                    } else {
                        if(isset($_GET["sortBy"])){
                            if($_GET["sortBy"] == 1){
                                $sql .= " ORDER BY product_ID ASC";
                            } else if($_GET["sortBy"] == 2){
                                $sql .= " ORDER BY product_ID DESC";
                            }
                        }
                    }

                }

                // echo $sql;

            ?>
            <div>
                <?php
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        if($numRows = mysqli_num_rows($result) == 0){
                            echo'
                                <div id="empty_productRows">
                                    <h2>No Items</h2>
                                </div>
                            ';
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {

                                $supplier_ID = $row["supplier_ID"];
                                $class_ID = $row["productClass_ID"];

                                $supplierQuery = "SELECT name FROM supplier WHERE supplier_ID = ?";
                                $stmt = $conn->prepare($supplierQuery);
                                $stmt->bind_param("s", $supplier_ID);
                                $stmt->execute();
                                $supplierResult = $stmt->get_result();
                                $supplierRow = $supplierResult->fetch_assoc();
                                $supplierName = $supplierRow["name"];
                                $stmt->close();

                                $classQuery = "SELECT name FROM productclass WHERE class_ID = ?";
                                $stmt = $conn->prepare($classQuery);
                                $stmt->bind_param("s", $class_ID);
                                $stmt->execute();
                                $classResult = $stmt->get_result();
                                $classRow = $classResult->fetch_assoc();
                                $className = $classRow["name"];
                                $stmt->close();

                                $ID = $row["product_ID"];
                                $name = $row["product_name"];
                                $quantity = $row["quantity"];

                                $staff_ID = $_COOKIE["username"];

                                echo '
                                    <div id="inventoryItem_row" onclick="redirectToPage(' . $ID . ')">
                                        <p>' . $ID . '</p>
                                        <p>' . $name . '</p>
                                        <p>' . $supplierName . '</p>
                                        <p>' . $className . '</p>
                                        <p>' . $quantity . '</p>
                                    </div>
                                ';
                            }
                        }

                        mysqli_close($conn);
                    }
                ?>
            </div>
        </div>
    </div>
</main>

<?php
    include("../components/footer.php");
?>
