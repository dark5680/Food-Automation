<?php 
require_once "../resources/config.php";
require_once "../functions/loginAdmin.php";
session_start();

if(isset($_POST['login'])){
    $userName =  $_POST['name'];
    $password = $_POST['pass'];
   
    settype($userName , 'string');
    settype($password , 'int');
    
    $q = selectDB($userName , $password);
    
    if($q){
        $_SESSION['Name'] = $userName;
        $_SESSION['pass'] = $password;
        $_SESSION['time'] = time();
        header("Location: index.php");
    }
    else{
        $val = 'نام کاربری یا رمز عبور شما اشتباه می باشد.';
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
            <br><br>
            <img id="login-img" src="../img/layout/logo.png">
            <h1 class="center">ورود به سامانه تغذیه</h1>
            <br>
             <p class="center my-font show display">
                   <?php 
                   if(isset($val)){
                       echo $val;
                   }
                   ?>
               </p>
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
            
        </div>
<?php require_once("footer.php"); ?>
<?php 

if(isset($val)){
    echo "<script>$('.show').show();</script>";
}
?>