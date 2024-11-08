<?php
require_once '../models/chucvu.php';
require_once '../libs/DB.php';

$data = [];
$errors = [];


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = get_chucvu_by_id($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role_name'] ?? '';

    $data['role_name'] = $role;


    if (empty($role)) {
        $errors['role_name'] = 'Department is required'; 
    }

    if (empty($errors)) {
        if (isset($id)) {
            edit_chucvu($id,$role);
        } else {
            add_chucvu($role);
        }
        header("location: viewchucvu.php");
        exit();
    }
}

disconnect();
?>
