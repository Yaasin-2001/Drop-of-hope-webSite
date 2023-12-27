<?php

require_once '../DB_Functions.php';
$db = new DB_Functions();
if (isset($_POST['Confirmpassword']) && isset($_POST['password'])) {
    // receiving the post params
  
    $Confirmpassword = $_POST['Confirmpassword'];
    $password = $_POST['password'];
  
    if($password == $Confirmpassword)
    {
    // check if user is already existed with the same email
    $db->ChangeAdminPassword($_COOKIE['admin_id'],  $password);
    header("Location:../../index.php" );
    }else
    {
        header("Location:../../AdminPages/changeAdminPassword.php?error=password and confirm password not same,try agin" );
    }
    
}
else
    {
        header("Location:../../AdminPages/changeAdminPassword.php?error=Fill Field befor" );
    }
?>