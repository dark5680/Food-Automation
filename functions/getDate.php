<?php require_once("../resources/library/jdf.php"); ?>
<?php
$year=$_POST['year']; 
$month=$_POST['month']; 
$day=$_POST['day'];
#getDate($year,$month,$day);
#echo "$t"; 
#function getDate($year,$month,$day){
$week = array();
for ($i=$day; $i < $day+7 ; $i++) {
	$date=gregorian_to_jalali($year,$month,$i,'/');
	array_push($week,$date);
}
echo json_encode($week);
#}
?>