<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('connect.php');
$imghollow = file_get_contents('C:\MAMP\htdocs\Project\Guitar\guitarpic\hollow.png');
$imgjazz = file_get_contents('C:\MAMP\htdocs\Project\Guitar\guitarpic\jazzmaster.png');
$imglespaul = file_get_contents('C:\MAMP\htdocs\Project\Guitar\guitarpic\lespaul.png');
$imglespaulprs = file_get_contents('C:\MAMP\htdocs\Project\Guitar\guitarpic\lespaulprs.png');
$imgprs = file_get_contents('C:\MAMP\htdocs\Project\Guitar\guitarpic\prs.png');
$imgstrat = file_get_contents('C:\MAMP\htdocs\Project\Guitar\guitarpic\strat.png');
$imgsuperstrat = file_get_contents('C:\MAMP\htdocs\Project\Guitar\guitarpic\superstrat.png');
$imgsupersuperstrat = file_get_contents('C:\MAMP\htdocs\Project\Guitar\guitarpic\supersuperstrat.png');
$imgtelecaster = file_get_contents('C:\MAMP\htdocs\Project\Guitar\guitarpic\telecaster.png');
$listguitar = array(array('g_001',$imghollow,'Semi-Hollow Body Guitar', 23000.00, 'Epiphone'),
                    array('g_002',$imgjazz,'Jazzmaster Guitar', 15000.00, 'Squier'),
                    array('g_003',$imglespaul,'Les Paul Standard', 25000.00, 'Gibson'),
                    array('g_004',$imglespaulprs,'Les Paul PRS', 20000.00, 'PRS'),
                    array('g_005',$imgprs,'PRS Custom 24', 32000.00, 'PRS'),
                    array('g_006',$imgstrat,'Stratocaster', 18000.00, 'Fender'),
                    array('g_007',$imgsuperstrat,'Super Strat', 20000.00, 'Ibanez'),
                    array('g_008',$imgsupersuperstrat,'Super Super Strat', 22000.00, 'Ibanez'),
                    array('g_009',$imgtelecaster,'Telecaster', 17000.00, 'Fender'));

foreach($listguitar as $guitar)
{
    $stmt = $mysql->prepare("INSERT INTO guitaritems (gnumber, gpic, gname, gprice, gbrand) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssds", $guitar[0], $guitar[1], $guitar[2], $guitar[3], $guitar[4]);
    $stmt->execute();
}

?>