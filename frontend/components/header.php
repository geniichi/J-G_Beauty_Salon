<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/components.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>


        <?php
            // echo $_SERVER["PHP_SELF"];

            if ($_SERVER["PHP_SELF"] != "/J-G_Beauty_Salon/frontend/pages/login.php" &&
                $_SERVER["PHP_SELF"] != "/J-G_Beauty_Salon/frontend/pages/signup.php" &&
                $_SERVER["PHP_SELF"] != "/J-G_Beauty_Salon/frontend/pages/positions.php") {
                $username = $_COOKIE["username"];
                echo '
                        <header>
                            <div id="logo-img-container">
                                <img src="../images/J&G_Beauty _Salon.png" alt="J&G Beauty Salon">
                            </div>

                            <div>
                                <h4>' . $username . '</h4>
                                <div id="account-image-holder">
                                    <img src="../images/account_circle.png" alt="account logo">
                                </div>
                            </div>

                        </header>
                ';
            }
        ?>
