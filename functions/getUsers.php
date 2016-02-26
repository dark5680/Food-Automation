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
	switch($type) {
		case 1:
			session_start();
			$id=$_SESSION['id'];
			$bal=getUserBal($id);
			echo json_encode($bal);
			break;
		
		default:
			break;
	}
}
function getUsers(){
    $getAll="SELECT * FROM `users`";
    $res=mysql_query($getAll);
    $users=array();
    while($row=mysql_fetch_row($res)){
        array_push($users,$row);
    }
    return $users;
}

function getUserInfo($id){
	$getInfo="select * from users where cardId=$id";
	$res=mysql_query($getInfo);
	$userInfo=array();
	$row=mysql_fetch_row($res);
	foreach ($row as $i) {
		array_push($userInfo,$i);
	}
	return $userInfo;
}

function getUserBal($id){
	$getBalance="SELECT balance FROM `users` WHERE cardId=$id";
	$res=mysql_query($getBalance);
	if($row=mysql_fetch_row($res))
	{
	    $balance=$row[0];
	}
	return $balance;
}
?>