

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
