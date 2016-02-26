<?php require_once("../resources/config.php"); ?>
<?php 
session_start();

if(!(isset($_SESSION['Name'])) || time() - $_SESSION['time'] > 600){
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
    <title>سامانه تغذیه</title>
    <!--Link CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel=stylesheet type="text/css" href="css/normalize.css">
    <link rel=stylesheet type="text/css" href="css/nav2.css">
    <link rel=stylesheet type="text/css" href="css/btn.css">
    <link rel=stylesheet type="text/css" href="css/btn2.css">
    <link rel=stylesheet type="text/css" href="css/btn3.css">
    <link rel=stylesheet type="text/css" href="css/btn4.css">
    <link type="text/css" rel="stylesheet" href="css/tab.css">
    <link type="text/css" rel="stylesheet" href="../resources/library/notify/css/jquery.peekabar.css">
    <!-- Clock Files -->
    <link rel="stylesheet" type="text/css" href="../resources/library/clock/css3clock.css" />
    <!-- userTable Files -->
    <link rel="stylesheet" href="../resources/library/userTable/css/userTable.css">
    <script type="text/javascript" src="../resources/library/moment-with-locales.js"></script>
    <script type="text/javascript" src="../resources/library/moment.js"></script>
    <script type="text/javascript" src="../resources/library/jalali.js"></script>
<body>
    <header id="main-header">
        <div class="hdr-container">
               <div id="logo" class="center">
                   <a id="logo-link" href="index.php" title="سامانه تغذیه">
                    <img src="../img/layout/logo.png">
                    <h1>اتوماسیون تغذیه</h1>
                   </a>
                </div>
            <nav id="main-nav">
                <div id='cssmenu'>
                    <ul>
                        <li class="active"><a href="index.php">برنامه غذایی</a></li>
                        <li><a href="edit-food.php">ویرایش غذاها</a></li>
                        <li><a href="editUser.php">ویرایش کاربران</a></li>
                        <li><a href="editAdmin.php">ویرایش حساب</a></li>
                        <li><a href="logOut.php">خروج</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
