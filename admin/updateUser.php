<?php require_once("header.php"); ?>
<?php require_once("../resources/config.php"); ?>
<?php require_once("../functions/getUsers.php"); ?>
<?php require_once("../resources/library/jdf.php"); ?>
<?php require_once("aside.php"); ?>
<?php
session_start();
if(isset($_SESSION['user'])){
$user=$_SESSION['user'];
$id=$user[0];
$fname=$user[1];
$lname=$user[2];
unset($_SESSION['user']);
}
else{
    $id="";
    $fname="";
    $lname="";
}
?>
<div class="btn">
    <form action="">
        <input class="myButton2" type="button" name="newUser" value="ذخیره" title="ذخیره تغییرات" onclick="saveChange()">
        <input class="myButton2" type="button" name="cancel" value="انصراف" title="بازگشت به صفحه ویرایش کاربران" onclick="window.location.href='editUser.php'">
    </form>
</div>
</aside>
<div class="container" class="left">
    <br><br><br><br><br><br>
    <div id="newUser" class="center">
        <form action="">
            <br><br>
            <label class="my-font" for="userId"> نام کاربری :</label>
            <input class="txtInput my-font" type="text" name="userId" value="<?php echo $id ?>" >
            <br><br>
            <label class="my-font" id="setMargin" for="pass"> رمز :</label>
            <input id="pass" class="txtInput my-font" type="password" name="pass" placeholder="رمز را اینجا وارد کنید..." onkeyup="checkPasswordMatch();" >
            <br><br>
            <label class="my-font" for="againPass"> تکرار رمز :</label>
            <input id="againPass" class="txtInput my-font" type="password" name="againPass" placeholder="رمز را دوباره وارد کنید..." onkeyup="checkPasswordMatch();" >
            <div class="left" id="checkPass"></div>
            <br><br>
            <label class="my-font setCenter" for="fname"> نام :</label>
            <input class="txtInput my-font" type="text" name="fname" value="<?php echo $fname ?>" >
            <br><br>
            <label class="my-font" for="name"> نام خانوادگی :</label>
            <input id="setMargin2" class="txtInput my-font" type="text" name="lname" value="<?php echo $lname ?>" >
            <br><br><br>
        </form>
    </div>
</div>
<?php require_once("footer.php"); ?>