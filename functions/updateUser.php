<?php require_once("../resources/config.php"); ?>
<?php
check();
function addUser($oldId,$id,$pass,$fname,$lname){
    $user="UPDATE `users` SET `cardId`=$id,`pass`=$pass,`fname`=$fname,`lname`=$lname WHERE cardId=$oldId";
    $res=mysql_query($user);
    if($res){
        echo("کاربر با موفقیت ویرایش شد");
    }
    else{
        echo(" ویرایش کاربر با خطا مواجه شد.لطفا دوباره سعی بفرمایید");
    }
}
function check()
{
    $oldId=$_POST['oldId'];
    $id=$_POST['id'];
    $pass=$_POST['pass'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $check="SELECT `cardId` FROM `users` WHERE cardId=\"$oldId\" OR fname=\"$fname\" AND lname=\"$lname\"";
    $res=mysql_query($check);
    $row=mysql_fetch_row($res);
    if($row){
        echo("کاربری با این اطلاعات موجود می باشد");
    }
    else{
        addUser($oldId,$id,$pass,$fname,$lname);
    }
}
?>