<?php
    session_start();
    include_once('../model/DAO.class.php');
    for ($i=0; $i < $_POST['nombreDArticle'] ; $i++) {
        $dao->ajouterPanier($_POST['refArticle'],$_POST['idClient']);
    }
    $idClient=$_POST['idClient'];
    $GLOBALS["panierClient"]= $dao->getPanier($idClient);
    include('../vue/VuePanier.php');
?>
