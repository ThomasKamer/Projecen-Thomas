<?php
$host = 'localhost';
$dbname = 'lekkerlezen';
$username = 'root';
$password = '';

$conStr = "mysql:host=$host;dbname=$dbname";
$con = new PDO($conStr, $username, $password);

$stmt = "SELECT * FROM boeken WHERE rating > 0 ORDER BY rating";
$sth = $con ->prepare($stmt);
$sth->execute();

?>

<div class="boeken">
    
        <?php while($row = $sth->fetch()) { ?>
            <a href="details.php?id=<?php echo $row["ID"]?>"><img class="boekenimages" src="<?php echo $row['image'];?>"><a>
            <div class="title"><a href="details.php?id=<?php echo $row["ID"]?>"><?php echo $row["Boek"]?></a></div>
            <div class="prijs"><a href="details.php?id=<?php echo $row["ID"]?>"><?php echo $row['prijs']?></a></div>
            
            <?php 
} ?>

</div>
