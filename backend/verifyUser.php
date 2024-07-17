<?php
    session_start();
    include("./connect.php");

    $fname = $_POST['fname'];
    $password = $_POST['psw'];

    echo $sql = "SELECT * FROM staff WHERE first_name = '$fname' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) != 0){
        echo $staff_ID = $row["Staff_ID"];
        $status = $row["employment_status"];
        $_SESSION["user_id"] = $staff_ID;
        if($staff_ID == 1){
            $_SESSION["username"] = $fname;
            $_SESSION["position"] = "admin";
            header("Location: ../frontend/pages/index.php");
            exit;
        } else {
            if($status == "Pending"){
                header("Location: ../frontend/pages/staff_waitroom.php");
                exit;
            } else if($status == "unemployed"){
                header("Location: ../frontend/pages/staff_unemployed.php");
                exit;
            }
            $_SESSION["username"] = $fname;
            $_SESSION["position"] = "staff";
            header("Location: ../frontend/pages/index.php");
            exit;
        }
    } else {
        echo "No user found";
        header("Location: ../frontend/pages/signup.php");
        exit;
    }


    mysqli_close($conn);
?>
