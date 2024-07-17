<?php
include("../components/header.php");

?>

<style>
    <?php include("../CSS/login.css")?>
</style>

<main>
    <div>
        <div id="login-logo-img-container">
            <img src="../images/J&G_Beauty_Salon.png" alt="J&G Beauty Salon">
        </div>
        <h1>Welcome</h1>
        <form action="../../backend/verifyUser.php" method="POST">
            <div>
                <label for="fname">First Name</label>
                <input type="text" placeholder="Enter Username" name="fname" required>
            </div>

            <div>
                <label for="psw">Password</label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            </div>


            <button type="submit" class="btn">Login</button>
            <br>
            <br>
            <p>Don't have an account? <a href="./signup.php">Sign Up here</a></p>
        </form>
    </div>
    <div>

    </div>
</main>


<?php

include("../components/footer.php");

?>
