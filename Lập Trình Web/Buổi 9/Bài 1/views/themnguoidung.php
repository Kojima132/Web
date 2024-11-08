<?php
session_start();
require_once '../controllers/controllernguoidung.php';
require_once '../models/role.php';
if(!isset($_SESSION['user_name']) || !isset($_SESSION['roles_name']) || $_SESSION['roles_name']!='Admin'){
    header("Location:../views/login.html");
    exit();
}
$roles = get_all_roles();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm Người Dùng</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Thêm Người Dùng</h1>
    <a href="viewnguoidung.php">Trở Về</a><br>
    <a href='../controllers/logout.php'>Log Out</a> <br/> <br/>
    <form method="post" action="themnguoidung.php">
        <table width="50%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>User Name</td>
                <td>
                    <input type="text" name="user_name" value="<?php echo !empty($data['user_name']) ? $data['user_name'] : ''; ?>"/>
                    <?php if (!empty($errors['user_name'])) echo $errors['user_name']; ?>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="text" name="user_password" value="<?php echo !empty($data['user_password']) ? $data['user_name'] : ''; ?>"/>
                    <?php if (!empty($errors['user_password'])) echo $errors['user_password']; ?>
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
                    <select name="role">
                        <?php foreach ($roles as $role): ?>
                            <option value="<?php echo $role['role_id']; ?>" <?php echo (isset($data['role_id']) && $data['role_id'] == $role['role_id']) ? 'selected' : ''; ?>>
                                <?php echo $role['roles_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (!empty($errors['role_id'])) echo $errors['role_id']; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="add_nguoidung" value="Lưu"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
