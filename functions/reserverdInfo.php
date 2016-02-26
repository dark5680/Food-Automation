<?php require_once("../resources/config.php"); ?>
<?php
$count="SELECT COUNT(*) FROM `userbracf` WHERE 1";
$brCount=mysql_query($count);
$count="SELECT COUNT(*) FROM `userlunch` WHERE 1";
$luCount=mysql_query($count);
$count="SELECT COUNT(*) FROM `userdinner` WHERE 1";
$diCount=mysql_query($count);
$br= mysql_fetch_row($brCount);
$lu= mysql_fetch_row($luCount);
$di= mysql_fetch_row($diCount);
$all=array();
$info=array();
array_push($info, $br);
array_push($info, $lu);
array_push($info, $di);

array_push($all,$info);

$users="SELECT COUNT(*) FROM `users` WHERE 1";
$res=mysql_query($users);
$row=mysql_fetch_row($res);
array_push($all,$row[0]);
$self="SELECT COUNT(*) FROM `self` WHERE 1";
$res=mysql_query($self);
$row=mysql_fetch_row($res);
array_push($all,$row[0]);

echo json_encode($all);
?>