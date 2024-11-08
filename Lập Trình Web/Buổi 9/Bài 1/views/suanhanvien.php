<?php 
require_once '../controllers/controllernhanvien.php';
require_once '../models/chucvu.php';
require_once '../models/phongban.php';
session_start();
if(!isset($_SESSION['user_name']) || !isset($_SESSION['roles_name']) || $_SESSION['roles_name']!='Admin'){
    header("Location:../views/login.html");
    exit();
}
$roles = get_all_roles();
$departments = get_all_departments();

$data = [];
$errors = [];

// Lấy dữ liệu nhân viên để chỉnh sửa
if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];
    $data = get_nhanvien_by_id($employee_id);
}

// Ngắt kết nối nếu cần
disconnect();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa Nhân Viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1><?php echo isset($data['employee_id']) ? 'Sửa' : 'Thêm' ?> nhân viên</h1>
    <a href="viewnhanvien.php">Trở về</a><br>
    <a href='../controllers/logout.php'>Log Out</a><br/> <br/>
    <form method="POST" action="suanhanvien.php?id=<?php echo isset($data['employee_id']) ? $data['employee_id'] : ''; ?>">
        <table width="50%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>First Name</td>
                <td>
                    <input type="text" name="first_name" value="<?php echo isset($data['first_name']) ? htmlspecialchars($data['first_name']) : ''; ?>"/>
                    <?php if (!empty($errors['first_name'])) echo "<span style='color:red'>{$errors['first_name']}</span>"; ?>
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>
                    <input type="text" name="last_name" value="<?php echo isset($data['last_name']) ? htmlspecialchars($data['last_name']) : ''; ?>"/>
                    <?php if (!empty($errors['last_name'])) echo "<span style='color:red'>{$errors['last_name']}</span>"; ?>
                </td>
            </tr>
            <tr>
                <td>Role:</td>
                <td>
                    <select name="role">
                        <?php foreach ($roles as $role): ?>
                            <option value="<?php echo $role['role_id']; ?>" <?php if (isset($data['role_id']) && $data['role_id'] == $role['role_id']) echo 'selected'; ?>><?php echo $role['role_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (!empty($errors['role_id'])) echo "<span style='color:red'>{$errors['role_id']}</span>"; ?>
                </td>
            </tr>
            <tr>
                <td>Department:</td>
                <td>
                    <select name="department">
                        <?php foreach ($departments as $department): ?>
                            <option value="<?php echo $department['department_id']; ?>" <?php if (isset($data['department_id']) && $data['department_id'] == $department['department_id']) echo 'selected'; ?>><?php echo $department['department_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (!empty($errors['department_id'])) echo "<span style='color:red'>{$errors['department_id']}</span>"; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="edit_employee" value="Lưu"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
