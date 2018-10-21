<?php
    include_once("../model/DAO.class.php");
    $id=$_GET["id"];
    $GLOBALS["categorie"]= $dao->getArticle($id);
    include("../vue/VueCategorie.php");
 ?>
