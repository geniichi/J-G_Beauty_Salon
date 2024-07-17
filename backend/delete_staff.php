<?php
    include("./connect.php");

    $staff_ID = $_POST["submit"];

    $sql = "UPDATE staff SET employment_status = 'unemployed' WHERE Staff_ID = '$staff_ID'";

    $result = mysqli_query($conn, $sql);

    header("Location: ../frontend/pages/staff.php");
