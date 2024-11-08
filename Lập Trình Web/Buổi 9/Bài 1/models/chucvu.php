<?php 

require_once '../libs/DB.php';

function getidbynamerole($role_name) {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT role_id FROM employeeroles WHERE role_name = :role_name");
        $stmt->bindParam(':role_name', $role_name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['role_id'] ?? null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}


function add_chucvu($role_name){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("INSERT INTO employeeroles(role_name) VALUES (:role_name);");
        $stmt->bindParam(':role_name',$role_name);
        $stmt->execute();
        echo "Thêm phòng ban thành công!";
    }catch(PDOException $e) {
        echo "Failed:". $e->getMessage();
    }
}

function view_chucvu(){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("SELECT * FROM employeeroles;");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
        return false;
    }
}

function delete_chucvu($role_id){
    global $conn;
    connect();
    try {
        $stmt1 = $conn->prepare("DELETE FROM employees WHERE role_id = :role_id;");
        $stmt1->execute([':role_id' => $role_id]);
        $stmt2 = $conn->prepare("DELETE FROM employeeroles WHERE role_id = :role_id;");
        $stmt2->execute([':role_id' => $role_id]);
        echo "Xóa phòng ban và nhân viên thành công!";
    } catch(PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
}

function edit_chucvu($role_id, $role_name){
    global $conn;
    if ($role_id === null) {
        echo "Failed to find role or department ID.";
        return;
    }
    connect();
    try{
    $stmt = $conn->prepare("UPDATE employeeroles SET role_name=:role_name WHERE role_id = :role_id;");
    $query = $stmt->execute(
        [
            ':role_id' => $role_id,
            ':role_name'=>$role_name
        ]
    );
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
    }
    return isset($query) ? $query : false;
    }

 
    function get_chucvu_by_id($id) {
        global $conn;
        connect();
        try {
            $stmt = $conn->prepare("SELECT role_id,role_name
                                    FROM employeeroles 
                                    WHERE role_id=:role_id;");
            $stmt->bindParam(':role_id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Failed: " . $e->getMessage();
            return [];
        }
    }


    function get_all_roles() {
        global $conn;
        connect();
        try {
            $stmt = $conn->prepare("SELECT * FROM employeeroles");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Failed: " . $e->getMessage();
            return [];
        }
    }
?>