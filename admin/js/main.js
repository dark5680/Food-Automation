$(document).ready(function($) {
    if(window.location.pathname=='/food2/admin/index.php'){
        intialTable(1);
    }
    else if(window.location.pathname=='/food2/admin/edit-food.php'){

        editFood(1);
    }
    reservedInfo();
});
var tbName;

function addFood(){
    var name=document.getElementsByName("foodName")[0].value;
    var price=document.getElementsByName("foodPrice")[0].value;
    var type1=document.getElementById("radio1");
    var type2=document.getElementById("radio2");
    var type3=document.getElementById("radio3");
    if(type1.checked){
        var request = $.post("../functions/addFood.php",{name:name,price:price,type:type1.value},function result(msg){
            if(msg!="غذا موجود می باشد"){
                var bar = new $.peekABar({
                autohide: true
                });
                bar.show();
            }
            else{
                var bar = new $.peekABar({
                autohide: true,
                html: 'غذا موجود است',
                backgroundColor: 'red'
                });
                bar.show();
            }
        });
    }
    else if(type2.checked){
        var request = $.post("../functions/addFood.php",{name:name,price:price,type:type2.value},function result(msg){
            if(msg!="غذا موجود می باشد"){
                var bar = new $.peekABar({
                autohide: true
                });
                bar.show();
            }
            else{
                var bar = new $.peekABar({
                autohide: true,
                html: 'غذا موجود است',
                backgroundColor: 'red'
                });
                bar.show();
            }
        });
    }
    else if(type3.checked){
        var request = $.post("../functions/addFood.php",{name:name,price:price,type:type3.value},function result(msg){
            if(msg!="غذا موجود می باشد"){
                var bar = new $.peekABar({
                autohide: true
                });
                bar.show();
            }
            else{
                var bar = new $.peekABar({
                autohide: true,
                html: 'غذا موجود است',
                backgroundColor: 'red'
                });
                bar.show();
            }
        });
    }
    else{
        var bar = new $.peekABar({
        autohide: true,
        html: 'لطفا نوع غذا را تعیین کنید',
        backgroundColor: 'red'
        });
        bar.show();
    }
}

function deleteFood(id){
    var r = confirm("می خواهید این غذا را حذف کنید؟");
    if (r == true) {
        var type;
        var row='#r'+id;
        switch(id[0]){
            case 'b':
                type=1;
                id=id.replace('b','');
                break;
            case 'l':
                type=2;
                id=id.replace('l','');
                break;
            case 'd':
                type=3;
                id=id.replace('d','');
                break;
        }
        $.post("../functions/deleteFood.php",{type:type,id:id},function result(msg){
            var bar = new $.peekABar({
            autohide: true
            });
            bar.show();
            if(msg="با موفقیت حذف شد")
                $(row.toString()).remove();
        });
    }
}

function deleteUser(id,table){
    var r = confirm("می خواهید این کاربر را حذف کنید؟");
    if (r == true) {
        var type;
        var p=table+id;
        var row="r"+table+id;
        var userId = document.getElementById(p).innerHTML;
        var request = $.post("../functions/deleteUser.php",{id:userId},function result(msg){alert(msg); 
             if(msg=="با موفقیت حذف شد")
                $("#"+row).remove();});
    }
}

function saveUser(){
    var id=document.getElementsByName('userId')['0'].value.trim;
    var pass=document.getElementsByName('pass')['0'].value.trim;
    var fname=document.getElementsByName('fname')['0'].value.trim;
    var lname=document.getElementsByName('lname')['0'].value.trim;
    var request = $.post("../functions/addUser.php",{id:id,pass:pass,fname:fname,lname:lname},
        function result(msg){alert(msg);});
}

function checkPasswordMatch() {
    $("#checkPass").html("");
    var password = $("#pass").val();
    var confirmPassword = $("#againPass").val();
    if(password!=""){
        if(confirmPassword!=""){
            if (password != confirmPassword)
                $("#checkPass").html("<img src=\"../img/layout/no.png\">");
            else
                $("#checkPass").html("<img src=\"../img/layout/ok.png\">");
        }
    }
}

function editUser(id,table){
        var p=table+id;
        var row="r"+table+id;
        var userId = document.getElementById(p).innerHTML;
    var request = $.post("../functions/editUser2.php",{id2:userId},function result(msg){ window.location.replace(msg);});
}

