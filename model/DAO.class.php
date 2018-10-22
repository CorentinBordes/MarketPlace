<?php

    require_once("../model/categorie.class.php");
    require_once("../model/article.class.php");

    // Creation de l'unique objet DAO
    $dao = new DAO();

    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        // L'objet local PDO de la base de donnée
        private $db;
        // Le type, le chemin et le nom de la base de donnée
        private $database = 'sqlite:../data/DB.db';

        // Constructeur chargé d'ouvrir la BD
        function __construct() {
            try {
                $this->db= new PDO($this->database);
            } catch(PDOException$e){
                die("erreur de connexion:".$e->getMessage());
            }
        }


        // Accès à toutes les catégories
        // Retourne une table d'objets de type Categorie
        function getAllCat() : array {
            $req="Select * from categorie;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'categorie');
            return $result;
        }

        function getArticle(int $id) : array {
            $req="Select * from article where categorie=$id;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'article');
            return $result;
        }

        function getArticleEnReduc() : array {
            $req="select * from article where reduction != 0.0;";
            $sth=$this->db->query($req);
            $result=$sth->fetchAll(PDO::FETCH_CLASS,'article');
            return $result;
        }

        function verifIdentification($id,$pasword) : boolean {
            $req="select * from clients where password=$password and $id=id;";
            $sth=$this->db->query($req);
            $resultFetch=$sth->fetchAll(PDO::FETCH_CLASS,'clients');
            if(isset($resultFetch)){
                $result=true;
            }else{
                $result=false;
            }
            return $result;
        }

    }

    ?>
