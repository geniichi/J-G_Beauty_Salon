<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Constant CSS -->
    <link rel="stylesheet" href="../components/components.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- Scripts -->
    <script defer src="../scripts/scripts.js"></script>

    <title>Document</title>
</head>
<body>


        <?php
            // echo $_SERVER["PHP_SELF"];

            if(isset($_SESSION["user_id"])){
                if ($_SERVER["PHP_SELF"] != "/frontend/pages/login.php" &&
                $_SERVER["PHP_SELF"] != "/frontend/pages/signup.php" &&
                $_SERVER["PHP_SELF"] != "/frontend/pages/positions.php" &&
                $_SERVER["PHP_SELF"] != "/frontend/pages/staff_waitroom.php" &&
                $_SERVER["PHP_SELF"] != "/frontend/pages/staff_unemployed.php") {
                    $username = $_SESSION["username"];

                    echo '
                        <header>
                            <div id="logo-img-container">
                                <img src="../images/J&G_Beauty_Salon.png" alt="J&G Beauty Salon">
                            </div>';

                            if (strpos($_SERVER["PHP_SELF"], "inventory") !== false ||
                                strpos($_SERVER["PHP_SELF"], "singleProduct") !== false){
                                echo "INVENTORY";
                            } else if(strpos($_SERVER["PHP_SELF"], "index") !== false){
                                echo "DASHBOARD";
                            } else if(strpos($_SERVER["PHP_SELF"], "orders") !== false ||
                                strpos($_SERVER["PHP_SELF"], "changeOrder") !== false){
                                echo "ORDERS";
                            } else if(strpos($_SERVER["PHP_SELF"], "staff") !== false){
                                echo "STAFF";
                            } else if(strpos($_SERVER["PHP_SELF"], "addOrder") !== false){
                                echo "ADD ORDER";
                            } else if(strpos($_SERVER["PHP_SELF"], "addProduct") !== false){
                                echo "ADD PRODUCT";
                            }


                    echo'   <div>
                                <h4>' . $username . '</h4>';

                            if($_SESSION["position"] == "admin"){
                                echo '
                                    <span class="material-symbols-outlined" onclick="showLogOut()">
                                        admin_panel_settings
                                    </span>
                                ';
                            } else {
                                echo '
                                    <span class="material-symbols-outlined" onclick="showLogOut()">
                                        account_circle
                                    </span>
                                ';
                            }
                    echo'</div>
                            <div id="header-account-dropdown">
                                <ul>
                                    <li><a href="../pages/index.php">Profile</a></li>
                                    <li><a href="../../backend/logout.php">Logout</a></li>
                                </ul>
                            </div>

                        </header>
                    ';
                }
            }

        ?>
