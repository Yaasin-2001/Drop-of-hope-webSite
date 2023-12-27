<?php

require_once 'DB_Functions.php';
$db = new DB_Functions();
if (isset($_POST['Phone_number'])) {
    // receiving the post params

    $Phone_number = $_POST['Phone_number'];
    $status = $_POST['status'];
    if (!empty($_POST['address']))
        $address = $_POST['address'];
    else
        $address = "";
    $pattern = "/^(0090|90|\+90|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/";
    if (preg_match($pattern, $Phone_number)) {
        // check if user is already existed with the same email
        $db->UpdateDonor($_COOKIE['donor_id'], $Phone_number, $address, $status);
        header("Location:../Pages/myprofile.php");
    } else {
        header("Location:../Pages/myprofile.php?error=Error Phone Number");
    }
} else
    header("Location:../Pages/myprofile.php?error=Fill required field before");
?>