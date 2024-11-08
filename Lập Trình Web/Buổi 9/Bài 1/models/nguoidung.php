<?php 
require_once '../libs/DB.php';
require_once '../models/role.php';
function add_nguoidung($user_name,$user_password,$role_id){
    global $conn;
    connect();
    $pass_word=password_hash($user_password, PASSWORD_DEFAULT);
    // $role_id=getidrolebynamerole($user_role);
    try{
        $stmt=$conn->prepare("INSERT INTO users(user_name,user_password,role_id) VALUE (:user_name,:user_password,:role_id);");
        $stmt->bindParam(":user_name",$user_name);
        $stmt->bindParam(":user_password",$pass_word);
        $stmt->bindParam(":role_id",$role_id);
        $stmt->execute();
    }catch(PDOException $ex){
        echo "Error: " . $ex->getMessage();
    }
}

function view_nguoidung(){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("SELECT users.*,roles.roles_name
                                FROM users
                                JOIN roles ON roles.role_id=users.role_id;");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
        return false;
    }
}


function delete_nguoidung($user_id){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id = :user_id;");
        $query = $stmt->execute(
            [
                ':user_id'=> $user_id
            ]
        );
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
    }
    return isset($query) ? $query : false;
} 

function get_user_by_id($user_id) {
    global $conn;
    connect();
    $sql = "SELECT * FROM users WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['user_id' => $user_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>