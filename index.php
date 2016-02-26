<?php require_once("functions/getUsers.php"); ?>
<?php require_once("functions/getSched.php"); ?>
<?php require_once("functions/userFood.php"); ?>
<?php require_once("resources/library/jdf.php"); ?>
<?php require_once("header.php"); ?>
<?php 

 ?>
<aside id="sidebar" class="right">
    <?php
        $userInfo=getUserInfo($_SESSION['id']);
    ?>
    <div class="center">
        <div id="clock" class="clk">
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
        </div>
        <div id="date" class="bold my-font">
            <?php echo jdate("l")."&nbsp&nbsp".jdate("Y/n/j"); ?>
        </div>
    </div>
    <hr class="style18">
    <div class="user-label my-font">
        <p>نام کاربر : <?php echo "$userInfo[2]"." $userInfo[3]"; ?></p>
        <p>شماره کارت : <?php echo $userInfo[0]; ?></p>
        <p>میزان اعتبار: <?php echo $userInfo[4]; ?> تومان</p>
    </div>
    <hr class="style18">
    <?php $selfs=getSelfs() ?>
    <form action="" method="post" id="selector">
        <label for="slct-self" class="user-label my-font">انتخاب سلف:</label>
        <select name="slct-self" id="allSell" onchange="my()">
            <script type="text/javascript">
                var seflsSelect=[];
                var selfs=<?php echo json_encode($selfs); ?>;
                for (var i = 0; i < selfs.length; i++) {
                    if (i == 0) {
                        var row="<option id='self"+i+"' selected value='"+selfs[i][1]+"'>"+selfs[i][1]+"</option>";
                    }
                    else
                        var row="<option id='self"+i+"' value='"+selfs[i][1]+"'>"+selfs[i][1]+"</option>";
                    seflsSelect[i]=row;
                   document.write(row);
                };
            </script>
        </select>
        <div class="clear"></div>
        <div class="btn">

         <input class="myButton" type="submit" name="check" value="تایید" onclick="send()">
         <input class="myButton" type="reset" name="reset" value="انصراف">
        </div>
    </form>
</aside>
<div class="container center">
<div id="main">
    <table id="food-table" class="center">
            <tr>
                <th class="table-color">روز</th>
                <th class="table-color">تاریخ</th>
                <th class="table-color">صبحانه</th>
                <th class="table-color">ناهار</th>
                <th class="table-color">شام</th>
            </tr>
            <tr >
                <td class="bold table-color">شنبه</td>
                <td id="0" class="tableDate"></td>
                <td>
                    <table class="inside-table">
                        <tr>
                            <th>تعداد</th>
                            <th>سلف</th>
                            <th>انتخاب</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self1">
                                    
                                </select>
                            </td>
                            <td id="b1">
                            <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree1" />
                                    <label for="squaredThree1"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- breakf -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <th>تعداد</th>
                            <th>سلف</th>
                            <th>انتخاب</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self8">
                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree8" />
                                    <label for="squaredThree8"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- lunch -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <th>تعداد</th>
                            <th>سلف</th>
                            <th>انتخاب</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self15">
 
                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree15"  />
                                    <label for="squaredThree15"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- dinner -->
            </tr>
            <tr>
                <td  class="bold table-color">یک شنبه</td>
                <td id="1" class="tableDate"></td>
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self2">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree2" />
                                    <label for="squaredThree2"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- breakf -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self9">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree9" />
                                    <label for="squaredThree9"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- lunch -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self16">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree16" />
                                    <label for="squaredThree16"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr><!-- dinner -->
            <tr>
                <td  class="bold table-color">دو شنبه</td>
                <td id="2" class="tableDate"></td>
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self3">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree3"/>
                                    <label for="squaredThree3"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- breakf -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self10">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree10"/>
                                    <label for="squaredThree10"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- lunch -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self17">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree17" />
                                    <label for="squaredThree17"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- dinner -->
            </tr>
            <tr>
                <td  class="bold table-color">سه شنبه</td>
                <td id="3" class="tableDate"></td>
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self4">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree4"  />
                                    <label for="squaredThree4"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- breakf -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self11">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree11"/>
                                    <label for="squaredThree11"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- lunch -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self18">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree18" />
                                    <label for="squaredThree18"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- dinner -->
            </tr>
            <tr>
                <td  class="bold table-color">چهار شنبه</td>
                <td id="4" class="tableDate"></td>
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self5">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree5" />
                                    <label for="squaredThree5"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- breakf -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self12">
  
                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree12" />
                                    <label for="squaredThree12"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- lunch -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self19">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree19" />
                                    <label for="squaredThree19"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- dinner -->
            </tr>
            <tr>
                <td  class="bold table-color">پنج شنبه</td>
                <td id="5" class="tableDate"></td>
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self6">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree6" />
                                    <label for="squaredThree6"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- breakf -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self13">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree13"/>
                                    <label for="squaredThree13"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- lunch -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self20">
  
                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree20"  />
                                    <label for="squaredThree20"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- dinner -->
            </tr>
            <tr>
                <td  class="bold table-color">جمعه</td>
                <td id="6" class="tableDate"></td>
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self7">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree7" />
                                    <label for="squaredThree7"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- breakf -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self14">
 
                                </select>
                            </td>
                            <td>
                                <div class="squaredThree" >
                                    <input type="checkbox" value="None" id="squaredThree14"/>
                                    <label for="squaredThree14"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- lunch -->
                <td>
                    <table class="inside-table">
                        <tr>
                            <td>
                                <input type="number" min="1" max="2">
                            </td>
                            <td>
                                <select class="bold selector2" id="self21">

                                </select>
                            </td>
                            <td>
                                <div class="squaredThree">
                                    <input type="checkbox" value="None" id="squaredThree21" />
                                    <label for="squaredThree21"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="center"></p>
                            </td>
                        </tr>
                    </table>
                </td><!-- dinner -->
            </tr>
        </table>
       
    <?php unset($_SESSION['sched']); ?>
    <div id="bottom-bar">
        <form action="" method="post" class="center" >
            <input id="bt1" name="now" class="myButton2" type="button" value="هفته جاری" onclick="cha(1)">
            <input id="bt2" name="after" class="myButton2" type="button" value="هفته بعد" onclick="cha(2)">
            <input id="bt3" name="next" class="myButton2" type="button" value="دو هفته بعد" onclick="cha(3)">
        </form>
    </div>
