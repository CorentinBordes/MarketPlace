<?php
// Test de la classe DAO
require_once('DAO.class.php');

Var_Dump($dao->rechercheArticle("Boite"));//fonctionne
Var_Dump($dao->rechercheArticle("boite"));//fonctionne

 ?>
