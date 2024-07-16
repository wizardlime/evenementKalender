<?php 
$pdo = include('connect.php');
$sql = "SELECT * FROM evenementen";

$statement = $pdo->query($sql);

//Display all evenements from the database
$evenementen = $statement->fetchAll(PDO::FETCH_OBJ);
$message = '';
?>
<?php if(!empty($message)): ?>
  <?php echo $message; ?>
  <?php endif ?>
<table>
  <thead>
    <tr>
      <th>Evenement Naam</th>
      <th>Evenement Plaats</th>
      <th>Evenement Provincie</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach($evenementen as $evenement): ?>
        <td><?php echo $evenement->evenement_naam ?> </td>
        <td><?php echo $evenement->evenement_plaats ?> </td>
        <td><?php echo $evenement->evenement_provincie ?> </td>
        <td>
            <a href="evenement_edit.php?id=<?= $evenement->id ?>">Edit</a>
            <a onclick return = "Weet u het zeker dat u deze evenement wil verwijderen?" href="evenement_delete.php?id=<?= $evenement->id ?>">Delete</a>
          </td>
        <?php endforeach ?>  
    </tr>
  </tbody>
</table>


