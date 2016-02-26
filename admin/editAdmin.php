<?php require_once("header.php"); 
require_once "../functions/loginAdmin.php";
if(isset($_POST['save'])){
    $oldpass =  $_POST['old'];
    $newpass = $_POST['new'];
    $again = $_POST['again'];
   
    settype($oldpass , 'int');
    settype($newpass , 'int');
    settype($again , 'int');
    
    $pass = $_SESSION['pass'];
    $id = $_SESSION['Name'];
    settype($pass , 'int');
    settype($id , 'string');
    if($pass == $oldpass && $newpass== $again){
        edit($id , $newpass);
        $_SESSION['pass'] = $newpass;
        $stat = "تغییر رمز با موفقیت انجام شد";

    }
    else{
         $stat = "تغییر رمز با موفقیت انجام نشد";
    }
}

?>    
<div class="container center">
    <br><br><br>
       <p class="center my-font show display"> 
    <?php 
         if(isset($stat)){
                     
             echo $stat;
        }
      ?>
    </p>
    <br><br><br> 
    <div class="inputBorder2">
       <form method="post" id="new" class="center">
          <p>
           <label for="oldpass" class="my-font">رمز فعلی :</label>
           <input type="password" id="oldpass" class="txtInput" name="old">
              <span>رمز وارد شده صحیح نیست</span> </p><br>
           <p>
           <label for="newpass" class="my-font">رمز جدید :</label>
           <input type="password" id="newpass" class="txtInput" name="new">
               <span id="aaa">رمز جدید را وارد کنید</span> </p><br>
               <p>
           <label for="agian" class="my-font"> تکرار رمز :</label>
           <input type="password" id="again" class="txtInput" name="again">
                   <span>رمز جدید را دوباره وارد کنید</span></p> <br>
           <input type="submit" name="save" value="ذخیره" class="myButton" id="submit">
       </form>
    </div>
</div>
<?php 
require_once("footer.php"); 
require_once '../functions/script.php';
if(isset($stat)){
    echo "<script>$('.show').show();</script>";
}
?>

