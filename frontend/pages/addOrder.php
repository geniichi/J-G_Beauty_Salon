<?php

include("../components/header.php");
include("../../backend/connect.php");

?>

<style>
    <?php include("../CSS/addOrder.css")?>
</style>


<main>
    <?php include("../components/side_navbar.php");?>
    <div>
        <form action="../../backend/add_order.php" method="POST" enctype="multipart/form-data" id="addForm_main">
            <div>
                <h3>Customer</h3>
                <div>
                    <input type="text" name="first_name" placeholder="Enter First Name">
                    <input type="text" name="last_name" placeholder="Enter Last Name">
                </div>
                <div>
                    <input type="number" name="contact_No" id="contact_No" placeholder="Input customer contact">
                    <textarea name="address" id="address" placeholder="Put address of customer here"></textarea>
                </div>

                <h3>Payment</h3>
                <div>
                    <select name="payment_method" required>
                        <option value="" selected disabled>Payment Method</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Debit Card">Debit Card</option>
                        <option value="Pay Pal">Pay Pal</option>
                    </select>
                    <input type="text" name="custom_payment" id="custom_payment" placeholder="Enter Custom Payment">
                </div>


                <div>
                    <div>
                        <label for="order_date">Order Date</label>
                        <input type="date" name="order_date" id="order_date">
                    </div>
                    <div>
                        <label for="delivery_date">Delivery Date</label>
                        <input type="date" name="delivery_date" id="delivery_date">
                    </div>
                </div>
                <div>
                    <p>Total Price</p>
                    <input type="number" name="total_price" value="0" id="total_price" required>
                    <button type="button" onclick="clearSelections()">Clear</button>
                </div>
                <input type="submit" name="Add" value="Add">
            </div>

            <div id="product-search-form">
                <div>
                    <div>
                        <?php
                        $sql = "SELECT * FROM inventoryitem";
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

                                        $ID = $row["product_ID"];
                                        $name = $row["product_name"];
                                        $price = $row["price"];

                                        $staff_ID = $_COOKIE["username"];


                                        echo '
                                            <div class="inventoryItem_row" onclick="toggleProductCheckbox(event, ' . $ID . ', ' . $price . ')">
                                                <input type="checkbox" name="product[]" id="product' . $ID . '" value="' . $ID . '">
                                                <p>' . $ID . '</p>
                                                <p>' . $name . '</p>
                                                <p>&#8369; ' . $price . '</p>
                                            </div>
                                            <input type="hidden" id="total_price" value="0">
                                        ';
                                    }
                                }

                                mysqli_close($conn);
                            }
                        ?>

                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php

include("../components/footer.php");

?>
