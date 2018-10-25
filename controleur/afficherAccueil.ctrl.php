<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include_once('../model/DAO.class.php');
    $GLOBALS['categories']= $dao->getAllCat();
    $GLOBALS['articlesEnReduction']=$dao->getArticleEnReduc();
    include('../vue/VueAccueil.php');
 ?>
