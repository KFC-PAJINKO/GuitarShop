<?php
session_start();
require('connect.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
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
                        $q = "select * from guitaritems where gnumber = '".$_GET['gid']."';";
                        if($result = $mysql->query($q))
                        {
                            while($row = $result->fetch_array())
                            {
                                echo "<img src='data:image/jpeg;base64," .base64_encode($row['gpic']). "' alt='Guitar Image' style='width: 80%; height: auto;'>";
                            }
                        }
                        else
                        {
                            echo "Error in query execution: ".$mysql->error;
                        }                                                                    
                    ?>
                </div>
                <div class="right">
                    <?php                        
                        $q = "select * from guitaritems where gnumber = '".$_GET['gid']."';";
                        if($result = $mysql->query($q))
                        {
                            while($row = $result->fetch_array())
                            {
                                echo "<div class='itemtext'>";
                                echo "<h2 style='font-size: 37px; margin-bottom: 35px'>".$row['gname']."</h2>";
                                echo "<hr style='width: 100%; margin-bottom: 25px;'>";
                                echo "<p>Electric Guitar: ".$row['gname']."</p><br>";
                                echo "<p>Guitar Model ID: ".$row['gnumber']."</p><br>";
                                echo "<p>Brand: ".$row['gbrand']."</p><br>";
                                echo "<p>Price: ".$row['gprice']." Bath</p><br>";
                                echo "</div>";
                            }
                        }
                        else
                        {
                            echo "Error in query execution: ".$mysql->error;
                        }  
                    ?>
                </div>
            </div>
        </section>       
    </body>
</html>