<?php 
require_once "resources/config.php";
require_once 'functions/loginUser.php';
session_start();

if(isset($_POST['login'])){
    $id =  $_POST['name'];
    $pass = $_POST['pass'];
   
    settype($id , 'int');
    settype($pass , 'int');
    
    $q = selectDB($id , $pass);
    
    if($q){
        $_SESSION['id'] = $id;
        $_SESSION['pass'] = $pass;
        $_SESSION['time'] = time();
        header("Location: index.php");
    }
    else{
        $val = 'نام کاربری یا رمز عبور شما اشتباه می باشد';
    }
    
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
        <link rel=stylesheet type="text/css" href="css/checkbox.css">
    </head>
    <body>
        <div class="container container2 center">
            <br><br><br>
            <img id="login-img" src="img/layout/logo.png">
            <h1 class="center">ورود به سامانه تغذیه</h1>
            <br>
            <br><br>
            <div class="inputBorder2 center">
               <br>
                <form id="log" method="post">
                    <label for="name" class="my-font">نام کاربری : </label>
                    <input type="texr" class="txtInput" name="name"><br> <br>
                    <label for="pass" class="my-font" id="pass">رمز : </label>
                    <input type="password" class="txtInput" name="pass"><br> <br>
                    <input type="submit" value="ورود" name="login" class="myButton" >
                </form>
            </div>
            <?php 
                if(isset($val)){
                    echo "<div id=\"triangle\" class=\"display\"></div>";
                }
            ?>
            <p class="center my-font show display">
                <?php 
                if(isset($val)){
                    echo $val;
                }
                ?>
               </p>
        </div>
<?php require_once("footer.php"); ?>
<?php 

if(isset($val)){
    echo "<script>$('.display').show();</script>";
}
?>