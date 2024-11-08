<?php require '../libs/DB.php';
 require '../models/nguoidung.php';

$id = isset($_POST['user_id']) ? (int)$_POST['user_id'] : '';
if ($id){
    delete_nguoidung($id);
}
header("location: viewnguoidung.php");
?>