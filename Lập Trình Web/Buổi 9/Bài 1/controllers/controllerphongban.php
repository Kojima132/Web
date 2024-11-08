<?php
require_once '../models/phongban.php';
require_once '../libs/DB.php';

$data = [];
$errors = [];


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = get_phongban_by_id($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $department = $_POST['department_name'] ?? '';

    $data['department_name'] = $department;


    if (empty($department)) {
        $errors['department_name'] = 'Department is required'; 
    }

    if (empty($errors)) {
        if (isset($id)) {
            edit_phongban($id,$department);
        } else {
            add_phongban($department);
        }
        header("location: viewphongban.php");
        exit();
    }
}

disconnect();
?>
