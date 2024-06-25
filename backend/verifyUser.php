<?php
    include("./connect.php");

    $fname = $_POST['fname'];
    $password = $_POST['psw'];


    $sql = "SELECT * FROM staff WHERE first_name = '$fname' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) != 0){
        if($row['Staff_ID'] == 1){
            setcookie("username", "$fname", time() + 86400, "/");
            setcookie("position", "admin", time() + 86400, "/");
            header("Location: ../frontend/pages/index.php");
            exit;
        } else {
            setcookie("username", "$fname", time() + 86400, "/");
            setcookie("position", "staff", time() + 86400, "/");
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
