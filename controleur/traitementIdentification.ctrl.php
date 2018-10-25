<?php
    session_start();
    include_once('../model/DAO.class.php');
    $id=$_POST['id'];
    $password=$_POST['password'];
    $boolIdentification=$dao->verifIdentification($id,$password);
    if($boolIdentification){ //personne presente dans la table client
        $_SESSION['idClient']=$id;
        include('../controleur/afficherAccueil.ctrl.php');
    }else{
        include('../vue/VueEchecDeLAuthentification.php');
    }
 ?>
