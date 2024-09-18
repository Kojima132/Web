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

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          
          $sql = "INSERT IGNORE INTO myguests(firstname,lastname,email)
                      VALUES ('John','Doe','john@example.com'),
                      ('Jane','Smith','jane@example.com'),
                      ('James','Johnson','james@example.com'),
                      ('Emily','Brown','emily@example.com'),
                      ('Michael','Davis','michael@example.com');";
          
          if ($conn->query($sql) === TRUE) {
            echo "New records created successfully<br>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        $conn->close();
      ?>
      <a href="HienThiBang_CSDL(MySQLi).php">Hiển Thị Bảng</a>
</body>
</html>