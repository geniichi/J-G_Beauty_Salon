<?php
    session_start();
    include("../components/header.php");
    include("../../backend/connect.php");
?>

<style>
    <?php include("../CSS/staff.css")?>
</style>


<main>
    <?php
        include("../components/side_navbar.php");
        if(!isset($_SESSION["user_id"])){
            header("Location: ./login.php");
        } else {
            if($_SESSION["user_id"] != 1){
                header("Location: ./index.php");
            }
        }
    ?>
    <div>
        <div>
            <div>
                <h2>Pending Staff</h2>
                <div>
                    <?php
                        $sql = 'SELECT * FROM staff WHERE employment_status = "Pending"';
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            if($numRows = mysqli_num_rows($result) == 0){
                                echo'
                                    <div id="empty_productRows">
                                        <h2>No Pending Staff</h2>
                                    </div>
                                ';
                            } else {
                                echo '<div id="inventory_row_top">
                                        <p>ID#</p>
                                        <p>First Name</p>
                                        <p>Last Name</p>
                                        <p>Position</p>
                                        <p></p>
                                        <p></p>
                                    </div>';
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $ID = $row["Staff_ID"];
                                    $first_name = $row["first_name"];
                                    $last_name = $row["last_name"];
                                    $position = $row["position"];
                                    $fullname = $first_name . " " . $last_name;

                                    echo '
                                        <div id="inventoryItem_row" onclick="toggleStaffDropdown(' . $ID . ')">
                                            <p>' . $ID . '</p>
                                            <p>' . $first_name . '</p>
                                            <p>' . $last_name . '</p>
                                            <p>' . $position . '</p>
                                            <button
                                                name="accept_warning"
                                                value="' . $ID . '"
                                                id="accept_pending_button"
                                                onclick="show_warning(1, \'' . $fullname . '\', ' . $ID . ', event)"
                                            >Accept</button>
                                            <button
                                                name="decline"
                                                value="' . $ID . '"
                                                id="decline_pending_button"
                                                onclick="show_warning(2, \'' . $fullname . '\', ' . $ID . ', event)"
                                            >Decline</button>
                                        </div>
                                    ';
                                    echo '
                                        <div class="order_row_dropdown" id="order_row' . $ID . '">
                                            <h2>Position/s:</h2>';
                                            $specialization = "SELECT specialization_ID FROM staffspecialization WHERE Staff_ID = $ID";
                                            $specialization_result = mysqli_query($conn, $specialization);
                                            echo '<div>';
                                            while ($specialization_row = mysqli_fetch_assoc($specialization_result)){
                                                $specialization_ID = $specialization_row["specialization_ID"];
                                                $specialization = "SELECT specialization FROM specialization WHERE specialization_ID = $specialization_ID";
                                                $specialization_result = mysqli_query($conn, $specialization);
                                                $name_row = mysqli_fetch_assoc($specialization_result);

                                                echo '
                                                    <p>' . $name_row["specialization"] . '</p>
                                                ';
                                            }
                                            echo '</div>';

                                        echo '</div>';
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <div>
            <div>
                <h2>Active Staff</h2>
                <div>
                    <div id="inventory_row_top">
                        <p>ID#</p>
                        <p>First Name</p>
                        <p>Last Name</p>
                        <p>Position</p>
                        <p></p>
                    </div>
                    <?php
                        $sql = 'SELECT * FROM staff WHERE employment_status = "employed"';
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            if($numRows = mysqli_num_rows($result) == 0){
                                echo'
                                    <div id="empty_productRows">
                                        <h2>No Staff our bussiness broke ;(</h2>
                                    </div>
                                ';
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if($row["Staff_ID"] != 1){
                                        $ID = $row["Staff_ID"];
                                        $first_name = $row["first_name"];
                                        $last_name = $row["last_name"];
                                        $position = $row["position"];

                                        echo '
                                            <div id="inventoryItem_row" onclick="toggleStaffDropdown2(' . $ID . ')">
                                                <p>' . $ID . '</p>
                                                <p>' . $first_name . '</p>
                                                <p>' . $last_name . '</p>
                                                <p>' . $position . '</p>
                                                <button
                                                    name="accept_warning"
                                                    value="' . $ID . '"
                                                    id="accept_pending_button"
                                                    onclick="show_warning(3, \'' . $fullname . '\', ' . $ID . ', event)"
                                                >Fire</button>
                                            </div>
                                        ';
                                        echo '
                                            <div class="order_row_dropdown" id="order_row2' . $ID . '">
                                                <h2>Position/s:</h2>';
                                                $specialization = "SELECT specialization_ID FROM staffspecialization WHERE Staff_ID = $ID";
                                                $specializationID_result = mysqli_query($conn, $specialization);
                                                echo '<div>';
                                                while ($specialization_row = mysqli_fetch_assoc($specializationID_result)){
                                                    $specialization_ID = $specialization_row["specialization_ID"];
                                                    $specialization = "SELECT specialization FROM specialization WHERE specialization_ID = $specialization_ID";
                                                    $specialization_result = mysqli_query($conn, $specialization);
                                                    $name_row = mysqli_fetch_assoc($specialization_result);

                                                    echo '
                                                        <p>' . $name_row["specialization"] . '</p>
                                                    ';
                                                }
                                                echo '</div>';

                                            echo '</div>';
                                    }

                                }
                            }

                            mysqli_close($conn);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="staff_warning">
        <div>
            <p id="warning_message">Warning Sample Message</p>
            <div>
                <button onclick="close_staff_warning()">Go Back</button>
                <div id="staff_warning_buttons">

                </div>

            </div>

        </div>
    </div>
</main>


<?php
    include("../components/footer.php");
?>
