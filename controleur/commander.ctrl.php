<?php
    session_start();
    include_once('../model/DAO.class.php');
    $dao->commander($_SESSION['idClient']);
    include('../controleur/afficherPanier.ctrl.php');
 ?>
