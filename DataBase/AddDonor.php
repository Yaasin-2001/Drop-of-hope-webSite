<?php

require_once 'DB_Functions.php';
$db = new DB_Functions();
if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['blood_type']) && isset($_POST['Phone_number'])) {
    // receiving the post params
    $is_upload = 1;
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $blood_type = $_POST['blood_type'];
    $Phone_number = $_POST['Phone_number'];
    if (!empty($_POST['age']))
        $age = $_POST['age'];
    else
        $age = "0";
    if (!empty($_POST['address']))
        $address = $_POST['address'];
    else
        $address = "";
    if ($_FILES["fileToUpload"]["size"]!=0)
        $is_upload = 1;
    else
        $is_upload = 0;

    // check if user is already existed with the same email
    if ($db->isUserExisted($username)) {
        $error = "User name already exist";
        header("Location:../index.php?error=" . $error);
    } else {
        if ($is_upload) {
            $target_dir = "../image/uploads/";
            $target_file = $target_dir . $username . basename($_FILES["fileToUpload"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $errorImage = "";
            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $errorImage = "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                $errorImage = "Sorry, file name already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $errorImage = "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $errorImage = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
                // if everything is ok, try to upload file
            else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $uploadOk == 0;
                } else {
                    $errorImage = "Sorry, there was an error uploading your file.";
                }
            }


            if ($uploadOk) {
                    $userid = $db->AddDonor($fullname, $username, $password, $blood_type, $Phone_number, $age, $address,$username.basename($_FILES["fileToUpload"]["name"]));
                setcookie("is_login", true, time() + (86400 * 30), "/");
                setcookie("blood_id", $userid, time() + (86400 * 30), "/");
                header("Location:../index.php");
            } else
                header("Location:../index.php?error=" . $errorImage);
        }
        else {
            $userid = $db->AddDonor($fullname, $username, MD5($password), $blood_type, $Phone_number, $age, $address, "");
            setcookie("is_login", true, time() + (86400 * 30), "/");
            setcookie("donor_id", $userid['donor_id'], time() + (86400 * 30), "/");
            header("Location:../index.php");
        }
    }
}
else{
    header("Location:../index.php?error=Fill required field before");
}
?>