<?php 
    session_start();
    if($_SESSION['gebruikersnaam'] == NULL ) {
        header("Location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EvenementenKalender | Dashboard</title>
</head>
<body>
        <a href="uitloggen.php">Uitloggen</a>
        <a href="evenement_toevoegen.php">Nieuwe evenement toevoegen</a>
        <?php include ('evenementen_overview.php'); ?>
        
    </body>
</html>