<?php 
require_once '../controllers/controlllerforsuanguoidung.php';
require_once '../models/role.php';
session_start();
if(!isset($_SESSION['user_name']) || !isset($_SESSION['roles_name']) || $_SESSION['roles_name']!='Admin'){
    header("Location:../views/login.html");
    exit();
}
$roles = get_all_roles();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa Người Dùng</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Sửa Người Dùng</h1>
    <a href="viewnguoidung.php">Trở về</a><br>
    <a href='../controllers/logout.php'>Log Out</a> <br/> <br/>
    <form method="POST" action="suanguoidung.php?id=<?php echo isset($data['user_id']) ? $data['user_id'] : ''; ?>">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>User Name</td>
            <td>
                <input type="text" name="user_name" value="<?php echo isset($data['user_name']) ? htmlspecialchars($data['user_name']) : ''; ?>"/>
                <?php if (!empty($errors['user_name'])) echo $errors['user_name']; ?>
            </td>
        </tr>
        <tr>
            <td>New Password</td>
            <td>
                <input type="password" name="user_newpassword" value="<?php echo isset($data['user_newpassword']) ? htmlspecialchars($data['user_newpassword']) : ''; ?>"/>
                <?php if (!empty($errors['user_newpassword'])) echo $errors['user_newpassword']; ?>
            </td>
        </tr>
        <tr>
            <td>Password Confirm</td>
            <td>
                <input type="password" name="user_confirmpassword" value="<?php echo isset($data['user_confirmpassword']) ? htmlspecialchars($data['user_confirmpassword']) : ''; ?>"/>
                <?php if (!empty($errors['user_confirmpassword'])) echo $errors['user_confirmpassword']; ?>
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
                <input type="submit" name="edit_user" value="Lưu"/>
            </td>
        </tr>
    </table>
</form>
<p style="color:red;">Caution: Do not fill the new password field if you don't want to change your password!</p>
</body>
</html>
