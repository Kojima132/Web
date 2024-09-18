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
            
            class TableRows extends RecursiveIteratorIterator {
                function __construct($it) {
                    parent::__construct($it, self::LEAVES_ONLY);
                }

                function current(): string {  
                    return "<td>" . parent::current() . "</td>";
                }


                function beginChildren(): void {
                    echo "<tr>";
                }

                function endChildren(): void {
                    echo "</tr>" . "\n";
                }
            }

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT id, firstname, lastname, reg_date FROM myguests");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                    echo $v;
                }
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
            ?>
    </table>

    <a href="Sua_CSDL(PDO).php">Sửa Dữ Liệu</a>
</body>
</html>