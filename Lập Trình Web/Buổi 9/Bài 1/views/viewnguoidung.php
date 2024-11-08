<?php
session_start();
if(!isset($_SESSION['user_name']) || !isset($_SESSION['roles_name']) || $_SESSION['roles_name']!='Admin'){
    header("Location:../views/login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Người Dùng</title>
    <link rel="stylesheet" href="viewnguoidung.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Sử dụng jQuery -->
</head>
<body>
    <h1>Danh Sách Người Dùng</h1>
    <a href="../views/themnguoidung.php">Thêm Người Dùng</a>
    <a href='../controllers/logout.php'>Log Out</a><br><br>
    <table width="100%" border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Role</th>
                <th>Chọn thao tác</th>
            </tr>
        </thead>
        <tbody id="user-table-body">
            <!-- Dữ liệu sẽ được AJAX tải vào đây -->
        </tbody>
    </table>

    <script>
        // Sử dụng AJAX để lấy dữ liệu người dùng và hiển thị
        function loadUsers() {
            $.ajax({
                url: '../controllers/nguoidung_ajax.php', // Gửi yêu cầu đến file này
                method: 'GET',
                dataType: 'json', // Định dạng dữ liệu nhận về là JSON
                success: function(response) {
                    var rows = '';
                    response.forEach(function(item) {
                        rows += '<tr>';
                        rows += '<td>' + item.user_id + '</td>';
                        rows += '<td>' + item.user_name + '</td>';
                        rows += '<td>' + item.user_password + '</td>';
                        rows += '<td>' + item.roles_name + '</td>';
                        rows += '<td>';
                        rows += '<form method="post" action="xoanguoidung.php" class="action-buttons">';
                        rows += '<input onclick="window.location.href=\'suanguoidung.php?id=' + item.user_id + '\'" type="button" value="Sửa" />';
                        rows += '<input type="hidden" name="user_id" value="' + item.user_id + '" />';
                        rows += '<input onclick="return confirm(\'Bạn có chắc muốn xóa không?\');" type="submit" name="delete" value="Xóa" />';
                        rows += '</form>';
                        rows += '</td>';
                        rows += '</tr>';
                    });

                    $('#user-table-body').html(rows); // Hiển thị dữ liệu vào bảng
                },
                error: function() {
                    alert('Không thể tải danh sách người dùng.');
                }
            });
        }

        // Gọi hàm loadUsers khi trang được tải
        $(document).ready(function() {
            loadUsers();
        });
    </script>
</body>
</html>
