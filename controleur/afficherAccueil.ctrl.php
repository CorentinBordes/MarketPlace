<?php
    include_once('../model/DAO.class.php');
    $GLOBALS['categories']= $dao->getAllCat();
    $GLOBALS['articlesEnReduction']=$dao->getArticleEnReduc();
    //var_dump($GLOBALS["articlesEnReduction"]);
    include('../vue/VueAccueil.php');
 ?>
