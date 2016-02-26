<?php require_once("../resources/config.php"); ?>
<?php 
$id=$_POST['id'];
$type=$_POST['type'];
switch($type){
    case 1:
        delBreak($id);
        break;
    case 2:
        delLunch($id);
        break;
    case 3:
        delDinner($id);
        break;
    case 4:
        delAll();
        break;
}

function delBreak($id){
$deleteFood="DELETE FROM `breakfast` WHERE id=$id";
$res=mysql_query($deleteFood);
$deleteFood="UPDATE `foodsched1` SET `breakfast`=-1 WHERE breakfast=$id";
$res=mysql_query($deleteFood);
$deleteFood="UPDATE `foodsched2` SET `breakfast`=-1 WHERE breakfast=$id";
$res=mysql_query($deleteFood);
$deleteFood="UPDATE `foodsched3` SET `breakfast`=-1 WHERE breakfast=$id";
$res=mysql_query($deleteFood);
    if($res)
        echo "با موفقیت حذف شد";
    else
        echo "حذف غذا با خطا مواجه شد.لطفا دوباره امتحان کنید";
}

function delLunch($id){
    $deleteFood="DELETE FROM `lunch` WHERE id=\"$id\"";
    $res=mysql_query($deleteFood);
    if($res)
        echo "با موفقیت حذف شد";
    else
        echo "حذف غذا با خطا مواجه شد.لطفا دوباره امتحان کنید";
}

function delDinner($id){
    $deleteFood="DELETE FROM `dinner` WHERE id=\"$id\"";
    $res=mysql_query($deleteFood);
    if($res)
        echo "با موفقیت حذف شد";
    else
        echo "حذف غذا با خطا مواجه شد.لطفا دوباره امتحان کنید";
}

function delAll(){
    $deleteFood="DELETE FROM `breakfast` WHERE 1";
    $res=mysql_query($deleteFood);
    $deleteFood="DELETE FROM `lunch` WHERE 1";
    $res1=mysql_query($deleteFood);
    $deleteFood="DELETE FROM `dinner` WHERE 1";
    $res2=mysql_query($deleteFood);
    $deleteFood="DELETE FROM `foodsched1` WHERE 1";
    $res2=mysql_query($deleteFood);
    $deleteFood="DELETE FROM `foodsched2` WHERE 1";
    $res2=mysql_query($deleteFood);
    $deleteFood="DELETE FROM `foodsched3` WHERE 1";
    $res2=mysql_query($deleteFood);
    $deleteFood="DELETE FROM `userbracf` WHERE 1";
    $res2=mysql_query($deleteFood);
    $deleteFood="DELETE FROM `userlunch` WHERE 1";
    $res2=mysql_query($deleteFood);
    $deleteFood="DELETE FROM `userdinner` WHERE 1";
    $res2=mysql_query($deleteFood);
    for($i=0;$i<7;$i++){
        $intialSched="INSERT INTO `foodsched1`(`day`, `breakfast`, `dinner`, `lunch`) VALUES ($i+1,'','','')";
        mysql_query($intialSched);
        $intialSched="INSERT INTO `foodsched2`(`day`, `breakfast`, `dinner`, `lunch`) VALUES ($i+1,'','','')";
        mysql_query($intialSched);
        $intialSched="INSERT INTO `foodsched3`(`day`, `breakfast`, `dinner`, `lunch`) VALUES ($i+1,'','','')";
        mysql_query($intialSched);
    }
    if($res && $res1 && res2)
        echo "با موفقیت حذف شد";
    else
        echo "حذف غذا با خطا مواجه شد.لطفا دوباره امتحان کنید";
}
?>