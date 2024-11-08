<?php
session_start();

// Hủy tất cả các session hiện tại
session_unset(); // Loại bỏ tất cả các biến session
session_destroy(); // Hủy session

// Chuyển hướng về trang đăng nhập sau khi đăng xuất
header("Location: ../views/login.html");
exit();
?>
