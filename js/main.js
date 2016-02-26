$(document).ready(function($) {
    if(window.location.pathname=='/food2/index.php'){
        
        
    }
    else if(window.location.pathname=='/food2/inc-money.php'){
        getUserBal();
    }
cha(1);
});

function intialTable(w){

    switch(w){
        case 1:
        var week=currentWeek();
        var sched='foodsched1';
        break;
        case 2:
        var week=nextWeek();
        var sched='foodsched2';
        break;
        case 3:
        var week=twoNextWeek();
        var sched='foodsched3';
        break;
    }
    $.post("functions/getSched.php",{type:4,table:sched},function result(msg){
            var se=JSON.parse(msg);
            x = 0;
            var id,id2,id3;
            var pp = $("#food-table p.center");
            for(j = 0 ; j < 7 ; j++){

              for(var i = 1 ; i < 4 ; i++){
               $(pp[x]).text('');
                $(pp[x]).append(se[j][i]);
                x++;
              }
              
          }
    });
    $(".selector2 option").remove();
    $(".selector2").append(seflsSelect);
    for (var k = 0; k < 7; k++) {
    $("#"+k+"").text( week[k]);
    }
    $('input:checkbox').removeAttr('checked');
}

function currentWeek(){
    //get date of First day of week..........................................................................................
     var t=moment().startOf('week').format('l');
    var date=t.split("/");
    date[1]-=1;
    var week=[];
    var year=date[2];
    var month=date[0];
    var day=date[1];
    //translate miladi to shamsi and get whole week dates....................................................................
    var j=0;
    for(var i=day; i<day+7; i++){
        week[j] = JalaliDate.gregorianToJalali(year,month,i);
        t=week[j].toString();
        week[j]=t.replace(/[/","]/g,'/');
        j++;
    }
    return week;
}

function nextWeek(){
    //get date of First day of week..........................................................................................
     var t=moment().startOf('week').format('l');
    var date=t.split("/");
    date[1]-=1;
    date[1]+=7;
    var week=[];
    var year=date[2];
    var month=date[0];
    var day=date[1];
    //translate miladi to shamsi and get whole week dates....................................................................
    var j=0;
    for(var i=day; i<day+7; i++){
        week[j] = JalaliDate.gregorianToJalali(year,month,i);
        t=week[j].toString();
        week[j]=t.replace(/[/","]/g,'/');
        j++;
    }
    return week;
}

function twoNextWeek(){
    //get date of First day of week..........................................................................................
     var t=moment().startOf('week').format('l');
    var date=t.split("/");
    date[1]-=1;
    date[1]+=14;
    var week=[];
    var year=date[2];
    var month=date[0];
    var day=date[1];
    //translate miladi to shamsi and get whole week dates....................................................................
    var j=0;
    for(var i=day; i<day+7; i++){
        week[j] = JalaliDate.gregorianToJalali(year,month,i);
        t=week[j].toString();
        week[j]=t.replace(/[/","]/g,'/');
        j++;
    }
    return week;
}

function addMoney(){
    var incVal=document.getElementById("incValue");
    var res=document.getElementById("result");
    res.innerHTML="";
    var bal=document.getElementById("balValue");
    if(incVal.value>=1000){
        incVal.style.border='none';
        var request = $.post("functions/addMoney.php",{amount:incVal.value},function result(msg){
            var st=msg.split(',');
            st[0]=st[0].replace(/[/"["]/g,'');
            st[1]=st[1].replace(/['"]+/g,'');
            st[1]=st[1].replace(/]/g,'');
            msg=st;
            if(msg[0]=true){
                bal.innerHTML=msg[1];
                res.innerHTML="<h2 id=\"succesBuy\">افزایش اعتبار با موفقیت انجام شد.</h2>";
            }
            else{
                res.innerHTML="<h2 id=\"failBuy\">افزایش اعتبار با خطا مواجه شد.</h2>";
            }
        });
    }
    else{
        incVal.style.border='1px solid red';
    }
}

$('#incValue').on('keydown', function(e) {
    if (e.which == 13) {
        event.preventDefault();
    }
    else{

    }
});

function getUserBal(){
    $.post("functions/getUsers.php",{type:1},function res(msg){
        var val=JSON.parse(msg);
        document.getElementById("balValue").innerHTML=val;
    });
}
