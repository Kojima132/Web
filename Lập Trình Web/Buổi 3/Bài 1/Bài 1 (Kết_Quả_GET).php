<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="StyleForBài1(Kết_Quả).css">
        <title>Bài 1 (Kết Quả GET)</title>
    </head>
    <body>
        <div class="parentdiv">
            <div class="minidiv">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $booktitle = test_input($_GET['booktitle']);
                $author= test_input($_GET['authorname']);
                $publisher= test_input($_GET['publisher']);
                $year=test_input($_GET['year']);
                // $email = test_input($_GET['email']);


                if (empty($booktitle)) {
                    echo "<p>Book title cannot be blank! </p>";
                } else {
                    echo "<p>Book Title: " . htmlspecialchars($booktitle) . "</p>";
                }

                if (empty($author)) {
                    echo "<p>Author name cannot be blank! </p>";
                } else {
                    echo "<p>Author Name: " . htmlspecialchars($author) . "</p>";
                }

                if (empty($publisher)) {
                    echo "<p>Publisher name cannot be blank! </p>";
                } else {
                    echo "<p>Publisher Name: " . htmlspecialchars($publisher) . "</p>";
                }

                if (empty($year)) {
                    echo "<p>Year of publication cannot be blank! </p>";
                }else if(!is_numeric($year) || intval($year) <= 0){
                    echo "<p>Year of publication must be a positive number! </p>";
                } else {
                    echo "<p>Year Of Publication: " . htmlspecialchars($year) . "</p>";
                }

                // if (empty($email)) {
                //     echo "Email không được để trống.";
                // } else {
                //     echo "Email: " . htmlspecialchars($email) . "<br>";
                // }
            }

            function test_input($a){
                $a=trim($a);
                $a=stripslashes($a);
                $a=htmlspecialchars($a);
                return $a;
            }
            ?>
            </div>
        </div>
    </body>
</html>