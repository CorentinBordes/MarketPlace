<?php
// Test de la classe DAO
require_once('DAO.class.php');

$commande = $dao->getCommande("1");
var_dump($commande);

//test de la commande numéro 1
// test à faire, je ne peux pas acceder a la base de donnée

?>
