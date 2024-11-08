<?php
require_once '../models/nguoidung.php';
require_once '../libs/DB.php';
global $conn;
connect();
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $data = get_user_by_id($user_id); // Hàm này sẽ trả về dữ liệu người dùng theo ID
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_GET['id'];
    $user_name = $_POST['user_name'];
    $role_id=$_POST['role'];
    $new_password = $_POST['user_newpassword'];
    $confirm_password = $_POST['user_confirmpassword'];
    $errors = [];

    // Kiểm tra trường user_name
    if (empty($user_name)) {
        $errors['user_name'] = 'Vui lòng nhập tên người dùng';
    }

    // Kiểm tra xem mật khẩu có được nhập hay không
    if (!empty($new_password) || !empty($confirm_password)) {
        // Kiểm tra mật khẩu có khớp nhau không
        if ($new_password !== $confirm_password) {
            $errors['user_confirmpassword'] = 'Mật khẩu không trùng khớp';
        }
    }

    if (empty($errors)) {
        if (!empty($new_password) && $new_password === $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET user_name = :user_name, user_password = :user_password,role_id=:role_id WHERE user_id = :user_id";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute(['user_name' => $user_name, 'user_password' => $hashed_password,'role_id'=>$role_id, 'user_id' => $user_id])) {
                header('Location: viewnguoidung.php');
                exit();
            } else {
                $errors['general'] = 'Cập nhật thất bại!';
            }
        } else {
            // Chỉ cập nhật tên người dùng
            $sql = "UPDATE users SET user_name = :user_name,role_id=:role_id WHERE user_id = :user_id";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute(['user_name' => $user_name,'role_id'=>$role_id, 'user_id' => $user_id])) {
                header('Location: viewnguoidung.php');
                exit();
            } else {
                $errors['general'] = 'Cập nhật thất bại!';
            }
        }
    }
    
}
?>