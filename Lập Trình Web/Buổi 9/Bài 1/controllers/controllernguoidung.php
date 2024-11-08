<?php
require_once '../models/nguoidung.php';
require_once '../libs/DB.php';

$data = [];
$errors = [];

// Xử lý việc lấy dữ liệu nhân viên nếu có ID
// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
//     $data = get_nhanvien_by_id($id);
// }

// Xử lý form cho cả việc thêm và chỉnh sửa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'] ?? '';
    $user_password = $_POST['user_password'] ?? '';
    $role_id = $_POST['role'] ?? '';

    // Lưu dữ liệu nhập vào
    $data['user_name'] = $user_name;
    $data['user_password'] = $user_password;
    $data['role_id'] = $role_id;

    // Kiểm tra dữ liệu
    if (empty($user_name)) {
        $errors['user_name'] = 'First name is required';
    }
    if (empty($user_password)) {
        $errors['user_password'] = 'Last name is required';
    }
    if (empty($role_id)) {
        $errors['role_id'] = 'Role is required';
    }


    // Nếu không có lỗi, thực hiện thêm hoặc cập nhật
    if (empty($errors)) {
        add_nguoidung($user_name, $user_password, $role_id);
        echo "thêm người dùng thành công";
        header("Location: viewnguoidung.php");
        exit();
    }
}

// Ngắt kết nối
disconnect();
?>
