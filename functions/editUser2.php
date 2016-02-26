<?php require_once("../resources/config.php"); ?>
<?php
$id=$_POST['id2'];
$query="SELECT `cardId`, `fname`, `lname` FROM `users` WHERE cardId=$id";
$res=mysql_query($query);
$user=array();
$row=mysql_fetch_row($res);
for($i=0;$i<3;$i++){
    array_push($user,$row[$i]);
}
session_start();
$_SESSION['user']=$user;
echo ("updateUser.php");
?>