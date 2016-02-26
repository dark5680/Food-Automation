<?php 
require_once "resources/config.php";
session_start();
if(!(isset($_SESSION['id'])) || time() - $_SESSION['time'] > 9600){
    header("Location: logOut.php");
}
else{
    $_SESSION['time'] = time();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>سامانه تغذیه</title>
    <!--Link CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel=stylesheet type="text/css" href="css/normalize.css">
    <link rel=stylesheet type="text/css" href="css/nav2.css">
    <link rel=stylesheet type="text/css" href="css/btn.css">
    <link rel=stylesheet type="text/css" href="css/btn2.css">
    <link rel=stylesheet type="text/css" href="css/checkbox.css">
    <link type="text/css" rel="stylesheet" href="resources/library/notify/css/jquery.peekabar.css">
    <!-- Clock Files -->
    <link rel="stylesheet" type="text/css" href="resources/library/clock/css3clock.css" />
</head>

<body>
    <header id="main-header">
        <div class="hdr-container">
               <div id="logo" class="center">
                   <a id="logo-link" href="index.php" title="سامانه تغذیه">
                    <img src="img/layout/logo.png">
                    <h1>اتوماسیون تغذیه</h1>
                   </a>
                </div>
            <nav id="main-nav">
                <div id="cssmenu">
                    <ul>
                        <li><a href="index.php">رزرو غذا</a></li>
                        <li><a href="inc-money.php">افزایش اعتبار</a></li>
                        <li><a href="edit-user.php">ویرایش حساب</a></li>
                        <li><a href="aboutUs.php">درباره ما</a></li>
                        <li><a href="logOut.php">خروج</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
