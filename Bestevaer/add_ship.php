<?php

$host = 'localhost';
$dbname = 'bestevaer';
$username = 'root';
$password ="";


$conStr = "mysql:host=$host;dbname=$dbname";
$con = new PDO($conStr, $username, $password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['submit'])){

    $naam = $_POST['naam'];
    $code = $_POST['code'];
    $max_lading = $_POST['maxlading'];
    $max_gewicht = $_POST['maxgewicht'];
    

    $sql = "INSERT INTO schepen (naam, code, maxlading, maxgewicht) 
    VALUES (:naam, :code, :maxlading, :maxgewicht)";
    $params = array(":naam" => $naam, 
                    ":code" => $code, 
                    ":maxlading" => $max_lading, 
                    ":maxgewicht" => $max_gewicht);

    try {
        // Dit stukje code wil je beschermen tegen een fout
        $sth = $con->prepare($sql);
        $sth->execute($params);
    } catch (PDOException $e) {
        // In de catch wordt de fout afgevangen en kan je iets met de foutmelding
        // doen, bijvoorbeeld tonen of loggen
        echo $e->getMessage();
    }
    
    $sql = "SELECT * FROM schepen";
    $sth = $con->prepare($sql);
    $sth->execute();


    while($row = $sth->fetch()) {
        echo $row['naam']. " ";
        echo $row['code']. " ";
        echo $row['maxlading'];
        echo $row['maxgewicht'];
        echo '<br>';
    }
}



?>