function saveChange(){
    var id=document.getElementsByName('userId')['0'].value;
    if(id!=""){
        id=id.trim;
    }
    var pass=document.getElementsByName('pass')['0'].value;
    if(pass!=""){
        pass=pass.trim;
    }
    var fname=document.getElementsByName('fname')['0'].value;
    if(fname!=""){
        fname=fname.trim;
    }
    var lname=document.getElementsByName('lname')['0'].value;
    if(lname!=""){
        lname=lname.trim;
    }
    var request = $.post("../functions/updateUser.php",{id:id,pass:pass,fname:fname,lname:lname},
                         function result(msg){alert(msg);});
}

function intialTable(w){
    var table;
    switch(w){
        case 1:
        tbName='foodsched1';
        var week=currentWeek();
        break;
        case 2:
        tbName='foodsched2';
        var week=nextWeek();
        break;
        case 3:
        tbName='foodsched3';
        var week=twoNextWeek();
        break;
    }
    var date;
    for (var i =0; i<7; i++) {
        date=document.getElementById("d"+i);
        date.innerHTML=week[i];
    };
    setFoods(tbName);
}

function setFoods(table){
    var food,id,id2,value;
    var breakf=[];
    var lunch=[];
    var dinner=[];
    var all=[];
    var cont='selected';
    $.post("../functions/getSched.php",{type:1,table:table},function result(msg){
        res=JSON.parse(msg);
        breakf=res[0];
        all=res[1];
        if(all.length>0){
            for (var i =0; i<7; i++) {
                id2="#b"+i;
                $(id2.toString()).empty();
                food=document.getElementById("b"+i);
                for(j=0;j<breakf.length;j++){
                    id="bs"+j;
                    if(breakf[j][1]==all[i][1]){
                        $(id2.toString()).append('<option '+cont+' id='+id+' value='+breakf[j][0]+'>'+breakf[j][1]+'</option>');
                    }
                    else
                        $(id2.toString()).append('<option id='+id+' value='+breakf[j][0]+'>'+breakf[j][1]+'</option>');
                }
            }
        }
        else{
            for (var i =0; i<7; i++) {
                id2="#b"+i;
                $(id2.toString()).empty();
                food=document.getElementById("b"+i);
                for(j=0;j<breakf.length;j++){
                    id="bs"+j;
                    $(id2.toString()).append('<option id='+id+' value='+breakf[j][0]+'>'+breakf[j][1]+'</option>');
                }
            }
        }
    });
    $.post("../functions/getSched.php",{type:2,table:table},function result(msg){
        res=JSON.parse(msg);
        lunch=res[0];
        all=res[1];
        if(all.length>0){
            for (var i =0; i<7; i++) {
                id2="#l"+i;
                $(id2.toString()).empty();
                food=document.getElementById("l"+i);
                for(j=0;j<lunch.length;j++){
                    id="ls"+j;
                    if(lunch[j][1]==all[i][2]){
                        $(id2.toString()).append('<option '+cont+' id='+id+' value='+lunch[j][0]+'>'+lunch[j][1]+'</option>');
                    }
                    else
                        $(id2.toString()).append('<option id='+id+' value='+lunch[j][0]+'>'+lunch[j][1]+'</option>');
                }
            }
        }
        else{
            for (var i =0; i<7; i++) {
                id2="#l"+i;
                $(id2.toString()).empty();
                food=document.getElementById("l"+i);
                for(j=0;j<lunch.length;j++){
                    id="ls"+j;
                    $(id2.toString()).append('<option id='+id+' value='+lunch[j][0]+'>'+lunch[j][1]+'</option>');
                }
            }
        }
    });
    $.post("../functions/getSched.php",{type:3,table:table},function result(msg){
        res=JSON.parse(msg);
        dinner=res[0];
        all=res[1];
        if(all.length>0){
            for (var i =0; i<7; i++) {
                id2="#di"+i;
                $(id2.toString()).empty();
                food=document.getElementById("di"+i);
                for(j=0;j<dinner.length;j++){
                    id="dis"+j;
                    if(dinner[j][1]==all[i][3]){
                        $(id2.toString()).append('<option '+cont+' id='+id+' value='+dinner[j][0]+'>'+dinner[j][1]+'</option>');
                    }
                    else
                        $(id2.toString()).append('<option id='+id+' value='+dinner[j][0]+'>'+dinner[j][1]+'</option>');
                }
            }
        }
        else{
            for (var i =0; i<7; i++) {
                id2="#di"+i;
                $(id2.toString()).empty();
                food=document.getElementById("di"+i);
                for(j=0;j<dinner.length;j++){
                    id="dis"+j;
                    $(id2.toString()).append('<option id='+id+' value='+dinner[j][0]+'>'+dinner[j][1]+'</option>');
                }
            }
        }
    });
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

$('select').on('change', function () {
    var selectedValue = this.selectedOptions[0].value;
    var id  = this.selectedOptions[0].id;
    var day=  $(this).attr("id");
    var type;
    switch(id[0]){
        case 'b':
            type=1;
            break;
        case 'l':
            type=2;
            break;
        case 'd':
            day=day.replace('i','');
            type=3;
            break;

    }
    $.post("../functions/getSched.php",{type2:type,day:parseInt(day[1])+1,id:selectedValue,table:tbName},function result(msg){ 
        var bar = new $.peekABar({
        autohide: true
        });
        bar.show();}
    );
});

function reservedInfo(){
    $.post("../functions/reserverdInfo.php",function result(msg){
        var res=JSON.parse(msg); console.log(res);
        var t1=res[0];
        var us=res[1];
        var sl=res[2];
        sum=parseInt(t1[0])+parseInt(t1[1])+parseInt(t1[2]);
        document.getElementById("breakfast").innerHTML=t1[0];
        document.getElementById("lunch").innerHTML=t1[1];
        document.getElementById("dinner").innerHTML=t1[2];
        document.getElementById("all").innerHTML=sum;
        document.getElementById("users").innerHTML=us;
        document.getElementById("selfs").innerHTML=sl;
    });
}

function editFood(type){
    switch(type){
        case 1:
        $.post("../functions/getSched.php",{type3:type},function result(msg){
            $("#editTable").empty();
            var br=JSON.parse(msg);
            var tr="";
            var tb="<tr><th class='table-color'>ردیف</th><th class='table-color'>نام غذا</th><th class='table-color'>قیمت</th><th class='table-color'>ویرایش</th></tr>";
            $("#editTable").append(tb);
            for (var i = 0; i < br.length; i++) {
                tr="<tr id=rb"+br[i][0]+" class='center'><td class='table-color'>"+(i+1)+"</td><td>"+br[i][1]+"</td><td>"+br[i][2]+"</td><td><input id=b"+br[i][0]+" type='button' class='myButton2' onclick='deleteFood(this.id)' value='حذف'></td></tr>";
                $("#editTable").append(tr);
            };
        });
        break;
        case 2:
        $.post("../functions/getSched.php",{type3:type},function result(msg){
            $("#editTable").empty();
            var lu=JSON.parse(msg);
            var tr="";
            var tb="<tr><th class='table-color'>ردیف</th><th class='table-color'>نام غذا</th><th class='table-color'>قیمت</th><th class='table-color'>ویرایش</th></tr>";
            $("#editTable").append(tb);
            for (var i = 0; i < lu.length; i++) {
                tr="<tr id=rl"+lu[i][0]+" class='center'><td class='table-color'>"+(i+1)+"</td><td>"+lu[i][1]+"</td><td>"+lu[i][2]+"</td><td><input id=l"+lu[i][0]+" type='button' class='myButton2' onclick='deleteFood(this.id)' value='حذف'></td></tr>";
                $("#editTable").append(tr);
            };
        });
        break;
        case 3:
        $.post("../functions/getSched.php",{type3:type},function result(msg){
            $("#editTable").empty();
            var di=JSON.parse(msg);
            var tr="";
            var tb="<tr><th class='table-color'>ردیف</th><th class='table-color'>نام غذا</th><th class='table-color'>قیمت</th><th class='table-color'>ویرایش</th></tr>";
            $("#editTable").append(tb);
            for (var i = 0; i < di.length; i++) {
                tr="<tr id=rd"+di[i][0]+" class='center'><td class='table-color'>"+(i+1)+"</td><td>"+di[i][1]+"</td><td>"+di[i][2]+"</td><td><input id=d"+di[i][0]+" type='button' class='myButton2' onclick='deleteFood(this.id)' value='حذف'></td></tr>";
                $("#editTable").append(tr);
            };
        });
        break;
    }
}

function delAllFood(){
    var row='#editTable tr:gt(0)';
    var res=confirm("می خواهید همه غذاها و برنامه های غذایی را پاک کنید؟");
    if(res==true){
        $.post("../functions/deleteFood.php",{type:4},function result(msg){
            var bar = new $.peekABar({
            autohide: true
            });
            bar.show();
            if(msg="با موفقیت حذف شد")
                $(row.toString()).remove();
        });
        reservedInfo();
    }
}