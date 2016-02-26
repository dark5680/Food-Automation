<?php require_once("../resources/config.php"); ?>
<?php
check();
function addUser($id,$pass,$fname,$lname){
    $user="INSERT INTO `users`(`cardId`, `pass`, `fname`, `lname`) VALUES ('$id','$pass','$fname','$lname')";
    $res=mysql_query($user);
    if($res){
        echo("کاربر با موفقیت اضافه شد");
    }
    else{
        echo("اضافه کردن کاربر با خطا مواجه شد.لطفا دوباره سعی بفرمایید");
    }
}
function check()
{
    $id=$_POST['id'];
    $pass=$_POST['pass'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $check="SELECT `cardId` FROM `users` WHERE cardId=\"$id\" OR fname=\"$fname\" AND lname=\"$lname\"";
    $res=mysql_query($check);
    $row=mysql_fetch_row($res);
    if($row){
        echo("کاربر موجود می باشد");
    }
    else{
        addUser($id,$pass,$fname,$lname);
    }
}
?>