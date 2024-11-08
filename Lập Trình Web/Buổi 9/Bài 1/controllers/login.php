<?php 
session_start();
require_once '../libs/DB.php';
global $conn;
connect();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name=$_POST['user_name'];
    $user_password=$_POST['user_password'];
    try{
        $stmt=$conn->prepare("SELECT ur.*, r.roles_name
                              FROM users AS ur
                              JOIN roles AS r ON r.role_id=ur.role_id
                              WHERE ur.user_name=:user_name");
        $stmt->execute([':user_name' => $user_name]);                      
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($user_password, $row['user_password'])){
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['user_name']=$row['user_name'];
                $_SESSION['roles_name']=$row['roles_name'];
                if($row['roles_name']=='Admin'){
                    header("Location:../views/homeforadmin.php");
                }else if($row['roles_name']=='Employee'){
                    header("Location:../views/homeforuser.php");
                }
            }else{
                echo "Invalid password";
            }
        }else{
            echo "Thông tin đăng nhập chưa đúng! Vui lòng đăng nhập lại.<br>";
            echo "<a href='../views/login.html'>Login</a>";
        }
    }catch(PDOException $ex){
        echo "Error". $ex->getMessage();
    }
}
?>