<?php 

$host = 'localhost';
$dbname = 'colorid';
$username = 'root';
$password ="";

$connectStr = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';
$db = new PDO($connectStr, $username, $password);


$sql = "SELECT * FROM colors";
$sth = $db->prepare($sql);
$sth->execute();

$list = [];
while($row = $sth->fetch()) {
    $hex=$row['hex'];
    array_push($list,$hex);
    
}
echo json_encode($list);
?>
    
