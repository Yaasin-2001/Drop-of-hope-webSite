<?php

require_once 'DB_Functions.php';
$db = new DB_Functions();


if (isset($_GET['username']) && isset($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    // check if user is already existed with the same email
    if ($userid = $db->loginAdmin($username,$password)) {
        setcookie("is_login", true, time() + (86400 * 30), "/");
        setcookie("admin_id", $userid['admin_id'], time() + (86400 * 30), "/");
        setcookie("is_admin", true, time() + (86400 * 30), "/");
        header("Location:../index.php");
     }
      else  if ($userid = $db->login($username, $password )) {
            setcookie("is_login", true, time() + (86400 * 30), "/");
            setcookie("donor_id", $userid['donor_id'], time() + (86400 * 30), "/");
            header("Location:../index.php");
        } else {
            header("Location:../index.php?error=Username or password error");
        }
}
else
    header("Location:../Pages/login.php?error=Fill required field before");
?>