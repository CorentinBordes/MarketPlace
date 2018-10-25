<?php
    session_start();
    include_once('../model/DAO.class.php');
    $dao->viderLePanier($_SESSION['idClient']);
    include('../controleur/afficherPanier.ctrl.php');
 ?>
