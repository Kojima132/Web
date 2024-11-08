<?php require '../libs/DB.php';
 require '../models/chucvu.php';

$id = isset($_POST['role_id']) ? (int)$_POST['role_id'] : '';
if ($id){
    delete_chucvu($id);
}
header("location: viewchucvu.php");
?>