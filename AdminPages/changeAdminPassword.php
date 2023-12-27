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
    <form action="../DataBase/changeAdminPass.php" method='post'>
  	<h3 id='red'> Şifremi değiştir </h3>

	<label >Şifre: <font id='red'>*</font></label>
    <input type="password" name='Confirmpassword' placeholder="Yeni Şifre girin.">
    
    	<label >Şifre Onayla: <font id='red'>*</font></label>
    <input type="password" name='password' placeholder="Onaylı yeni şifre girin.">

    <input type="submit" name="submit" value="Şifremi Değiştir">
  </form>
</div></center>
`
</div>
<?php include '../footer.php'; ?>
