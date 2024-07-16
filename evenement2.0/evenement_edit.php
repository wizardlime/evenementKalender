<?php
require('connect.php');
$message = '';

$id = $_GET['id'];
$select_evenement = "SELECT * FROM evenementen WHERE id = :id";
$statement = $pdo->prepare($select_evenement);
$statement->execute([':id' => $id]);
$evenement = $statement->fetch(PDO::FETCH_OBJ);



//Insert updated values into the database

if(isset($_POST['submit'])) {

    $evenement_naam = $_POST['evenement_naam'];
    $evenement_plaats = $_POST['evenement_plaats'];
    $evenement_provincie = $_POST['evenement_provincie'];

    $query = "UPDATE evenementen SET evenement_naam=:evenement_naam, evenement_plaats=:evenement_plaats, evenement_provincie=:evenement_provincie WHERE id=:id";
    $statement = $pdo->prepare($query);

    if($statement->execute([
        ':evenement_naam' => $evenement_naam,
        ':evenement_plaats' => $evenement_plaats,
        ':evenement_provincie' => $evenement_provincie,
        ':id' => $id
    ])) {
        header('Location: dashboard.php');
        $message = "Evenement succesvol aangepast.";
    }

}

?>




<form method="post">
    <input type="text" value="<?= $evenement->evenement_naam ?>" name="evenement_naam">
    <input type="text" value="<?=$evenement->evenement_plaats ?>"  name="evenement_plaats">
    <input type="text" value="<?=$evenement->evenement_provincie ?>" name="evenement_provincie">
    <input type="submit" value="Edit" name="submit">
</form>

