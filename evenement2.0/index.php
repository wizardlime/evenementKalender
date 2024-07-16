<?php 

require('connect.php');
session_start();

if(isset($_POST['login'])) {

    if(empty($_POST['gebruikersnaam']) || empty($_POST['wachtwoord'])) {
        $message = '<label>Alle velden zijn verplicht.</label>';
    } else {
        $query = "SELECT * FROM gebruikers WHERE gebruikersnaam=:gebruikersnaam AND wachtwoord=:wachtwoord";
        $statement = $pdo->prepare($query);
        $statement->execute(
            array(
                ':gebruikersnaam' => $_POST['gebruikersnaam'],
                ':wachtwoord' => $_POST['wachtwoord']
            )
        );

        $count = $statement->rowCount();
        if($count > 0) {
            $_SESSION['gebruikersnaam'] = $_POST['gebruikersnaam'];
            header("Location: dashboard.php");
        } else {
            $message = '<label>Gebruikersnaam of/en wachtwoord zijn onjuist.</label>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evenementen Kalender | Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        if(isset($message)) {
            echo "<label>".$message."</label>";
        }
    ?>
    <form method="post">
        <input type="text" name="gebruikersnaam">
        <input type="password" name="wachtwoord">
        <input type="submit" value="Login" name="login">
        <h3>Nog geen account? <a href="gebruiker_aanmaken.php">Maak nu er een aan.</a></h3>
    </form>
</body>
</html>