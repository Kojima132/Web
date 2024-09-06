<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleForBài1(Kết_Quả).css">
    <title>Bài 2 (Kết Quả)</title>
</head>
<body>
    <div class="div1">
        <div class="div2">
                <?php
   
        if (isset($_COOKIE['firstname']) && isset($_COOKIE['lastname']) && isset($_COOKIE['email']) && isset($_COOKIE['invoiceid'])) {
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $email = $_COOKIE['email'];
            $invoiceid = $_COOKIE['invoiceid'];
            $fileuploads = $_COOKIE['fileuploads'];
            $additionalinformation = $_COOKIE['additionalinfomation'];
            $selected_options = isset($_COOKIE['selected_options']) ? json_decode($_COOKIE['selected_options'], true) : [];

            echo "<h1>Thông Tin Đã Nhập</h1>";
            echo "<p>First Name: $firstname</p>";
            echo "<p>Last Name: $lastname</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Invoice ID: $invoiceid</p>";
            echo "<h2>Your Options:</h2>";
            if (!empty($selected_options)) {
                echo "<ul>";
                foreach ($selected_options as $option) {
                    echo "<li>" . htmlspecialchars($option) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No Options Selected.</p>";
            }

            if (!empty($fileuploads)) {
                $filePath = "uploads/" . htmlspecialchars($fileuploads);
                echo "<p>Your Image:</p>";
                echo "<img src='$filePath' alt='Uploaded Image'>";
            } else {
                echo "<p>No File Uploaded.</p>";
            }
            echo "<p id=\"id\">Additional Information: $additionalinformation</p>";
        } else {
            echo "No Data Found.";
        }
        ?>
        </div>
    </div>
</body>
</html>