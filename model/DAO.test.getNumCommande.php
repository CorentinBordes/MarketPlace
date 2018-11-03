<?php
// Test de la classe DAO
require_once('DAO.class.php');

$numCommande = $dao->getNumCommande("Emile");
var_dump($numCommande);

// test du numéro et de la date des commandes d'émile.
// test à faire, je ne peux pas acceder a la base de donnée

?>
