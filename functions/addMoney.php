<?php require_once("../resources/config.php"); ?>
<?php require_once("getUsers.php"); ?>
<?php
session_start();
$cardId=$_SESSION['id'];
$balance=getUserBal($_SESSION['id']);
$amount=trim($_POST['amount']);
$amount+=$balance;
$addMoney="UPDATE `users` SET `balance`=$amount WHERE cardId=$cardId";
$res=mysql_query($addMoney);
$balance=getUserBal($_SESSION['id']);
$result=array();
array_push($result,$res);
array_push($result,$balance);
echo json_encode($result);
?>