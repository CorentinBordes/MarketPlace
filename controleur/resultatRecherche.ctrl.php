<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../model/DAO.class.php');
$GLOBALS['articleRecherchés']=$dao->rechercheArticle($_POST['BarreRecherche']);
include_once('../vue/VueResultatRecherche.php');
 ?>
