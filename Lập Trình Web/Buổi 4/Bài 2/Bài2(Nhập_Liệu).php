<?php

$firstname = $lastname = $email = $invoiceid =$additionalinformation= "";
$errors = [];
$selected_options = []; 
$uploadSuccess = false;
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif','image/jpg'];
$maxFileSize = 1 * 1024 * 1024; 


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

    if (empty($_POST['option'])) {
        $errors['option'] = "You must select at least one option below!";
    } else {
        $selected_options = $_POST['option'];
    }

    if (isset($_FILES['fileuploads']) && $_FILES['fileuploads']['error'] == 0) {
        $fileTmpPath = $_FILES['fileuploads']['tmp_name'];
        $fileName = $_FILES['fileuploads']['name'];
        $fileSize = $_FILES['fileuploads']['size'];
        $fileType = $_FILES['fileuploads']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        if (!in_array($fileType, $allowedTypes)) {
            $errors['fileuploads'] = "File type is not allowed. Please upload a JPG, PNG, or GIF file.";
        }
    
        if ($fileSize > $maxFileSize) {
            $errors['fileuploads'] = "File size exceeds the maximum limit of 1MB.";
        }
    
        $uploadFileDir = 'uploads/';
        $dest_path = $uploadFileDir . $fileName;
    
        if (file_exists($dest_path)) {
            $errors['fileuploads'] = "Sorry, file already exists.";
        }

        if (empty($errors['fileuploads'])) {
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $uploadSuccess = true;
            } else {
                $errors['fileuploads'] = "There was an error moving the uploaded file.";
            }
        }
    } else {
        $errors['fileuploads'] = "Please upload your payment receipt.";
    }


    if(empty($_POST['additionalinfomation'])){
        $errors['additionalinfomation'] = "Please provide your additional information!";
    }else{
        $additionalinformation = htmlspecialchars($_POST['additionalinfomation']);
    }

    if (empty($errors)) {
        setcookie('firstname', $firstname, time() + 3600);
        setcookie('lastname', $lastname, time() + 3600);
        setcookie('email', $email, time() + 3600);
        setcookie('invoiceid', $invoiceid, time() + 3600);
        setcookie('selected_options', json_encode($selected_options), time() + 3600);
        setcookie('fileuploads', $fileName, time() + 3600);
        setcookie('additionalinfomation', $additionalinformation, time() + 3600);
        

        header("Location: Bài2(Kết_Quả).php");
        exit();
    }
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleForBài1(Nhập_Liệu).css">
    <script type="text/javascript" src="JSForBài2(Nhập_Liệu).js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Bài 2 (Nhập_Liệu)</title>
</head>
<body>
    <h1>Payment Receipt Upload Form</h1>
    <hr>
    <form name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <div id="divparent">
            <div>
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
            <div>
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
            <div>
                <label id="id2">Please upload your payment receipt</label><br>
                <div id="custom-upload">
                    <div id="i">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                    </div>
                    <input type="file" name="fileuploads" id="fileupload"/>
                    <div id="div4">
                        <p id="p_input_area">Browse Files</p>
                        <p id="p_input_area_2">Drag And Drop Here</p>
                        <p id="file-info"></p>
                    </div> 
                </div>
                <div class="div2">
                    <label id="id">jpg,jpeg,png,gif (1mb max)</label>
                </div>
            </div>
            <div>
                <label id="id2">Additional Information</label><br>
                <input type="text" name="additionalinfomation" size="45" id="additionalinfomation" placeholder="<?php echo $errors['additionalinfomation'] ?? ''; ?>" value="<?php echo $additionalinformation; ?>" class="<?php echo isset($errors['additionalinfomation']) ? 'error' : ''; ?>">
            </div>
            <div>
                <input type="submit" value="SUBMIT" name="submit" id="submit">
            </div>
        </div>
    </form>
</body>
</html>
