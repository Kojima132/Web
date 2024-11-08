<?php 

require_once '../libs/DB.php';

function getidbynamedepartment($department_name) {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT department_id FROM departments WHERE department_name = :department_name");
        $stmt->bindParam(':department_name', $department_name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['department_id'] ?? null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}



function add_phongban($department_name){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("INSERT INTO departments(department_name) VALUES (:department_name);");
        $stmt->bindParam(':department_name',$department_name);
        $stmt->execute();
        echo "Thêm phòng ban thành công!";
    }catch(PDOException $e) {
        echo "Failed:". $e->getMessage();
    }
}

function view_phongban(){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("SELECT * FROM departments;");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
        return false;
    }
}

function delete_phongban($department_id){
    global $conn;
    connect();
    try {
        $stmt1 = $conn->prepare("DELETE FROM employees WHERE department_id = :department_id;");
        $stmt1->execute([':department_id' => $department_id]);
        $stmt2 = $conn->prepare("DELETE FROM departments WHERE department_id = :department_id;");
        $stmt2->execute([':department_id' => $department_id]);

        echo "Xóa phòng ban và nhân viên thành công!";
    } catch(PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
}


function edit_phongban($department_id, $department_name){
    global $conn;
    if ($department_id === null) {
        echo "Failed to find role or department ID.";
        return;
    }
    connect();
    try{
    $stmt = $conn->prepare("UPDATE departments SET department_name=:department_name WHERE department_id = :department_id;");
    $query = $stmt->execute(
        [
            ':department_id' => $department_id,
            ':department_name'=>$department_name
        ]
    );
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
    }
    return isset($query) ? $query : false;
    }

 
    function get_phongban_by_id($id) {
        global $conn;
        connect();
        try {
            $stmt = $conn->prepare("SELECT department_id,department_name
                                    FROM departments 
                                    WHERE department_id=:department_id;");
            $stmt->bindParam(':department_id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Failed: " . $e->getMessage();
            return [];
        }
    }


    function get_all_departments() {
        global $conn;
        connect();
        try {
            $stmt = $conn->prepare("SELECT * FROM departments");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Failed: " . $e->getMessage();
            return [];
        }
    }
?>