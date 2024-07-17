<?php
    include("./connect.php");

    if(isset($_POST["submit"])){
        $staff_ID = $_POST["submit"];
        $sql = "UPDATE staff SET employment_status = 'employed' WHERE Staff_ID = '$staff_ID'";
    } else if(isset($_POST["decline"])){
        $staff_ID = $_POST["decline"];

        // delete specialization of staff first before deleting actual staff

        $sql = "DELETE FROM staff WHERE Staff_ID = '$staff_ID'";
    }

    $result = mysqli_query($conn, $sql);

    header("Location: ../frontend/pages/staff.php");
