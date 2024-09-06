<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $servername = "localhost"; // Địa chỉ máy chủ MySQL (nếu bạn đang sử dụng máy cục bộ thì là 'localhost')
    $username = "root"; // Tên người dùng MySQL của bạn
    $password = ""; // Mật khẩu MySQL của bạn
    $dbname = "test"; // Tên cơ sở dữ liệu bạn muốn kết nối

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    echo "Kết nối thành công!";
    ?>

</body>
</html>