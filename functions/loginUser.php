<?php 
function selectDB($id , $pass){
  
    $query = "select cardId,pass 
    from users 
    where cardId=$id and pass=$pass;";
    
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
    $update = "UPDATE users SET pass=$key WHERE cardId=$id;"; 
    
    $exe = mysql_query($update) 
        or die(mysql_error());
    
}



?>