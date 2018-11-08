<?php
    require_once('DAO.class.php');    // Test de la classe DAO
    $personne = 'emile';
    $refProduit = 3;
    $dao->ajouterPanier($refProduit,$personne);
    var_dump($dao->getPanier($personne));
    var_dump($dao->verifArticleDejaDansLePanier($refProduit,$personne));
 ?>
