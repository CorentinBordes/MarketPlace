<?php
// Test de la classe DAO
require_once('DAO.class.php');

// verification que le compte client existe
$booleen = $dao->verifIdentification("emile","emiliobe");
var_dump($booleen);
//true = client existe


 ?>
