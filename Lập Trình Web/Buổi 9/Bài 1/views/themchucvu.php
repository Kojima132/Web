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
        <title>Thêm Chức Vụ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Thêm Chức Vụ</h1>
        <a href="viewchucvu.php">Trở Về</a><br>
        <a href='../controllers/logout.php'>Log Out</a> <br/> <br/>
        <form method="post" action="themchucvu.php">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Tên Chức Vụ</td>
                    <td>
                        <input type="text" name="role_name" value="<?php echo !empty($data['role_name']) ? $data['role_name'] : ''; ?>"/>
                        <?php if (!empty($errors['role_name'])) echo $errors['role_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_chucvu" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>