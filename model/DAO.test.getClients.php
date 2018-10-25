<?php
// Test de la classe DAO
require_once('DAO.class.php');

// Recupère touts les clients
$clients = $dao->getClients();
var_dump($clients);



 ?>
