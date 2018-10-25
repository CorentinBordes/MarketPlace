<?php
// Test de la classe DAO
require_once('DAO.class.php');

// verification que le compte client existe
var_dump($dao->verifClientAdmin("emile"));

 ?>
