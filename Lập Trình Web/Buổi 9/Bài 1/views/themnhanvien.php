<?php
session_start();
require_once '../controllers/controllernhanvien.php';
require_once '../models/chucvu.php';
require_once '../models/phongban.php';
if(!isset($_SESSION['user_name']) || !isset($_SESSION['roles_name']) || $_SESSION['roles_name']!='Admin'){
    header("Location:../views/login.html");
    exit();
}
$roles = get_all_roles();
$departments = get_all_departments();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm Nhân Viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Thêm Nhân Viên</h1>
    <a href="viewnhanvien.php">Trở Về</a><br>
    <a href='../controllers/logout.php'>Log Out</a> <br/> <br/>
    <form method="post" action="themnhanvien.php">
        <table width="50%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>First Name</td>
                <td>
                    <input type="text" name="first_name" value="<?php echo !empty($data['first_name']) ? $data['first_name'] : ''; ?>"/>
                    <?php if (!empty($errors['first_name'])) echo $errors['first_name']; ?>
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>
                    <input type="text" name="last_name" value="<?php echo !empty($data['last_name']) ? $data['last_name'] : ''; ?>"/>
                    <?php if (!empty($errors['last_name'])) echo $errors['last_name']; ?>
                </td>
            </tr>
            <tr>
                <td>Role:</td>
                <td>
                    <select name="role">
                        <?php foreach ($roles as $role): ?>
                            <option value="<?php echo $role['role_id']; ?>" <?php echo (isset($data['role_id']) && $data['role_id'] == $role['role_id']) ? 'selected' : ''; ?>>
                                <?php echo $role['role_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (!empty($errors['role_id'])) echo $errors['role_id']; ?>
                </td>
            </tr>
            <tr>
                <td>Department:</td>
                <td>
                    <select name="department">
                        <?php foreach ($departments as $department): ?>
                            <option value="<?php echo $department['department_id']; ?>" <?php echo (isset($data['department_id']) && $data['department_id'] == $department['department_id']) ? 'selected' : ''; ?>>
                                <?php echo $department['department_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (!empty($errors['department_id'])) echo $errors['department_id']; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="add_nhanvien" value="Lưu"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
