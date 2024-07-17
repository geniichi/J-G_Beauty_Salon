<?php
session_start();
include("../components/header.php");
include("../../backend/connect.php");

if(!isset($_SESSION["status"])){
    header("Location: ./index.php");
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT employment_status FROM staff WHERE Staff_ID = $user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$status = $row["employment_status"];

if(isset($_POST["try_again"])){
    if($status != "Pending"){
        header("Location: ./index.php");
    } else if($status != "unemployed"){
        header("Location: ./staff_unemployed.php");
    }
} else if(isset($_POST["login"])) {
    header("Location: ./login.php");
}



?>

<style>
    <?php include("../CSS/staff_waitroom.css")?>
</style>


<main>
    <div>
        <p>Wait for the Admin to process you</p>
        <form action="./staff_waitroom.php" method="post">
            <button type="submit" name="try_again">Try again</button>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</main>

<?php

include("../components/footer.php");

?>
