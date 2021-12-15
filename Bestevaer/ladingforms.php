<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoer</title>
</head>
<body>
    <header>
        <?php include "includes/navigation.php";?>
    </header>
    <section>
        <div id="form">
        <form action="ladingBerekenen.php"  method="POST">
            <label for="schip">Kies een Schip</label><br>
            <select name="schip_select">
            <?php include "includes/schepen.php"; ?>
            <?php foreach($schepen as $key=>$value): ?>
                <option value="<?php echo $key; ?>"><?php echo $value["name"]; ?></option>
            <?php endforeach; ?>
            </select>
            
            <br>
            <br>
            <br>
            
            <label for="lading">lading in ton</label><br>
            <input type="text" id="lading" name="lading" placeholder="Lading...">
            
            <br>
            <br>
            <br>

            <input type="Submit" id="button" value="Verwerken"> 

            
        
        </form>
        </div>
    </section>
</body>
</html>