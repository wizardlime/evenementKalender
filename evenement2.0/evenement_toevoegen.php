<?php
session_start();
$pdo = require('connect.php');
$message = '';

//Insert new evenement into the database

if(isset($_POST['submit'])) {

    $evenement_naam = $_POST['evenement_naam'];
    $evenement_plaats = $_POST['evenement_plaats'];
    $evenement_provincie = $_POST['evenement_provincie'];

    $query = "INSERT INTO evenementen (evenement_naam, evenement_plaats, evenement_provincie) VALUES(:evenement_naam, :evenement_plaats, :evenement_provincie)";
    $statement = $pdo->prepare($query);

    $data = [
        ':evenement_naam' => $evenement_naam,
        ':evenement_plaats' => $evenement_plaats,
        ':evenement_provincie' => $evenement_provincie
    ];

    if($statement->execute($data)) {
        header('Location: dashboard.php');
        $message = "Evenement succesvol toegevoegd.";
    }

    $id = $pdo->lastInsertId();
}
?>
<?php if(!empty($message)): ?>
    <div class="alert alert-succes">
        <?php echo $message; ?>
    </div>
<?php endif; ?>
<form method="post">
    <input type="text" name="evenement_naam">
    <input type="text" name="evenement_plaats">
    <input type="text" name="evenement_provincie">
    <input type="submit" value="Toevoegen" name="submit">
</form>