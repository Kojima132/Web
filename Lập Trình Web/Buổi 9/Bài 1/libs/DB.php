<?php 
global $conn;

function connect(){
    global $conn;
    try{
        $conn = new PDO("mysql:host=localhost;dbname=ql_nhanvien", "root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection Failed: ". $e->getMessage();
    }
}

function disconnect(){
    global $conn;
    $conn = null;
}
?>