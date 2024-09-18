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
        $dbname="if0_37064313_b6_mydb";

        try {
            $conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conn->exec("TRUNCATE myguests");
            $sql="INSERT IGNORE INTO myguests(firstname,lastname,email)
                VALUES ('John','Doe','john@example.com'),
                ('Jane','Smith','jane@example.com'),
                ('James','Johnson','james@example.com'),
                ('Emily','Brown','emily@example.com'),
                ('Michael','Davis','michael@example.com');
            ";
            $conn->exec($sql);
            echo "Thêm Thành Công!";
        }catch(PDOException $e){
            echo $sql . "<br>". $e->getMessage();
        }
        $conn=null;
    ?>
    <a href="HienThiBang_CSDL(PDO).php">Hiển Thị Dữ Liệu</a>
</body>
</html>