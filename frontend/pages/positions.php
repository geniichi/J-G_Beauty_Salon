<?php

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
                    <input type="checkbox" name="hair_treatment" value="1">
                    <label for="hair_treatment"> Hair Treatment</label><br>
                </div>
                <div class="signup-position-checkbox">
                    <input type="checkbox" name="nail_treatment" value="2">
                    <label for="nail_treatment"> Nail Treatment</label><br>
                </div>
                <div class="signup-position-checkbox">
                    <input type="checkbox" name="body_treatment" value="3">
                    <label for="body_treatment"> Body Treatment</label><br>
                </div>
                <div class="signup-position-checkbox">
                    <input type="checkbox" name="face_treatment" value="4">
                    <label for="face_treatment"> Face Treatment</label><br>
                </div>
                <div class="signup-position-checkbox">
                    <input type="checkbox" name="foot_treatment" value="5">
                    <label for="foot_treatment"> Foot Treatment</label><br>
                </div>
                <button type="submit" class="btn">Add Positions</button>
            </form>
        </div>
    </main>

<?php

include("../components/footer.php");

?>
