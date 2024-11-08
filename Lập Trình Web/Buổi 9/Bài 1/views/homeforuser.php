<?php
session_start();
if(isset($_SESSION['user_name']) && isset($_SESSION['roles_name'])  && $_SESSION['roles_name']=='Employee'){
    $user_name=htmlspecialchars($_SESSION['user_name']);
    $text="Xin chào " .$user_name . " <a href='../controllers/logout.php'>Log Out</a>";
}else{
    header("Location:../views/login.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo $text;
    ?>
</body>
</html>