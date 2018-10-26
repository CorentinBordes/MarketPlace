<?php
// Test de la classe DAO
require_once('DAO.class.php');

// Recupère toutes les catégories
$panier = $dao->getPanier("emile");
var_dump($panier);
// Affiche 2 catégories pour le test : affiche le pere d'une catégorie
/*print($panier->id);
print($panier->listeObjet);
print($panier->idClient);
print($panier->refArticle);*/



 ?>
