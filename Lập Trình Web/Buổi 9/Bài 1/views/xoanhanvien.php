<?php require '../libs/DB.php';
 require '../models/nhanvien.php';

$id = isset($_POST['employee_id']) ? (int)$_POST['employee_id'] : '';
if ($id){
    delete_nhanvien($id);
}
header("location: viewnhanvien.php");
?>