<?php 

    require('connect.php');

    if(isset($_POST['submit'])) {

        $gebruikersnaam = $_POST['gebruikersnaam'];
        $wachtwoord = $_POST['wachtwoord'];
        $email_address = $_POST['email_address'];
        $bedrijfs_naam = $_POST['bedrijfs_naam'];
        $telefoon_nummer = $_POST['telefoon_nummer'];

        $gebruiker_toevoegen = "INSERT INTO gebruikers(gebruikersnaam, wachtwoord, email_address, bedrijfs_naam, telefoon_nummer) VALUES(:gebruikersnaam, :wachtwoord, :email_address, :bedrijfs_naam, :telefoon_nummer)";
        $statement = $pdo->prepare($gebruiker_toevoegen);

        $data = [
            ':gebruikersnaam' => $gebruikersnaam,
            ':wachtwoord' => $wachtwoord,
            ':email_address' => $email_address,
            ':bedrijfs_naam' => $bedrijfs_naam,
            ':telefoon_nummer' => $telefoon_nummer
        ];

        if($statement->execute($data)) {
            echo "Gebruiker succesvol aangemaakt.";
            header("location:index.php");
        }

        $id = $pdo->lastInsertId();

    }


?>

<form method="post">

    <input type="text" name="gebruikersnaam" id="">
    <input type="password" name="wachtwoord" id="">
    <input type="email" name="email_address" id="">
    <input type="text" name="bedrijfs_naam" id="">
    <input type="tel" name="telefoon_nummer" id="">

    <input type="submit" value="Account Aanmaken" name="submit">

</form>