<?php 
session_start();
unset($_SESSION['id']);
header('Location: index.php');
session_destroy();