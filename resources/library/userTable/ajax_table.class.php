<?php
require_once("config.php");
class ajax_table {

  function getRecords(){
	$res = mysql_query("select * from users");
	if(mysql_num_rows($res)){
		while($row = mysql_fetch_assoc($res)){
			$record = array_map("stripslashes", $row);
			$records[] = $record; 
		}
		return $records;
	}
	//else echo "No records found";
  }	

  function save($data){
	if(count($data)){
		$values = implode("','", array_values($data));
		mysql_query("insert into users (".implode(",",array_keys($data)).") values ('".$values."')");
		
		if(mysql_insert_id()) return mysql_insert_id();
		return 0;
	}
	else return 0;	
  }	

  function delete_record($id){
	 if($id){
		mysql_query("delete from users where cardId = $id limit 1");
		return mysql_affected_rows();
	 }
  }	

  function update_record($data){
	if(count($data)){
		$id = $data['rid'];
		unset($data['rid']);
		$values = implode("','", array_values($data));
		$str = "";
		foreach($data as $key=>$val){
			$str .= $key."='".$val."',";
		}
		$str = substr($str,0,-1);
		$sql = "update users set $str where cardId = $id limit 1";

		$res = mysql_query($sql);
		
		if(mysql_affected_rows()) return $id;
		return 0;
	}
	else return 0;	
  }	

  function update_column($data){
	if(count($data)){
		$id = $data['rid'];
		unset($data['rid']);
		$sql = "update users set ".key($data)."='".$data[key($data)]."' where cardId = $id limit 1";
		$res = mysql_query($sql);
		if(mysql_affected_rows()) return $id;
		return 0;
		
	}	
  }

  function error($act){
	 return json_encode(array("success" => "0","action" => $act));
  }

}
?>