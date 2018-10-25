<?php
// Test de la classe DAO
require_once('DAO.class.php');

// verification que le compte client existe
var_dump($dao->verifClientExistant("emile"));
// verification que le compte client n'existe pas
var_dump($dao->verifClientExistant("pedro"));



 ?>
