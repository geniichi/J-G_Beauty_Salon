<?php
session_start();
include("../components/header.php");
include("../../backend/connect.php");

if(!isset($_SESSION["user_id"])){
    header("Location: ./login.php");
}

$sql = "SELECT * FROM cart WHERE delivery_date = '2024-07-12'";
$result = mysqli_query($conn, $sql);

?>

<style>
    <?php include("../CSS/index.css")?>
</style>


<main>
    <?php include("../components/side_navbar.php");?>
    <div>
        <div id="todays_orders">

        </div>
        <div id="inventory_log-container">
            <?php include("./inventoryLog.php"); ?>
        </div>
    </div>
</main>

<?php

include("../components/footer.php");

?>
