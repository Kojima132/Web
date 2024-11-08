<?php
session_start();
require_once '../controllers/controllerphongban.php';
if(!isset($_SESSION['user_name']) || !isset($_SESSION['roles_name']) || $_SESSION['roles_name']!='Admin'){
    header("Location:../views/login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm Phòng Ban</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Thêm Phòng Ban</h1>
        <a href="viewphongban.php">Trở Về</a> <br/> <br/>
        <form method="post" action="themphongban.php">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Tên Phòng Ban</td>
                    <td>
                        <input type="text" name="department_name" value="<?php echo !empty($data['department_name']) ? $data['department_name'] : ''; ?>"/>
                        <?php if (!empty($errors['department_name'])) echo $errors['department_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_phongban" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>