
function R(){
    var x=document.getElementById("id1");
    x = Number(x.value)
    var y = Math.round(Math.random());
    if (x >= 2 || x < 0) {
        document.getElementById("tl1").innerHTML = "Input lỗi, vui lòng nhập lại";
    } else if (x == y) {
        document.getElementById("tl1").innerHTML = "Bạn đã đoán đúng";
    } else if (x != y) {
        document.getElementById("tl1").innerHTML = "Bạn đã đoán sai";
    }
}