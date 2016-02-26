<?php require_once("header.php"); ?>
<?php require_once("../resources/config.php"); ?>
<?php require_once("../functions/getSched.php"); ?>
<?php require_once("../resources/library/jdf.php"); ?>
<?php require_once("aside.php"); ?>
    <div class="btn center">
        <form action="">
            <input class="myButton2" type="button" name="save" value="ذخیره" title="اضافه کردن غذای جدید" onclick="addFood()">
            <input class="myButton2" type="button" name="cancel" value="بازگشت" title="بازگشت به صفحه قبل" onclick="window.location.href='edit-food.php'">
        </form>
    </div>
</aside>
<div class="container center">
    <br><br><br><br>
    <div id="newFood" class="center">
        <br>
        <form action="">
            <label class="my-font" for="foodName">نام :</label>
            <input class="txtInput my-font" type="text" name="foodName" placeholder="نام غذا را اینجا وارد کنید..." ><br><br>
            <label class="my-font" for="foodPrice">قیمت :</label>
            <input class="txtInput my-font" id="foodPrice" type="number" step="100" min="0" name="foodPrice" placeholder="مبلغ را به ریال وارد کنید..." >
            <br><br>
            <label class="my-font" for="type">نوع :</label>
            <label for="radio1" class="css-label">صبحانه</label>
            <input type="radio" name="type" id="radio1" class="css-checkbox" value="1" />
            <label for="radio2" class="css-label">ناهار</label>
            <input type="radio" name="type" id="radio2" class="css-checkbox" value="2" />
            <label for="radio3" class="css-label">شام</label>
            <input type="radio" name="type" id="radio3" class="css-checkbox" value="3" />
        </form>
    </div>
</div>
<?php require_once("footer.php"); ?>