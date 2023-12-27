<?php include 'header.php'; 

$type = array ('O-','O+','A-','A+','B-','B+','AB-','AB+') ;
$typelength = count($type);
$donor = array (
array("O-",1,0,0,0,0,0,0,0),
array("O+",1,1,0,0,0,0,0,0),
array("A-",1,0,1,0,0,0,0,0),
array("A+",1,1,1,1,0,0,0,0),
array("B-",1,0,0,0,1,0,0,0),
array("B+",1,1,0,0,1,1,0,0),
array("AB-",1,0,1,0,1,0,1,0),
array("AB+",1,1,1,1,1,1,1,1));
?>

<script>
    document.getElementById("liblood").className = "active";
</script>
<div id='reddiv'>
    
<table id='table' width="100%" >
 <tbody>
    <tr>
        <th rowspan="2"> Alıcı </th>
        <th colspan="8"> Bağış yapan </th>
    </tr>
    <tr>
       <?php for($x = 0; $x < $typelength ; $x++){
        echo "<th>".$type[$x]."</th>";
        }?>
    </tr>
    <?php
    foreach ($donor as $row) {
        $length = count($row);
        echo "<th>".$row[0]."</th>";
        for($x = 1; $x < $length; $x++){
        if($row[$x] == 1)
            echo "<td><img id='typeimg' src='../image/check.png'/></td>";
        else
            echo "<td><img id='typeimg'src='../image/uncheck.png'/></td>";
        }
    echo "</tr>";
   
    }?>


 </tbody>
</table>


</div>
						
<br/>
<br/>
</div>


<?php include '../footer.php'; ?>
