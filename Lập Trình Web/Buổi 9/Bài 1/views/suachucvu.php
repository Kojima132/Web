<?php 
require_once '../controllers/controllerchucvu.php';
session_start();
if(!isset($_SESSION['user_name']) || !isset($_SESSION['roles_name']) || $_SESSION['roles_name']!='Admin'){
    header("Location:../views/login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa Chức Vụ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Sửa Chức Vụ</h1>
    <a href="viewchucvu.php">Trở về</a><br>
    <a href='../controllers/logout.php'>Log Out</a><br/> <br/>
    <form method="POST" action="suachucvu.php?id=<?php echo isset($data['role_id']) ? $data['role_id'] : ''; ?>">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Role</td>
            <td>
                <input type="text" name="role_name" value="<?php echo isset($data['role_name']) ? htmlspecialchars($data['role_name']) : ''; ?>"/>
                <?php if (!empty($errors['role_name'])) echo $errors['role_name']; ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="edit_role" value="Lưu"/>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
