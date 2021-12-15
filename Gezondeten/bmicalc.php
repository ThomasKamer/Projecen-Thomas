<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            background:#367878;
            text-align:center;
        }

        section{
            color:black;
            margin-top:10%;
            margin-left:45%;
            content:"";
            display: table;
            clear: both;
            width: 150px;
            height:150px;
            background: #C4DBE0;
        }
    </style>
    

<section>

<?php

$username = $_POST["username"];
$gewicht = $_POST["gewicht"];
$lengte = $_POST["lengte"];
$leeftijd = $_POST["leeftijd"];

echo "Bereken BMI van $username";
echo '<br>';





$bmi= round ($gewicht / ($lengte /10000 * $lengte));

echo '<br>';
echo "Lengte: $lengte";
echo '<br>';
echo "Gewicht: $gewicht";
echo '<br>';
echo "BMI: $bmi";
echo '<br>';
echo "Uw leeftijd is $leeftijd";
echo '<br>';


if ($bmi < 18.5) {
    echo "onder gewicht";
} else if ($bmi > 18.5 && $bmi < 25) {
    echo "goed gewicht";
} else if ($bmi > 25 && $bmi < 40) {
    echo "overgewicht";
}


?>
</section>
</body>
</html>