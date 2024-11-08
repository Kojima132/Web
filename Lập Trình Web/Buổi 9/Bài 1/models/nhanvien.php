<?php 
require_once '../libs/DB.php';
require_once 'chucvu.php';
require_once 'phongban.php';
function add_nhanvien($first_name,$last_name,$role_id,$department_id){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("INSERT INTO employees(first_name, last_name,role_id,department_id) VALUES (:first_name, :last_name, :role_id,:department_id);");
        $stmt->bindParam(':first_name',$first_name);
        $stmt->bindParam(':last_name',$last_name);
        $stmt->bindParam(':role_id',$role_id);
        $stmt->bindParam(':department_id',$department_id);
        $stmt->execute();
        echo "Thêm nhân viên thành công!";
    }catch(PDOException $e) {
        echo "Failed:". $e->getMessage();
    }
}

function view_nhanvien(){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("SELECT e.*,er.role_name, d.department_name
                                FROM employees AS e
                                JOIN employeeroles AS er ON er.role_id=e.role_id
                                JOIN departments AS d ON d.department_id=e.department_id;");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
        return false;
    }
}

function delete_nhanvien($employee_id){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("DELETE FROM employees WHERE employee_id = :employee_id;");
        $query = $stmt->execute(
            [
                ':employee_id'=> $employee_id
            ]
        );
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
    }
    return isset($query) ? $query : false;
} 


function edit_nhanvien($employee_id, $first_name, $last_name, $role_id, $department_id) {
    global $conn;
    
    connect();
    try {
        $stmt = $conn->prepare("UPDATE employees SET first_name = :first_name, last_name = :last_name, role_id = :role_id, department_id = :department_id WHERE employee_id = :employee_id;");
        $query = $stmt->execute([
            ':employee_id' => $employee_id,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':role_id' => $role_id,
            ':department_id' => $department_id
        ]);
        
        if ($query) {
            echo "Cập nhật thành công!";
        } else {
            echo "Cập nhật thất bại.";
        }
    } catch (PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
}


function get_nhanvien_by_id($id) {
    global $conn;
    connect();
    try {
        $stmt = $conn->prepare("SELECT employee_id, first_name, last_name, role_id, department_id
                                    FROM employees
                                    WHERE employee_id=:employee_id;");
        $stmt->bindParam(':employee_id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Failed: " . $e->getMessage();
        return [];
    }
}

?>