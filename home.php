<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guitar Home Page</title>
        <link rel="stylesheet" href="home.css">
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
        <section class="midwrap">
            <div class="middle">
                <div class="info">
                    <div class="electricg">
                        <h2 style="font-size: 50px;padding-top: 20px;">Electric guitar is cool</h2>
                    </div>
                    <div class="pictureg">
                        <img src="guitarpic.jpg" alt="Guitar Picture" style="width:1147px;height:388px;position: relative;">
                        <div style="position:absolute;top: 3%;left: 3%;color: white;">
                            <h1 style="font-size: 45px;">Electric Guitars</h1>
                            <p style="font-size: 20px;">An electric guitar is a guitar that requires external electric sound amplification in order to be heard at typical performance <br>
                                volumes, unlike a standard acoustic guitar. It uses one or more pickups to convert the vibration<br>
                                of its strings into electrical signals, which ultimately are reproduced as sound by loudspeakers.<br>
                                The sound is sometimes shaped or electronically altered to achieve different timbres or tonal qualities via amplifier settings or knobs on the guitar.<br><br>
                                Often, this is done through <br>
                                the use of effects such as reverb, distortion and "overdrive"; the latter is considered to be a key <br>
                                element of electric blues guitar music and jazz, rock and heavy metal guitar playing. Designs also exist <br>
                                combining attributes of electric and acoustic guitars: the semi-acoustic and acoustic-electric guitars.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="items">
                    <div class="filter">
                        <h3 style="margin-left: 25px;">Filter by price</h3>
                        <hr style="width: 90%;opacity: 50%;">
                        <?php
                            if (isset($_GET['minpricerange']) && isset($_GET['maxpricerange']))
                            {                                
                                $minprice = (int)$_GET['minpricerange'];
                                $maxprice = (int)$_GET['maxpricerange'];                                                                            
                            }
                            else
                            {
                                $minprice = 0;
                                $maxprice = 30000;
                            }        
                        ?>                        
                        <form action="home.php" method="get">
                            <div class ="pricefilter">
                                <p>From: <span id="minprice"></span> To: <span id="maxprice"></span></p>
                                <p>MinimumPriceRange</p>
                                <input type="range" name = minpricerange min="0" max="30000" value="<?php echo $minprice?>" class="slider" id="minpricerange" onchange="this.form.submit()">
                                <p>MaximumPriceRange</p>
                                <input type="range" name = maxpricerange min="0" max="30000" value="<?php echo $maxprice?>" class="slider" id="maxpricerange" onchange="this.form.submit()">        
                                <script>
                                    var minslider = document.getElementById("minpricerange");
                                    var maxslider = document.getElementById("maxpricerange");
                                    var minprice = document.getElementById("minprice");
                                    var maxprice = document.getElementById("maxprice");
                                    minprice.innerHTML = minslider.value;
                                    maxprice.innerHTML = maxslider.value;

                                    minslider.oninput = function() 
                                    {
                                        let max = Number(maxslider.value);
                                        if (Number(this.value) >= max) 
                                        {
                                            this.value = max-1;
                                        }
                                        minprice.innerHTML = this.value;
                                    }
                                    maxslider.oninput = function() 
                                    {
                                        let min = Number(minslider.value);
                                        if (Number(this.value) <= min) 
                                        {
                                            this.value = min;
                                        }
                                        maxprice.innerHTML = this.value;
                                    }
                                </script>
                                <p>Sort Price:</p>
                                <div class="sortprice">                                    
                                    <input type="submit" name="ascendingbut" value="ascending" style="margin-right: 10px;">
                                    <input type="submit" name="descendingbut" value="descending">
                                </div>                               
                            </div>
                        </form>
                    </div>                    
                    <div class="itemslist">                        
                        <?php
                            session_start();
                            require('connect.php');                                                                    
                            $q = "select * from guitaritems where gprice >= $minprice and gprice <= $maxprice";
                            if(isset($_GET['ascendingbut']))
                            {
                                $q .= " order by gprice asc";
                                if($result = $mysql->query($q))
                                {
                                    while($row = $result->fetch_array())
                                    {                        
                                        echo '<a href = "itemsinfo.php?gid='.$row['gnumber'].'">';

                                        $_SESSION['gnumber'] = $row['gnumber'];
                                        $_SESSION['gpic'] = $row['gpic'];
                                        $_SESSION['gname'] = $row['gname'];
                                        $_SESSION['gprice'] = $row['gprice'];
                                        $_SESSION['gbrand'] = $row['gbrand'];

                                        echo '<div class="card">';
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['gpic']).'" alt="Guitar Image">';
                                        echo '<b><h4>'.$row['gname'].'</h4></b>';
                                        echo '<p>'.$row['gprice'].' bath </p>';
                                        echo '</div>';
                                        echo '</a>';
                                    }
                                }
                                else
                                {
                                    echo "Error in query execution: ".$mysql->error;
                                }                                
                            }
                            else if(isset($_GET['descendingbut']))
                            {
                                $q .= " order by gprice desc";
                                if($result = $mysql->query($q))
                                {
                                    while($row = $result->fetch_array())
                                    {
                                        echo '<a href = "itemsinfo.php?gid='.$row['gnumber'].'">';

                                        $_SESSION['gnumber'] = $row['gnumber'];
                                        $_SESSION['gpic'] = $row['gpic'];
                                        $_SESSION['gname'] = $row['gname'];
                                        $_SESSION['gprice'] = $row['gprice'];
                                        $_SESSION['gbrand'] = $row['gbrand'];    
                                        
                                        echo '<div class="card">';
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['gpic']).'" alt="Guitar Image">';
                                        echo '<b><h4>'.$row['gname'].'</h4></b>';
                                        echo '<p">'.$row['gprice'].' bath </p>';
                                        echo '</div>';
                                        echo '</a>';
                                    }
                                }
                                else
                                {
                                    echo "Error in query execution: ".$mysql->error;
                                }         
                            }
                            else
                            {                                                      
                                if($result = $mysql->query($q))
                                {
                                    while($row = $result->fetch_array())
                                    {
                                        echo '<a href = "itemsinfo.php?gid='.$row['gnumber'].'">';

                                        $_SESSION['gnumber'] = $row['gnumber'];
                                        $_SESSION['gpic'] = $row['gpic'];
                                        $_SESSION['gname'] = $row['gname'];
                                        $_SESSION['gprice'] = $row['gprice'];
                                        $_SESSION['gbrand'] = $row['gbrand'];

                                        echo '<div class="card">';
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['gpic']).'" alt="Guitar Image">';
                                        echo '<b><h4>'.$row['gname'].'</h4></b>';
                                        echo '<p">'.$row['gprice'].' bath </p>';
                                        echo '</div>';
                                        echo '</a>';
                                    }
                                }
                                else
                                {
                                    echo "Error in query execution: ".$mysql->error;
                                }
                            }
                        ?>
                    </div>                
                </div>
            </div>
        </section>
    </body>
</html>