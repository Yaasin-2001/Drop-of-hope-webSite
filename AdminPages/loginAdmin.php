<!DOCTYPE html>
<head>

    <meta charset="UTF-8">
    <title>Bank Blood</title>
    <link rel="icon" href="../image/logo.png" type="image/icon type">
    <link href="../css/Style.css" rel="stylesheet">

</head>
<body >
    <ul>
        <li><a class="active" href="#home">Home</a></li>
        <center><img id="logo" src="../image/logo.png"></center>
    </ul>

<div id='back' >
    
     <?php
        if (isset($_GET['error'])) {
            echo "<script type='text/javascript'>alert('" . $_GET['error'] . "');</script>";
        }
        ?>
<br/><center>
<div id='reddiv' style="width: 50%;  left: 25%;">
  <form action="../DataBase/Admin/loginAdmin.php" method='post'>
  	<h3 id='red'> Login </h3>
	
	 <label >User name: <font id='red'>*</font></label>
    <input type="text" name='username' placeholder="Enter user name.">

	<label >Password: <font id='red'>*</font></label>
    <input type="password" name='password' placeholder="Enter password.">

    <input type="submit" name="submit" value="Login">
    <br/>
  </form>
</div></center>
`
</div>
    

<?php include '../footer.php'; ?>
