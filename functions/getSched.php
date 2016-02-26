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
if(isset($_POST['table']))
    $table=$_POST['table'];
if(isset($_POST['type']))
    $type=$_POST['type'];
if(isset($_POST['type2']))
    $type2=$_POST['type2'];
if(isset($_POST['type3']))
    $type3=$_POST['type3'];
if(isset($_POST['day']))
    $day=$_POST['day'];
if(isset($_POST['id']))
    $id=$_POST['id'];
if(isset($_POST['type'])){
    switch($type){
        case 1:
            $br=breakf();
            $sc=getFoods($table);
            $all = array();
            array_push($all,$br);
            array_push($all,$sc);
            echo json_encode($all);
            break;
        case 2:
            $lu=lunch();
            $sc=getFoods($table);
            $all = array();
            array_push($all,$lu);
            array_push($all,$sc);
            echo json_encode($all);
            break;
        case 3:
            $di=dinner();
            $sc=getFoods($table);
            $all = array();
            array_push($all,$di);
            array_push($all,$sc);
            echo json_encode($all);
            break;
        case 4:
            echo json_encode(getFoods($table));
            break;
        default:
            echo("خطا در برقرای ارنباط با پایگاه داده");
            break;
    }
}
if(isset($_POST['type2']))
switch($type2){
    case 1:
        updateBreakf($day,$id,$table);
        break;
    case 2:
        updateLunch($day,$id,$table);
        break;
    case 3:
        updateDinner($day,$id,$table);
        break;
    default:
        echo("خطا در برقرای ارنباط با پایگاه داده");
        break;
}

if(isset($_POST['type3']))
switch($type3){
    case 1:
        echo json_encode(breakf());
        break;
    case 2:
        echo json_encode(lunch());
        break;
    case 3:
        echo json_encode(dinner());
        break;
    default:
        break;
}

function getFoods($table){
    $getSched="SELECT * FROM `$table` WHERE 1";
    $res=mysql_query($getSched);
    $sched=array();
    $sched2=array();
    $result=array();
    $break=array();
    $lunch=array();
    $dinner=array();
    while($row=mysql_fetch_row($res))
    {
        array_push($sched,$row);
    }
    foreach($sched as $i){
        array_push($break,$i[1]);
        array_push($lunch,$i[3]);
        array_push($dinner,$i[2]);
    }
    //$sched2=$sched;
    $j=0;
    foreach($break as $i){
        $getName="SELECT foodName FROM `breakfast` WHERE id=$i";     
        $res=mysql_query($getName);
        $name=mysql_fetch_row($res);        
        $row=$sched[$j];
        $row[1]=$name[0];
        $sched[$j]=$row;   
        $j++;    
    }
    $j=0;
    foreach($lunch as $i){
        $getName="SELECT foodName FROM `lunch` WHERE id=$i";     
        $res=mysql_query($getName);
        $name=mysql_fetch_row($res);        
        $row=$sched[$j];
        $row[2]=$name[0];
        $sched[$j]=$row;   
        $j++;    
    }
    $j=0;
    foreach($dinner as $i){
        $getName="SELECT foodName FROM `dinner` WHERE id=$i";     
        $res=mysql_query($getName);
        $name=mysql_fetch_row($res);        
        $row=$sched[$j];
        $row[3]=$name[0];
        $sched[$j]=$row;   
        $j++;    
    }
    //array_push($result,$sched);
    //array_push($result,$sched2);
    return $sched;
}

function breakf(){
    $getBreak="SELECT id,foodName,price FROM `breakfast`";
    $res=mysql_query($getBreak);
    $break=array();
    while($row=mysql_fetch_row($res))
    {
        array_push($break,$row);
    }
    return $break;
}

function lunch(){
    $getLunch="SELECT id,foodName,price FROM `lunch`";
    $res=mysql_query($getLunch);
    $lunch=array();
    while($row=mysql_fetch_row($res))
    {
        array_push($lunch,$row);
    }
    return $lunch;
}

function dinner(){
    $getDinner="SELECT id,foodName,price FROM `dinner`";
    $res=mysql_query($getDinner);
    $dinner=array();
    while($row=mysql_fetch_row($res))
    {
        array_push($dinner,$row);
    }
    return $dinner;
}

function getSelfs(){
    $getSelf="SELECT * FROM `self` WHERE 1";
    $res=mysql_query($getSelf);
    $selfs=array();
    while($row=mysql_fetch_row($res))
    {
        array_push($selfs,$row);
    }
    return $selfs;
}

function updateBreakf($day,$id,$table){
    $save="UPDATE `$table` SET `breakfast`=$id WHERE day=$day";
    $res=mysql_query($save);
    echo "$res";
}

function updateLunch($day,$id,$table){
    $save="UPDATE `$table` SET `lunch`=$id WHERE day=$day";
    $res=mysql_query($save);
    echo "$res";
}

function updateDinner($day,$id,$table){
    $save="UPDATE `$table` SET `dinner`=$id WHERE day=$day";
    $res=mysql_query($save);
    echo "$res";
}
?>