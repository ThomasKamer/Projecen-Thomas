<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Alle Boeken</title>
</head>
<body>
    <header>
        <?php include "includes/navbar.php";?>
    </header>
    


<?php
$host = 'localhost';
$dbname = 'lekkerlezen';
$username = 'root';
$password = '';

$conStr = "mysql:host=$host;dbname=$dbname";
$con = new PDO($conStr, $username, $password);

$stmt = "SELECT * FROM boeken ORDER BY rating";
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
    <?php include "includes/footer.php";?>
</body>
</html>