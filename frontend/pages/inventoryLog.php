<style>
    <?php include("../CSS/inventoryLog.css")?>
</style>

<?php
    include("../../backend/connect.php");

    $staff_ID = $_SESSION['user_id'];
    if(isset($_GET['product_ID'])){
        $product_ID = $_GET['product_ID'];
        $sql = "SELECT * FROM inventoryItemLog AS l, staff AS s WHERE l.staff_ID = s.Staff_ID AND l.product_ID = '$product_ID' AND l.staff_ID = '$staff_ID' ORDER BY log_ID DESC";
    } else {
        $sql = "SELECT * FROM inventoryItemLog AS l, staff AS s, inventoryItem AS i WHERE l.staff_ID = s.Staff_ID AND l.product_ID = i.product_ID ORDER BY log_ID DESC";
    }


    // echo $sql;

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) != 0){
        echo '
            <div id="inventoryLog">
                <p id="h2-shadow"></p>
                <h2>Inventory Log</h2>
        ';
        while ($row = mysqli_fetch_assoc($result)) {
            $staff_fname = $row["first_name"];
            $staff_lname = $row["last_name"];
            $date = $row["date_time"];
            $reason = $row["reason_of_usage"];
            $status = $row["status"];
            $amount = $row["amount_changed"];

            if(isset($_GET['product_ID'])){
                echo '
                    <div>
                        <div>
                            <div>
                                <p><strong>Date:</strong> ' . $date . '</p>
                                <p><strong>Staff Name:</strong> ' . $staff_fname . ' ' . $staff_lname . '</p>
                            </div>
                            <div>
                                <p><strong>Reason</strong></p>
                                <p>' . $reason . '</p>
                            </div>
                        </div>
                        <div>';
                        if($status == 'Deducted'){
                            echo '<p><strong>-' . $amount . '</strong></p>';
                        } else if($status == 'Increased'){
                            echo '<p><strong>+' . $amount . '</strong></p>';
                        }
                  echo '</div>
                    </div>
                ';
            } else {
                $product_name = $row["product_name"];
                echo '
                    <div>
                        <div>
                            <div>
                                <p><strong>Date:</strong> ' . $date . '</p>
                                <p><strong>Staff Name:</strong> ' . $staff_fname . ' ' . $staff_lname . '</p>
                                <p><strong>Product Name:</strong> ' . $product_name . '</p>
                            </div>
                            <div>
                                <p><strong>Reason</strong></p>
                                <p>' . $reason . '</p>
                            </div>
                        </div>
                        <div>';
                        if($status == 'Deducted'){
                            echo '<p><strong>-' . $amount . '</strong></p>';
                        } else if($status == 'Increased'){
                            echo '<p><strong>+' . $amount . '</strong></p>';
                        }
                echo '</div>
                    </div>
                ';
            }


        }
        echo '</div>';
    } else {
        echo '
            <div id="inventoryLog" class="empty">
                <p>No Inventory Log</p>
            </div>

        ';
    }


    mysqli_close($conn);
?>
