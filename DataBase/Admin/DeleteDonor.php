<?php

require_once '../DB_Functions.php';
$db = new DB_Functions();
$donor_id = $_GET['donor_id'];
$db->DeleteDonor($donor_id);
header("Location:../../AdminPages/DeleteDonor.php?final=Delete successfully");
?>