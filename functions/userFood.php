
<?php
$hostname_food = "localhost";
$database_food = "food";
$username_food = "root";
$password_food = "";
$food = mysql_connect($hostname_food, $username_food, $password_food) or die("مشکل در ایجاد ارتباط با پایگاه داده");
mysql_select_db($database_food);
mysql_query("SET NAMES 'utf8'", $food);
mysql_query("SET CHARACTER SET 'utf8'", $food);
mysql_query("SET character_set_connection = 'utf8'", $food);
?>

<?php 

if(isset($_POST['type'])){
$type=$_POST['type'];
switch($type){
    case 1:
         insetbrac($_POST['cardid'] , $_POST['date'] , $_POST['self']);
        break;
    case 2:
         insetlunch($_POST['cardid'] , $_POST['date'] , $_POST['self']);
          break;
    case 3:
        insetdinner($_POST['cardid'] , $_POST['date'] , $_POST['self']);
          break;    
    case 4:
        deleteB($_POST['cardid'] , $_POST['date']) ;
        break;
    case 5:
        deleteL($_POST['cardid'] , $_POST['date']) ;
        break;
    case 6:
        deleteD($_POST['cardid'] , $_POST['date']) ;
        break;        
    }
}

function insetbrac($id , $date , $self,$foodId){
    $select = "SELECT * FROM `userbracf` WHERE date='$date' and cardId=$id";
    $res = mysql_query($select);
    if(!mysql_fetch_row($res)){
            
            $getL="INSERT INTO `userbracf`(`id`, `cardId`, `date`, `self`) VALUES ('',$id,'$date','$self')";
            $res=mysql_query($getL);
        }

}

function insetlunch($id , $date , $self,$foodId){
    $select = "SELECT * FROM `userlunch` WHERE date='$date' and cardId=$id";
    $res = mysql_query($select);
    if(!mysql_fetch_row($res)){
        
            $getL="INSERT INTO `userlunch`(`id`, `cardId`, `date`, `self`) VALUES ('',$id,'$date','$self')";
            $res=mysql_query($getL);
        }

}

function insetdinner($id , $date , $self,$foodId){
    $select = "SELECT * FROM `userdinner` WHERE date='$date' and cardId=$id";
    $res = mysql_query($select);
    if(!mysql_fetch_row($res)){
       
            $getL="INSERT INTO `userdinner`(`id`, `cardId`, `date`, `self`) VALUES ('',$id,'$date','$self')";
            $res=mysql_query($getL);
    }
 
    }


function userBrac ($id){
	$getL="SELECT date,self FROM `userbracf` where cardId= $id";
    $res=mysql_query($getL);
    $arr=array();
    while($row=mysql_fetch_row($res))
    {
        array_push($arr,$row[0]);
        array_push($arr,$row[1]);
    }
    return $arr;
}

function userLunch ($id){
	$getL="SELECT date,self FROM `userlunch` where cardId= $id";
    $res=mysql_query($getL);
    $arr=array();
    while($row=mysql_fetch_row($res))
    {
        array_push($arr,$row[0]);
        array_push($arr,$row[1]);
    }
    return $arr;
}

function userDinner ($id){
	$getL="SELECT date,self FROM `userdinner` where cardId= $id";
    $res=mysql_query($getL);
    $arr=array();
    while($row=mysql_fetch_row($res))
    {
        array_push($arr,$row[0]);
        array_push($arr,$row[1]);
    }
    return $arr;
}

function deleteB($id , $date){
    $select = "SELECT * FROM `userbracf` WHERE date='$date' and cardId=$id";
    $res = mysql_query($select);
    if(mysql_fetch_row($res)){
    $qu = "DELETE FROM `userbracf` WHERE cardId=$id and date='$date'";
    $res=mysql_query($qu);
    }
}

function deleteL($id , $date){
    $select = "SELECT * FROM `userlunch` WHERE date='$date' and cardId=$id";
    $res = mysql_query($select);
    if(mysql_fetch_row($res)){
    $qu = "DELETE FROM `userlunch` WHERE cardId=$id and date='$date'";
    $res=mysql_query($qu);
    }
}

function deleteD($id , $date){
    $select = "SELECT * FROM `userdinner` WHERE date='$date' and cardId=$id";
    $res = mysql_query($select);
    if(mysql_fetch_row($res)){
    $qu = "DELETE FROM `userdinner` WHERE cardId=$id and date='$date'";
    $res=mysql_query($qu);
    }
}
 ?>
