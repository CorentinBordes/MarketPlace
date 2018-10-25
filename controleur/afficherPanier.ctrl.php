<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include_once("../model/DAO.class.php");
    $GLOBALS["panierClient"]= $dao->getPanier($_SESSION["idClient"]);
    include('../vue/VuePanier.php');
 ?>
