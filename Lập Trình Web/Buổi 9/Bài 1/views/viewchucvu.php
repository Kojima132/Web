<?php
session_start();
require_once '../models/chucvu.php';
require_once '../libs/DB.php';
if(!isset($_SESSION['user_name']) || !isset($_SESSION['roles_name']) || $_SESSION['roles_name']!='Admin'){
    header("Location:../views/login.html");
    exit();
}
$chucvu=view_chucvu();
disconnect();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Danh Sách Chức Vụ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Danh Sách Chức Vụ</h1>
        <a href="themchucvu.php">Thêm Chức Vụ</a> <br/> <br/>
        <a href="viewnhanvien.php">Danh Sách Nhân Viên</a> <br/> <br/>
        <a href="viewphongban.php">Danh Sách Phòng Ban</a> <br/> <br/>
        <a href='../controllers/logout.php'>Log Out</a><br> <br>
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>Role</td>
                <td>Chọn thao tác</td>
            </tr>
            <?php foreach ($chucvu as $item){ ?>
            <tr>
                <td><?php echo $item['role_name']; ?></td>
                <td>
                    <form method="post" action="xoachucvu.php">
                        <input onclick="window.location.href='suachucvu.php?id=<?php echo $item['role_id']; ?>'" type="button" value="Sửa" />
                        <input type="hidden" name="role_id" value="<?php echo $item['role_id']; ?>" />
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa" />
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>