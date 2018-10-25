<?php
    include_once('../model/DAO.class.php');
    if(!isset($_SESSION)){
        session_start();
    }
    if($dao->verifClientExistant($_POST['id'])){
        $GLOBALS['resultatInscription']="Compte déjà existant";
    }else{
        $dao->seCreerUnCompte($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['id'],$_POST['password']);
        $GLOBALS['resultatInscription']="Compte crée avec succes";
    }
    include_once('../vue/VueResultatInscription.php');

?>
