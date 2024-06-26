<?php
    $position = $_COOKIE["position"];
    $user_id = $_COOKIE["user_id"];
    $username = $_COOKIE["username"];
    setcookie("username", $username, time() - 0, "/");
    setcookie("user_id", $user_id, time() - 0, "/");
    setcookie("position", $position, time() - 0, "/");
    header("Location: ../frontend/pages/login.php");
    exit;
?>
