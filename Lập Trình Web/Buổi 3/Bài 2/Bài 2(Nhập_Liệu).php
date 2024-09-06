<?php

$firstname = $lastname = $email = $invoiceid = "";
$errors = [];
$selected_options = []; // Khởi tạo biến để lưu giá trị checkbox đã chọn

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['firstname'])) {
        $errors['firstname'] = "Please provide your first name!";
    } else {
        $firstname = htmlspecialchars($_POST['firstname']);
    }

    if (empty($_POST['lastname'])) {
        $errors['lastname'] = "Please provide your last name!";
    } else {
        $lastname = htmlspecialchars($_POST['lastname']);
    }
    

    if (empty($_POST["email"])) {
        $errors['email'] = "Please provide your email!";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid Email!";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }


    if (empty($_POST["invoiceid"])) {
        $errors['invoiceid'] = "Please provide your invoice ID!";
    } elseif (!is_numeric($_POST["invoiceid"]) || intval($_POST["invoiceid"]) < 0) {
        $errors['invoiceid'] = "Invalid Invoice ID!";
    } else {
        $invoiceid = htmlspecialchars($_POST["invoiceid"]);
    }

    // Xử lý các lựa chọn checkbox
    if (empty($_POST['option'])) {
        $errors['option'] = "You must select at least one option below!";
    } else {
        $selected_options = $_POST['option']; // Lưu trữ giá trị checkbox đã chọn vào biến
    }

    if (empty($errors)) {
        session_start();
        $_SESSION['data'] = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'invoiceid' => $invoiceid,
            'selected_options' => $selected_options // Lưu giá trị checkbox đã chọn vào session
        ];
        header("Location: Bài 2(Kết_Quả).php");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleForBài2(Nhập_Liệu).css">
    <title>Bài 2 (Nhập_Liệu)</title>
</head>
<body>
    <h1>Payment Receipt Upload Form</h1>
    <hr>
    <form name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            <div class="div1">
                <div> 
                    <label>Name</label><br>
                    <input type="text" name="firstname" size="45" id="firstname" placeholder="<?php echo $errors['firstname'] ?? ''; ?>" value="<?php echo $firstname; ?>" class="<?php echo isset($errors['firstname']) ? 'error' : ''; ?>">
                    <input type="text" name="lastname" size="45" id="lastname" placeholder="<?php echo $errors['lastname'] ?? ''; ?>" value="<?php echo $lastname; ?>" class="<?php echo isset($errors['lastname']) ? 'error' : ''; ?>">
                </div> 
                <div class="div2">
                    <label id="id">First Name</label>
                    <label id="id">Last Name</label>
                </div>
            </div>
            <div class="div1">
                <div> 
                    <label id="id1">Email</label>  
                    <label id="id2">Invoice ID</label><br>
                    <input type="text" name="email" size="45" id="email" placeholder="<?php echo $errors['email'] ?? ''; ?>" value="<?php echo $email; ?>" class="<?php echo isset($errors['email']) ? 'error' : ''; ?>">
                    <input type="text" name="invoiceid" size="45" id="invoiceid" placeholder="<?php echo $errors['invoiceid'] ?? ''; ?>" value="<?php echo $invoiceid; ?>" class="<?php echo isset($errors['invoiceid']) ? 'error' : ''; ?>">
                </div> 
                <div class="div2">
                    <label id="id">example@example.com</label>
                </div>
            </div>
            <div class="div1">
                <div> 
                    <label id="id2">Pay For</label>  
                    <?php if (isset($errors['option'])) { echo "<label style='color:red; font-size:10pt;'>{$errors['option']}</label>"; } ?>
                </div> 
                <div class="div2">
                    <div class="div3">
                        <input type="checkbox" name="option[]" id="15k" value="15k Category">
                        <label id="id2">15k Category</label><br>
                        <input type="checkbox" name="option[]" id="55k" value="55k Category">
                        <label id="id2">55k Category</label><br>
                        <input type="checkbox" name="option[]" id="116k" value="116k Category">
                        <label id="id2">116k Category</label><br>
                        <input type="checkbox" name="option[]" id="tw" value="Shuttle Two Ways">
                        <label id="id2">Shuttle Two Ways</label><br>
                        <input type="checkbox" name="option[]" id="cp" value="Compressport T-Shirt Merchandise">
                        <label id="id2">Compressport T-Shirt Merchandise</label><br>
                        <input type="checkbox" name="option[]" id="ot" value="Other">
                        <label id="id2">Other</label><br>
                    </div>
                    <div>
                        <input type="checkbox" name="option[]" id="35k" value="35k Category">
                        <label id="id2">35k Category</label><br>
                        <input type="checkbox" name="option[]" id="75k" value="75k Category">
                        <label id="id2">75k Category</label><br>
                        <input type="checkbox" name="option[]" id="ow" value="Shuttle One Way">
                        <label id="id2">Shuttle One Way</label><br>
                        <input type="checkbox" name="option[]" id="tc" value="Training Cap Merchandise">
                        <label id="id2">Training Cap Merchandise</label><br>
                        <input type="checkbox" name="option[]" id="bm" value="Buf Merchandise">
                        <label id="id2">Buf Merchandise</label><br>
                    </div>
                </div>
            </div>
            <div class="div1">
                <input type="submit" value="SUBMIT" name="submit" id="submit">
            </div>
        </div>
    </form>
</body>
</html>
