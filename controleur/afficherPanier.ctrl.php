<?php
    include_once("../model/DAO.class.php");
    $idClient=$_GET["id"];
    var_dump($idClient);
    $GLOBALS["panierClient"]= $dao->getPanier($idClient);
    include('../vue/VuePanier.php');
 ?>
