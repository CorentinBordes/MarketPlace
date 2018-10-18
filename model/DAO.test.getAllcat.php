<?php
// Test de la classe DAO
require_once('DAO.class.php');

// Recupère toutes les catégories
$cat = $dao->getAllCat();
var_dump($cat);
// Affiche 2 catégories pour le test : affiche le pere d'une catégorie
print($cat[0]->id);
print($cat[1]->id);

 ?>
