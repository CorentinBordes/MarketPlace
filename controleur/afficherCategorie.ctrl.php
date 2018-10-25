<?php
    session_start();
    include_once("../model/DAO.class.php");
    $GLOBALS["categorie"]= $dao->getArticle($_GET["idCate"]);
    include("../vue/VueCategorie.php");
 ?>
