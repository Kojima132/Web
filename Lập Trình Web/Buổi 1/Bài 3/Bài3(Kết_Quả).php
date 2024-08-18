<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleForBài3(Kết_Quả).css">
    <script src="JSForBài3(Kết_quả).js"></script>
    <title>Kết Quả</title>
</head>
<body>
    <h2>KẾT QUẢ PHÉP TÍNH</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $operation = $_POST['operation'];
        $sothunhat = isset($_POST['sothunhat']) ? $_POST['sothunhat'] : '';
        $sothuhai = isset($_POST['sothuhai']) ? $_POST['sothuhai'] : '';
        $result = '';
        $pheptoan;
        if(is_numeric($sothunhat)&&is_numeric($sothuhai)){
            // Thực hiện phép tính
            $sothunhat = floatval($sothunhat);
            $sothuhai = floatval($sothuhai);
            switch($operation) {
                case 'cong':
                    $pheptoan="Phép Cộng";
                    $result = $sothunhat + $sothuhai;
                    break;
                case 'tru':
                    $pheptoan="Phép Trừ";
                    $result = $sothunhat - $sothuhai;
                    break;
                case 'nhan':
                    $pheptoan="Phép Nhân";
                    $result = $sothunhat * $sothuhai;
                    break;
                case 'chia':
                    $pheptoan="Phép Chia";
                    if ($sothuhai != 0) {
                        $result = $sothunhat / $sothuhai;
                    } else if($sothuhai == 0){
                        $result = "Không thể chia cho 0";
                    }
                    break;
                case 'chanle':
                    $pheptoan="Tìm Chẵn Lẻ";
                    $result = ($sothunhat % 2 === 0) ? "$sothunhat là số chẵn" : "$sothunhat là số lẻ";
                    break;
                case 'songuyento':
                    $pheptoan="Kiểm Tra Số Nguyên Tố";
                    $result = isPrime($sothunhat) ? "$sothunhat là số nguyên tố" : "$sothunhat không phải là số nguyên tố";
                    break;
                default:
                $result = "Vui lòng chọn phép tính";
            }
        }else{
            $result="ERROR!";
        }

        if(is_numeric($sothunhat) && (!is_numeric($sothuhai)) ){
            $sothunhat = floatval($sothunhat);
            switch($operation) {
                case 'chanle':
                    $pheptoan="Tìm Chẵn Lẻ";
                    $result = ($sothunhat % 2 === 0) ? "$sothunhat là số chẵn" : "$sothunhat là số lẻ";
                    break;
                case 'songuyento':
                    $pheptoan="Kiểm Tra Số Nguyên Tố";
                    $result = isPrime($sothunhat) ? "$sothunhat là số nguyên tố" : "$sothunhat không phải là số nguyên tố";
                    break;
                default:
                $result = "Vui lòng chọn phép tính";
            }
        }
    }

    function isPrime($number) {
        if ($number <= 1) return false;
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) return false;
        }
        return true;
    }
    echo"
    <form>
        <div id=\"id_divparent\">
            <div  class=\"div\">    
                <div>
                    <p id=\"p\">Chọn phép tính:</p>
                </div>
                <div>
                    <p id=\"id_pheptinh\"></p>
                </div>
            </div>
            <div  class=\"div\">
                <div>
                    <p id=\"p\">Số thứ nhất:</p>
                </div>
                <div>
                    <input type=\"text\" id=\"sothunhat_output\">
                </div>
            </div>
            <div  class=\"div\">
                <div>
                    <p id=\"p\">Số thứ hai:</p>
                </div>
                <div>
                    <input type=\"text\" id=\"sothuhai_output\">
                </div>        
            </div>
            <div  class=\"div\">
                <div>
                    <p id=\"p\">Kết Quả:</p>
                </div>
                <div>
                    <input type=\"text\" id=\"ketqua_output\">
                </div>
            </div>
        </div>
        <button type=\"button\"><a href=\"Bài3(Nhập_Liệu).php\">Quay Về</a></button>
    </form>";
    ?>

    <script>
        let pheptinh = "<?php echo isset($pheptoan) ? $pheptoan : ''; ?>";
        let sothunhat = "<?php echo isset($sothunhat) ? $sothunhat : ''; ?>";
        let sothunhai = "<?php echo isset($sothuhai) ? $sothuhai : ''; ?>";
        let ketqua = "<?php echo isset($result) ? $result : ''; ?>";

        window.onload = function() {
            xuatra();
        };
    </script>

</body>
</html>
