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
        try{
            $conn= new PDO("mysql:host=$servername",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conn->exec("DROP DATABASE IF EXISTS if0_37064313_b6_mydb");
            echo "Database Dropped Successfully <br>";
            $sql= "CREATE DATABASE IF NOT EXISTS if0_37064313_b6_mydb
                    CHARSET \"utf8mb4\"
                    COLLATE \"utf8mb4_general_ci\";";

            $conn->exec($sql);
            echo "Database Created Successfully <br>";
            $conn->exec(("USE if0_37064313_b6_mydb"));
            $sql = "CREATE TABLE IF NOT EXISTS myguests(
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(50) NOT NULL,
                lastname VARCHAR(50) NOT NULL,
                email VARCHAR(100) UNIQUE,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            );";
            $conn->exec($sql);
            echo "Table myguests created successfully <br>";
        }catch(PDOException $e){
            echo $sql . "<br>". $e->getMessage();
        }

        $conn=null;
    ?>
    <a href="Chen_CSDL(PDO).php">Chèn Dữ Liệu</a>
</body>
</html>