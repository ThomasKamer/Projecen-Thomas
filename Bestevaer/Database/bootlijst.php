<?php

echo "Bootlijst";

$host = 'localhost';
$dbname = 'bestevaer';
$username = 'root';
$password = '';

$conStr = "mysql:host=$host;dbname=$dbname";
$con = new PDO($conStr, $username, $password);

$stmt = "SELECT * FROM schepen WHERE maxgewicht < 8000";
$sth = $con ->prepare($stmt);
$sth->execute();

echo '<h3>PHP Fetch in loop</h3>';
while($row = $sth->fetch()) {
    echo $row['id']. " ";
    echo $row['naam']. " ";
    echo $row['maxgewicht']. " ";
    echo $row['volume'];
    echo '<br>';
}