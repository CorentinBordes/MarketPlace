<?php
// Test de la classe DAO
require_once('DAO.class.php');

// Recupère toutes les catégories
$articles = $dao->getArticle(1);
var_dump($articles);
// Affiche 2 catégories pour le test : affiche le pere d'une catégorie
print($articles[0]->intitulé);


 ?>
