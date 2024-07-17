<?php
session_start();
include("../components/header.php");
include("../../backend/connect.php");

?>

<style>
    <?php include("../CSS/staff_unemployed.css")?>
</style>


<main>
    <div>
        <p>Access to the system has been terminated you were fired</p>
        <div>
            <button type="submit" name="login"><a href="./login.php">Login</a></button>
        </div>
    </div>
</main>

<?php

include("../components/footer.php");

?>
