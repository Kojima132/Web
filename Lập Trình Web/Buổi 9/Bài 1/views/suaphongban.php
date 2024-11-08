<?php 
require_once '../controllers/controllerphongban.php';
session_start();
if(!isset($_SESSION['user_name']) || !isset($_SESSION['roles_name']) || $_SESSION['roles_name']!='Admin'){
    header("Location:../views/login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa Phòng Ban</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Sửa Phòng Ban</h1>
    <a href="viewphongban.php">Trở về</a><br>
    <a href='../controllers/logout.php'>Log Out</a> <br/> <br/>
    <form method="POST" action="suaphongban.php?id=<?php echo isset($data['department_id']) ? $data['department_id'] : ''; ?>">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Department</td>
            <td>
                <input type="text" name="department_name" value="<?php echo isset($data['department_name']) ? htmlspecialchars($data['department_name']) : ''; ?>"/>
                <?php if (!empty($errors['department_name'])) echo $errors['department_name']; ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="edit_department" value="Lưu"/>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
