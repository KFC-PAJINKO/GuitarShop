<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guitar Item Info Page</title>
        <link rel="stylesheet" href="itemsinfo.css">
    </head>
    <body>
        <section class="top">
            <div class="topup">
                <p>How to order</p>
                <p>News and Offer</p>
                <p>Contact us</p>
                <p>|</p>
                <img src="account.png" alt="Account Icon" style="width:20px;height:20px;margin-top: 10px;">
                <p style="margin-left: 5px;">Register</p>
            </div>
            <div class="topdown">
                <h1 style="margin-top: 25px; white-space: nowrap;">Windows Music</h1>
                <input type="text" placeholder="Search for products..." style="width: 60%;height: 40%;margin-top: 25px;margin-right: 30px; margin-left: 3%;">
                <img src="cart.png" alt="Cart Icon" style="width: 20px;height: 20px;margin-top: 35px;margin-right: 15%;">
            </div>
        </section>
        <section class="middle">
            <div class="itemsinfo">
                <div class="left">
                    <?php
                        session_start();
                        $gname = $_SESSION['gname'];
                        require('connect.php');
                        echo "Guitar name: ".$gname;
                    ?>
                </div>
                <div class="right">
                    <?php
                        session_start();
                        $gnumber = $_SESSION['gnumber'];
                        require('connect.php');
                        echo "Guitar ID: " . $gnumber;
                    ?>
                </div>
            </div>
        </section>       
    </body>
</html>