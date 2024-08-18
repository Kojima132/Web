window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("myTopnav").style.padding = "10px 10px";
    document.getElementById("myTopnav").style.backgroundColor="black";
    document.getElementById("anhlogo").style.width = "40px";
  } else {
    document.getElementById("myTopnav").style.padding = "30px 10px";
    document.getElementById("myTopnav").style.backgroundColor="black";
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