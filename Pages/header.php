<!DOCTYPE html>
<head>

    <meta charset="UTF-8">
    <title>Bank Blood</title>
    <link rel="icon" href="../image/logo1.png" type="image/icon type">
    <link href="../css/Style.css" rel="stylesheet">
    <script type="text/javascript" src="../js/javascript.js"></script>

</head>
<body >

    <ul>
        <li ><a id='lihome'  href="../index.php">Anasayfa</a></li>
       
        <?php if (isset($_COOKIE['is_admin']) && $_COOKIE['is_admin'] == true) { ?>
            <li><a id='lidonor' href="../AdminPages/DeleteDonor.php">Bağışçı Sil</a></li>
        <?php } else { ?>
            <li><a id='liblood' href="blood_type.php">Kan Grupları</a></li>
            <li><a id='lidonor' href="donors.php">Bağışçı Listesi</a></li>
            <li><a id='lisearch' href="search.php">Bağışçı Ara</a></li>
        <?php } ?>
        <?php if (isset($_COOKIE['is_admin']) && $_COOKIE['is_admin'] == true) { ?>
                <li><a id='libecome' href="become_donor.php">Bağışçı Ekle</a></li>
        <?php }?>
        <?php  if (isset($_COOKIE['is_login']) && $_COOKIE['is_login'] == true) { ?>
         <?php if (isset($_COOKIE['is_admin']) && $_COOKIE['is_admin'] == true) { ?>
                <li><a id='lichange' href="../AdminPages/changeAdminPassword.php">Şifremi Değiştir</a></li>
            <?php } else { ?>
                <li><a id='limyprofile' href="myprofile.php">Profilim</a></li>
            <?php } ?>
            <li><a id='lilogout' href="../DataBase/logout.php">Çıkış Yap</a></li>
        <?php } else { ?>
            <li><a id='libecome' href="become_donor.php">Bağış Yap</a></li>
            <li><a id='lilogin' href="login.php">Giriş Yap</a></li>
        <?php } ?>
        <center><img id="logo" src="../image/logo3.png"></center>
    </ul>

    <div id='back'>
