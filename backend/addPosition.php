<?php
    include("connect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $staff_id = $_COOKIE['user_id'];
        $hair = NULL;
        $nail = NULL;
        $body = NULL;
        $face = NULL;
        $foot = NULL;

        isset($_POST['hair_treatment']) ? $hair = $_POST['hair_treatment'] : $hair = NULL;
        isset($_POST['nail_treatment']) ? $nail = $_POST['nail_treatment'] : $nail = NULL;
        isset($_POST['body_treatment']) ? $body = $_POST['body_treatment'] : $body = NULL;
        isset($_POST['face_treatment']) ? $face = $_POST['face_treatment'] : $face = NULL;
        isset($_POST['foot_treatment']) ? $foot = $_POST['foot_treatment'] : $foot = NULL;

        if(!empty($hair)){
            $sql = "INSERT INTO staffspecialization (staff_ID, specialization_ID) VALUES ('$staff_id', '$hair')";
            mysqli_query($conn, $sql);
        }
        if(!empty($nail)){
            $sql = "INSERT INTO staffspecialization (staff_ID, specialization_ID) VALUES ('$staff_id', '$nail')";
            mysqli_query($conn, $sql);
        }
        if(!empty($body)){
            $sql = "INSERT INTO staffspecialization (staff_ID, specialization_ID) VALUES ('$staff_id', '$body')";
            mysqli_query($conn, $sql);
        }
        if(!empty($face)){
            $sql = "INSERT INTO staffspecialization (staff_ID, specialization_ID) VALUES ('$staff_id', '$face')";
            mysqli_query($conn, $sql);
        }
        if(!empty($foot)){
            $sql = "INSERT INTO staffspecialization (staff_ID, specialization_ID) VALUES ('$staff_id', '$foot')";
            mysqli_query($conn, $sql);
        }

        setcookie("user_id", "$staff_ID", time() - 0, "/");
        header("Location: ../frontend/pages/login.php");

    }


    mysqli_close($conn);
?>
