<?php
    include_once('../model/DAO.class.php');
    $id=$_POST['id'];
    $password=$_POST['password'];
    $boolIdentification=$dao->verifIdentification($id,$password);
    if($boolIdentification){ //personne presente dans la table client
        $GLOBALS['identificateur']=[$id,$password];
        include('../controleur/afficherAccueil.ctrl.php');
    }else{
        include('../vue/VueEchecDeLAuthentification.php');
    }
 ?>
