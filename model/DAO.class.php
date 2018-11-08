<?php

    require_once('../model/categorie.class.php');
    require_once('../model/article.class.php');
    require_once('../model/clients.class.php');
    require_once('../model/panier.class.php');
    require_once('../model/commande.class.php');
    require_once('../model/ligneDeCommande.class.php');

    // Creation de l'unique objet DAO
    $dao = new DAO();

    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        // L'objet local PDO de la base de donnée
        private $db;
        // Le type, le chemin et le nom de la base de donnée
        private $database = 'sqlite:../data/DB.db'; //renommer dbpath

        // Constructeur chargé d'ouvrir la BD
        function __construct() {
            try {
                $this->db= new PDO($this->database);
            } catch(PDOException $e){
                die("erreur de connexion:".$e->getMessage());
            }
        }


        // Accès à toutes les catégories
        // Retourne une table d'objets de type Categorie
        function getAllCat(): array {
            $req="Select * from categorie;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'categorie');
            return $result;
        }

        function getArticleSingulier(int $ref): array {
            $req="Select * from article where ref=$ref;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'article');
            return $result;
        }

        function getArticle(int $id): array {
            $req="Select * from article where categorie=$id;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'article');
            return $result;
        }

        function getArticleEnReduc(): array {
            $req="select * from article where reduction != 0.0;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'article');
            return $result;
        }

        //renvoie true si le password et l'id correspondent dans la base de donnée
        function verifIdentification($id,$password) {
            $req="select * from clients where password=\"$password\" and \"$id\"=id;";
            $sth=$this->db->query($req);
            $resultFetch=$sth->fetchAll(PDO::FETCH_CLASS,'clients');
            return isset($resultFetch[0]);
        }

        //renvoie true si un compte est existant, faux si il n'existe pas
        function verifClientExistant($id) {
            $req="select * from clients where \"$id\"=id;";
            $sth=$this->db->query($req);
            $resultFetch=$sth->fetchAll(PDO::FETCH_CLASS,'clients');
            return isset($resultFetch[0]);
        }

        //renvoie true si le client est administrateur
        function verifClientAdmin($id) {
            $req="select * from clients where \"$id\"=id;";
            $sth=$this->db->query($req);
            $resultFetch=$sth->fetchAll(PDO::FETCH_CLASS,'clients');
            return $resultFetch[0]->administrateur;
        }

        //Fonction permettant de creer un client dans la base de donnee
        function seCreerUnCompte($nom,$prenom,$adresse,$id,$password) {
            $req= "insert into clients values( :nom , :prenom , :adresse , :id , :password ,\"false\");";
            $stmt =$this->db->prepare($req);
            $stmt->bindParam(":nom",$nom);
            $stmt->bindParam(':prenom',$prenom);
            $stmt->bindParam(':adresse',$adresse);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':password',$password);
            $stmt->execute();
            //version sans requete preparée
            /*$req="INSERT INTO clients VALUES (\"$nom\",\"$prenom\",\"$adresse\",\"$id\",\"$password\",\"false\");";
            $this->db->exec($req);*/
        }

        function supprimerUnCompte($id) {
            $req= "DELETE FROM \"clients\" where id= :id;";
            $stmt =$this->db->prepare($req);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            //version sans requete preparée
            /*$req="DELETE FROM \"clients\" where id=\"$id\";";
            $this->db->exec($req);*/
        }
        //Ex commande sql supprimer un compte : delete from 'clients' where nom='Bordes';

        function getClients(): array {
            $req="Select * from clients;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'clients');
            foreach ($result as $value) {                       //on cache les mots de passe
                $value->password=null;
            }
            return $result;
        }

        function getPanier($idClient): array {
            $req="Select * from panier where \"$idClient\"=idClient;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'panier');
            return $result;
        }

        //fonction d'ajout d'un produit dans le panier
        function ajouterPanier($produit,$id) {
            if(verifArticleDejaDansLePanier($produit,$id)){
                $req="Update panier set quantite=((select quantite from panier where idClient=\"$id\" and refArticle=\"$produit\")+1) where idClient=\"$id\" and refArticle=\"$produit\";";
            }else{
                $req= "INSERT INTO panier VALUES (1, :id , :produit );";
                $stmt =$this->db->prepare($req);
                $stmt->bindParam(':id',$id);
                $stmt->bindParam(':produit',$produit);
                $stmt->execute();
            }
            //version sans requete preparée
            // $req="INSERT INTO panier VALUES ((Select max(id)+1 from panier),0,\"$id\",$produit);";
            // $this->db->exec($req);
        }

        function verifArticleDejaDansLePanier($refProduit,$id){
            $req="Select * from panier where \"$id\"=idClient;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'panier');
            $bool=false;
            foreach ($result as $ArticleDuPanier) {
                if($bool!=true){
                    if($ArticleDuPanier->refArticle==$refProduit){
                        $bool=true;
                    }
                }
            }
            return $bool;
        }

        function ajouterALaTableLigneDeCommande($Article){
            $req2 = "INSERT INTO ligneDeCommande VALUES ((Select max(numCommande) from commande), :refArticle, :quantite);";
            $stmt =$this->db->prepare($req2);
            $stmt->bindParam(':refArticle',$Article->refArticle);
            $stmt->bindParam(':quantite',$Article->quantite);
            $stmt->execute();
        }

        function commander($id) {
            // requete pour ajouter une commande dans la table commande.
            $req1="INSERT INTO commande VALUES ((Select max(numCommande)+1 from commande where idClient = :id ), :id , :dateDuJour);";
            $stmt =$this->db->prepare($req1);
            $stmt->bindParam(':id',$id);
            $date=(string)date("Y-m-d");
            $stmt->bindParam(':dateDuJour',$date);
            $stmt->execute();

            // requete pour ajouter chaque produit dans la table ligne de commande en ne faisant pas de doublon.
            $panier= $this->getPanier($id);
            foreach ($panier as $Article) {
                var_dump($Article);
                $this->ajouterALaTableLigneDeCommande($Article);
            }

            //  requete pour vider le panier.
            $req3 = "DELETE FROM panier WHERE idClient= :id ;";
            $stmt = $this->db->prepare($req3);
            $stmt->bindParam(':id',$id);
            $stmt->execute();


            //version suppresion du panier sans ajout dans la commande et ligne de commande
                //version requete preparee
                // $req= "Delete from panier where idClient=  :id ;";
                // print($req);
                // $stmt =$this->db->prepare($req);
                // $stmt->bindParam(':id',$id);
                // $stmt->execute();

                // version sans requete preparée
                // $req="Delete from panier where idClient=\"$idClient\";";
                // $this->db->exec($req);
        }




        //Cette fonction renvoie tous les Numeros et dates de commande d'un client
        function getNumCommande($id){
          $req="SELECT * FROM commande WHERE idClient = \"$id\" ;";
          $sth=$this->db->query($req);
          $result=$sth->fetchAll(PDO::FETCH_CLASS,'commande');
          return $result;
        }

        function getLigneDeCommandeDUneCommande($numCommande){
          $req="SELECT * FROM ligneDeCommande WHERE numCommande = \"$numCommande\" ;";
          $sth=$this->db->query($req);
          $result=$sth->fetchAll(PDO::FETCH_CLASS,'ligneDeCommande');
          return $result;
        }

        //renvoie tous les articles d'une commande

        function getCommande($numCommande){
            $req="SELECT refArticle FROM ligneDeCommande WHERE numCommande = $numCommande ;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'ligneDeCommande');
            return $result;
        }

        function rechercheArticle($motARechercher): array {
            $req="SELECT * FROM article WHERE intitulé LIKE \"%$motARechercher%\" OR info LIKE \"%$motARechercher%\";";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'article');
            return $result;
        }


    }

    ?>
