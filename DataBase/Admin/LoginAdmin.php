<?php
   require_once '../DB_Functions.php';
   $db = new DB_Functions();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // check if user is already existed with the same email
    if ($userid = $db->loginAdmin($username,$password)) {
       setcookie("is_login", true, time() + (86400 * 30), "/");
       setcookie("admin_id", $userid['admin_id'], time() + (86400 * 30), "/");
       setcookie("is_admin", true, time() + (86400 * 30), "/");
       header("Location:../../index.php");
    } else {
        header("Location:../../AdminPages/loginAdmin.php?error=Username or password error");
    } 
}
else
    header("Location:../../AdminPages/loginAdmin.php?error=Fill required field before");
?>