<?php

    require_once('../model/categorie.class.php');
    require_once('../model/article.class.php');
    require_once('../model/clients.class.php');
    require_once('../model/panier.class.php');

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


        //Fonction permettant de creer un client dans la base de donnee
        function seCreerUnCompte($nom,$prenom,$adresse,$id,$password) {
            $req="INSERT INTO clients VALUES (\"$nom\",\"$prenom\",\"$adresse\",\"$id\",\"$password\",\"false\");";
            print($req."\n");
            $this->db->exec($req);
        }
        //Ex commande sql supprimer un compte : delete from 'clients' where nom='Bordes';


        function getPanier($idClient): array {
            $req="Select * from panier where \"$idClient\"=idClient;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'panier');
            return $result;
        }

        //fonction d'ajout d'un produit dans le panier
        function ajouterPanier($produit,$idClient) {
            $req="INSERT INTO panier VALUES ((Select max(id)+1 from panier),0,\"$idClient\",$produit);";
            $this->db->exec($req);
        }

        //Quand le client commande il faut vider le panier
        function viderLePanier($idClient) {
            $req="Delete from panier where idClient=\"$idClient\";";
            $this->db->exec($req);
        }


    }

    ?>
