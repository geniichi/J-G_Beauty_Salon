<?php
    session_start();
    include("./connect.php");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $psw = $_POST['psw'];
        $conf_psw = $_POST['conf_psw'];

        $sql = "INSERT INTO staff (first_name, last_name, employment_status, password) VALUES ('$fname', '$lname', 'Pending', '$psw')";

        if (mysqli_query($conn, $sql)) {
            $sql = "SELECT Staff_ID FROM staff WHERE password = '$psw' AND first_name = '$fname' AND last_name = '$lname'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $staff_ID = $row['Staff_ID'];
            $_SESSION['user_id'] = $staff_ID;

            header("Location: ../frontend/pages/positions.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }

    mysqli_close($conn);
?>
