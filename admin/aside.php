<aside id="sidebar" class="right">
    <div id="clock" class="center">
        <div id="liveclock" class="outer_face">
        <div class="marker oneseven"></div>
        <div class="marker twoeight"></div>
        <div class="marker fourten"></div>
        <div class="marker fiveeleven"></div>

        <div class="inner_face">
        <div class="hand hour"></div>
        <div class="hand minute"></div>
        <div class="hand second"></div>
        </div>
        </div>
        <br>
    </div>
    <div id="date" class="bold my-font">
        <?php echo jdate("l")."&nbsp&nbsp".jdate("Y/n/j"); ?>
    </div>
    <br>
    <p class="user-label">رزرو شده ها :</p>
    <br>
    <table id="food-log" class="my-font">
        <tr>
            <td>صبحانه</td>
            <td id="breakfast"></td>
        </tr>
        <tr>
            <td>ناهار</td>
            <td id="lunch"></td>
        </tr>
        <tr>
            <td>شام</td>
            <td id="dinner"></td>
        </tr>
        <tr>
            <td>کل</td>
            <td id="all"></td>
        </tr>
    </table>
    <br>
    <p class="user-label">تعداد :</p>
    <br>
    <table id="food-log" class="my-font">
            <tr>
                <td>کاربران</td>
                <td id="users"></td>
            </tr>
            <tr>
                <td>سلف ها</td>
                <td id="selfs"></td>
            </tr>
    </table>
    <div class="clear"></div>
