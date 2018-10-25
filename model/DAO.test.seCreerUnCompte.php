<?php
// Test de la classe DAO
require_once('DAO.class.php');

// verification que le compte client existe
var_dump($dao->seCreerUnCompte("Bordes","Corentin","Coin perdu de Grenoble","bordes","coco"));
// verification que le compte client n'existe pas
var_dump($dao->verifClientExistant("bordes"));


 ?>
