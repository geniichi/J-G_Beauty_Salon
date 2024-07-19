<?php
    session_start();
    include("../components/header.php");
    include("../../backend/connect.php");

    if(!isset($_SESSION["user_id"])){
        header("Location: ./login.php");
    }

    $curr_date = date('Y-m-d');
    $sql = "SELECT * FROM cart WHERE delivery_date = '$curr_date'";
    $result = mysqli_query($conn, $sql);
?>

<style>
    <?php include("../CSS/index.css")?>
</style>


<main>
    <?php include("../components/side_navbar.php");?>
    <div>
        <div id="todays_orders">
            <h2>Today's Order's</h2>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    $cart_ID = $row["cart_ID"];
                    $order_date = $row["order_date"];
                    $delivery_date = $row["delivery_date"];
                    $customer_ID = $row["customer_ID"];
                    $payment_opt = $row["payment_option"];
                    $price = $row["price"];

                    $sql = "SELECT * FROM customer WHERE customer_ID = '$customer_ID'";
                    $customerResult = mysqli_query($conn, $sql);
                    $customerRow = mysqli_fetch_assoc($customerResult);

                    $customer_name = $customerRow["first_name"] . " " . $customerRow["last_name"];
                    $contact = $customerRow["contact_No"];
                    $address = $customerRow["address"];

                    echo'
                        <div>
                            <div>
                                <p>Customer Name:</p>
                                <p>' . $customer_name . '</p>
                                <p>Order Date</p>
                                <p>' . $order_date . '</p>
                                <p>Delivery Date</p>
                                <p>' . $delivery_date . '</p>
                            </div>
                            <div>
                                <p>Payment Method</p>
                                <p>' . $payment_opt . '</p>
                                <p>Total Price</p>
                                <p>&#8369;' . $price . '</p>
                                <a href="./changeOrder.php?cart_ID=' . $cart_ID . '">See More</a>
                            </div>
                        </div>';

                }
            ?>
        </div>

        <div id="inventory_log-container">
            <?php include("./inventoryLog.php"); ?>
        </div>
    </div>
</main>

<?php

include("../components/footer.php");

?>
