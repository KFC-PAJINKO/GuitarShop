<?php
$mysql = new mysqli('localhost','root','root','guitarshop',3306);
if($mysql->connect_errno)
{
    echo $mysql -> connect_error.": ".$mysql->connect_error;
}
?>
