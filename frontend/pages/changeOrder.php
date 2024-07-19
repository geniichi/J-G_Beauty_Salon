<?php
session_start();
include("../components/header.php");
include("../../backend/connect.php");

if(!isset($_GET["cart_ID"])){
    header("Location: ./orders.php");
    exit();
}

$cart_ID = $_GET["cart_ID"];

$sql = "SELECT customer_ID FROM cart WHERE cart_ID = '$cart_ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//
$customer_ID = $row["customer_ID"];

$sql = "SELECT * FROM customer WHERE customer_ID = '$customer_ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//
$first_name = $row["first_name"];
$last_name = $row["last_name"];
$contact = $row["contact_No"];
$address = $row["address"];

$sql = "SELECT payment_option, order_date, delivery_date, price FROM cart WHERE cart_ID = '$cart_ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//
$payment_opt = $row["payment_option"];
$order_date = $row["order_date"];
$delivery_date = $row["delivery_date"];
$price = $row["price"];

$sql = "SELECT order_ID, product_ID FROM `order` WHERE cart_ID = '$cart_ID'";
$cart_result = mysqli_query($conn, $sql);
$product_IDs = [];
$order_IDs = [];
while ($cart_row = mysqli_fetch_assoc($cart_result)) {
    $order_IDs[] = $cart_row["order_ID"];
    $product_IDs[] = $cart_row["product_ID"];
}
?>

<style>
    <?php include("../CSS/updateOrder.css")?>
</style>


<main>
    <?php include("../components/side_navbar.php");?>
    <div>
        <form action="../../backend/change_order.php" method="POST" enctype="multipart/form-data" id="addForm_main">
            <div>
                <h3>Customer</h3>
                <input type="hidden" name="customer_ID" value="<?php echo $customer_ID ?>">
                <div>
                    <input type="text" name="first_name" placeholder="Enter First Name" value="<?php echo $first_name ?>">
                    <input type="text" name="last_name" placeholder="Enter Last Name" value="<?php echo $last_name ?>">
                </div>
                <div>
                    <input type="number" name="contact_No" id="contact_No" placeholder="Input customer contact" value="<?php echo $contact ?>">
                    <textarea name="address" id="address" placeholder="Put address of customer here"><?php echo $address ?></textarea>
                </div>

                <h3>Payment</h3>
                <div>
                    <input type="hidden" name="cart_ID" value="<?php echo $cart_ID ?>">
                    <select name="payment_method" id="payment_method" required>
                        <option value="" selected disabled>Payment Method</option>
                        <option value="Credit Card" <?php echo ($payment_opt == "Credit Card") ? 'selected' : ''; ?>>Credit Card</option>
                        <option value="Debit Card" <?php echo ($payment_opt == "Debit Card") ? 'selected' : ''; ?>>Debit Card</option>
                        <option value="Pay Pal" <?php echo ($payment_opt == "Pay Pal") ? 'selected' : ''; ?>>Pay Pal</option>
                        <?php
                        if ($payment_opt != "Credit Card" && $payment_opt != "Debit Card" && $payment_opt != "Pay Pal") {
                            echo '<option value="' . $payment_opt . '" selected>' . $payment_opt . '</option>';
                        }
                        ?>
                    </select>
                    <input type="text" name="custom_payment" id="custom_payment" placeholder="Enter Custom Payment">
                </div>


                <div>
                    <div>
                        <label for="order_date">Order Date</label>
                        <input type="date" name="order_date" id="order_date"  value="<?php echo $order_date ?>" readonly>
                    </div>
                    <div>
                        <label for="delivery_date">Delivery Date</label>
                        <input type="date" name="delivery_date" id="delivery_date" value="<?php echo $delivery_date ?>">
                    </div>
                </div>
                <div>
                    <p>Total Price</p>
                    <input type="number" name="total_price" id="total_price" value="<?php echo $price ?>" required readOnly>
                    <button type="button" onclick="clearSelections()">Clear</button>
                </div>

                <?php foreach ($order_IDs as $order_ID): ?>
                    <input type="hidden" name="orders[]" value="<?php echo $order_ID ?>">
                <?php endforeach; ?>

                <div>
                    <input type="submit" name="Update" value="Update">
                    <input type="submit" name="Delete" value="Delete" onclick="showWarningDeleteOrder(event, <?php echo $cart_ID ?>)">
                </div>

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
                                    echo '
                                        <div class="inventoryItem_row-top">
                                            <p>Add</p>
                                            <p>Serial ID#</p>
                                            <p>Name</p>
                                            <p>Price</p>
                                        </div>
                                    ';
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $ID = $row["product_ID"];
                                        $serial_ID = $row["serial_Id"];
                                        $name = $row["product_name"];
                                        $price = $row["price"];

                                        $staff_ID = $_SESSION["username"];


                                        echo '
                                            <div class="inventoryItem_row" onclick="toggleProductCheckbox(event, ' . $ID . ', ' . $price . ')">';
                                            if(in_array($ID, $product_IDs)){
                                                echo '<input type="checkbox" name="product[]" id="product' . $ID . '" value="' . $ID . '" checked>';
                                            } else {
                                                echo '<input type="checkbox" name="product[]" id="product' . $ID . '" value="' . $ID . '">';
                                            }
                                        echo'   <p>' . $serial_ID . '</p>
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
                        <input type="hidden" id="selected_product_ids" name="selected_product_ids" value="">
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php
include("../components/footer.php");
include("./delete_warningOrder.php");

?>
