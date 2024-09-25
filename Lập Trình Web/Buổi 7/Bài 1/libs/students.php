<?php 
global $conn;

function connect(){
    global $conn;
    try{
        $conn = new PDO("mysql:host=sql304.infinityfree.com;dbname=if0_37064313_quan_ly_sinh_vien", "if0_37064313", "kkH8akSfP8b");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection Failed: ". $e->getMessage();
    }
}

function disconnect(){
    global $conn;
    $conn = null;
}

function view(){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("SELECT * FROM sinhvien;");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
        return false;
    }
}

function getstudent($student_id){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("SELECT * FROM sinhvien WHERE id=:id;");
        $stmt->execute([':id' => $student_id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data; 
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
        return false;
    }
}



function add($student_name, $student_sex, $student_birthday){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("INSERT INTO sinhvien(hoten, gioitinh, ngaysinh) VALUES (:hoten, :gioitinh, :ngaysinh);");

        $query = $stmt->execute(
            [
                ':hoten' => $student_name,
                ':gioitinh' => $student_sex,
                ':ngaysinh' => $student_birthday
            ]
        );
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
    }
    return isset($query) ? $query : false;
}

function edit($student_id, $student_name, $student_sex, $student_birthday){
    global $conn;
    connect();
    try{
    $stmt = $conn->prepare("UPDATE sinhvien SET hoten = :hoten, gioitinh = :gioitinh, ngaysinh = :ngaysinh WHERE id = :id;");
    
    $query = $stmt->execute(
        [
            ':id'=> $student_id,
            ':hoten' => $student_name,
            ':gioitinh' => $student_sex,
            ':ngaysinh' => $student_birthday
        ]
    );
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
    }
    return isset($query) ? $query : false;
    }

function delete($student_id){
    global $conn;
    connect();
    try{
        $stmt = $conn->prepare("DELETE FROM sinhvien WHERE id = :id;");
        $query = $stmt->execute(
            [
                ':id'=> $student_id
            ]
        );
    }catch(PDOException $e){
        echo "Failed:". $e->getMessage();
    }
    return isset($query) ? $query : false;
} 


?>
