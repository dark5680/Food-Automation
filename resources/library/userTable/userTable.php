<?php
	// Show only compile error
	error_reporting(E_COMPILE_ERROR );

	require_once("../resources/library/userTable/ajax_table.class.php");
	$obj = new ajax_table();
	$records = $obj->getRecords();
?>
<script>
	// Column names must be identical to the actual column names in the database, if you dont want to reveal the column names, you can map them with the different names at the server side.
	var columns = new Array("cardId","pass","fname","lname","balance");
	var placeholder = new Array("نام کاربری را وارد کنید","رمز را وارد کنید","نام را وارد کنید","نام خانوادگی را وارد کنید","اعتبار را وارد کنید");
	var inputType = new Array("text","text","text","text","text");
	var table = "userTable";
	 
	// Set button class names 
	var savebutton = "ajaxSave";
	var deletebutton = "ajaxDelete";
	var editbutton = "ajaxEdit";
	var updatebutton = "ajaxUpdate";
	var cancelbutton = "cancel";
	 
	var saveImage = "../resources/library/userTable/images/save.png"
	var editImage = "../resources/library/userTable/images/edit.png"
	var deleteImage = "../resources/library/userTable/images/remove.png"
	var cancelImage = "../resources/library/userTable/images/back.png"
	var updateImage = "../resources/library/userTable/images/save.png"

	// Set highlight animation delay (higher the value longer will be the animation)
	var saveAnimationDelay = 3000; 
	var deleteAnimationDelay = 1000;
	  
	// 2 effects available available 1) slide 2) flash
	var effect = "flash"; 
  
</script>

<table id="myTable" class="userTable bordered">
	<tr class="ajaxTitle">
		<th>ردیف</th>
		<th>نام کاربری</th>
		<th>رمز</th>
		<th>نام</th>
		<th>نام خانوادگی</th>
		<th>اعتبار(تومان)</th>
		<th>عملیات</th>
	</tr>
	<?php
		if(count($records)){
		$i = 1;	
		foreach($records as $eachRecord){
	?>
	<tr id="<?php echo $eachRecord["cardId"];?>">
		<td class="table-color"><?php echo $i++; ?></td>
		<td id="cId"><?php echo $eachRecord["cardId"];?></td>
		<td class="pass"><?php echo $eachRecord["pass"];?></td>
		<td class="fname"><?php echo $eachRecord["fname"];?></td>
		<td class="lname"><?php echo $eachRecord["lname"];?></td>
		<td class="balance"><?php echo $eachRecord["balance"];?></td>
		<td>
			<a href="javascript:;" id="<?php echo $eachRecord["cardId"];?>" class="ajaxEdit"><img src="" class="eimage"></a>
			<a href="javascript:;" id="<?php echo $eachRecord["cardId"];?>" class="ajaxDelete"><img src="" class="dimage"></a>
		</td>
	</tr>
	<?php }
		}
	?>
</table>
