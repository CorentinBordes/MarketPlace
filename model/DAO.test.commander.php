<?php
    require_once('DAO.class.php');    // Test de la classe DAO
    $id = "emile";

    $produit = 3;
    $dao->ajouterPanier($produit,$id);
    $produit = 4;
    $dao->ajouterPanier($produit,$id);
    //var_dump($dao->getPanier($id));
    $dao->commander($id);

?>
