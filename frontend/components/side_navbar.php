<?php
    if ($_SERVER["PHP_SELF"] != "/frontend/pages/staff_waitroom.php") {
        echo '
            <nav id="side-navbar">
                <div class="side-navabr-icons">
                    <a href="../pages/index.php">
                        <span class="material-symbols-outlined">dashboard</span>
                        <p>Dashboard</p>
                    </a>
                </div>
                <div class="side-navabr-icons">
                    <a href="../pages/inventory.php">
                        <span class="material-symbols-outlined">inventory_2</span>
                        <p>Inventory</p>
                    </a>
                </div>
                <div class="side-navabr-icons">
                    <a href="../pages/orders.php">
                        <span class="material-symbols-outlined">orders</span>
                        <p>Orders</p>
                    </a>
                </div>
                <div class="side-navabr-icons">
                    <a href="../pages/booking.php">
                        <span class="material-symbols-outlined">package</span>
                        <p>Appointments</p>
                    </a>
                </div>';
                    if($_SESSION["user_id"] == 1){
                        echo '
                            <div class="side-navabr-icons">
                                <a href="../pages/staff.php">
                                <span class="material-symbols-outlined">group</span>
                                    <p>Staff</p>
                                </a>
                            </div>
                        ';
                    }
            echo '
            </nav>
        ';
    }
