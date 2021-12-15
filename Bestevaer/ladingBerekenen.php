<title>Uitvoer</title>

<link rel="stylesheet" href="style.css">

<header>
    <?php include "includes/navigation.php";?>
</header>




<?php

include "includes/schepen.php"; 

$lading = $_POST["lading"];
$schip = $_POST["schip_select"];
$max_lading = $schepen[$schip]["max_lading"];
$m3 = $schepen[$schip]["m3"];
?>

<body>
    

<div id="form2">

<?php 
    echo "Lading van $schip word berekent met: $lading";
    echo '<br>';
    echo '<br>';
    echo "max lading van $schip is: $max_lading";
    echo '<br>';
    echo '<br>';
    echo "m3 van $schip is: $m3";
    echo '<br>';
    echo '<br>';

?>
    

<?php
echo '<br>';

if(($schip == "HERMES") && ($lading <= 3806)) {
    echo "Goed";
}else if(($schip == "Lucky Star") && ($lading <= 4178)) {
    echo "Goed";
}else if(($schip == "NS ANGELA") && ($lading <= 3806)) {
    echo "Goed";
}else if(($schip == "SABRINA") && ($lading <= 6278)) {
    echo "Goed";
}else if(($schip == "TRIUMPH IV") && ($lading <= 4039)) {
    echo "Goed";
}else {
    echo "Niet Goed";
}

?>
    <br>
    <br>
        
    <form action="ladingforms.php"  method="POST">
    <input type="Submit" id="button" value="Terug">
</div>
</body>

