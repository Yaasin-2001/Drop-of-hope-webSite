<?php
include 'header.php';
require_once '../DataBase/DB_Functions.php';
$db = new DB_Functions();
$AllDonor = $db->showAllDonor();
?>

<script>
    document.getElementById("lidonor").className = "active";
</script>

<?php
if (isset($_GET['final'])) {
    echo "<script type='text/javascript'>alert('" . $_GET['final'] . "');</script>";
}
?>
<div id='reddiv'>

    <table id='table' width="100%" >
        <tbody>
            <tr>
                <th> Sil </th>
                <th> Ad Soyad </th>
                <th> Kan Gurubu </th>
                <th> Tel numarası </th>
                <th> Adres </th>
                <th> Yaş </th>
                <th> Sağlık Detayları </th>
            </tr>
            <?php
            foreach ($AllDonor as $row) {
                echo "<tr>";
                echo "<td> <button><a id='red' href='../DataBase/Admin/DeleteDonor.php?donor_id=" . $row['donor_id'] . "'> Sil</a></button></td>";
                echo "<td> " . $row['full_name'] . "</td>";
                echo "<td> " . $row['blood_type'] . "</td>";
                echo "<td> " . $row['phone_number'] . "</td>";
                echo "<td> " . $row['address'] . "</td>";
                echo "<td> " . $row['age'] . "</td>";
                if ($row['healthy_file'] != "")
                    echo "<td> <a id='red' href='../image/uploads/" . $row['healthy_file'] . "'>Belge Gör</a></td>";
                else
                    echo "<td>Belge Yok</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>						
<br/>
<br/>
</div>


<?php include '../footer.php'; ?>
