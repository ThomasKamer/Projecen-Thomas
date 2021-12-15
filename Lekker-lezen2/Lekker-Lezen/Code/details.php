<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="detailsBoeken/css/boeken.css">
</head>
<body>
    
<?php
    $host = 'localhost';
    $dbname = 'lekkerlezen';
    $username = 'root';
    $password = '';
 
    $conStr = "mysql:host=$host;dbname=$dbname";
    $con = new PDO($conStr, $username, $password);
 
    $id = $_GET['id'];
    $stmt = "SELECT * FROM boeken WHERE id=?";
    $params = [$id];
 
    $sth = $con->prepare($stmt);
    $sth->execute($params);
 
    ?>

    <div class="boeken">

            <?php
                while($row = $sth->fetch()) {
                echo '<div id="title">' . $row['Boek']. '</div>';
                echo '<img id="boekenimages" src="' . $row['image']. '">';
                echo '<div id="prijs">' . $row['prijs']. '</div>';
                echo '<div id="auteur">'. "Auteur:". " ". $row['Auteur']. '</div>';
                echo '<div id="uitgever">'. "Uitgever:". " ". $row['Uitgever']. '</div>';
                echo '<div id="uitgekomen">'. "Uitgekomen:". " " . $row['Uitgekomen']. '</div>';
                echo '<div id="genre">'. "Uitgekomen:". " " . $row['Genre']. '</div>';
                echo '<div id="samenvatting">'. "Samenvatting:". '<br>'. '<br>' . $row['Samenvatting']. '</div>';
                }
            ?>
    </div>
 
</body>
</html>
