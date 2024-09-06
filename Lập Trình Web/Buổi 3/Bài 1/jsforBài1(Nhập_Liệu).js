function validateForm() {
    var validbooktitle = booktitle();
    var validauthor= author();
    // var validEmail = email();
    var validpublisher=publisher();
    var validyear=year();
    return validbooktitle && validauthor && validpublisher && validyear; 
}

function booktitle() {
    var x = document.getElementById("booktitle").value;
    if (x == "") {
        document.getElementById("booktitle").placeholder = "Book title cannot be blank";
        return false;
    } else {
        document.getElementById("booktitle").placeholder = "";
        return true;
    }
}

function author() {
    var x = document.getElementById("authorname").value;
    if (x == "") {
        document.getElementById("authorname").placeholder = "Author name cannot be blank";
        return false;
    } else {
        document.getElementById("authorname").placeholder = "";
        return true;
    }
}


function publisher() {
    var x = document.getElementById("publisher").value;
    if (x == "") {
        document.getElementById("publisher").placeholder = "Publisher cannot be blank";
        return false;
    } else {
        document.getElementById("publisher").placeholder = "";
        return true;
    }
}


function year() {
    // Tìm phần tử input với id là "year"
    var inputElement = document.getElementById("year");
    
    // Lấy giá trị từ input và loại bỏ khoảng trắng ở đầu/cuối
    var x = inputElement.value.trim(); 

    // Kiểm tra nếu giá trị trống
    if (x === "") {
        inputElement.value = ""; // Xóa giá trị trong input
        inputElement.placeholder = "Year of publication cannot be blank"; // Đặt thông báo lỗi vào placeholder
        return false;
    } 
    // Kiểm tra nếu giá trị không phải là số hoặc không phải số nguyên hoặc không phải số dương
    else if (isNaN(x) || parseInt(x) != x || Number(x) <= 0) {
        inputElement.value = ""; // Xóa giá trị trong input
        inputElement.placeholder = "Year of publication must be a positive number"; // Đặt thông báo lỗi vào placeholder
        return false;
    } else {
        inputElement.placeholder = ""; // Xóa thông báo lỗi nếu giá trị hợp lệ
        return true;
    }
}


// function email() {
//     var x = document.getElementById("email").value;
//     var y = x.indexOf("@");
//     var z = x.lastIndexOf(".");
//     if (x == "") {
//         document.getElementById("email").placeholder = "Bạn chưa nhập email! Xin hãy bổ sung thêm họ của bạn.";
//         return false;
//     } else if (y < 1 || z < (y + 2) || z >= (x.length - 2)) {
//         document.getElementById("email").placeholder = "Hãy nhập đúng email của bạn.";
//         return false;
//     } else {
//         document.getElementById("email").placeholder = "";
//         return true;
//     }
// }