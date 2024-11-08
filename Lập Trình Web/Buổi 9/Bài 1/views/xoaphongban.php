<?php require '../libs/DB.php';
 require '../models/phongban.php';

$id = isset($_POST['department_id']) ? (int)$_POST['department_id'] : '';
if ($id){
    delete_phongban($id);
}
header("location: viewphongban.php");
?>