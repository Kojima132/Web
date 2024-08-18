var img=[];
var curimg=0;
function loadimgs(){
    for(  i=1;i<5;i++){
        img[i]=new Image();
        img[i].src="../File Ảnh/anh"+i+".jpg";
    }
}
function next(){
    if(curimg<img.length-1){
        curimg++;
        document.getElementById("anh1").src=img[curimg].src;
    }
    if(curimg==img.length-1){
        curimg=0;
        document.getElementById("anh1").src=img[curimg].src;
    }
}
function back(){
    if(curimg>0){
        curimg--;
        document.getElementById("anh1").src=img[curimg].src;
    }
    if(curimg==0){
        curimg=img.length-1;
        document.getElementById("anh1").src=img[curimg].src;
    }
}