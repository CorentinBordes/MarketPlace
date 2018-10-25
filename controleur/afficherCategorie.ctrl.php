<?php
    session_start();
    var_dump($_SESSION);
    include_once("../model/DAO.class.php");
    $GLOBALS["categorie"]= $dao->getArticle($_GET["idCate"]);
    include("../vue/VueCategorie.php");
 ?>
