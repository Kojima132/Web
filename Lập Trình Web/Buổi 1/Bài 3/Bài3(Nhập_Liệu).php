<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleForBài3(Nhập_Liệu).css">
    <script src="JSForBài3(Nhập_Liệu).js"></script>
    <title>Bài 3 (Nhập_Liệu)</title>
</head>
<body>
    <?php 
        echo"<h2>TRANG NHẬP ĐẦU VÀO</h2>";
        echo"<form action=\"Bài3(Kết_Quả).php\" method=\"POST\">
        <div class=\"div\">
            <div>
                <p id=\"id_1\">Chọn phép tính:</p>
            </div>
            <div>
                <input type=\"radio\" name=\"operation\" value=\"cong\" required onclick=\"toggleInputFields()\">
                Cộng
                <input type=\"radio\" name=\"operation\" value=\"tru\" onclick=\"toggleInputFields()\">
                Trừ
                <input type=\"radio\" name=\"operation\" value=\"nhan\" onclick=\"toggleInputFields()\">
                Nhân
                <input type=\"radio\" name=\"operation\" value=\"chia\" onclick=\"toggleInputFields()\">
                Chia
                <input type=\"radio\" name=\"operation\" value=\"chanle\" onclick=\"toggleInputFields()\">  
                Chẵn/lẻ
                <input type=\"radio\" name=\"operation\" value=\"songuyento\" onclick=\"toggleInputFields()\"> 
                Kiểm tra số nguyên tố <br>
            </div>
        </div>
        <div class=\"div\">
            <div>
                <p id=\"sothunhat_label\">Số thứ nhất:</p>
            </div>
            <div>
                <input type=\"text\" name=\"sothunhat\" id=\"sothunhat_input\"required><br>
            </div>
        </div>
        <div class=\"div\">
            <div>
                <p id=\"sothuhai_label\">Số thứ hai:</p>
            </div>
            <div>     
                <input type=\"text\" name=\"sothuhai\" id=\"sothuhai_input\"><br>
            </div>
        </div>
        <button type=\"submit\">Tính</button> 
       </form>";
    ?>

</body>
</html>