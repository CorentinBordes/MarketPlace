<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include_once('../model/DAO.class.php');
    $GLOBALS['clients']=$dao->getClients();
    include('../vue/VueParametreAdmin.php');
 ?>
