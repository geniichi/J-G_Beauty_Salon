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
            header("header: ../pages/login.php");
        }
    ?>
    <div>
        <form action="./inventory.php" method="GET">
            <div>
                <label for="search">Search</label>
                <input type="search" name="search">
            </div>
            <div>
                <label for="supplier">Supplier</label>
                <select name="supplier">
                    <option value="1">Beauty Supplies PH</option>
                    <option value="2">Salon Essentials</option>
                    <option value="3">Glamour Products</option>
                    <option value="4">Elegance Inc.</option>
                    <option value="5">Luxury Beauty</option>
                </select>
                <label for="productClass">Product Class</label>
                <select name="productClass">
                    <option value="1">Hair-care product</option>
                    <option value="2">Nail-care product</option>
                    <option value="3">Skin-care product</option>
                    <option value="4">Makeup essentials</option>
                    <option value="5">Spa supplementaries</option>
                </select>
                <label for="sortOn">Sort On</label>
                <select name="sortOn">
                    <option value="1">name</option>
                    <option value="2">price</option>
                </select>
                <label for="sortBy">Sort By</label>
                <select name="sortBy">
                    <option value="1">Ascending</option>
                    <option value="2">Descending</option>
                </select>
            </div>
            <input type="submit" value="submit" name="submit">
        </form>

        <?php
            if(isset($_GET["submit"])){
                if(empty($_GET["search"])){
                    if($_GET["supplier"] == 1){
                        if($_GET["productClass"] == 1){
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 1 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 1 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 1 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 1 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 2) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 2 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 2 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 2 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 2 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 3) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 3 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 3 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 3 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 3 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 4) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 4 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 4 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 4 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 4 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 5) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 5 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 5 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 5 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 1 AND productClass_ID = 5 ORDER BY price DESC";
                                }
                            }
                        }
                    } else if($_GET["supplier"] == 2){
                        if($_GET["productClass"] == 1){
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 1 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 1 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 1 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 1 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 2) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 2 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 2 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 2 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 2 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 3) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 3 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 3 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 3 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 3 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 4) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 4 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 4 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 4 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 4 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 5) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 5 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 5 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 5 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 2 AND productClass_ID = 5 ORDER BY price DESC";
                                }
                            }
                        }
                    } else if($_GET["supplier"] == 3){
                        if($_GET["productClass"] == 1){
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 1 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 1 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 1 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 1 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 2) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 2 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 2 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 2 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 2 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 3) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 3 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 3 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 3 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 3 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 4) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 4 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 4 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 4 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 4 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 5) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 5 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 5 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 5 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 3 AND productClass_ID = 5 ORDER BY price DESC";
                                }
                            }
                        }
                    } else if($_GET["supplier"] == 4){
                        if($_GET["productClass"] == 1){
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 1 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 1 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 1 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 1 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 2) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 2 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 2 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 2 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 2 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 3) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 3 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 3 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 3 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 3 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 4) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 4 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 4 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 4 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 4 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 5) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 5 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 5 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 5 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 4 AND productClass_ID = 5 ORDER BY price DESC";
                                }
                            }
                        }
                    } else if($_GET["supplier"] == 5){
                        if($_GET["productClass"] == 1){
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 1 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 1 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 1 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 1 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 2) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 2 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 2 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 2 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 2 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 3) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 3 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 3 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 3 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 3 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 4) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 4 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 4 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 4 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 4 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 5) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 5 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 5 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 5 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE supplier_ID = 5 AND productClass_ID = 5 ORDER BY price DESC";
                                }
                            }
                        }
                    }
                } else {
                    $prod_name = $_GET["search"];
                    if($_GET["supplier"] == 1){
                        if($_GET["productClass"] == 1){
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' AND supplier_ID = 1 AND productClass_ID = 1 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 1 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 1 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 1 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 2) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 2 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 2 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 2 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 2 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 3) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 3 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 3 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 3 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 3 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 4) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 4 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 4 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 4 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 4 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 5) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 5 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 5 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 5 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 1 AND productClass_ID = 5 ORDER BY price DESC";
                                }
                            }
                        }
                    } else if($_GET["supplier"] == 2){
                        if($_GET["productClass"] == 1){
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 1 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 1 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 1 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 1 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 2) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 2 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 2 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 2 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 2 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 3) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 3 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 3 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 3 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 3 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 4) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 4 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 4 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 4 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 4 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 5) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 5 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 5 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 5 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 2 AND productClass_ID = 5 ORDER BY price DESC";
                                }
                            }
                        }
                    } else if($_GET["supplier"] == 3){
                        if($_GET["productClass"] == 1){
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 1 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 1 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 1 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 1 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 2) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 2 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 2 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 2 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 2 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 3) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 3 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 3 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 3 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 3 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 4) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 4 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 4 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 4 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 4 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 5) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 5 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 5 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 5 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 3 AND productClass_ID = 5 ORDER BY price DESC";
                                }
                            }
                        }
                    } else if($_GET["supplier"] == 4){
                        if($_GET["productClass"] == 1){
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 1 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 1 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 1 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 1 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 2) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 2 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 2 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 2 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 2 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 3) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 3 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 3 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 3 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 3 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 4) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 4 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 4 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 4 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 4 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 5) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 5 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 5 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 5 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 4 AND productClass_ID = 5 ORDER BY price DESC";
                                }
                            }
                        }
                    } else if($_GET["supplier"] == 5){
                        if($_GET["productClass"] == 1){
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 1 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 1 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 1 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 1 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 2) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 2 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 2 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 2 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 2 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 3) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 3 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 3 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 3 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 3 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 4) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 4 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 4 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 4 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 4 ORDER BY price DESC";
                                }
                            }
                        } else if($_GET["productClass"] == 5) {
                            if($_GET["sortOn"] == 1){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 5 ORDER BY product_name ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 5 ORDER BY product_name DESC";
                                }
                            } else if($_GET["sortOn"] == 2){
                                if($_GET["sortBy"] == 1){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 5 ORDER BY price ASC";
                                } else if($_GET["sortBy"] == 2){
                                    $sql = "SELECT * FROM inventoryitem WHERE LOWER(product_name) LIKE '%$prod_name%' supplier_ID = 5 AND productClass_ID = 5 ORDER BY price DESC";
                                }
                            }
                        }
                    }
                }
            } else {
                $sql = "SELECT * FROM inventoryitem";
            }

            $result = mysqli_query($conn, $sql);

            if($result) {
                while($row = mysqli_fetch_assoc($result)) {
                        $ID = $row["product_ID"];
                        $name = $row["product_name"];
                        $supplier = $row["supplier_ID"];
                        $class = $row["productClass_ID"];
                        $quantity = $row["quantity"];
                        $price = $row["price"];
                        $description = $row["description"];
                    echo '
                        <div class="inventory-rows">
                            <p>' . $ID . '</p>
                            <p>' . $name . '</p>
                            <p>' . $supplier . '</p>
                            <p>' . $class . '</p>
                            <p>' . $quantity . '</p>
                            <p>' . $price . '</p>
                            <p>' . $description . '</p>
                        </div>
                    ';
                }
            }
        ?>



    </div>
</main>

<?php

include("../components/footer.php");

?>
