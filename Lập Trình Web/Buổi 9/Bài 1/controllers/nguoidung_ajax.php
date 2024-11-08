<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../models/nguoidung.php';
require_once '../libs/DB.php';

header('Content-Type: application/json'); // Đặt tiêu đề để trả về JSON

$nguoidung = view_nguoidung();
if ($nguoidung) {
    echo json_encode($nguoidung); // Trả về dữ liệu dưới dạng JSON
} else {
    echo json_encode([]); // Trả về mảng rỗng nếu không có dữ liệu
}

disconnect();
?>
