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
            <img src="../images/J&G_Beauty _Salon.png" alt="J&G Beauty Salon">
        </div>
        <h1>Welcome</h1>
        <form action="../../backend/addUser.php" method="POST">
            <label for="fname">First Name</label>
            <input type="text" placeholder="enter first name" name="fname" required>

            <label for="lname">Last Name</label>
            <input type="text" placeholder="enter last name" name="lname" required>

            <label for="psw">Password</label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label for="admin-psw">Admin Password</label>
            <input type="password" placeholder="Enter Admin Password" name="admin-psw" required>

            <button type="submit" class="btn">SignUp</button>
            <br>
            <br>
            <p>Already Have an account? <a href="./login.php">Log in here</a></p>
        </form>
    </div>
</main>


<?php

include("../components/footer.php");

?>
