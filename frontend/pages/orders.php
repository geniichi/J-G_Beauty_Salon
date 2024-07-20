<?php
session_start();
include("../components/header.php");
include("../../backend/connect.php");

?>

<style>
    <?php include("../CSS/orders.css")?>
</style>


<main>
    <?php include("../components/side_navbar.php");?>
    <div>
        <div>
            <div>
                <form action="./orders.php" method="GET" id="search-form">
                    <div>
                        <span class="material-symbols-outlined">search</span>
                        <input type="search" name="search" placeholder="Search">
                    </div>
                    <div>
                        <select name="payment_option">
                            <option value="" disabled selected class="placeholder">Payment Option</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="PayPal">PayPal</option>
                        </select>
                        <select name="sortOn">
                            <option value="" disabled selected class="placeholder">Sort on</option>
                            <option value="1">Order Date</option>
                            <option value="2">Delivery Date</option>
                            <option value="3">Price</option>
                        </select>
                        <select name="sortBy">
                            <option value="" disabled selected class="placeholder">Sort by</option>
                            <option value="1">Ascending</option>
                            <option value="2">Descending</option>
                        </select>
                        <select name="status">
                            <option value="" disabled selected class="placeholder">Status</option>
                            <option value="1">Pending</option>
                            <option value="2">Done</option>
                        </select>
                        <input type="submit" value="submit" name="submit">
                    </div>

                </form>
                <?php
                    if(isset($_SESSION["username"])){
                        if($_SESSION["username"] == 'admin'){
                            echo'
                                <a href="../pages/addOrder.php">
                                    <button>
                                        <span class="material-symbols-outlined">
                                            add
                                        </span>
                                        Add Order
                                    </button>
                                </a>
                            ';
                        }
                    } else {
                    }

                ?>
            </div>

            <?php
                $conditions = array();
                $sql = "SELECT * FROM cart";

                if(isset($_GET["submit"])){
                    // Search
                    if(!empty($_GET["search"])){
                        $customer_name = strtolower($_GET["search"]);
                        $sql2 = "SELECT customer_ID FROM customer WHERE first_name LIKE '%$customer_name%' OR last_name LIKE '%$customer_name%'";
                        $result = mysqli_query($conn, $sql2);

                        $num_rows = mysqli_num_rows($result);
                        if($num_rows > 0){
                            $row = mysqli_fetch_assoc($result);
                            $customer_ID = $row["customer_ID"];
                            $conditions[] = "customer_ID = '$customer_ID'";
                        } else {
                            $conditions[] = "customer_ID = 'ibgewg151'";
                        }
                    }

                    // Payment Option
                    if(isset($_GET["payment_option"])){
                        $payment_opt = $_GET["payment_option"];
                        $conditions[] = "payment_option LIKE '$payment_opt'";
                    }

                    if(isset($_GET["status"])){
                        if($_GET["status"] == 1){
                            $conditions[] = "status LIKE 'pending'";
                        } else if($_GET["status"] == 2){
                            $conditions[] = "status LIKE 'done'";
                        }
                    } else {
                        $conditions[] = "status LIKE 'pending'";
                    }

                    if (count($conditions) > 0) {
                        $sql .= " WHERE " . implode(' AND ', $conditions);
                    }



                    // Sort On
                    if(isset($_GET["sortOn"])){
                        if($_GET["sortOn"] == 1){
                            $sql .= " ORDER BY order_date";
                        } else if($_GET["sortOn"] == 2){
                            $sql .= " ORDER BY delivery_date";
                        } else if($_GET["sortOn"] == 3){
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
                                $sql .= " ORDER BY cart_ID ASC";
                            } else if($_GET["sortBy"] == 2){
                                $sql .= " ORDER BY cart_ID DESC";
                            }
                        } else {
                            $sql .= " ORDER BY cart_ID DESC";
                        }
                    }

                }

            ?>
            <div>
                <div id="order_row_top">
                    <p>ID#</p>
                    <p>Customer Name</p>
                    <p>Payment Option</p>
                    <p>Order Date</p>
                    <p>Delivery Date</p>
                    <p>Total Price</p>
                    <div></div>
                </div>
                <?php
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        if($numRows = mysqli_num_rows($result) == 0){
                            echo'
                                <div id="empty_productRows">
                                    <h2>No Items</h2>
                                </div>
                            ';
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {

                                $customer_ID = $row["customer_ID"];

                                $customerQuery = "SELECT first_name, last_name FROM customer WHERE customer_ID = ?";
                                $stmt = $conn->prepare($customerQuery);
                                $stmt->bind_param("s", $customer_ID);
                                $stmt->execute();
                                $customerResult = $stmt->get_result();
                                $customerRow = $customerResult->fetch_assoc();
                                $customer_name = $customerRow["last_name"] . ", " . $customerRow["first_name"];
                                $stmt->close();

                                $cart_ID = $row["cart_ID"];
                                $payment_opt = $row["payment_option"];
                                $order_date = $row["order_date"];
                                $delivery_date = $row["delivery_date"];
                                $price = $row["price"];

                                echo '
                                    <div class="order_row" onclick="toggleOrderDropdown(' . $cart_ID . ')">
                                        <p>' . $cart_ID . '</p>
                                        <p>' . $customer_name . '</p>
                                        <p>' . $payment_opt . '</p>
                                        <p>' . $order_date . '</p>
                                        <p>' . $delivery_date . '</p>
                                        <p>' . $price . '</p>
                                        <a href="./changeOrder.php?cart_ID=' . $cart_ID . '" onclick="event.stopPropagation();">Update</a>
                                    </div>
                                    <div class="order_row_dropdown" id="order_row' . $cart_ID . '">';

                                        $orderQuery = "SELECT product_ID FROM `order` WHERE cart_ID = $cart_ID";
                                        $orderQuery_result = mysqli_query($conn, $orderQuery);
                                        while ($order_row = mysqli_fetch_assoc($orderQuery_result)) {
                                            $prod_ID = $order_row["product_ID"];
                                            $productsQuery = "SELECT image_path, product_ID, product_name, price FROM inventoryitem WHERE product_ID = $prod_ID";
                                            $productsQuery_result = mysqli_query($conn, $productsQuery);
                                            $product_row = mysqli_fetch_assoc($productsQuery_result);
                                            echo '
                                                <div>
                                                    <div>
                                                        <img src="../images/' . $product_row["image_path"] . '" alt="' . $product_row["product_name"] . '">
                                                    </div>
                                                    <p>' . $product_row["product_ID"] . '</p>
                                                    <p>' . $product_row["product_name"] . '</p>
                                                    <p>' . $product_row["price"] . '</p>
                                                </div>
                                            ';
                                        }

                                    echo '</div>';
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
