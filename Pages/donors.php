<?php
include 'header.php';
require_once '../DataBase/DB_Functions.php';
$db = new DB_Functions();
$NewDonors = $db->showAvalibleDonor();
?>

<script>
    document.getElementById("lidonor").className = "active";
</script>
<div id='reddiv'>

    <table id='table' width="100%" >
        <tbody>
            <tr>
                <th> Ad Soyad </th>
                <th> Kan Gurbu </th>
                <th> Tel Numarası </th>
                <th> Adres </th>
                <th> Yaş </th>
                <th> Sağlık Detayları </th>
            </tr>
            <?php
            foreach ($NewDonors as $row) {
                echo "<tr>";
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
