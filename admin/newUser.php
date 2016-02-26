<?php require_once("header.php"); ?>
<?php require_once("../resources/config.php"); ?>
<?php require_once("../functions/getUsers.php"); ?>
<?php require_once("../resources/library/jdf.php"); ?>
<?php require_once("aside.php"); ?>
<div class="btn">
    <form action="">
        <input class="myButton2" type="button" name="newUser" value="اضافه کردن" title="اضافه کردن کاربر جدید" onclick="saveUser()">
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
            <input class="txtInput my-font" type="text" name="userId" placeholder="نام کاربری را اینجا وارد کنید..." >
            <br><br>
            <label class="my-font" id="setMargin" for="pass"> رمز :</label>
            <input id="pass" class="txtInput my-font" type="password" name="pass" placeholder="رمز را اینجا وارد کنید..." onkeyup="checkPasswordMatch();" >
            <br><br>
            <label class="my-font" for="againPass"> تکرار رمز :</label>
            <input id="againPass" class="txtInput my-font" type="password" name="againPass" placeholder="رمز را دوباره وارد کنید..." onkeyup="checkPasswordMatch();" >
            <div class="left" id="checkPass"></div>
            <br><br>
            <label class="my-font setCenter" for="fname"> نام :</label>
            <input class="txtInput my-font" type="text" name="fname" placeholder="نام را اینجا وارد کنید..." >
            <br><br>
            <label class="my-font" for="name"> نام خانوادگی :</label>
            <input id="setMargin2" class="txtInput my-font" type="text" name="lname" placeholder="نام خانوادگی را اینجا وارد کنید..." >
            <br><br><br>
        </form>
    </div>
</div>

    <?php require_once("footer.php"); ?>