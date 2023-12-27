<?php include 'header.php'; ?>
<?php
$type = array('O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+');
$typelength = count($type);
require_once '../DataBase/DB_Functions.php';
$db = new DB_Functions();
$FindDonors = array();

if (isset($_POST['submit'])) {
    if (isset($_POST['blood_type'])) {
        $blood_type = $_POST['blood_type'];
        if (isset($_POST['location']))
            $location = $_POST['location'];
        else
            $location = "";
        $FindDonors = $db->FindDonor($blood_type, $location);
    }
}
?>

<script>
    document.getElementById("lisearch").className = "active";
</script>

<br/><center>
    <div id='reddiv' style="width: 50%;  left: 25%;">
        <form action="search.php" method='post'>
            <h3 id='red'> Bağışçı Ara </h3>

            <label > Kan Gurubu: <font id='red'>*</font></label> 
            <select name='blood_type'>
                <?php
                for ($x = 0; $x < $typelength; $x++) {
                    echo " <option value='" . $type[$x] . "'>" . $type[$x] . "</option>";
                }
                ?>
            </select>


            <label >Adres:</label>
            <input type="text"  placeholder="Konum Girin.">

            <input type="submit" name="submit" value="Ara">
        </form>
    </div></center>
<br/>
<br/>
<table id='table' width="100%" >
    <tbody>
        <tr>
            <th> Ad Soyad </th>
            <th> Kan Gurubu </th>
            <th> Telefon Numarası </th>
            <th> Adres </th>
            <th> Yaş </th>
            <th> Sağlık Bilgiler </th>
        </tr>
        <?php
        foreach ($FindDonors as $row) {
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
<?php include '../footer.php'; ?>
