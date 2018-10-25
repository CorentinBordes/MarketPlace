<?php
session_start();
require_once('../model/DAO.class.php');
if($_POST['id'] != $_SESSION['idClient']){
    $dao->supprimerUnCompte($_POST['id']);
}
include_once('../controleur/afficherParametreAdmin.ctrl.php');
 ?>