</div>
</div>
<div class="clear"></div>
<?php require_once("footer.php"); ?>
 <script>

function cha(w){
            var sq=<?php echo json_encode(userbrac($_SESSION['id'])); ?>;
            var sq2=<?php echo json_encode(userLunch($_SESSION['id'])); ?>;
            var sq3=<?php echo json_encode(userDinner($_SESSION['id'])); ?>;
            intialTable(w);
            for(i = 0 ; i < sq.length ; i+=2){
                
            for(j  = 0 ; j < 7 ; j++){
                var we = $("#"+j+"");             
                if (we.text() == sq[i]){
                   
                    j++;
                    var temp = i+1;
                    $("#food-table #self"+j+" option").each(function(){
                        var $this = $(this); 

                        if ($this.val() == sq[temp]) { 
                            $this.prop('selected', true); 
                            return false; 
                        }
                        });
                    
                    $("#squaredThree"+j+"").prop( "checked", true );
                    break;
                }
            }
          }

          for(i = 0 ; i < sq2.length ; i++){
            for(j  = 0 ; j < 7 ; j++){
                var we = $("#"+j+"");

                if (we.text() == sq2[i]){
                   
                    j+=8;
                    var temp = i+1;
                    $("#food-table #self"+j+" option").each(function(){
                        var $this = $(this); 

                        if ($this.val() == sq2[temp]) { 
                            $this.prop('selected', true); 
                            return false; 
                        }
                        });
                    $("#squaredThree"+j+"").prop( "checked", true );
                    break;
                }
            }
          }

          for(i = 0 ; i < sq3.length ; i++){
            for(j  = 0 ; j < 7 ; j++){
                var we = $("#"+j+"");

                if (we.text() == sq3[i]){
                   
                    j+=15;
                    var temp = i+1;
                    $("#food-table #self"+j+" option").each(function(){
                        var $this = $(this); 

                        if ($this.val() == sq3[temp]) { 
                            $this.prop('selected', true); 
                            return false; 
                        }
                        });
                    $("#squaredThree"+j+"").prop( "checked", true );
                    break;
                }
            }
          }
}

function send (){
    var request = $.post("functions/userFood.php",{type:4},function result(msg){});
    for(j = 1 ; j <8 ; j++){
        if($("#squaredThree"+j+"").prop( "checked")){
            var self = $("#food-table #self"+j+" option:selected").text();
            var i = j - 1;
            var date = $("#"+i+"").text(); 
            console.log(self + " " + date );  
            var id = <?php echo json_encode($_SESSION['id']) ?>;
            var request = $.post("functions/userFood.php",{cardid:id,self:self,date:date,type:1},function result(msg){});
        }
        else{
            var i = j - 1;
            var date = $("#"+i+"").text();
            var id = <?php echo json_encode($_SESSION['id']) ?>;
            var request = $.post("functions/userFood.php",{cardid:id,date:date,type:4},function result(msg){});
        }
    }
    for(j = 8 ; j <15 ; j++){
        if($("#squaredThree"+j+"").prop( "checked")){
            var self = $("#food-table #self"+j+" option:selected").text();
            var i = j - 8;
            var date = $("#"+i+"").text();   
            var id = <?php echo json_encode($_SESSION['id']) ?>;
            var request = $.post("functions/userFood.php",{cardid:id,self:self,date:date,type:2},function result(msg){});
        }
        else{
            var i = j - 8;
            var date = $("#"+i+"").text();
            var id = <?php echo json_encode($_SESSION['id']) ?>;
            var request = $.post("functions/userFood.php",{cardid:id,date:date,type:5},function result(msg){});
        }
    }
    for(j = 15 ; j <22 ; j++){
        if($("#squaredThree"+j+"").prop( "checked")){
            var self = $("#food-table #self"+j+" option:selected").text();
            var i = j - 15;
            var date = $("#"+i+"").text();   
            var id = <?php echo json_encode($_SESSION['id']) ?>;
            var request = $.post("functions/userFood.php",{cardid:id,self:self,date:date,type:3},function result(msg){});
        }
        else{
            var i = j - 15;
            var date = $("#"+i+"").text();
            var id = <?php echo json_encode($_SESSION['id']) ?>;
            var request = $.post("functions/userFood.php",{cardid:id,date:date,type:6},function result(msg){});
        }
    }
    alert("رزرو با موفقیت انجام شد");
    

}
function my(){
    var all = $("#allSell option:selected").val();
    for(j = 1 ; j <22 ; j++){
    $("#food-table #self"+j+" option").each(function(){
        var $this = $(this); 

        if ($this.val() == all ){ 
            $this.prop('selected', true); 
                
            }
    });
}
}
</script>