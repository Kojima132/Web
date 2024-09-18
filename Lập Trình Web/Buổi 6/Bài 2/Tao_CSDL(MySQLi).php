<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <?php
      $servername="sql304.infinityfree.com";
      $username="if0_37064313";
      $password="kkH8akSfP8b";


    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DROP DATABASE IF EXISTS if0_37064313_b6_mydb";
    if ($conn->query($sql) === TRUE) {
        echo "Database Dropped successfully<br>";
      } else {
        echo "Error creating database: " . $conn->error;
      }


    $sql = "CREATE DATABASE IF NOT EXISTS if0_37064313_b6_mydb
                CHARSET \"utf8mb4\"
                COLLATE \"utf8mb4_general_ci\";";
    if ($conn->query($sql) === TRUE) {
      echo "Database created successfully<br>";
    } else {
      echo "Error creating database: " . $conn->error;
    }

    $sql = "USE if0_37064313_b6_mydb";
    $conn->query($sql);
    $sql = "CREATE TABLE IF NOT EXISTS myguests(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(50) NOT NULL,
        lastname VARCHAR(50) NOT NULL,
        email VARCHAR(100) UNIQUE,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );";

    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully<br>";
      } else {
        echo "Error creating database: " . $conn->error;
    }


    $conn->close();
    ?>
    <a href="Chen_CSLD(MySQLi).php">Chèn Dữ Liệu</a>
</body>
</html>