<!-- Login Page -->
<?php
    session_start();
    include("../components/header.php");
    include("../../backend/connect.php");

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fname = $_POST['fname'];
        $password = $_POST['psw'];

        $sql = "SELECT Staff_ID, password FROM staff WHERE first_name = '$fname'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];

            if (password_verify($password, $hashed_password)) {
                header("Location: ./index.php");
                $_SESSION["user_id"] = $row["Staff_ID"];
                $_SESSION["username"] = $fname;
                if($_SESSION["user_id"] == 1){
                    $_SESSION["position"] = "admin";
                } else {
                    $_SESSION["position"] = "staff";
                }
                exit();
            } else {
                header("Location: ./login.php?error=2");
                exit();
            }
        } else {
            header("Location: ./login.php?error=1");
            exit();
        }
    }
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
        <form action="./login.php" method="POST">
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
