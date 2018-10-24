<?php
    include_once("../model/DAO.class.php");
    $idClient=$_GET["idClient"];
    $GLOBALS["panierClient"]= $dao->getPanier($idClient);
    include('../vue/VuePanier.php');
 ?>
