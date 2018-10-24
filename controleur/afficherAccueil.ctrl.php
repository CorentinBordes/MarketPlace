<?php
    include_once('../model/DAO.class.php');
    $GLOBALS['categories']= $dao->getAllCat();
    $GLOBALS['articlesEnReduction']=$dao->getArticleEnReduc();
    if(isset($_GET['idClient'])){
        $GLOBALS['identificateur']=$_GET['idClient'];
    }
    //var_dump($GLOBALS["articlesEnReduction"]);
    include('../vue/VueAccueil.php');
 ?>
