<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include_once('../model/DAO.class.php');
    $GLOBALS['CommandesClient']= $dao->getNumCommande($_SESSION['idClient']);//vecteur d'objets de type commande
    foreach ($GLOBALS['CommandesClient'] as $CommandeClient) {
        $GLOBALS['ligneDeCommande']= $dao->getLigneDeCommandeDUneCommande($CommandeClient->numCommande);
        foreach ($GLOBALS['ligneDeCommande'] as $ligneDeCommande) {
            $resultat[$CommandeClient->numCommande][$ligneDeCommande->refArticle]=$dao->getArticleSingulier($ligneDeCommande->refArticle);
        }
    }
    //var_dump($resultat);
    $GLOBALS['ArticleCommande']=$resultat;
    include('../vue/VueCommandes.php');
 ?>
