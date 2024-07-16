<?php 
    session_start();
    include('connect.php');

    $id = $_GET['id'];
    $delete_evenement = "DELETE FROM evenementen WHERE id = :id";
    $statement = $pdo->prepare($delete_evenement);
    if($statement->execute([':id' => $id])) {
        header("Location: dashboard.php");
    }