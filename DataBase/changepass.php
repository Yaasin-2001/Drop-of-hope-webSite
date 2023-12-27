<?php

require_once 'DB_Functions.php';
$db = new DB_Functions();
if (isset($_POST['Confirmpassword']) && isset($_POST['password'])) {
    // receiving the post params
  
    $Confirmpassword = $_POST['Confirmpassword'];
    $password = $_POST['password'];
  
    if($password == $Confirmpassword)
    {
    // check if user is already existed with the same email
    $db->ChangePassword($_COOKIE['donor_id'],MD5($password));
    header("Location:../index.php" );
    }else
    {
        header("Location:../Pages/changePassword.php?error=password and confirm password not same,try agin" );
    }
    
}
else
    header("Location:../Pages/changePassword.php?error=Fill required field before");
?>