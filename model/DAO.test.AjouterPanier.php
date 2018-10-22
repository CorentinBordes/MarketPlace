<?php
    require_once('DAO.class.php');    // Test de la classe DAO
    $personne = 'emile';
    $password = 'emiliobe';
    $produit = 1;
    $dao->ajouterPanier($personne,$password,$produit);
 ?>
