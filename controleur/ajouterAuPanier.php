<?php
include_once("../model/DAO.class.php");
for ($i=0; $i < $_POST['nombreDArticle'] ; $i++) {
    $dao->ajouterPanier($_POST['refArticle']);
}
include("../vue/VueIdentification.php");
 ?>
