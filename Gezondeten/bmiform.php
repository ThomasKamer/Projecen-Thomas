<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
   
   
</head>



<body>



<header>
        <?php   include "includes/navigation.php";?>
        <style>
            body{
                background-color: black;
                
            }
        </style>
</header>
   
    <div class="box1"></div>
   
   
   
   
   
   
   
   
   <style>
             body {
            background-color: #367878;
            text-align:center;
            }

            h3 {
            color: 018192;
}

            .box1 {
                margin: 30px;
				margin-right: 700px;
  				margin-left: 150px;
            }


    </style>
    
    <form action="bmicalc.php" method="post">
        <div> 
            <p>
                <h3>
                    Naam
                </h3>
            </p>
            <input type="text" name="username">
        </div>
        <div>
            <p>
                <h3>
                    Gewicht
                </h3>
            </p>
            <input type="text" name="gewicht">
        </div>
        <div>
            <p>
                <h3>
                    Lengte
                </h3>
            </p>
            <input type="text" name="lengte">
        </div>
        <div>
            <p>
                <h3>
                    leeftijd
                </h3>
            </p>
        
            <input type="text" name="leeftijd">
        </div>
        <div>
            <p>    
                <input type="submit" value="submit">
            </p>
        </div>
        
    </form>
        <div>
            <img src= "https://www.nlbewustgezond.nl/app/uploads/2017/03/Gezond-eten-768x884.jpg" widht="200" height="150">
        </div>
        
</body>
</html>