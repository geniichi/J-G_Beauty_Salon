<?php
    session_start();

    if(!isset($_SESSION["user_id"])){
        header("Location: ./signup.php");
    }
    include("../components/header.php");
?>

<style>
    <?php include("../CSS/positions.css")?>
</style>

<main>
    <div>

    </div>
    <div>
        <h1>Position</h1>
        <form action="../../backend/addPosition.php" method="POST">
            <div class="signup-position-checkbox">
                <input type="checkbox" id="hair_treatment" name="hair_treatment" class="position_checkbox" value="1">
                <label for="hair_treatment" class="custom-checkbox">
                    <span class="checkmark"></span>
                </label>
                <p>Hair Treatment</p>
                <br>
            </div>
            <div class="signup-position-checkbox">
                <input type="checkbox" id="nail_treatment" name="nail_treatment" class="position_checkbox" value="2">
                <label for="nail_treatment" class="custom-checkbox">
                    <span class="checkmark"></span>
                </label>
                <p>Nail Treatment</p>
                <br>
            </div>
            <div class="signup-position-checkbox">
                <input type="checkbox" id="body_treatment" name="body_treatment" class="position_checkbox" value="3">
                <label for="body_treatment" class="custom-checkbox">
                    <span class="checkmark"></span>
                </label>
                <p>Body Treatment</p>
                <br>
            </div>
            <div class="signup-position-checkbox">
                <input type="checkbox" id="face_treatment" name="face_treatment" class="position_checkbox" value="4">
                <label for="face_treatment" class="custom-checkbox">
                    <span class="checkmark"></span>
                </label>
                <p>Face Treatment</p>
                <br>
            </div>
            <div class="signup-position-checkbox">
                <input type="checkbox" id="foot_treatment" name="foot_treatment" class="position_checkbox" value="5">
                <label for="foot_treatment" class="custom-checkbox">
                    <span class="checkmark"></span>
                </label>
                <p>Foot Treatment</p>
                <br>
            </div>
            <button type="submit" class="btn">Add Positions</button>
        </form>
    </div>
</main>

<?php include("../components/footer.php"); ?>
