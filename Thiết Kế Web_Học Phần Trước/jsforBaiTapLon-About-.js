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





window.onload = function() {
  // Mở slideshow khi trang đã load xong
  showSlides(slideIndex);
};

//khai báo biến slideIndex đại diện cho slide hiện tại
var slideIndex;
// KHai bào hàm hiển thị slide
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active2", "");
    }

    slides[slideIndex].style.display = "block";  
    dots[slideIndex].className += " active2";
    //chuyển đến slide tiếp theo
    slideIndex++;
    //nếu đang ở slide cuối cùng thì chuyển về slide đầu
    if (slideIndex > slides.length - 1) {
      slideIndex = 0
    }    
    //tự động chuyển đổi slide sau 5s
    setTimeout(showSlides, 8000);
}
//mặc định hiển thị slide đầu tiên 
showSlides(slideIndex = 0);


function currentSlide(n) {
  showSlides(slideIndex = n);
}