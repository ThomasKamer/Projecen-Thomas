<?php
/*
$schepen = array(
    "select" => ["name" => "Select....", "max_lading" => "Vul wat in", "m3" => "Vul wat in"],
    "HERMES" => ["name" => "HERMES", "max_lading" => 3806, "m3" => 6.842,88],
    "Lucky Star" => ["name" => "Lucky Star", "max_lading" => 4178, "m3" => 7.731,35],
    "NS ANGELA" => ["name" => "NS ANGELA", "max_lading" => 3806, "m3" => 6.842,88],
    "SABRINA" => ["name" => "SABRINA", "max_lading" => 6278, "m3" => 12.416],
    "TRIUMPH IV" => ["name" => "TRIUMPH IV", "max_lading" => 4039, "m3" => 8.189,1],
);
*/

$host = 'localhost';
$dbname = 'bestevaer';
$username = 'root';
$password = '';

$conStr = "mysql:host=$host;dbname=$dbname";
$con = new PDO($conStr, $username, $password);

$stmt = "SELECT * FROM schepen";
$sth = $con ->prepare($stmt);
$sth->execute();

$schepen = [];
while($row = $sth->fetch()) {
    $naam = $row['naam']. " ";
    $maxgewicht = $row['maxgewicht']. " ";
    $volume = $row['volume']. " ";
    $schepen[$naam]= ["name" => $naam, "max_lading" => $maxgewicht, "m3" => $volume];
    echo '<br>';
}




