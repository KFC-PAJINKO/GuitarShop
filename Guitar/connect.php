<?php
$mysql = new mysqli('localhost','root','root','guitarshop',3306);
if($mysql->connect_errno)
{
    echo $mysqli -> connect_error.": ".$mysqli->connect_error;
}
?>
