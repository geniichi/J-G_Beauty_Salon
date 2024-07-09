<style>
    <?php include("../CSS/inventoryLog.css")?>
</style>

<?php
    include("../../backend/connect.php");

    $product_ID = $_GET['product_ID'];
    $staff_ID = $_COOKIE['staff_ID'];

    $sql = "SELECT * FROM inventoryItemLog AS l, staff AS s WHERE l.staff_ID = s.Staff_ID AND l.product_ID = '$product_ID' AND l.staff_ID = '$staff_ID'";

    // echo $sql;

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) != 0){
        echo '<div id="inventoryLog">';
        while ($row = mysqli_fetch_assoc($result)) {
            $staff_fname = $row["first_name"];
            $staff_lname = $row["last_name"];
            $date = $row["date_time"];
            $reason = $row["reason_of_usage"];
            $status = $row["status"];
            $amount = $row["amount_changed"];

            echo '
                <div>
                    <div>
                        <p>' . $staff_fname . ' ' . $staff_lname . '</p>
                        <p>' . $date . '</p>';
                    if($status = 'Deducted'){
                        echo '<p>-' . $amount . '</p>';
                    } else if($status = 'Increased'){
                        echo '<p>+' . $amount . '</p>';
                    }
            echo '
                    </div>
                    <div>
                        <p>' . $reason . '</p>
            ';
            echo '
                    </div>
                </div>';
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
