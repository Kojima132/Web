<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleForHienThiBang.css">
    <title>Document</title>
</head>
<body>
    <h1>Danh Sách Nhân Viên</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Reg_Date</th>
        </tr>
    <?php
            $servername="sql304.infinityfree.com";
            $username="if0_37064313";
            $password="kkH8akSfP8b";
            $dbname="if0_37064313_b6_mydb";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, firstname, lastname , reg_date FROM myguests";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo"<tr>";
            echo "<td>" . $row["id"]. "</td>"; 
            echo "<td>" . $row["firstname"]. "</td>"; 
            echo "<td>" . $row["lastname"]. "</td>";
            echo "<td>" . $row["reg_date"]. "</td>";
            echo"</tr>";
        }
        } else {
        echo "0 results";
        }
        $conn->close();
    ?>
    </table>
    <a href="Sua_CSDL(MySQLi).php">Sửa Dữ Liệu</a>
</body>
</html>