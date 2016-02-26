<?php
function selectDB($id , $pass){
  
    $query = "select userName,pass 
    from admin 
    where userName='$id' and pass=$pass;";
    
    $exe = mysql_query($query) 
        or die(mysql_error());
    $numRows = mysql_num_rows($exe) ;
       
    if($numRows){
        return 1;
    }
    else 
        return 0;
}

function edit($id , $key){
    $update = "UPDATE admin SET pass=$key WHERE userName='$id';"; 
    
    $exe = mysql_query($update) 
        or die(mysql_error());
    
}
?>