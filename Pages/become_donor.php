<?php
$type = array('O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+');
$typelength = count($type);
?>
<?php include 'header.php'; ?>

<script>
    document.getElementById("libecome").className = "active";
</script>
<?php
if (isset($_GET['error'])) {
    echo "<script type='text/javascript'>alert('" . $_GET['error'] . "');</script>";
}
?>
<br/><center>
    <div id='reddiv' style="width: 50%;  left: 25%;">
        <form action="../DataBase/AddDonor.php" method="post" enctype="multipart/form-data">
            <h3 id='red'> Bağışçı bilgileri </h3>

            <label >Ad Soyad: <font id='red'>*</font></label>
            <input type="text" name="fullname" placeholder="Adınızı ve Soyadınızı girin.">

            <label >Kullanıcı adı: <font id='red'>*</font></label>
            <input type="text" name="username" placeholder="Kullanıcı adınızı girin.">

            <label >Şifre: <font id='red'>*</font></label>
            <input type="password"  name="password" placeholder="Şifrenizi girin.">

            <label > Kan Gurubu: <font id='red'>*</font></label> 
            <select name="blood_type">
                <?php
                for ($x = 0; $x < $typelength; $x++) {
                    echo " <option value='" . $type[$x] . "'>" . $type[$x] . "</option>";
                }
                ?>
            </select>

            <label>Telefon Numarası: <font id='red'>*</font></label>
            <input type="number" name="Phone_number" pattern="/^(0090|90|\+90|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/" placeholder="Telefon numaranızı girin.">

            <label >Adres:</label>
            <input type="text" name="address" placeholder="Adresinizi girin.">

            <label >Yaş:</label>
            <input type="number" name="age" placeholder="Yaşınızı girin.">

            <label> Dosya sağlıklı bilgilerinizi yükleyin </label>
            <input type="file" name="fileToUpload" id="fileToUpload">

            <input type="submit" name="submit" value="Gönder">
        </form>
    </div></center>

</div>
<?php include '../footer.php'; ?>
