<?php require_once("resources/config.php"); ?>
<?php require_once("functions/getUsers.php"); ?>
<?php require_once("header.php"); ?>    
<div class="container center">
    <div id="result">
        
    </div>
    <div class="inputBorder">
        <p class="my-font" id="balance">اعتبار فعلی:<span id="balValue"></span></p>
        <form action="" name="add-money" method="">
            <label for="amount" class="my-font">مبلغ:</label>
            <input id="incValue" type="number" class="txtInput" name="amount" step="100" min="1000" placeholder="مبلغ را به تومان وارد کنید...">
            <br>
            <input type="button" class="myButton" value="پرداخت" onclick="addMoney()">  
        </form>
    </div>
</div>
<?php require_once("footer.php"); ?>
