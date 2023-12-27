<?php
include 'header.php';
require_once '../DataBase/DB_Functions.php';
$db = new DB_Functions();
$donor = $db->GetDonor($_COOKIE['donor_id']);
$type = array('O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+');
$typelength = count($type);
?>

<script>
    document.getElementById("limyprofile").className = "active";
</script>

<?php
if (isset($_GET['error'])) {
    echo "<script type='text/javascript'>alert('" . $_GET['error'] . "');</script>";
}
?>
<center>
    <form action="../DataBase/UpdateProfile.php" method="post" enctype="multipart/form-data">
        <div id='reddiv' style="width: 50%">

            <h1 id='red' >Bİlgİlerİm <h1>
                    <h3 id='red' >Ad Soyad: </h3> <p id='profile'><?php echo $donor['full_name'] ?></p>

                    <h3 id='red' >Kullanıcı adı: </h3> <p id='profile'><?php echo $donor['user_name'] ?></p>

                    <h3 id='red' >Yaş: </h3> <p id='profile'><?php echo $donor['age'] ?></p>
                    <h3 id='red' >Şifre: </h3> <p id='profile'><a id='red' href='changePassword.php'>Şifremi Değiştir</a></p>

                    <?php if ($donor['healthy_file'] != "") { ?>
                        <h3 id='red' >Sağlık Bilgiler Dosyası: </h3> <p id='profile'><a href='../image/uploads/<?php echo $donor['healthy_file'] ?>'>Resmi gör</a></p>
                    <?php } ?>
                    <h3 id='red' >Kan Grubu: </h3> <p id='profile'><?php echo $donor['blood_type'] ?></p>

                    <h3 id='red' >Adres: </h3> <p id='profile'> <input type="text" name="address" placeholder="Enter address" value='<?php echo $donor['address'] ?>'> </p>

                    <h3 id='red' >Telefon Numarası:</h3> <p id='profile'><input type="number"  name="Phone_number" placeholder="Enter phone number" value='<?php echo $donor['phone_number'] ?>'></p>

                    <h3 id='red' > Durum </h3> <p id='profile'>
                        <select name='status'>

                            <?php
                            if ($donor['Statuse']) {
                                echo '<option value="1" selected>Gecerli</option>';
                                echo '<option value="0" >Gecersiz</option>';
                            } else {
                                echo '<option value="1" >Gecerli</option>';
                                echo '<option value="0" selected>Gecersiz</option>';
                            }
                            ?>
                        </select>
                    </p>

                    <input type="submit" name="submit" value="Update">
                    </div>
                    </form>
                    </center>



                    <?php include '../footer.php'; ?>