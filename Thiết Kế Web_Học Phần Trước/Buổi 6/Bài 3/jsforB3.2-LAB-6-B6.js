function tong(){
    var x=document.getElementById("num1").value;
    var y=document.getElementById("num2").value;
    var a=parseInt(x);
    var b=parseInt(y);
    var z=a+b;
    var ketqua = document.getElementById("resultInput");
    resultInput.value = z;
}


function tru(){
    var x=document.getElementById("num3").value;
    var y=document.getElementById("num4").value;
    var a=parseInt(x);
    var b=parseInt(y);
    var z=a-b;
    var ketqua = document.getElementById("resultInput2");
    resultInput2.value = z;
}


function nhan(){
    var x=document.getElementById("num5").value;
    var y=document.getElementById("num6").value;
    var a=parseInt(x);
    var b=parseInt(y);
    var z=a*b;
    var ketqua = document.getElementById("resultInput3");
    resultInput3.value = z;
}


function chia(){
    var x=document.getElementById("num7").value;
    var y=document.getElementById("num8").value;
    var a=parseFloat(x);
    var b=parseFloat(y);
    if(b==0){
        var ketqua = document.getElementById("resultInput4");
        resultInput4.value = "Không chia được cho 0";
    }else{
    var z=a/b;
    var ketqua = document.getElementById("resultInput4");
    resultInput4.value = z;
    }
}

function hienthiphepcong(){
    var x=document.getElementById("num1").value;
    var y=document.getElementById("num2").value;
    document.getElementById("numa").innerHTML = x;
    document.getElementById("numb").innerHTML = y;
    var a=parseInt(x);
    var b=parseInt(y);
    document.getElementById("kq").innerHTML = a+b;
}

function hienthipheptru(){
    var x=document.getElementById("num3").value;
    var y=document.getElementById("num4").value;
    document.getElementById("numa2").innerHTML = x;
    document.getElementById("numb2").innerHTML = y;
    var a=parseInt(x);
    var b=parseInt(y);
    document.getElementById("kq2").innerHTML = a-b;
}


function hienthiphepnhan(){
    var x=document.getElementById("num5").value;
    var y=document.getElementById("num6").value;
    document.getElementById("numa3").innerHTML = x;
    document.getElementById("numb4").innerHTML = y;
    var a=parseInt(x);
    var b=parseInt(y);
    document.getElementById("kq3").innerHTML = a*b;
}

function hienthiphepchia(){
    var x=document.getElementById("num7").value;
    var y=document.getElementById("num8").value;
    document.getElementById("numa5").innerHTML = x;
    document.getElementById("numb6").innerHTML = y;
    var a=parseFloat(x);
    var b=parseFloat(y);
    if(b==0){
        document.getElementById("kq4").innerHTML = "Không chia được cho 0";
    }else{
        document.getElementById("kq4").innerHTML = a/b;
    }
}