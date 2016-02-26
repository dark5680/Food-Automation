<?php require_once("../resources/config.php"); ?>
<?php 
$id=$_POST['id'];

$deleteUser="DELETE FROM `users` WHERE cardId=\"$id\"";
$res=mysql_query($deleteUser);
if($res)
    echo "با موفقیت حذف شد";
else
    echo "حذف کاربر با خطا مواجه شد.لطفا دوباره امتحان کنید";
?>