<?php
session_start();
require_once '../models/nhanvien.php';
require_once '../libs/DB.php';
if(!isset($_SESSION['user_name']) || !isset($_SESSION['roles_name']) || $_SESSION['roles_name']!='Admin'){
    header("Location:../views/login.html");
    exit();
}
$nhanvien=view_nhanvien();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Danh Sách Nhân Viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Danh Sách Nhân Viên</h1>
        <a href="themnhanvien.php">Thêm Nhân Viên</a> <br/> <br/>
        <a href="themphongban.php">Thêm Phòng Ban</a> <br/> <br/>
        <a href="themchucvu.php">Thêm Chức Vụ</a> <br/> <br/>
        <a href="viewphongban.php">Danh Sách Phòng Ban</a> <br/> <br/>
        <a href="viewchucvu.php">Danh Sách Chức Vụ</a> <br/> <br/>
        <a href='../controllers/logout.php'>Log Out</a><br><br>
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                
                <td>First Name</td>
                <td>Last Name</td>
                <td>Role</td>
                <td>Department</td>
                <td>Chọn thao tác</td>
            </tr>
            <?php foreach ($nhanvien as $item){ ?>
            <tr>
                <td><?php echo $item['first_name']; ?></td>
                <td><?php echo $item['last_name']; ?></td>
                <td><?php echo $item['role_name']; ?></td>
                <td><?php echo $item['department_name']; ?></td>
                <td>
                    <form method="post" action="xoanhanvien.php">
                    <input onclick="window.location.href='suanhanvien.php?id=<?php echo $item['employee_id']; ?>'" type="button" value="Sửa" />
                    <input type="hidden" name="employee_id" value="<?php echo $item['employee_id']; ?>" />
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa" />
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>

<?php
disconnect();
?>