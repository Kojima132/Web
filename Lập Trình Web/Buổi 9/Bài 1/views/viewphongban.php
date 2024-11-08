<?php
session_start();
require_once '../models/phongban.php';
require_once '../libs/DB.php';
if(!isset($_SESSION['user_name']) || !isset($_SESSION['roles_name']) || $_SESSION['roles_name']!='Admin'){
    header("Location:../views/login.html");
    exit();
}
$phongban=view_phongban();
disconnect();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Danh Sách Phòng Ban</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Danh Sách Phòng Ban</h1>
        <a href="themphongban.php">Thêm Phòng Ban</a> <br/> <br/>
        <a href="viewnhanvien.php">Danh Sách Nhân Viên</a> <br/> <br/>
        <a href="viewchucvu.php">Danh Sách Chức Vụ</a> <br/> <br/>
        <a href='../controllers/logout.php'>Log Out</a><br><br>
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>Department</td>
                <td>Chọn thao tác</td>
            </tr>
            <?php foreach ($phongban as $item){ ?>
            <tr>
                <td><?php echo $item['department_name']; ?></td>
                <td>
                    <form method="post" action="xoaphongban.php">
                        <input onclick="window.location.href='suaphongban.php?id=<?php echo $item['department_id']; ?>'" type="button" value="Sửa" />
                        <input type="hidden" name="department_id" value="<?php echo $item['department_id']; ?>" />
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa" />
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>