<?php
    include("connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $admin_psw = $_POST['admin-psw'];
        $sql = "SELECT Staff_ID FROM staff WHERE password = '$admin_psw'";

        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        if($row){
            if($row['Staff_ID'] == 1){

                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $psw = $_POST['psw'];

                $sql = "INSERT INTO staff (first_name, last_name, password) VALUES ('$fname', '$lname', '$psw')";

                if (mysqli_query($conn, $sql)) {
                    $sql = "SELECT Staff_ID FROM staff WHERE password = '$psw' AND first_name = '$fname' AND last_name = '$lname'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo $row['Staff_ID'];
                    if(mysqli_num_rows($result) != 0){
                        $staff_ID = $row['Staff_ID'];
                        setcookie("user_id", "$staff_ID", time() + 86400, "/");
                    }
                    header("Location: ../frontend/pages/positions.php");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        } else {
            echo "No results found.";
        }

    }

    mysqli_close($conn);
?>
