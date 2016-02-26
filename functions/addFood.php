<?php require_once("../resources/config.php"); ?>
<?php
$name=$_POST['name'];
$price=$_POST['price'];
$price/=10;
$type=$_POST['type'];
switch($type){
    case 1:
        check($name,$price,"breakfast");
        break;
    case 2:
        check($name,$price,"lunch");
        break;
    case 3:
        check($name,$price,"dinner");
        break;
    default:
        echo("اضافه کردن غذا با خطا مواجه شد.لطفا دوباره سعی بفرمایید");
        break;
}
function addFood($name,$price,$table){
    $break="INSERT INTO `$table`(`id`, `foodName`, `price`) VALUES ('','$name',$price)";
    $res=mysql_query($break);
    if($res){
        //echo("غذا با موفقیت اضافه شد");
        echo "$res";
    }
    else{
        echo("اضافه کردن غذا با خطا مواجه شد.لطفا دوباره سعی بفرمایید");
    }
}

function check($name,$price,$table)
{
    $check="SELECT `id`, `foodName` FROM `$table` WHERE foodName='$name'";
    $res=mysql_query($check);
    if($row=mysql_fetch_row($res)){
        echo("غذا موجود می باشد");
    }
    else{
        addFood($name,$price,$table);
    }
}
?>