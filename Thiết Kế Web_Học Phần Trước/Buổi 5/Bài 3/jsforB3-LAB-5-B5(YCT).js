function chonsongaunhien(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function R() {
    var x = document.getElementById("id1").value;
    x = parseInt(x, 10);

    if (!isNaN(x) && x >= 1 && x <= 10) {
        var y = chonsongaunhien(1, 10);

        if (x == y) {
            document.getElementById("tl1").innerHTML = "Bạn đã đoán đúng";
        } else {
            document.getElementById("tl1").innerHTML = "Bạn đã đoán sai, số đúng là " + y;
        }
    } else {
        document.getElementById("tl1").innerHTML = "Input lỗi, vui lòng nhập lại";
    }
}
