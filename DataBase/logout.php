<?php

setcookie("is_login", false, time() + (86400 * 30), "/");
setcookie("is_admin", false, time() + (86400 * 30), "/");
setcookie("blood_id", -1, time() + (86400 * 30), "/");
setcookie("admin_id", -1, time() + (86400 * 30), "/");
header("Location:../index.php");
?>

