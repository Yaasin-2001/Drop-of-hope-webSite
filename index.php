<!DOCTYPE html>
<head>

    <meta charset="UTF-8">
    <title>Umut Damlası</title>
    <link rel="icon" href="image/logo1.png" type="image/icon type">
    <link href="css/Style.css" rel="stylesheet">
    <script type="text/javascript" src="js/javascript.js"></script>

</head>
<body >

    <ul>
        <li class='active'><a id='lihome'  href="#">Anasayfa</a></li>
       
        <?php if (isset($_COOKIE['is_admin']) && $_COOKIE['is_admin'] == true) { ?>
            <li><a id='lidonor' href="AdminPages/DeleteDonor.php">Bağışçı Sil</a></li>
        <?php } else { ?>
            <li><a id='liblood' href="Pages/blood_type.php">Kan Grupları</a></li>
            <li><a id='lidonor' href="Pages/donors.php">Bağışçı Listesi</a></li>
            <li><a id='lisearch' href="Pages/search.php">Bağışçı Ara</a></li>
        <?php } ?>
        <?php if (isset($_COOKIE['is_admin']) && $_COOKIE['is_admin'] == true) { ?>
                <li><a id='libecome' href="Pages/become_donor.php">Bağışçı Ekle</a></li>
        <?php }?>
        <?php  if (isset($_COOKIE['is_login']) && $_COOKIE['is_login'] == true) { ?>
         <?php if (isset($_COOKIE['is_admin']) && $_COOKIE['is_admin'] == true) { ?>
                <li><a id='lichange' href="AdminPages/changeAdminPassword.php">Şifremi Değiştir</a></li>
            <?php } else { ?>
                <li><a id='limyprofile' href="Pages/myprofile.php">Profilim</a></li>
            <?php } ?>
            <li><a id='lilogout' href="DataBase/logout.php">Çıkış Yap</a></li>
        <?php } else { ?>
            <li><a id='libecome' href="Pages/become_donor.php">Bağış Yap</a></li>
            <li><a id='lilogin' href="Pages/login.php">Giriş Yap</a></li>
        <?php } ?>
        <center><img id="logo" src="image/logo3.png"></center>
    </ul>

    <div id='back'>
        <?php
        if (isset($_GET['error'])) {
            echo "<script type='text/javascript'>alert('" . $_GET['error'] . "');</script>";
        }
        ?>
        <div id = "ban">
            <img id ='slidee' src='image/Slide/s1.jpg' /> 
            <center><button onclick="changeImage()"><img src="image/next_icon.png" style="width: 4%; height: 4%"></button></center>
        </div>

        <br/>
        <center>
            <table>
                <tr>
                    <td>
                        <div id='reddiv' >
                            <h1 id='red' >Neden kan bağışı</h1>
                            <p style='font-size: 20px; padding: 15px;' id= 'p2'>
                                <?php
                                try {
                                    $myfile = fopen("file/neden.txt", "r");
                                    echo fread($myfile, filesize("file/neden.txt"));
                                    fclose($myfile);
                                } catch (Exception $ex) {
                                    echo "";
                                }
                                ?>
                            </p>
                        </div>
                    </td>
                    <td>
                        <br/>
                        <br/>
                    </td>
                    <td>
                        <div id='reddiv'>
                            <h1 id='red' >Kan bağışı</h1>
                            <p style='font-size: 20px; padding: 15px;' id= 'p2'>
                                <?php
                                try {
                                    $myfile = fopen("file/kan.txt", "r");
                                    echo fread($myfile, filesize("file/kan.txt"));
                                    fclose($myfile);
                                } catch (Exception $ex) {
                                    echo "";
                                }
                                ?>
                            </p>
                        </div>
                    </td>
                </tr>
            </table>

            <br/>

        <?php if (isset($_COOKIE['is_admin']) && ($_COOKIE['is_admin'] == true)) {
            
           } else { ?>
            <table >
                <tr><td >
                        <div id='reddiv'>
                            <p><a href="Pages/blood_type.php"> <img id='homeimg' src='image/img4.jpg'/></a><br/> 
                                <a id='red' href='Pages/blood_type.php'><center><h3  >Kan Grupları</h3></center></a>
                            </p>
                        </div>
                    </td>
                    <td >
                        <div id='reddiv'>
                            <p> <a href="Pages/become_donor.php"><img id='homeimg' src='image/img5.jpg'/> </a><br/>
                                <a id='red' href="Pages/become_donor.php" > <center><h3  >Bağış Yap</h3></center></a>
                            </p>
                        </div>
                    </td>
                    <td>
                        <br/>
                        <br/>
                    </td>
                    <td >
                        <div id='reddiv'>
                            <p><a href="Pages/search.php"> <img id='homeimg' src='image/img2.png'/></a><br/> 
                                <a id='red' href="Pages/search.php"> <center><h3 >Bağışçı Ara </h3></center></a>
                            </p>
                        </div>
                    </td>
                    <td>
                        <br/>
                        <br/>
                    </td>
                    
                </tr>

            </table>
            <?php } ?>
        </center>
    </div>

<center>
    <div id='footer' style="bottom: 0;">
        <footer>
Yasin Saadeddin  -  Tüm haklar saklıdır  |  © 2022
        </footer>
    </div>
</center>
</body>
</html>