<?php
$hostname_food = "localhost";
$database_food = "food";
$username_food = "root";
$password_food = "";
$food = mysql_connect($hostname_food, $username_food, $password_food) or die("مشکل در ایجاد ارتباط با پایگاه داده");
mysql_select_db($database_food);
mysql_query("SET NAMES 'utf8'", $food);
mysql_query("SET CHARACTER SET 'utf8'", $food);
mysql_query("SET character_set_connection = 'utf8'", $food);
?>