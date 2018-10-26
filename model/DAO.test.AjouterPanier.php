<?php
    require_once('DAO.class.php');    // Test de la classe DAO
    $personne = 'emile';
    $produit = 3;
    $dao->ajouterPanier($produit,$personne);
    var_dump($dao->getPanier($personne));
 ?>
