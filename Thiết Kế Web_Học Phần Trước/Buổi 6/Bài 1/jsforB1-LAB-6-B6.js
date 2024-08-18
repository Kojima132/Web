function Ho(){
    var x;
    x=document.getElementById("ho").value;
    if(x==""){
        document.getElementById("tl1").innerHTML="Bạn chưa nhập họ! Xin hãy bổ sung thêm họ của bạn.";
        return false;
    }else if(x.length>0){
        document.getElementById("tl1").innerHTML="";
        return true;
    }
}

function Ten(){
    var y;
    y=document.getElementById("ten").value;
    if(y==""){
        document.getElementById("tl2").innerHTML="Bạn chưa nhập tên! Xin hãy bổ sung thêm tên của bạn.";
        return false;
    }else if(y.length>0){
        document.getElementById("tl2").innerHTML="";
        return true;
    }
}

function SĐT(){
    var z;
    z=document.getElementById("sđt").value;
    if(z==""){
        document.getElementById("tl3").innerHTML="Bạn chưa nhập số điện thoại! Xin hãy bổ sung thêm số điện thoại của bạn.";
        return false;
    }else if(isNaN(z) || z.length<10){
        document.getElementById("tl3").innerHTML="Đây không phải là một số điện thoại! Xin hãy bổ sung thêm số điện thoại của bạn.";
        return false;
    }else if(z.length>0 && z.length==10){
        document.getElementById("tl3").innerHTML="";
        return true;
    }
}


function reset(){
    document.getElementById("ho").value="";
    document.getElementById("ten").value="";
    document.getElementById("sđt").value="";
}