<?php
require_once '../libs/DB.php';
function getidrolebynamerole($role_name) {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT role_id FROM roles WHERE roles_name = :roles_name");
        $stmt->bindParam(':roles_name', $role_name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['role_id'] ?? null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function get_all_roles() {
    global $conn;
    connect();
    try {
        $stmt = $conn->prepare("SELECT * FROM roles");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Failed: " . $e->getMessage();
        return [];
    }
}
?>