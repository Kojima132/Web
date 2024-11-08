<?php
require_once '../models/nhanvien.php';
require_once '../libs/DB.php';

$data = [];
$errors = [];

// Xử lý việc lấy dữ liệu nhân viên nếu có ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = get_nhanvien_by_id($id);
}

// Xử lý form cho cả việc thêm và chỉnh sửa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'] ?? '';
    $lastName = $_POST['last_name'] ?? '';
    $role_id = $_POST['role'] ?? '';
    $department_id = $_POST['department'] ?? '';

    // Lưu dữ liệu nhập vào
    $data['first_name'] = $firstName;
    $data['last_name'] = $lastName;
    $data['role_id'] = $role_id;
    $data['department_id'] = $department_id;

    // Kiểm tra dữ liệu
    if (empty($firstName)) {
        $errors['first_name'] = 'First name is required';
    }
    if (empty($lastName)) {
        $errors['last_name'] = 'Last name is required';
    }
    if (empty($role_id)) {
        $errors['role_id'] = 'Role is required';
    }
    if (empty($department_id)) {
        $errors['department_id'] = 'Department is required'; 
    }

    // Nếu không có lỗi, thực hiện thêm hoặc cập nhật
    if (empty($errors)) {
        if (isset($id)) {
            edit_nhanvien($id, $firstName, $lastName, $role_id, $department_id);
        } else {
            add_nhanvien($firstName, $lastName, $role_id, $department_id);
        }
        header("Location: viewnhanvien.php");
        exit();
    }
}

// Ngắt kết nối
disconnect();
?>
