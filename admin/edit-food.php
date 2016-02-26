<?php require_once("header.php"); ?>
<?php require_once("../functions/getSched.php"); ?>
<?php require_once("../resources/library/jdf.php"); ?>
<?php require_once("aside.php"); ?>
<div class="btn center">
        <input class="myButton2" type="button" name="delAllFood" value="پاک کردن" title="تمامی غذاها پاک خواهد شد" onclick="delAllFood()">
        <input class="myButton2" type="button" name="newFood" value="اضافه کردن" title="اضافه کردن غذای جدید" onclick="window.location.href='newFood.php'">
</div>
</aside>
<div class="container" class="left">
<br />
    <div class="table-size" id="break">
        <table class="foodTable" id="editTable">
            <tr>
                <th class="table-color">ردیف</th>
                <th class="table-color">نام غذا</th>
                <th class="table-color">قیمت</th>
                <th class="table-color">ویرایش</th>
            </tr>
            <tr id="edit">
            </tr>
        </table>
    </div>
    <br /><br />
    <div class="center">
        <input class="myButton2" type="button" onclick="editFood(1)" value="صبحانه" >
        <input class="myButton2" type="button" onclick="editFood(2)" value="ناهار" >
        <input class="myButton2" type="button" onclick="editFood(3)" value="شام" >
    </div>
</div>
<?php require_once("footer.php"); ?>