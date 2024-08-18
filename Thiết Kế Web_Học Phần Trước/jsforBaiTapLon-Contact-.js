window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("myTopnav").style.padding = "10px 10px";
    document.getElementById("myTopnav").style.backgroundColor="black";
    document.getElementById("anhlogo").style.width = "40px";
  } else {
    document.getElementById("myTopnav").style.padding = "30px 10px";
    document.getElementById("myTopnav").style.backgroundColor="transparent";
    document.getElementById("anhlogo").style.width = "70px";
  }
}


function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className == "navbar") {
    x.className += " responsive";
  } else {
    x.className = "navbar";
  }
}

let y=0;
function validate(){
  y=0;
  var x=document.getElementById("name").value;
  if(x==''){
    document.getElementById("ph1").innerHTML="Ô này không được bỏ trống."
  }else if(x.length>0){
    document.getElementById("ph1").innerHTML="";
    y+=1;
  }
  x=document.getElementById("email").value;
  if(x==''){
    document.getElementById("ph2").innerHTML="Ô này không được bỏ trống."
  }else if(x.length>0){
    document.getElementById("ph2").innerHTML="";
    y+=1;
  }
  x=document.getElementById("sđt").value;
  if(x==''){
    document.getElementById("ph3").innerHTML="Ô này không được bỏ trống."
  }else if(isNaN(x) || x.length !== 10){
    document.getElementById("ph3").innerHTML="Đây không phải là một số điện thoại."
  }else if(x.length>0 && x.length==10){
    document.getElementById("ph3").innerHTML="";
    y+=1;
  }

  if(y==3){
    alert("Đã gửi thành công");
    document.getElementById("name").value="";
    document.getElementById("email").value="";
    document.getElementById("sđt").value="";
  }else {
    alert("Gửi không thành công do thiếu thông tin");
  }
}