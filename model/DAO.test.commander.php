<?php
    require_once('DAO.class.php');    // Test de la classe DAO
    $id = "emile";

// affichage de la table panier de "emile" avant la fonction commander().

    var_dump($dao->getPanier("emile"));

//affichage de la table commande de "emile" avant la fonction commander().

    $req="SELECT * FROM commande WHERE idClient = "emile" ;";
    $sth=$this->db->query($req);
    $result=$sth->fetchAll(PDO::FETCH_CLASS,'commande');
    var_dump($result);

// affichage de la table ligne de commande pour la commande de "emile" avant la fonction commander().

    $req="SELECT * FROM ligneDeCommande WHERE numCommande IN (SELECT numCommande FROM commande WHERE idClient = "emile") ;";
    $sth=$this->db->query($req);
    $result=$sth->fetchAll(PDO::FETCH_CLASS,'ligneDeCommande');
    var_dump($result);

// appel de la fonction commander() a tester.

    $dao->commander($id);

// affichage de la table panier de "emile" aprèss la fonction commander().

    var_dump($dao->getPanier("emile"));

//affichage de la table commande de "emile" avant la fonction commander().

    $req="SELECT * FROM commande WHERE idClient = "emile" ;";
    $sth=$this->db->query($req);
    $result=$sth->fetchAll(PDO::FETCH_CLASS,'ligneDeCommande');
    var_dump($result);

// affichage de la table ligne de commande pour la commande de "emile" avant la fonction commander().

    $req="SELECT * FROM ligneDeCommande WHERE numCommande = (SELECT numCommande FROM commande WHERE idClient = "emile") ;";
    $sth=$this->db->query($req);
    $result=$sth->fetchAll(PDO::FETCH_CLASS,'ligneDeCommande');
    var_dump($result);


//test a faire car je ne peux pas acceder a la base de donnée.

?>
