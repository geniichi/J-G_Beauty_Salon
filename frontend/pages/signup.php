<?php

include("../components/header.php");

?>

<style>
    <?php include("../CSS/signup.css")?>
</style>

<main>
    <div>

    </div>
    <div>
        <div id="signup-logo-img-container">
            <img src="../images/J&G_Beauty_Salon.png" alt="J&G Beauty Salon">
        </div>
        <h1>Welcome</h1>
        <form action="../../backend/addUser.php" method="POST" onsubmit="check_error(event)">
            <h4>Name</h4>
            <div>
                <input type="text" placeholder="Enter first name" name="fname" required>
                <input type="text" placeholder="Enter last name" name="lname" required>
            </div>

            <h4>Password</h4>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

            <h4>Confirm Password</h4>
            <input type="password" placeholder="Enter Password Again" name="conf_psw" id="conf_psw" required>

            <button type="submit" class="btn">SignUp</button>
            <br>
            <br>
            <p>Already Have an account? <a href="./login.php">Log in here</a></p>
        </form>
    </div>
</main>

<div id="alert-container" onClick="hide_error()">
    <h4>Warning!</h4>
    <p id="alert-message">
        <?php

            if(isset($alert_message)){
                echo $alert_message;
            }

        ?>
    </p>
</div>

<?php
include("../components/footer.php");

?>
