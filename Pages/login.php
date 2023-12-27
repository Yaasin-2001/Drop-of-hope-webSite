<?php include 'header.php'; ?>

<script>
    document.getElementById("lilogin").className = "active";
</script>
<?php
if (isset($_GET['error'])) {
    echo "<script type='text/javascript'>alert('" . $_GET['error'] . "');</script>";
}
?>
<br/><center>
    <div id='reddiv' style="width: 50%;  left: 25%;">
        <form action="../DataBase/login.php" method='get'>
            <h3 id='red'> Giriş Yap </h3>

            <label >Kullanıcı Adı: <font id='red'>*</font></label>
            <input type="text" name='username' placeholder="Kullanıcı adınızı girin.">

            <label >Şifre: <font id='red'>*</font></label>
            <input type="password" name='password' placeholder="Şifrenizi girin.">

            <input type="submit" name="submit" value="Giriş Yap">
            <br/>
            <h3 style='color:black;'> Veya </h3>

            <a id="red" href="become_donor.php">Yeni Bağışta bulun</a>
        </form>
    </div></center>
`
</div>
<?php include '../footer.php'; ?>
