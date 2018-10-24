<?php

    // Un article en vente
    class Article {
        public $ref;       // Référence unique
        public $intitulé;   // Nom de l'article
        public $categorie; // identifiant de catégorie
        public $info;
        public $prix;      // le prix
        public $image;     // Nom du fichier image
        public $reduction;

        /*function afficherVueArticleSingulier(): string {
            $result='<img src="../data/img/'.$this->image.'" alt="image correspondant a l\'objet">';
            $result .= '<p><b>'.$this->intitulé.'</b></p>';
            $result .=  '<p>'.$this->info.'</p>';
            if($this->reduction==0){
                $result .=  '<p>Prix : '.$this->prix.'</p>';
            }else{
                $prixCal = $this->prix * (1-($this->reduction/100));
                $result .=  '<p>Prix : '.$prixCal.'</p>';
                $result .=  '<form action="../controleur/ajouterAuPanier.php" method="post">
                            Nombre :<br>
                            <input type="text" name="nombreDArticle" value="1"><br>
                            <input type="hidden" name="refArticle" value="'.$this->ref.'">

                            <input type="submit" value="Ajouter au panier">
                            </form>
                '  ;
            }
            return $result;
        }*/
    }

?>
