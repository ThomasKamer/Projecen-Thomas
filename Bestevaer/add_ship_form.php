<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

    <header>
        <?php   include "includes/navigation.php";?>
    </header>
    
    <div id="form">
   
    <form action="add_ship.php" method="POST">
    <label for="naam">Naam</label><br>
    <input type="text" id="naam" name="naam" placeholder="naam...">

    <br>
    <br>
    
    <label for="code">Code</label><br>
    <input type="text" id="code" name="code" placeholder="code...">

    <br>
    <br>

    <label for="maxlading">Max Lading</label><br>
    <input type="text" id="maxlading" name="maxlading" placeholder="max lading...">

    <br>
    <br>

    <label for="maxgewicht">Max Gewicht</label><br>
    <input type="text" id="maxgewicht" name="maxgewicht" placeholder="max gewicht...">

    <br>
    <br>

    <input type="Submit" id="button" value="Toevoegen" name="submit"> 

    </form>
    </div>
    
</body>
</html>

