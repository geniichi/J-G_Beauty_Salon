<?php

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
                        <input type="submit" value="submit" name="submit">
                    </div>

                </form>
                <?php
                    if($_COOKIE["username"] == 'admin'){
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

                    // Add conditions to the SQL query
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

                                $ID = $row["cart_ID"];
                                $payment_opt = $row["payment_option"];
                                $order_date = $row["order_date"];
                                $delivery_date = $row["delivery_date"];
                                $price = $row["price"];

                                $staff_ID = $_COOKIE["username"];

                                echo '
                                    <div class="order_row" onclick="toggleOrderDropdown(' . $ID . ')">
                                        <p>' . $ID . '</p>
                                        <p>' . $customer_name . '</p>
                                        <p>' . $payment_opt . '</p>
                                        <p>' . $order_date . '</p>
                                        <p>' . $delivery_date . '</p>
                                        <p>' . $price . '</p>
                                    </div>
                                    <div class="order_row_dropdown" id="order_row' . $ID . '">';
                                        
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
